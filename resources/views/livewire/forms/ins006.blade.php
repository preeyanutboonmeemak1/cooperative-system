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
                <h4>แบบแจ้งโครงร่างรายงานการปฏิบัติงาน (Work Term Report) IN-S006</h4>
            </center>
            <div class="modal-footer"></div>
            <div class="card-body pt-4 p-3">
                <div class="container">
                    <h5>คําชี้แจง</h5>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; รายงานถือเป็นส่วนหนึ่งของการปฏิบัติงานสหกิจศึกษา
                        มีวัตถุประสงค์เพื่อฝึกฝนทักษะการสื่อสาร
                        (Communication Skill) ของนิสิต และจัดทําข้อมูลที่เป็นประโยชน์สําหรับสถานประกอบการ
                        นิสิตจะต้องขอรับ
                        คําปรึกษาจากพนักงานที่ปรึกษา (Job Supervisor) เพื่อกําหนดหัวข้อรายงานที่เหมาะสม
                        โดยคํานึงถึงความต้องการ
                        ของสถานประกอบการเป็นหลัก ตัวอย่างของรายงานได้แก่ผลงานวิจัยที่นิสิตปฏิบัติรายงานวิชาการที่น่าสนใจ
                        การ
                        สรุปข้อมูลหรือสถิติบางประการ การวิเคราะห์และประเมินผลข้อมูล เป็นต้น
                        ทั้งนี้รายงานอาจจะจัดทําเป็นกลุ่มของ
                        นิสิตสหกิจศึกษามากกว่า 1 คนก็ได</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; ในกรณีที่สถานประกอบการไม่ต้องการรายงานในหัวข้อข้างต้น
                        นิสิตจะต้องพิจารณาเรื่องที่ตนสนใจและหยิบ
                        ยกมาทํารายงาน โดยปรึกษากับพนักงานที่ปรึกษาเสียก่อน ตัวอย่างหัวข้อที่จะใช้เขียนรายงาน ได้แก่
                        รายงานวิชาการ
                        ที่นิสิตสนใจ รายงานการปฏิบัติงานที่ได้รับมอบหมาย
                        หรือแผนและวิธีการปฏิบัติงานที่จะทําให้บรรลุถึงวัตถุประสงค์
                        ของการเรียนรู้ที่นิสิตวางเป้าหมายไว้จากการปฏิบัติงานสหกิจศึกษาครั้งนี้ (Learning Objectives)
                        เมื่อกําหนดหัวข้อ
                        ได้แล้ว ให้นิสิตจัดทําโครงร่างของเนื้อหารายงานพอสังเขป ตามแบบฟอร์มนี้ทั้งนี้ให้ปรึกษากับ Job
                        Supervisor
                        เสียก่อนแล้วจึงส่งกลับมายังสหกิจศึกษา ภายในระยะเวลาที่กําหนด</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; คณะวิทยาการสารสนเทศ
                        จะรวบรวมนําเสนออาจารย์ที่ปรึกษาสหกิจศึกษาเพื่อพิจารณา หากอาจารย์มี
                        ข้อเสนอแนะจะส่งกลับให้นิสิตทราบ และเพื่อมิให้เป็นการเสียเวลา
                        นิสิตควรดําเนินการเขียนรายงานโดยทันที
                    </p>
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
                    </div>
                    <div class="row">
                        <div class="col">
                            <label class="form-label">ปฏิบัติงานสหกจศึกษา ณ สถานประกอบการ</label>
                            <input type="text" class="form-control" aria-label="First name">
                        </div>
                    </div>
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
                    <br>
                    <p>ขอแจ้งรายละเอียดเกี่ยวกับโครงร่างรายงานการปฏิบัติงานสหกิจศึกษา ดังนี้</p>
                    <div class="card-body pt-4 p-3">
                        <div class="container">
                            <h6>1. หัวข้อรายงาน (อาจจะขอเปลี่ยนแปลงหรือแก้ไขเพิ่มเติมได้ในภายหลัง) </h6>
                            
                                <div class="col">
                                    <label class="form-label">ชื่อภาษาไทย</label>
                                    <input type="text" class="form-control"  aria-label="First name">
                                </div>
                                <div class="col">
                                    <label class="form-label">ชื่อภาษาอังกฤษ</label>
                                    <input type="text" class="form-control" aria-label="First name" >
                                </div>
                            
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <div class="container">
                            <h6>2. รายละเอียดเนื้อหาของรายงาน (อาจจะขอเปลี่ยนแปลงหรือแก้ไขเพิ่มเติมได้ในภายหลัง)  </h6>
                            <div class="row">
                                <div class="col">
                                    <textarea type="text" class="form-control"  aria-label="First name">
                                    </textarea>
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
        </div>
    </div>
</body>

</html>