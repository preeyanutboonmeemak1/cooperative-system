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
                    <h4>ใบสมัครงานสหกิจศึกษา/ฝึกงาน</h4>
                </center>
            </div>
            <div class="modal-footer"></div>
            <div class="card-body pt-4 p-3">
                <div class="container">
                    <center>
                        <h5>ข้อมูลส่วนตัวนิสิต (APPLICANT 'S INFORMATION)</h5>
                    </center>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" placeholder="ชื่อ (TH) aria-label=" First name">
                    </div>
                    <div class="col">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" placeholder="นามสกุล (TH) aria-label=" First name">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">รหัสนิสิต</label>
                        <input type="text" class="form-control" placeholder="รหัสนิสิต" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">โทร</label>
                        <input type="text" class="form-control" placeholder="xxx-xxx-xxxx" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">มือถือ</label>
                        <input type="text" class="form-control" placeholder="xxx-xxx-xxxx" aria-label="First name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label class="form-label">อีเมล์</label>
                        <input type="text" class="form-control" placeholder="mail@email.com" aria-label="First name">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">สาขาวิชา</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                วิทยาการคอมพิวเตอร
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                เทคโนโลยีสารสนเทศ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                วิศวกรรมซอฟต์แวร
                            </label>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer"></div>
            <div class="card-body pt-4 p-3">
                <div class="container">
                    <center>
                        <h5>ชื่อสถานประกอบการที่ต้องการสมัคร</h5>
                    </center>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">สถานประกอบการที่ต้องการสมัคร</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>สถานประกอบการ</option>
                                <option value="2">CSI</option>
                                <option value="3">Clicknext</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <label class="form-label">สมัครงานในตําแหน่ง</label>
                        <select class="form-select" aria-label="Default select example">
                                <option selected>Developer</option>
                                <option value="2">Quality Assurance</option>
                                <option value="3">Tester</option>
                            </select>
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