 <main>
     <div class="container-fluid py-4">
         <div class="row">
             <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                 <div class="card">
                     <div class="card-body p-3">
                         <div class="row">
                             <div class="col-8">
                                 <div class="numbers">
                                     <p class="text-sm mb-0 text-capitalize font-weight-bold">เอกสารฟอร์ม</p>
                                     <h5 class="font-weight-bolder mb-0">
                                         {{ $uplodeforms }}
                                     </h5>
                                 </div>
                             </div>
                             <div class="col-4 text-end">
                                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                     <i class="ni ni-folder-17 text-lg opacity-10" aria-hidden="true"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                 <div class="card">
                     <div class="card-body p-3">
                         <div class="row">
                             <div class="col-9">
                                 <div class="numbers">
                                     <p class="text-sm mb-0 text-capitalize font-weight-bold">รายงานประจำสัปดาห์</p>
                                     <h5 class="font-weight-bolder mb-0">
                                         <?php echo count($weekly); ?>
                                     </h5>
                                 </div>
                             </div>
                             <div class="col-2 text-end">
                                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                     <i class="ni ni-calendar-grid-58 text-lg opacity-10" aria-hidden="true"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                 <div class="card">
                     <div class="card-body p-3">
                         <div class="row">
                             <div class="col-8">
                                 <div class="numbers">
                                     <p class="text-sm mb-0 text-capitalize font-weight-bold">เล่มสหกิจศึกษา</p>
                                     <?php if($document[0]->d_status == 1 ){ ?>
                                     <h5 class="text-success font-weight-bolder mb-0">
                                         Pass
                                     </h5>
                                     <?php }else{ ?>
                                     <h5 class="text-primary font-weight-bolder mb-0">
                                         FAIL
                                     </h5>
                                     <?php } ?>

                                 </div>
                             </div>
                             <div class="col-4 text-end">
                                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                     <i class="ni ni-books text-lg opacity-10" aria-hidden="true"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-xl-3 col-sm-6">
                 <div class="card">
                     <div class="card-body p-3">
                         <div class="row">
                             <div class="col-8">
                                 <div class="numbers">
                                     <p class="text-sm mb-0 text-capitalize font-weight-bold">ใบรับรองผล</p>
                                     <?php if($document[1]->d_status == 1 ){ ?>
                                     <h5 class="text-success font-weight-bolder mb-0">
                                         Pass
                                     </h5>
                                     <?php }else{ ?>
                                     <h5 class="text-primary font-weight-bolder mb-0">
                                         FAIL
                                     </h5>
                                     <?php } ?>
                                 </div>
                             </div>
                             <div class="col-4 text-end">
                                 <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                     <i class="ni ni-hat-3 text-lg opacity-10" aria-hidden="true"></i>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row mt-4">
             <div class="col-lg-7 mb-lg-0 mb-4">
                 <div class="card">
                     <div class="card-body p-3">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="d-flex flex-column h-100">
                                     {{-- <p class="mb-1 pt-2 text-bold">Built by developers</p> --}}
                                     <h5 class="mb-0">{{ __('ข้อมูลนิสิต') }}</h5>
                                     <?php if(!isset($students[0]['si_avatar_file'])){?>
                                     <center><img src="/assets/img/illustrations/warning-rocket.png" width="200">
                                     </center>
                                     <?php }else{?>
                                     <center><img src="{{ asset('storage/' . $students[0]['si_avatar_file']) }} "
                                             width="200"></center>
                                     <?php }?>
                                 </div>
                             </div>
                             <div class="col-lg-6 ms-auto text-left mt-5 mt-lg-0">
                                 {{-- <div class="bg-gradient-primary border-radius-lg h-100"> --}}
                                 <br>
                                 <br>

                                 <label for="studentMidleNameTH" text-alight="left"
                                     class="form-control-label">ชื่อ-นามสกุล :
                                     {{ $students[0]['md_prefixname_th'] . $students[0]['si_firstname_th'] . ' ' . $students[0]['si_lastname_th'] }}
                                 </label>


                                 <br>

                                 <label for="studentMidleNameTH" class="form-control-label">รหัสนิสิต :
                                     {{ $students[0]['si_st_num'] }}
                                 </label>

                                 <br>
                                 <?php if(isset($students[0]['md_field'])){?>
                                 <label for="studentMidleNameTH" class="form-control-label">สาขาวิชา :
                                     {{ $students[0]['md_field'] }}
                                 </label>
                                 <?php }else{?>
                                 <label for="studentMidleNameTH" text-alight="left" class="form-control-label">สาขาวิชา
                                     : -
                                 </label>
                                 <?php }?>
                                 <br>
                                 <?php if(isset($students[0]['md_faculty'])){?>
                                 <label for="studentMidleNameTH" class="form-control-label">คณะ :
                                     {{ $students[0]['md_faculty'] }}
                                 </label>
                                 <?php }else{?>
                                 <label for="studentMidleNameTH" text-alight="left" class="form-control-label">คณะ : -
                                 </label>
                                 <?php }?>
                                 <br>
                                 <?php if(isset($students[0]['si_phone_num'])){?>
                                 <label for="studentMidleNameTH" class="form-control-label">เบอร์โทรศัพท์ :
                                     {{ $students[0]['si_phone_num'] }}
                                 </label>
                                 <?php }else{?>
                                 <label for="studentMidleNameTH" text-alight="left"
                                     class="form-control-label">เบอร์โทรศัพท์ : -
                                 </label>
                                 <?php }?>
                                 {{-- </div> --}}
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="col-lg-5">
                 <div class="card h-100 p-3">
                     <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
                         <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                             <h5 class="text-black font-weight-bolder mb-4 pt-2">ข้อมูลการปฏิบัติงานสหกิจศึกษา</h5>
                             <p class="text-black">ปฏิบัติงานสหกิจศึกษา : {{ $students[0]['cp_name_th'] }}</p>
                             <p class="text-black">อาจารย์ที่ปรึกษา : {{ $students[0]['ta_firstname_th'] }}
                                 {{ $students[0]['ta_lastname_th'] }}</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div class="row my-4">
             <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                 <div class="card">
                     <div class="card-header pb-0">
                         <div class="row">
                             <div class="col-lg-12 col-7 wi">
                                 <h5 class="font-weight-bolder">
                                     เอกสารเล่มสหกิจศึกษาฉบับสมบูรณ์และใบรับรองผลการปฏิบัติสหกิจศึกษา</h5>
                                 {{-- <p class="text-sm mb-0">
                                     <i class="fa fa-check text-info" aria-hidden="true"></i>
                                     <span class="font-weight-bold ms-1">30 done</span> this month
                                 </p> --}}
                             </div>

                             <div class="card-body px-0 pb-2">

                                 <table class="table align-items-center mb-0">
                                     <thead>

                                         <table class="table align-items-center mb-0 text-center">
                                             <thead>
                                                 <tr>
                                                     <th class="text-xs font-weight-bold mb-0">
                                                         ลำดับ
                                                     </th>

                                                     <th class="text-xs font-weight-bold mb-0">
                                                         เอกสาร
                                                     </th>
                                                     <th class="text-xs font-weight-bold mb-0">
                                                         สถานะ
                                                     </th>
                                                     <th class="text-xs font-weight-bold mb-0">
                                                         ดำเนินการ
                                                     </th>
                                                 </tr>
                                             </thead>
                                             <tbody>
                                                 @foreach ($document as $index => $value)
                                                     <tr>
                                                         <td class="ps-4">
                                                             <p class="text-xs font-weight-bold mb-0">
                                                                 {{ ++$index }}</p>
                                                         </td>

                                                         <td class="text-left">
                                                             <p class="text-xs font-weight-bold mb-0"
                                                                 wire:key="{{ $value->index }}">
                                                                 {{ $value['d_name'] }}</p>
                                                         </td>

                                                         <td class="align-middle text-center text-sm">
                                                             @if ($value['d_status'] == '0')
                                                                 <span
                                                                     class="badge badge-sm bg-gradient-secondary">ยังไม่ดำเนินการ</span>
                                                             @else
                                                                 <span class="badge badge-sm bg-gradient-success">
                                                                     ส่งแล้ว</span>
                                                             @endif
                                                         </td>

                                                         <td style="text-align: center;">
                                                             <div class="dropdown">
                                                                 <a class="btn" href="#" role="button"
                                                                     id="dropdownMenuLink" data-bs-toggle="dropdown"
                                                                     aria-expanded="false">
                                                                     . . .
                                                                 </a>
                                                                 <!--Edit-->
                                                                 <ul class="dropdown-menu"
                                                                     aria-labelledby="dropdownMenuLink">
                                                                     <!--Uplode-->
                                                                     <?php if($value['d_id'] == 1 && $value['d_status'] == 1){ ?>
                                                                     {{-- <li>
                                                                        <a href="ins00{{$index}}" class="mx-3" type="button"
                                                                            data-bs-toggle="tooltip" data-bs-original-title="Show report">
                                                                            <span>
                                                                                <i class="fa-solid fas fa-eye text-secondary"
                                                                                    aria-hidden="true">
                                                                                    แก้ไขเอกสาร</i>
                                                                            </span>
                                                                        </a>
                                                                    </li> --}}
                                                                     <li>
                                                                         <a class="mx-3" type="button"
                                                                             data-bs-toggle="modal"
                                                                             data-bs-target="#editModal"
                                                                             wire:click="setId({{ $value->d_id }})">
                                                                             <span style=>
                                                                                 <i class="fas fa-user-edit "
                                                                                     aria-hidden="true">
                                                                                     แก้ไขเอกสาร</i>
                                                                             </span>
                                                                         </a>
                                                                     </li>
                                                                     <?php } ?>

                                                                     <?php if($value['d_status'] == 0 ){ ?>
                                                                     <li>
                                                                         <a class="mx-3" type="button"
                                                                             data-bs-toggle="modal"
                                                                             data-bs-target="#exampleModal"
                                                                             wire:click="setId({{ $value->d_id }})">
                                                                             <span style=>
                                                                                 <i class="fas fa-arrow-up cursor-pointer"
                                                                                     aria-hidden="true">
                                                                                     นำเข้าเอกสาร</i>
                                                                             </span>
                                                                         </a>

                                                                     </li>
                                                                     <?php } ?>
                                                                     <?php if($value['d_status'] == 1 ){ ?>
                                                                     <li>
                                                                         <a class="mx-3"
                                                                             wire:click="export({{ $value->d_id }})">
                                                                             <span style=>
                                                                                 <i class="fas fa-arrow-down cursor-pointer"
                                                                                     aria-hidden="true">
                                                                                     ดาวน์โหลดเอกสาร</i>
                                                                             </span>
                                                                         </a>
                                                                     </li>
                                                                     <?php } ?>

                                                                     <?php if($value['d_status'] == 1 ){ ?>
                                                                     <li>
                                                                         <a class="mx-3" type="button"
                                                                             data-bs-toggle="modal"
                                                                             data-bs-target="#deleteDocModal"
                                                                             wire:click="setId({{ $value->d_id }})">
                                                                             <span style=>
                                                                                 <i class="cursor-pointer fas fa-trash "
                                                                                     aria-hidden="true">
                                                                                     ลบเอกสาร</i>
                                                                             </span>
                                                                         </a>
                                                                     </li>
                                                                     <?php } ?>

                                                                 </ul>
                                                             </div>
                                                         </td>
                                                     </tr>
                                                 @endforeach
                                             </tbody>
                                         </table>

                             </div>

                         </div>
                     </div>



                     {{-- ////////////////////////////////////////// นำเข้า ////////////////////////////////////// --}}
                     <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">นำเข้าเอกสาร</h5>

                                 </div>

                                 <div class="modal-body">
                                     &nbsp เฉพาะไฟล์นามสกุล .pdf เท่านั้น
                                     <div>
                                         @if (session()->has('message'))
                                             <div class="alert alert-success">
                                                 {{ session('message') }}
                                             </div>
                                         @endif
                                     </div>
                                     <div class="form-group">
                                         <input type="file" class="form-control" wire:model="d_file">
                                         @error('doc')
                                             <span class="text-danger">{{ $message }}</span>
                                         @enderror
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-danger"
                                         data-bs-dismiss="modal">ยกเลิก</button>
                                     <button type="button" data-bs-dismiss="modal" wire:click.prevent="save"
                                         class="btn btn-success btn btn-lg btn-primary">บันทึก</button>
                                 </div>
                             </div>
                         </div>
                     </div>


                     {{-- ///////////////////////////////// ลบ //////////////////////////////////////////////// --}}
                     <div wire:ignore.self class="modal fade" id="deleteDocModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">ลบเอกสาร</h5>

                                 </div>
                                 <div class="modal-body">
                                     คุณต้องการลบเอกสารหรือไม่
                                     <div>
                                         @if (session()->has('message'))
                                             <div class="alert alert-success">
                                                 {{ session('message') }}
                                             </div>
                                         @endif
                                     </div>
                                 </div>
                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary close-btn"
                                         data-bs-dismiss="modal">ยกเลิก</button>
                                     <button type="button" wire:click.prevent="del" class="btn btn-danger"
                                         data-bs-dismiss="modal">ลบ</button>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- ///////////////////////////////////////////////modal edit/////////////////////////////////////////////// -->
                     <div wire:ignore.self class="modal fade " id="editModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                         <div class="modal-dialog modal-lg" role="document">
                             <div class="modal-content">
                                 <div class="modal-header">
                                     <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลใบรับรองเพิ่มเติม
                                     </h5>
                                 </div>
                                 <!-- <form wire:submit.prevent="edit" method="POST" role="form text-left"  -->
                                 <!-- enctype="multipart/form-data"> -->
                                 <div class="modal-body">
                                     <table width="100%">
                                         <tr>
                                             <td>
                                                 <div class="mb-10-row col-sm-15">
                                                     <label for="2" class="form-label">หัวข้อโครงงาน</label>
                                                 </div>

                                             </td>
                                             <td colspan="2">

                                                 <div class="mb-2-row col-sm-15">
                                                     <label for="1" class="form-label">ภาษาไทย</label>
                                                     <div class="col-sm-30">
                                                         <div
                                                             class="@error('dd_name_th') border border-danger rounded-3 @enderror">
                                                             <textarea wire:model="dd_name_th" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                                         </div>
                                                         @error('dd_name_th')
                                                             <div class="text-danger">{{ $message }}</div>
                                                         @enderror

                                                     </div>
                                                 </div>

                                             </td>
                                             <td></td>
                                         </tr>
                                         <tr>
                                             <td></td>
                                             <td colspan="2">
                                                 <div class="mb-8-row col-sm-15">
                                                     <label for="2" class="form-label">ภาษาอังกฤษ</label>
                                                     <div class="col-sm-30">
                                                         <div
                                                             class="@error('dd_name_en') border border-danger rounded-3 @enderror">
                                                             <textarea class="form-control" wire:model="dd_name_en" id="exampleFormControlTextarea1" rows="2"></textarea>
                                                         </div>
                                                         @error('dd_name_en')
                                                             <div class="text-danger">{{ $message }}</div>
                                                         @enderror

                                                     </div>
                                             </td>
                                             <td></td>
                                         </tr>
                                         <tr>
                                             <td></td>
                                             <td> <label for="Th" class="form-label">อาจารย์ที่ปรึกษา</label>

                                                 <div
                                                     class="@error('dd_teacher') border border-danger rounded-3 @enderror">
                                                     <select class="form-select" aria-label="Default select example"
                                                         wire:model="dd_teacher">
                                                         <option <?php if ($dd_teacher == '') {
    echo 'selected';
} ?>>เลือก
                                                         </option>
                                                         @foreach ($teacher as $value)
                                                             <option {{ $optionSelected = $dd_teacher }}
                                                                 value="{{ $value }}">
                                                                 {{ $value }}
                                                             </option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                                 @error('dd_teacher')
                                                     <div class="text-danger">{{ $message }}</div>
                                                 @enderror
                                             </td>

                                             <td> <label for="Th" class="form-label">อาจารย์ที่ปรึกษาร่วม</label>

                                                 <div
                                                     class="@error('dd_teacher_co') border border-danger rounded-3 @enderror">
                                                     <select class="form-select" aria-label="Default select example"
                                                         wire:model="dd_teacher_co">
                                                         <option <?php if ($dd_teacher_co == '') {
    echo 'selected';
} ?>>เลือก
                                                         </option>
                                                         @foreach ($teacher as $value)
                                                             <option {{ $optionSelected = $dd_teacher_co }}
                                                                 value="{{ $value }}">
                                                                 {{ $value }}
                                                             </option>
                                                         @endforeach
                                                     </select>
                                                 </div>
                                                 @error('dd_teacher_co')
                                                     <div class="text-danger">{{ $message }}</div>
                                                 @enderror
                                             </td>
                                         </tr>
                                         <tr>
                                             <td></td>
                                             <td>
                                                 <div>
                                                     <label for="1" class="form-label">วันที่สอบ</label>
                                                 </div>
                                                 <div>

                                                     <div
                                                         class="@error('dd_exam_date') border border-danger rounded-3 @enderror">
                                                         <input id="startDate" class="form-control" type="date"
                                                             wire:model="dd_exam_date">
                                                     </div>
                                                     @error('dd_exam_date')
                                                         <div class="text-danger">{{ $message }}</div>
                                                     @enderror
                                                 </div>
                                             </td>
                                             <td>
                                                 <div>
                                                     <label for="2" class="form-label">วันที่อนุมัติ</label>
                                                 </div>
                                                 <div>
                                                     <div
                                                         class="@error('dd_confirm_date') border border-danger rounded-3 @enderror">
                                                         <input id="startDate" class="form-control" type="date"
                                                             wire:model="dd_confirm_date">
                                                     </div>
                                                     @error('dd_confirm_date')
                                                         <div class="text-danger">{{ $message }}</div>
                                                     @enderror

                                                 </div>
                                             </td>
                                         </tr>

                                         </tbody>
                                     </table>
                                 </div>

                                 <div class="modal-footer">
                                     <button type="button" class="btn btn-danger"
                                         data-bs-dismiss="modal">ยกเลิก</button>
                                     <button type="button" data-bs-dismiss="modal" wire:click="edit()"
                                         class="btn btn-success btn btn-lg btn-primary">บันทึก</button>
                                     <!-- data-bs-dismiss="modal" -->
                                 </div>
                                 </form>
                             </div>
                         </div>
                     </div>
                     {{-- //////////////////////////////////////// --}}
















                     </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>

     </div>
     </div>
 </main>

 <!--   Core JS Files   -->
 <script src="../assets/js/plugins/chartjs.min.js"></script>
 <script src="../assets/js/plugins/Chart.extension.js"></script>
 <script>
     var ctx = document.getElementById("chart-bars").getContext("2d");

     new Chart(ctx, {
         type: "bar",
         data: {
             labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
             datasets: [{
                 label: "Sales",
                 tension: 0.4,
                 borderWidth: 0,
                 pointRadius: 0,
                 backgroundColor: "#fff",
                 data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
                 maxBarThickness: 6
             }, ],
         },
         options: {
             responsive: true,
             maintainAspectRatio: false,
             legend: {
                 display: false,
             },
             tooltips: {
                 enabled: true,
                 mode: "index",
                 intersect: false,
             },
             scales: {
                 yAxes: [{
                     gridLines: {
                         display: false,
                     },
                     ticks: {
                         suggestedMin: 0,
                         suggestedMax: 500,
                         beginAtZero: true,
                         padding: 0,
                         fontSize: 14,
                         lineHeight: 3,
                         fontColor: "#fff",
                         fontStyle: 'normal',
                         fontFamily: "Open Sans",
                     },
                 }, ],
                 xAxes: [{
                     gridLines: {
                         display: false,
                     },
                     ticks: {
                         display: false,
                         padding: 20,
                     },
                 }, ],
             },
         },
     });

     var ctx2 = document.getElementById("chart-line").getContext("2d");

     var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

     gradientStroke1.addColorStop(1, 'rgba(253,235,173,0.4)');
     gradientStroke1.addColorStop(0.2, 'rgba(245,57,57,0.0)');
     gradientStroke1.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors

     var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

     gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.4)');
     gradientStroke2.addColorStop(0.2, 'rgba(245,57,57,0.0)');
     gradientStroke2.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors


     new Chart(ctx2, {
         type: "line",
         data: {
             labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
             datasets: [{
                     label: "Mobile apps",
                     tension: 0.4,
                     borderWidth: 0,
                     pointRadius: 0,
                     borderColor: "#fbcf33",
                     borderWidth: 3,
                     backgroundColor: gradientStroke1,
                     data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                     maxBarThickness: 6

                 },
                 {
                     label: "Websites",
                     tension: 0.4,
                     borderWidth: 0,
                     pointRadius: 0,
                     borderColor: "#f53939",
                     borderWidth: 3,
                     backgroundColor: gradientStroke2,
                     data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
                     maxBarThickness: 6

                 },
             ],
         },
         options: {
             responsive: true,
             maintainAspectRatio: false,
             legend: {
                 display: false,
             },
             tooltips: {
                 enabled: true,
                 mode: "index",
                 intersect: false,
             },
             scales: {
                 yAxes: [{
                     gridLines: {
                         borderDash: [2],
                         borderDashOffset: [2],
                         color: '#dee2e6',
                         zeroLineColor: '#dee2e6',
                         zeroLineWidth: 1,
                         zeroLineBorderDash: [2],
                         drawBorder: false,
                     },
                     ticks: {
                         suggestedMin: 0,
                         suggestedMax: 500,
                         beginAtZero: true,
                         padding: 10,
                         fontSize: 11,
                         fontColor: '#adb5bd',
                         lineHeight: 3,
                         fontStyle: 'normal',
                         fontFamily: "Open Sans",
                     },
                 }, ],
                 xAxes: [{
                     gridLines: {
                         zeroLineColor: 'rgba(0,0,0,0)',
                         display: false,
                     },
                     ticks: {
                         padding: 10,
                         fontSize: 11,
                         fontColor: '#adb5bd',
                         lineHeight: 3,
                         fontStyle: 'normal',
                         fontFamily: "Open Sans",
                     },
                 }, ],
             },
         },
     });
 </script>
