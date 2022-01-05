<?php

include('lib/qrlib.php');

$tempDir = 'img/';
$codeContents = 'C0001';
$fileName = $codeContents.'.png';

$pngAbsoluteFilePath = $tempDir.$fileName;
$urlRelativeFilePath = 'img/'.$fileName;

QRcode::png($codeContents, $pngAbsoluteFilePath, QR_ECLEVEL_L, 3); 
?>
