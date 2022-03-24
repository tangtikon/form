<!DOCTYPE html>
<html>
<title>แก้ไขข้อมูลสำเร็จ</title>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');

    div.txt1 {

        font-family: 'Sarabun', sans-serif;
        color: #212F3D;
        font-size: 24px;
        font-weight: bold;

    }

    div.txt2 {

        font-family: 'Sarabun', sans-serif;
        color: #212F3D;
        font-size: 18px;
        font-weight: normal;

    }

    .modal {
        position: absolute;
        float: left;
        left: 50%;
        top: 40%;
        transform: translate(-50%, -50%);
        width: 800px;
        height: 600px;
    }
</style>

<body>
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <div class="txt1 text-center">
                        บันทึกข้อมูลสำเร็จ<br>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="txt2">
                        ชื่อ-นามสกุล (ไทย): <?php echo $txt_name ?> <br>
                        FirstName-LastName (English): <?php echo $txt_name_eng ?> <br>
                        หมายเลขบัตรประจำตัวประชาชน: <?php echo $txt_numcard ?> <br>
                        ตำแหน่ง: <?php echo $txt_role ?> <br>
                        สถานที่ปฏิบัตรงาน: <?php echo $txt_workplace ?> <br>
                        โทรศัพท์: <?php echo $txt_phone ?> <br>
                        E-mail: <?php echo $txt_email ?> <br>
                        <hr>
                        ชื่อบัญชี (Account Name): <?php echo $txt_account ?> <br>
                        รหัสผ่าน (Password): <?php echo $txt_password ?> <br>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="text-center">
                        <form action="print.php" method="post" enctype="multipart/form-data" name="form_reg">
                            <input type="hidden" class="form-control" id="txt_name" name="txt_name" value="<?php echo $txt_name ?>">
                            <input type="hidden" class="form-control" id="txt_name_eng" name="txt_name_eng" value="<?php echo $txt_name_eng ?>">
                            <input type="hidden" class="form-control" id="txt_numcard" name="txt_numcard" value="<?php echo $txt_numcard ?>">
                            <input type="hidden" class="form-control" id="txt_role" name="txt_role" value="<?php echo $txt_role ?>">
                            <input type="hidden" class="form-control" id="txt_workplace" name="txt_workplace" value="<?php echo $txt_workplace ?>">
                            <input type="hidden" class="form-control" id="txt_phone" name="txt_phone" value="<?php echo $txt_phone ?>">
                            <input type="hidden" class="form-control" id="txt_email" name="txt_email" value="<?php echo $txt_email  ?>">
                            <input type="hidden" class="form-control" id="txt_account" name="txt_account" value="<?php echo $txt_account ?>">
                            <input type="hidden" class="form-control" id="txt_password" name="txt_password" value="<?php echo $txt_password ?>">


                            <button type="button" class="btn btn-danger btn-lg " onclick="location.href='index.php';" data-dismiss="modal">ออก</button>

                            <button type="submit" class="btn btn-success button btn-lg" name="print">พิมพ์</button>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
    </script>
</body>

</html>