<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

// เพิ่ม Font ให้กับ mPDF
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
    'tempDir' => __DIR__ . '/tmp',
    'fontdata' => $fontData + [
        'sarabun' => [ // ส่วนที่ต้องเป็น lower case ครับ
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNewItalic.ttf',
            'B' =>  'THSarabunNewBold.ttf',
            'BI' => "THSarabunNewBoldItalic.ttf",
            'mode' => 'utf-8',
            'format' => [190, 236],
            'orientation' => 'L'
        ]
    ],
]);
$mpdf->showImageErrors = true;

ob_start(); // Start get HTML code

include('header.php');
include('connect.php');

?>
<link rel="stylesheet" href="css_print.css">
<?php
$txt_name = $_POST['txt_name'];
$txt_name_eng = $_POST['txt_name_eng'];
$txt_numcard = $_POST['txt_numcard'];
$txt_role = $_POST['txt_role'];
$txt_workplace = $_POST['txt_workplace'];
$txt_phone = $_POST['txt_phone'];
$txt_email = $_POST['txt_email'];
$txt_account = $_POST['txt_account'];
$txt_password = $_POST['txt_password'];
?>

<body>

    <div class="container d-flex justify-content-center">
        <div class="col col-lg-9">
            <div class="text-center">
                <img src="img/logo.jpg" width="100" height="100"><br>
            </div>
            <div class="header text-center">
                แบบฟอร์มลงทะเบียนใช้บริการอินเตอร์เน็ต<br>
                สำนักงานสาธารณสุขจังหวัดขอนแก่น
            </div>
            <p style="font-family: 'Sarabun', sans-serif;font-size: 18px;text-decoration: underline;">
                รายละเอียดของผู้สมัคร
            </p>
            <p style="font-family: 'Sarabun', sans-serif;font-size: 18px;">
                ชื่อ-นามสกุล (ไทย): <?php echo $txt_name ?> <br>
                FirstName-LastName (English): <?php echo $txt_name_eng ?> <br>
                หมายเลขบัตรประจำตัวประชาชน: <?php echo $txt_numcard ?> <br>
                ตำแหน่ง: <?php echo $txt_role ?> <br>
                สถานที่ปฏิบัตรงาน: <?php echo $txt_workplace ?> <br>
                โทรศัพท์: <?php echo $txt_phone ?> <br>
                E-mail: <?php echo $txt_email ?> <br>
            </p>
            <p style="font-family: 'Sarabun', sans-serif;font-size: 18px;text-decoration: underline;">
                รายละเอียดของการใช้งาน
            </p>
            <p style="font-family: 'Sarabun', sans-serif;font-size: 18px;">
                ชื่อบัญชี (Account Name): <?php echo $txt_account ?> <br>
                รหัสผ่าน (Password): <?php echo $txt_password ?> <br>
            </p>
            <p align="right" style="font-family: 'Sarabun', sans-serif;font-size: 18px;">
                ลงชื่อ.................................................................<br>
                 ( <?php echo $txt_name ?> )<br>
                วันที่............../...................................../.............<br>
            </p>
            <hr>
            
            


        </div>
    </div>


</body>
<br><br>
<div class="container d-flex justify-content-center">
    <a href="form.pdf" class="btn btn-danger ml-auto" target="_blank">Download</a>
</div>

<?php
// header("refresh:0; form.pdf");

?>

</html>
<?php

$html = ob_get_contents();

$mpdf->WriteHTML($html);
$mpdf->Output('form.pdf');

ob_end_flush();

?>