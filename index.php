<?php include 'header.php' ?>
<style>
    <?php include 'css_index.css'; ?>
</style>

<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card p-4 py-5">
                <h3 class="text-center">
                    แบบฟอร์มลงทะเบียนใช้บริการอินเตอร์เน็ต<br>
                    สำนักงานสาธารณสุขจังหวัดขอนแก่น
                </h3>
                <form>
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="txt_email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="txt_email" aria-describedby="emailHelp" placeholder="E-mail">

                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="txt_password" class="form-label">รหัสผ่าน(Password)</label>
                        <input type="password" class="form-control" id="txt_password" placeholder="รหัสผ่าน(Password)">
                        <div id="emailHelp" class="form-text">ความยาว 8-16 ตัวอักษร</div>

                    </div>

                    <div class="mt-4"> <button type="submit" class="btn btn-success button btn-block">บันทึกการลงทะเบียน</button> </div>

                </form>

            </div>
        </div>
    </div>
</div>