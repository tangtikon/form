<?php
require_once __DIR__ . '/vendor/autoload.php';
try {
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('Hello World');
    // Other code
    $mpdf->Output();
} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception name used for catch
    // Process the exception, log, print etc.
    echo $e->getMessage();
}