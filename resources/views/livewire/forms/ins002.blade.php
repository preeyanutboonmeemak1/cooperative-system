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
                    <h4>ใบสมัครงานสหกิจศึกษา/ฝึกงาน IN-S002</h4>
                </center>
            </div>
            <div class="modal-footer"></div>
            <div class="card-body pt-4 p-3">
                <div class="container">
                    <center>
                        <h5>ข้อมูลส่วนตัวนิสิต (APPLICANT 'S INFORMATION)</h5>
                    </center>
                </div>
                <h5>1. ชื่อ - นามสกุล</h5>
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="row">

                            <div class="col">
                                <input type="text" class="form-control" placeholder="ชื่อ (TH)"
                                    {{-- value="{{ !is_null($student->si_firstname_th) ? $student->si_firstname_th : '' }}" --}}
                                    aria-label="First name" wire:model='si_firstname_th'>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="นามสกุล (TH)"
                                    {{-- value="{{ !is_null($student->si_lastname_th) ? $student->si_lastname_th : '' }}" --}}
                                    aria-label="Last name" wire:model='si_lastname_th'>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="ชื่อ (EN)"
                            aria-label="First name"
                            {{-- value="{{ !is_null($student->si_firstname_en) ? $student->si_firstname_en : '' }}" --}}
                            wire:model='si_firstname_en'>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="นามสกุล (EN)"
                            {{-- value="{{ !is_null($student->si_lastname_en) ? $student->si_lastname_en : '' }}" --}}
                            aria-label="Last name" wire:model='si_lastname_en'>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">สาขาวิชา</label>
                        <select class="form-select" aria-label="Default select example" wire:model='si_md_field_id'>
                            <option selected>วิทยาการคอมพิวเตอร์</option>
                            <option value="2">เทคโนโลยีสารสนเทศเพื่ออุตสาหกรรมดิจิทัล</option>
                            <option value="2">วิศวกรรมซอฟต์แวร์</option>
                            <option value="2">ปัญญาประดิษฐ์ประยุกต์และเทคโนโลยีอัจฉริยะ</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">รหัสนิสิต</label>
                        <input type="text" class="form-control" placeholder="รหัสนิสิต"
                            aria-label="First name"
                            {{-- value="{{ !is_null($student->si_st_num) ? $student->si_st_num : '' }}" --}}
                            wire:model='si_st_num'>
                    </div>
                    <div class="col">
                        <label class="form-label">ชั้นปี</label>
                        <select class="form-select" aria-label="Default select example" >
                            <option selected value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="3">4</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">เกรดเฉลี่ยภาคการศึกษาที่ผ่านมา</label>
                        <input type="text" class="form-control" placeholder="0.00" aria-label="First name"
                            {{-- value="{{ !is_null($student->si_last_gpa) ? $student->si_last_gpa : '' }}" --}}
                            wire:model='si_gpa'>
                    </div>
                    <div class="col">
                        <label class="form-label">เกรดเฉลี่ยสะสม</label>
                        <input type="text" class="form-control" placeholder="0.00" aria-label="First name"
                            {{-- value="{{ !is_null($student->si_last_gpa) ? $student->si_last_gpa : '' }}" --}}
                            wire:model='si_last_gpa'>
                    </div>
                    <div class="col">
                        <label class="form-label">สถานที่เกิด</label>
                        <input type="text" class="form-control" placeholder="รหัสนิสิต"
                            aria-label="First name">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">วันเดือนปีเกิด</label>
                        <input wire:model="StudentDOB" class="form-control" type="date" placeholder="">
                    </div>
                    <div class="col">
                        <label class="form-label">อายุ</label>
                        <input type="text" class="form-control" aria-label="First name"
                            {{-- value="{{ !is_null($student->si_last_gpa) ? $student->si_last_gpa : '' }}" --}}
                            wire:model='si_last_gpa'>
                    </div>
                    <div class="col">
                        <label class="form-label">เพศ</label>
                        <select class="form-select" aria-label="Default select example" wire:model='si_md_field_id'>
                            <option selected>หญิง</option>
                            <option value="2">ชาย</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">บัตรประจําตัวประชาชนเลขที่</label>
                        <input type="text" class="form-control" placeholder="xxx-xxxxx-xx-x"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">สัญชาต</label>
                        <select class="form-select" aria-label="Default select example" wire:model='si_md_field_id'>
                            <option selected>ไทย</option>
                            <option value="2">จีน</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">ศาสนา</label>
                        <input type="text" class="form-control" placeholder="ศาสนา"
                            aria-label="First name">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">ส่วนสูง</label>
                        <input type="text" class="form-control" placeholder="0.00"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">น้ำหนัก</label>
                        <input type="text" class="form-control" placeholder="0.00"
                            aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">ที่อยู่ที่ติดต่อได้</label>
                        <input type="text" class="form-control" placeholder=""
                            aria-label="First name">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">โทรสาร</label>
                        <select class="form-select" aria-label="Default select example" wire:model='si_md_field_id'>
                            <option selected>ไทย</option>
                            <option value="2">จีน</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">มือถือ</label>
                        <input type="text" class="form-control" placeholder="xxx-xxx-xxxx" aria-label="First name" wire:model='si_phone_num'>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">E-mail</label>
                        <input type="text" class="form-control" placeholder="mail@email.com" aria-label="First name" wire:model='si_email'>
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
