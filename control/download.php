<?php
/**
 * Created by PhpStorm.
 * User: ELITE
 * Date: 24/05/2016
 * Time: 19:34
 */

$file = 'bill.txt';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
}