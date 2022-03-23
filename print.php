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

if (isset($_POST['print'])) {
?>

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


    ?>
    <link rel="stylesheet" href="css_print.css">

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
                <div class="table-responsive">
                    <table class="table" style="width:100%">
                        <tr>
                            <th colspan="2" class="tablehead">
                                รายละเอียดของผู้สมัคร
                            </th>

                        </tr>
                        <tr>
                            <td class="tableleft" colspan="2">
                                <p style="font-family: 'Sarabun', sans-serif;font-size: 18px;">
                                    ชื่อ-นามสกุล (ไทย): <?php echo $txt_name ?> <br>
                                    FirstName-LastName (English): <?php echo $txt_name_eng ?> <br>
                                    หมายเลขบัตรประจำตัวประชาชน: <?php echo $txt_numcard ?> <br>
                                    ตำแหน่ง: <?php echo $txt_role ?> <br>
                                    สถานที่ปฏิบัตรงาน: <?php echo $txt_workplace ?> <br>
                                    โทรศัพท์: <?php echo $txt_phone ?> <br>
                                    E-mail: <?php echo $txt_email ?> <br>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="tablehead">
                                รายละเอียดของการใช้งาน
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" class="tableleft">
                                ชื่อบัญชี (Account Name): <?php echo $txt_account ?> <br>
                                รหัสผ่าน (Password): <?php echo $txt_password ?> <br>
                            </td>
                        </tr>

                        <tr>
                            <td>
                            </td>
                            <td class="tablecenter">
                                ลงชื่อ.................................................................<br>
                                ( <?php echo $txt_name ?> )<br>
                                วันที่............../...................................../.............<br>

                            </td>

                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                        <tr>
                            <th style="width:50%" class="tablecenter">
                                การพิจารณาของเจ้าหน้าที่ศูนย์คอมพิวเตอร์ <br>
                            </th>
                            <th style="width:50%" class="tablecenter">
                                การพิจารณาของผู้บังคับบัญชา
                            </th>
                        </tr>
                        <tr>
                            <td style="width:50%" class="tablecenter">
                                <img src="img/checkbox.jpg" width="25" height="25"> เห็นควรอนุมัติ

                            </td>
                            <td style="width:50%" class="tablecenter">
                                <img src="img/checkbox.jpg" width="25" height="25"> เห็นควรอนุมัติ
                            </td>
                        </tr>
                        <tr>
                            <td style="width:50%" class="tablecenter">
                                <img src="img/checkbox.jpg" width="25" height="25"> ไม่เห็นควรอนุมัติ

                            </td>
                            <td style="width:50%" class="tablecenter">
                                <img src="img/checkbox.jpg" width="25" height="25"> ไม่เห็นควรอนุมัติ
                            </td>
                        </tr>
                        <tr>
                            <td style="width:50%" class="tablecenter">
                                ลงชื่อ.................................................................<br>
                                (....................................................................)<br>
                                วันที่............../...................................../.............<br><br>

                            </td>
                            <td style="width:50%" class="tablecenter">
                                ลงชื่อ.................................................................<br>
                                (....................................................................)<br>
                                วันที่............../...................................../.............<br><br>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <br><br><br><br><br><br><br><br>
        <footer>
            <div class="text-center">
                งานเทคโนโลยีสารสนเทศ สำนักงานสาธารณสุขจังหวัดขอนแก่น โทร 043227828 E-mail: ict@kkpho.go.th
            </div>
        </footer>
    </body>
    <br><br>
    <div class="container d-flex justify-content-center">
        <a href="form.pdf" class="btn btn-danger ml-auto" target="_blank">Download</a>
    </div>

    <?php
    header("refresh:0; form.pdf");

    ?>

    </html>
<?php

    $html = ob_get_contents();

    $mpdf->WriteHTML($html);
    $mpdf->Output('form.pdf');

    ob_end_flush();
}


if (isset($_POST['save'])) {
    include('connect.php');

    $query = $conn->query("INSERT INTO form (name, surname, numcard,role, workplace, phone, email, username, password)
                            VALUES('$txt_name', '$txt_name_eng', '$txt_numcard', '$txt_role', '$txt_workplace', '$txt_phone', 
                            '$txt_email', '$txt_account', '$txt_password')");

    if ($query) {
        echo "บันทึกสำเร็จ";
    } else {
        die(mysqli_error($conn));
    }
}
?>