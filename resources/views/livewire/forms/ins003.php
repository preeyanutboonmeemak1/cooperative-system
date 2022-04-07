<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-fluid py-4">
        <div class="card">
            <div>
                <center>
                    <h4>แบบอนุญาตให้นิสิตไปปฏิบัติงานสหกิจศึกษา</h4>
                </center>
                <center>
                    <h4>ผู้ให้ข้อมูล : ผู้ปกครองนิสิต </h4>
                </center>
            </div>
            <div class="modal-footer"></div>
            <div class="card-body pt-4 p-3">
                <div class="container">
                    <div>
                        <h5>เรียน รองคณบดีฝ่ายประกันคุณภาพและสหกิจศึกษา คณะวิทยาการสารสนเทศ มหาวิทยาลัยบูรพา</h5>
                    </div>
                    <br>
                    <h5>1. ข้อมูลทั่วไป</h5>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อนิสิต" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">รหัสนิสิต</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">สาขาวิชา</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">หลักสูตร</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อผู้ปกครอง" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">ความสัมพันธ์กับนิสิต</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                    </div>
                    <br>
                    <br>
                    <h6>สถานที่ติดต่อสะดวก</h6>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">บ้านเลขที่</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">ถนน</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">ตำบล</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">อำเภอ</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">จังหวัด</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">โทรศัพท</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">โทรสาร</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label"> E-mail</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
            <div class="card-body pt-4 p-3">
                <div class="container">
                    <div>
                        <h5>2. การตอบรับอนุญาตให้นิสิตไปปฏิบัติงานสหกิจศึกษา</h5>
                    </div>
                    <div class="col">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                อนุญาตให้นิสิตในปกครองไปปฏิบัติงานสหกิจศึกษาตามที่มหาวิทยาลัยกำหนด
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                ไม่อนุญาตให้นิสิตในปกครองไปปฏิบัติงานสหกิจศึกษา
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
                <button type="button" class="btn btn-success btn btn-lg btn-primary">บันทึก</button>
            </div>
        </div>
    </div>
</body>

</html>