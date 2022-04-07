@php
//print_r($student);
@endphp
<div class="container-fluid py-4">
    <div class="card">
        <div>
            <center>
                <h4>ใบสมัครเป็นนิสิตสหกิจศึกษา</h4>
            </center>
        </div>
        <div class="modal-footer"></div>
        <div class="card-body pt-4 p-3">
            <div class="container">
                {{-- <h1>{{$text}}</h1>
<input type="text" name="" id="" wire:model="text"> --}}
                <form wire:submit.prevent="submit" >
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
                    <div class="col-md-12">
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
                    </div>
                    <div class="col-md-12">
                        <div class="row">

                            <div class="col">
                                <label class="form-label">รหัสนิสิต</label>
                                <input type="text" class="form-control" placeholder="รหัสนิสิต"
                                    aria-label="First name"
                                    {{-- value="{{ !is_null($student->si_st_num) ? $student->si_st_num : '' }}" --}}
                                    wire:model='si_st_num'>
                            </div>
                            <div class="col">
                                <label class="form-label">ชั้นปี</label>
                                <select class="form-select" aria-label="Default select example" wire:model='si_md_year_of_study_id'>
                                    <option selected value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3">4</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">หลักสูตร</label>
                                <select class="form-select" aria-label="Default select example" wire:model='si_md_course_id'>
                                    <option selected>วทบ.</option>
                                    <option value="2">วศบ.</option>
                                </select>
                            </div>
                            <div class="col">
                                <label class="form-label">สาขาวิชา</label>
                                <select class="form-select" aria-label="Default select example" wire:model='si_md_field_id'>
                                    <option selected>วิทยาการสารสนเทศ</option>
                                    <option value="2">วิศวกรรมศาสตร์</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label class="form-label">จำนวนหน่วยกิตที่เรียนมาแล้ว</label>
                            <input type="text" class="form-control" placeholder="0.00" aria-label="First name">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">หน่วยกิต GPAX</label>
                            <input type="text" class="form-control" placeholder="0.00" aria-label="First name"
                                {{-- value="{{ !is_null($student->si_last_gpa) ? $student->si_last_gpa : '' }}" --}}
                                wire:model='si_gpa'>
                        </div>
                    </div>
            </div>

        </div>
        <div class="modal-footer"></div>
        <div class="card-body pt-4 p-3">
            <div class="container">
                <h5>2. ที่อยู่ตามทะเบียนบ้าน</h5>
                <div class="col-md-12">
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
                            <select class="form-select" aria-label="Default select example">
                                <option selected>แสนสุข</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">อำเภอ</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>เมือง</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">จังหวัด</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>ชลบุรี</option>
                            </select>
                        </div>
                        <div class="col">
                            <label class="form-label">รหัสไปรษณีย์</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>22130</option>
                                <option value="2">22131</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">โทรศัพท</label>
                            <input type="text" class="form-control" placeholder="xxx-xxx-xxxx"
                                aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label">โทรสาร</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="form-label"> E-mail</label>
                            <input type="text" class="form-control" placeholder="mail@email.com"
                                aria-label="First name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"></div>
        <div class="card-body pt-4 p-3">
            <div class="container">
                <h5>3. ที่อยู่ปัจจุบัน</h5>
                <div class="row">
                    <div class="col">
                        <label class="form-label">หอพัก</label>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">ห้อง</label>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">โทรศัพท์</label>
                        <input type="text" class="form-control" placeholder="xxx-xxx-xxxx" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">มือถือ</label>
                        <input type="text" class="form-control" placeholder="xxx-xxx-xxxx" aria-label="First name">
                    </div>
                </div>
                <div class="row">
                </div>
                <h6>อื่นๆ ระบุที่อยู่</h6>
                <div class="row">
                    <div class="col">
                        <label class="form-label">บ้านเลขทที่</label>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">ถนน</label>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">ตำบล</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>แสนสุข</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">อำเภอ</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>เมือง</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">จังหวัด</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>ชลบุรี</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">รหัสไปรษณีย์</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>22130</option>
                            <option value="2">22131</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">โทรศัพท์</label>
                        <input type="text" class="form-control" placeholder="xxx-xxx-xxxx" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">โทรสาร</label>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">E-mail</label>
                        <input type="text" class="form-control" placeholder="mail@email.com" aria-label="First name">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"></div>
        <div class="card-body pt-4 p-3">
            <div class="container">
                <h5>4. ผู้ปกครองของนิสิต (นิสิตจะต้องได้รับอนุญาตจากผู้ปกครองในการไปปฏิบัติงาน
                    โดยโครงการฯจะแจ้งให้ผู้ปกครองทราบต่อไป)</h5>
                <div class="row">
                    <div class="col">
                        <label class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" placeholder="ชื่อ (TH)" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" placeholder="นามสกุล (TH)" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">ความสัมพันธ์กับนิสิต</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>บิดา</option>
                            <option value="2">มารดา</option>
                            <option value="2">อิ่นๆ</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">ที่อยู่ บ้านเลขที่</label>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">ถนน</label>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">ตำบล</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>แสนสุข</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">อำเภอ</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>เมือง</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">จังหวัด</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>ชลบุรี</option>
                        </select>
                    </div>
                    <div class="col">
                        <label class="form-label">รหัสไปรษณีย์</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>22130</option>
                            <option value="2">22131</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="form-label">โทรศัพท</label>
                        <input type="text" class="form-control" placeholder="xxx-xxx-xxxx" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label">โทรสาร</label>
                        <input type="text" class="form-control" aria-label="First name">
                    </div>
                    <div class="col">
                        <label class="form-label"> E-mail</label>
                        <input type="text" class="form-control" placeholder="mail@email.com" aria-label="First name">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer"></div>
        <div class="card-body pt-4 p-3">
            <div class="container">
                <h5>5. ผู้ปกครองของนิสิต (นิสิตจะต้องได้รับอนุญาตจากผู้ปกครองในการไปปฏิบัติงาน
                    โดยโครงการฯจะแจ้งให้ผู้ปกครองทราบต่อไป)</h5>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">ยกเลิก</button>
            <button type="submit" class="btn btn-success btn btn-lg btn-primary">บันทึก</button>

        </div>
    </div>
    </form>
</div>
