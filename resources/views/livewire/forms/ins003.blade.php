<div class="container-fluid py-4">
        <div class="card">
            <div>
                <center>
                    <h4>แบบอนุญาตให้นิสิตไปปฏิบัติงานสหกิจศึกษา IN-S003</h4>
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
                            <input type="text" class="form-control" placeholder="ชื่อนิสิต" aria-label="First name" wire:model='si_firstname_th'>
                        </div>
                        <div class="col">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" aria-label="First name" wire:model='si_lastname_th'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">รหัสนิสิต</label>
                            <input type="text" class="form-control" aria-label="First name" wire:model='si_st_num' wire:model='si_st_num'>
                        </div>
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
                            <label class="form-label">หลักสูตร</label>
                            <select class="form-select" aria-label="Default select example" wire:model='si_md_course_id'>
                                <option selected>วทบ.</option>
                                <option value="2">วศบ.</option>
                            </select>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" placeholder="ชื่อผู้ปกครอง" aria-label="First name" wire:model='fi_fname_parent'>
                        </div>
                        <div class="col">
                            <label class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" aria-label="First name" wire:model='fi_lname_parent'>
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
                            <input type="text" class="form-control" aria-label="First name" wire:model='fi_house_num_parent'>
                        </div>
                        <div class="col">
                            <label class="form-label">ถนน</label>
                            <input type="text" class="form-control" aria-label="First name" wire:model='fi_road'>
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
                            <input type="text" class="form-control" aria-label="First name" wire:model='fi_phone'>
                        </div>
                        <div class="col">
                            <label class="form-label">โทรสาร</label>
                            <input type="text" class="form-control" aria-label="First name" wire:model='fi_tone2'>
                        </div>
                        <div class="col">
                            <label class="form-label"> E-mail</label>
                            <input type="text" class="form-control" aria-label="First name" wire:model='fi_email_parent'>
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
                <button type="submit" class="btn btn-success btn btn-lg btn-primary" wire:click="save">บันทึก</button>
            </div>
        </div>
    </div>