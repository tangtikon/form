<?php include 'header.php' ?>
<link rel="stylesheet" href="css_index.css">
<title>แบบฟอร์มลงทะเบียนใช้บริการอินเตอร์เน็ต</title>

<body>
    <br> <br>
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-md-9">
                <div class="card p-3 py-5">
                    <div class="header text-center">
                        แบบฟอร์มลงทะเบียนใช้บริการอินเตอร์เน็ต<br>
                        สำนักงานสาธารณสุขจังหวัดขอนแก่น
                    </div>
                    <form action="print.php" method="post" enctype="multipart/form-data" name="form_reg">

                        <div class="row g-3 align-items-center">
                            <div class="col-4 text-end">
                                <label for="txt_name" class="col-form-label">
                                    <div class="text1">ชื่อ-นามสกุล(ไทย)</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" id="txt_name" name="txt_name" placeholder="ชื่อ-นามสกุล(ไทย)">
                            </div>

                            <div class="col-4 text-end">
                                <label for="txt_name_eng" class="col-form-label">
                                    <div class="text1">FirstName-LastName(English)</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" id="txt_name_eng" name="txt_name_eng" placeholder="FirstName-LastName(English)">
                            </div>

                            <div class="col-4 text-end">
                                <label for="txt_numcard" class="col-form-label">
                                    <div class="text1">หมายเลขบัตรประจำตัวประชาชน</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" id="txt_numcard" name="txt_numcard" maxlength="13" placeholder="หมายเลขบัตรประจำตัวประชาชน">
                            </div>

                            <div class="col-4 text-end">
                                <label for="txt_role" class="col-form-label">
                                    <div class="text1">ตำแหน่ง</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" id="txt_role" name="txt_role" placeholder="ตำแหน่ง">
                            </div>

                            <div class="col-4 text-end">
                                <label for="txt_workplace" class="col-form-label">
                                    <div class="text1">สถานที่ปฏิบัตรงาน</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" id="txt_workplace" name="txt_workplace" placeholder="สถานที่ปฏิบัตรงาน">
                            </div>

                            <div class="col-4 text-end">
                                <label for="txt_phone" class="col-form-label">
                                    <div class="text1">โทรศัพท์</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" id="txt_phone" name="txt_phone" maxlength="10" placeholder="โทรศัพท์">
                            </div>

                            <div class="col-4 text-end">
                                <label for="txt_email" class="col-form-label">
                                    <div class="text1">E-mail</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="email" class="form-control" id="txt_email" name="txt_email" aria-describedby="emailHelp" placeholder="E-mail">
                            </div>

                            <div class="col-4 text-end">
                                <label for="txt_account" class="col-form-label">
                                    <div class="text1">ชื่อบัญชี(Account Name)</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="text" class="form-control" id="txt_account" maxlength="16" name="txt_account" placeholder="ชื่อบัญชี(Account Name)">
                                <div id="txt_account" class="form-text">ความยาว 8-16 ตัวอักษร</div>
                            </div>

                            <div class="col-4 text-end">
                                <label for="txt_password" class="col-form-label">
                                    <div class="text1">รหัสผ่าน(Password)</div>
                                </label>
                            </div>
                            <div class="col-7">
                                <input type="password" class="form-control" id="txt_password" maxlength="16" name="txt_password" placeholder="รหัสผ่าน(Password)">
                                <div id="txt_password" class="form-text">ความยาว 8-16 ตัวอักษร</div>
                            </div>

                            <div class="text-center">
                                <br>
                                <button type="submit" class="btn btn-success button" name="save">บันทึกข้อมูล</button>
                                <button type="submit" class="btn btn-danger button" name="print">พิมพ์</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br> <br>
</body>

</html>