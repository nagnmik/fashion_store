<?php
$host = "localhost";
$root = "root";
$pass = "";
$db_name = "jemcloset_store";
$mysqli = new mysqli($host, $root, $pass, $db_name);
$mysqli->select_db($db_name);
$mysqli->query("SET NAMES 'utf8'");

//get the table list
$queryTables = $mysqli->query('SHOW TABLES');
while ($row = $queryTables->fetch_row()) {
    $target_tables[] = $row[0];
}

//get the table structure
foreach ($target_tables as $table) {
    $result = $mysqli->query('SELECT * FROM ' . $table);
    $fields_amount = $result->field_count;
    $rows_num = $mysqli->affected_rows;
    $res = $mysqli->query('SHOW CREATE TABLE ' . $table);
    $TableMLine = $res->fetch_row();
    $content = (!isset($content) ? '' : $content) . "\n\n" . $TableMLine[1] . ";\n\n";
    for ($i = 0, $st_counter = 0; $i < $fields_amount; $i++, $st_counter = 0) {
        while ($row = $result->fetch_row()) {
            //when started (and every after 100 command cycle);
            if ($st_counter % 100 == 0 || $st_counter == 0) {
                $content .= "\nINSERT INTO " . $table . " VALUES";
            }
            $content .= "\n(";
            for ($j = 0; $j < $fields_amount; $j++) {

                if (isset($row[$j])) {
                    $content .= '"' . $row[$j] . '"';
                } else {
                    $content .= '""';
                }
                if ($j < ($fields_amount - 1)) {
                    $content .= ',';
                }
            }
            $content .= ")";
            if ((($st_counter + 1) % 100 == 0 && $st_counter != 0) || $st_counter + 1 == $rows_num) {
                $content .= ";";
            } else {
                $content .= ",";
            }
            $st_counter = $st_counter + 1;
        }
    }
}
//save as .sqp file
//give additional description
$content_ = "\n-- Database Backup --\n";
$content .= "-- version 5.2.0\n";
$content_ .= "-- Host: localhost:3306\n";
$content_ .= "-- Generating Time : " . date("M d") . "," . date("Y") . " at " . date("H:i:s") . date("A") . "\n\n";
$content_ .= $content;
//save the file
$backup_file_name = $db_name . " " . date("Y-m-d H-i-s") . ".sql";
$fp = fopen($backup_file_name, 'w+');
$result = fwrite($fp, $content_);
fclose($fp);



//download file directly from browser
$file_path = $backup_file_name;
if (!empty($file_path) && file_exists($file_path)) {
    header("Pragma:public");
    header("Expired:0");
    header("Cache-Control:must-revalidate");
    header("Content-Control:public");
    header("Content-Description: File Transfer");
    header("Content-Type: application/octet-stream");
    header("Content-Disposition:attachment; filename=\"" . basename($file_path) . "\"");
    header("Content-Transfer-Encoding:binary");
    header("Content-Length:" . filesize($file_path));
    flush();
    readfile($file_path);
    exit();
}
