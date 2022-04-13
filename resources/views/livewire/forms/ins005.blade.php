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
            <center>
                <h4>แบบแจ้งแผนปฏิบัติงานสหกิจศึกษา IN-S005</h4>
            </center>
            <div class="modal-footer"></div>
            <div class="card-body pt-4 p-3">
                <div class="container">
                    <h5>(ผู้ให้ขอมู้ล: นิสิตร่วมกับพนักงานที่ปรึกษา)</h5>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อ (TH)" aria-label="First name" wire:model='si_firstname_th'>
                        </div>
                        <div class="col">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" aria-label="First name" wire:model='si_lastname_th'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">รหัสประจําตัว</label>
                            <input type="text" class="form-control" aria-label="First name" wire:model='si_st_num'>
                        </div>
                        <div class="col">
                            <label class="form-label">สาขาวิชา</label>
                            <select class="form-select" aria-label="Default select example" >
                                <option selected>วิทยาการคอมพิวเตอร์</option>
                                <option value="2">เทคโนโลยีสารสนเทศเพื่ออุตสาหกรรมดิจิทัล</option>
                                <option value="3">วิศวกรรมซอฟต์แวร์</option>
                                <option value="4">ปัญญาประดิษฐ์ประยุกต์และเทคโนโลยีอัจฉริยะ</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">คณะ</label>
                            <select class="form-select" aria-label="Default select example" wire:model='si_md_field_id'>
                                <option selected>วิทยาการสารสนเทศ</option>
                                <option value="2">วิศวกรรมศาสตร์</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                            <label class="form-label">ปฏิบัติงานสหกิจศึกษา ณ สถานประกอบการ </label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>