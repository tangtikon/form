<?php

$in_numcard = $_POST['in_numcard'];
$time = $_POST['time'];
$mon = $_POST['mon'];
$year = $_POST['year'];

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

<title>รายงานตรวจสอบรายการขอเบิกจ่ายรายบุคคล</title>
<?php include('style_print.php'); ?>
</head>

<body>

    <div class="container d-flex justify-content-center">
        <div class="col col-lg-12">
            <div class="text1">
                <img src="img/logo.jpg" width="150" height="150"><br>
                รายงานตรวจสอบรายการขอเบิกจ่ายรายบุคคล<br>
                ส่วนราชการ 21002-สำนักงานปลัดกระทรวงสาธารณสุข จังหวัด ขอนแก่น 4000<br>
                ส่วนราชการผู้เบิก 2100200133-สำนักงานสาธารณสุขจังหวัดขอนแก่น<br>
                ประจำเดือน/ปี <?php echo $mon, "/", $year; ?> รอบการจ่าย รอบที่ <?php echo $time; ?> <br>
            </div>
            <br>
            <?php
            $rs = $conn->query("SELECT * FROM income where mon_year = '$year-$mon-01' and in_numcard = '$in_numcard'");
            while ($row = $rs->fetch_array()) {

                $in_name_surname = $row['in_name_surname'];
                $in_nomal = $row['in_nomal'];
                $in_m46 = $row['in_m46'];
                $in_spc = $row['in_spc'];
                $in_btc = $row['in_btc'];
                $in_ckb = $row['in_ckb'];
                $in_crb = $row['in_crb'];
                $in_tokbek = $row['in_tokbek'];
                $tax = $row['tax'];
                $bek = $row['bek'];
                $bomnage = $row['bomnage'];
                $sum_all = $row['sum_all'];
            }
            $rs1 = $conn->query("SELECT * FROM disburse where d_mon_year = '$year-$mon-01' and d_numcard = '$in_numcard'");
            if ($rs1->num_rows > 0) {
                while ($row = $rs1->fetch_array()) {

                    $d_sum = $row['d_sum'];
                    $d_bill1 = $row['d_bill1'];
                    $d_bill2 = $row['d_bill2'];
                }
            }
            if ($rs1->num_rows < 1) {
                $d_sum = 0;
                $d_bill1 = 0;
                $d_bill2 = 0;
            }
            $sum_in = $in_nomal + $in_m46 + $in_spc + $in_btc + $in_ckb + $in_crb +  $in_tokbek;
            $sum_out =  $tax + $bek + $bomnage  + $d_bill1 + $d_bill2;
            $sum = $sum_in - $sum_out;
            ?>
            <div class="text2">
                <?php echo $in_name_surname; ?> <br>
                เลขบัตรประชาชน <?php echo $in_numcard; ?> <br>
            </div>


            <div class="table-responsive">
                <table class="table table-bordered" style="width:100%">

                    <tr>

                        <th colspan="2" class='tablecenter'>
                            <hr>
                            รายรับ
                            <hr>
                        </th>
                        <th style="width:2%"></th>
                        <th colspan="2" class='tablecenter'>
                            <hr>
                            รายจ่าย
                            <hr>
                        </th>
                    </tr>


                    <tr>
                        <td class='tableleft'>
                            เงินที่อนุมัติ(เงินปกติ+เงินเพิ่ม) <br>
                            เงินเพิ่มตาม ม.46<br>
                            สปช. 25%<br>
                            บ.ท.ช.<br>
                            ช.ค.บ.<br>
                            ช.ร.บ.<br>
                            ตกเบิก<br>
                        </td>
                        <td class='tableright'>
                            <?php echo number_format($in_nomal,2); ?><br>
                            <?php echo number_format($in_m46,2); ?><br>
                            <?php echo number_format($in_spc,2); ?><br>
                            <?php echo number_format($in_btc,2); ?><br>
                            <?php echo number_format($in_ckb,2); ?><br>
                            <?php echo number_format($in_crb,2); ?><br>
                            <?php echo number_format($in_tokbek,2); ?>
                        </td>
                        <td></td>
                        <td class='tableleft'>
                            ภาษี<br>
                            เบิกหักผลักส่ง<br>
                            หนี้บำเหน็จค้ำประกัน<br>
                            หนี้สหกรณ์<br>
                            ฌกส.<br>
                        </td>
                        <td class='tableright'>
                            <?php echo number_format($tax,2); ?><br>
                            <?php echo number_format($bek,2); ?><br>
                            <?php echo number_format($bomnage,2); ?><br>
                            <?php echo number_format($d_bill1,2); ?><br>
                            <?php echo number_format($d_bill2,2); ?><br>


                        </td>

                    </tr>
                    <tr>
                        <td class='tablecenter' colspan="2">
                            <hr>
                            รวมรายรับทั้งหมด <?php echo number_format($sum_in,2); ?> บาท(สตางค์)
                            <hr>

                        </td>

                        <td></td>

                        <td class='tablecenter' colspan="2">
                            <hr>
                            รวมรายจ่ายทั้งหมด <?php echo number_format($sum_out,2); ?> บาท(สตางค์)
                            <hr>
                        </td>
                    </tr>
                    <tr>
                        <td class='tableleft' colspan="2">
                            รายรับสุทธิ <?php echo number_format($sum,2); ?> บาท(สตางค์)
                        </td>
                    </tr>

                    <tr>
                        <td class='tablecenter' colspan="2"></td>
                        <td></td>
                        <td class='tablecenter' colspan="2">
                            <img src="img/sig.jpg" width="157" height="39"><br>
                            (นายเชิดชัย อริยารินุชิตกุล)<br>
                            เภสัชกรเชี่ยวชาญ<br>
                            ปฏิบัติราชการแทนนายแพทย์สาธารณสุข<br>
                            จังหวัดขอนแก่น
                        </td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
</body>
<br><br>
<div class="container d-flex justify-content-center">
    <a href="bill.pdf" class="btn btn-danger ml-auto" target="_blank">Download</a>
</div>

<?php
header("refresh:0; bill.pdf");

?>

</html>
<?php

$html = ob_get_contents();
$mpdf->SetWatermarkImage('img/bg1.jpg');
$mpdf->showWatermarkImage = true;

$mpdf->WriteHTML($html);
$mpdf->Output('bill.pdf');

ob_end_flush();

?>