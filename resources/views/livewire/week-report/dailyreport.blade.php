<?php
	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear";
	}
?>
<div>
    <div class="container-fluid py-4" style="width: 60rem;">
        <div class="card mt-2">
        
        <div class="card container-fluid py-4" >
        <h3 class="card-header mx-3">รายงานประจำสัปดาห์</h3>
                <div class="d-flex justify-content"> 
                 
                
                <h4 class="mx-6">ครั้งที่ {{$jobs->wr_week_id}}</h4>
                {{-- {{dd($jobs->wr_week_id);}} --}}
                </div>
            </div>
            
            <hr>
            <div class="col-md-12">
                <div class="card-header">
                        <h5 class="card-title">งานที่ได้ดำเนินการในสัปดาห์นี้</h5>
                            <div class="card-body"> 
                                <div class="col-md-6">
                                    <button data-bs-toggle="modal" data-bs-target="#modal-add1" type="button" class="btn bg-gradient-info">
                                        <i class="fas fa-plus">
                                            เพิ่มงาน
                                        </i>
                                    </button>
                                </div>
                                <div class="card-group">
                                    <div class="card"> 
                                        <!--loop-->  
                                        <?php $i = 1; ?>
                                        @foreach($jobdetails as $listwork)
                                        <div class="card-body pt-2">
                                            <h6 class="my-2">งานที่ #{{$i++}}</h6>
                                            <div class="d-flex justify-content-end">
                                                <div class="dropdown">
                                                    <a class="btn" href="#" role="button" id="dropdownMenuLink"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <span>
                                                            . . .
                                                        </span>
                                                    </a>
                                                <!--Edit-->
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li>
                                                        <a class="mx-3" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit1"
                                                        data-bs-original-title="Edit report"
                                                        wire:click = "check_jdt({{$listwork->jdt_id}})">
                                                        <span>
                                                        <i class="fas fa-user-edit"
                                                        > แก้ไขแผนงาน</i>
                                                        </span>
                                                        </a>
                                                    </li>
                                                    <!--delete-->
                                                    <li>
                                                        <a class="mx-3" type="button" data-bs-toggle="modal" data-bs-target="#modal-delete1"
                                                        wire:click="deletejdt({{ $listwork->jdt_id }})"
                                                        >
                                                        <span>
                                                        <i class="cursor-pointer fas fa-trash"
                                                            aria-hidden="true">
                                                            ลบแผนงาน</i>
                                                        </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                                </div>
                                            </div>

                                            <p  class="card-title h6 d-block text-darker">
                                               <?php echo "วันที่ : ".DateThai($listwork->jdt_date); ?>
                                                {{-- วันที่  {{ date_format($listwork->jdt_date,"วันที่สร้าง: d/m/Y"); }} --}}
                                                
                                            </p>

                                            <p class="card-description mb-4">
                                            งานที่ได้รับมอบหมาย 
                                            </p>
                                            <p class="form-control" rows="2" disabled>
                                                {{$listwork->jdt_details}}
                                            </p> 
                                            
                                            
                                        </div>
                                        @endforeach
                                    <!--loop-->   
                                    </div>
                                </div>           
                            </div> <!--end card-body--> 
                </div>    
            </div>
            <hr>
            <div class="col-md-12">
                <div class="card-header">
                        <h5 class="card-title">แผนงานในสัปดาห์หน้า</h5>
                            <div class="card-body"> 
                                <div class="col-md-6">
                                    <button data-bs-toggle="modal" data-bs-target="#modal-add2" type="button" class="btn bg-gradient-info">
                                        <i class="fas fa-plus">
                                            เพิ่มงาน
                                        </i>
                                    </button>
                                </div>
                                <div class="card-group">
                                    <div class="card"> 
                                        <!--loop-->  
                                        <?php $i = 1; ?>
                                        @foreach($nextjobs as $listnext)
                                        <div class="card-body pt-2">
                                        <h6 class="my-2">แผนงาน #{{$i++}}</h6>
                                           
                                            <div class="d-flex justify-content-end">
                                            <div class="dropdown">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                . . .
                                            </a>
                                                <!--Edit-->
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <li>
                                                        <a class="mx-3" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit2"
                                                        data-bs-original-title="Edit report"
                                                        wire:click = "check_njdt({{$listnext->njdt_id}})">
                                                        <span>
                                                        <i class="fas fa-user-edit"
                                                        > แก้ไขแผนงาน</i>
                                                        </span>
                                                        </a>
                                                    </li>
                                                    <!--delete-->
                                                    <li>
                                                        <a class="mx-3" type="button" data-bs-toggle="modal" data-bs-target="#modal-delete2"
                                                        wire:click="deletenjdt({{ $listnext->njdt_id }})">
                                                        <span>
                                                        <i class="cursor-pointer fas fa-trash"
                                                            aria-hidden="true">
                                                            ลบแผนงาน</i>
                                                        </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            </div>

                                        <p  class="card-title h6 d-block text-darker">
                                            <?php echo "วันที่ ".DateThai($listnext->njdt_start_date); ?> ถึง วันที่ <?php echo "".DateThai($listnext->njdt_end_date); ?>
                                                {{-- วันที่ {{$listnext->njdt_start_date}} ถึง วันที่ {{$listnext->njdt_end_date}} --}}
                                            </p>

                                            <p class="card-description mb-4">
                                            งานที่ได้รับมอบหมาย
                                            </p>
                                            <p class="form-control" rows="2" disabled>
                                             {{$listnext->njdt_details}}
                                            </p>
                                            

                                            </div>
                                        @endforeach
                                    <!--loop-->   
                                    </div>
                                </div>           
                            </div> <!--end card-body--> 
                </div>    
            </div>
            <hr>
            <div class="card container-fluid py-4">
                <h5 class="card-header">ปัญหาที่พบ</h5>
                    <div class="card-body">
                        <form>
                            
                            <div class="d-flex justify-content-end">
                                <a class="mx-3" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#add_problem"
                                                        data-bs-original-title="Edit"
                                                        wire:click = "check_job({{$jobs->j_id}})">
                                    <span>
                                        <i class="fas fa-user-edit"
                                        > แก้ไขปัญหาที่พบ</i>
                                    </span>
                                </a>
                            </div>
                            <div>
                                <h6 class="col-sm-2 col-form-label">ปัญหาที่พบ</h6>
                                <textarea wire:model="j_problem"  class="form-control" type="text" id="textareas" rows="3" disabled>
                                
                                </textarea>
                            </div>

                            <div> 
                                  <label form="file" class="col-sm-2 col-form-label mt-2">ไฟล์แนบ</label>
                            </div>
                            <div class="form-group col-sm-4">
                                    <input wire:model="j_file" type="file" class="form-control" id="inputGroupFile02">
                                    {{-- <button type="submit" class="form-control text-center">บันทึกไฟล์</button>   --}}
                            </div>
                            
                        
                    </div>
                    <div class="d-flex justify-content-end">
                        <button data-bs-toggle="modal" data-bs-target="#save-modal" 
                        wire:click.prevent="update_file()" type="button" 
                        class="btn btn-success btn-md mt-4 mb-4">{{ 'บันทึก' }}</button>
                    </div>
                 
                </form>
            </div>
            <div wire:ignore.self class="modal fade" id="save-modal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
        
                <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">บันทึกข้อมูลสำเร็จ</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                                <span>
                                    <div class="modal-footer "text-align="right">
                                    <button type="button" class="mb-0 btn btn-success" data-bs-dismiss="modal">ตกลง</button>  
                                    </div>
                                </span>
                        </div>      
                </div>
            </div>
        </div>
    </div>

   

    <div wire:ignore.self class="modal fade" id="modal-add1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">งานในสัปดาห์นี้</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                
                <div class="modal-body">
                    
                        <div class="card h-100">
                        
                            <div class="row">
                                <div class="col-md-12">
                                <form role="form text-left">
                                    <div class="form-group">
                                        <label for="date"
                                            class="form-control-label">วันที่</label>
                                            <input wire:model="jdt_date" class="form-control" type="date" id="daydate" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="area"
                                            class="form-control-label">งานที่ได้รับมอบหมาย</label>
                                            <textarea wire:model="jdt_details" class="form-control" type="text" id="textareas" rows="3">

                                            </textarea>
                                    </div> 
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                        <button type="submit" class="mb-0 btn btn-success" wire:click.prevent="savejob()" data-bs-dismiss="modal">บันทึก</button>
                                    </div>
                                </form>  
                                </div> 
                            </div>
                        
                        </div>
                      
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-edit1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขงานในสัปดาห์นี้</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                
                <div class="modal-body">
                <form role="form text-left">
                        <div class="card h-100">
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="date"
                                            class="form-control-label">วันที่</label>
                                            <input wire:model="jdt_date" class="form-control" type="date" id="daydate" name="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="area"
                                            class="form-control-label">งานที่ได้รับมอบหมาย</label>
                                            <textarea wire:model="jdt_details" class="form-control" type="text" id="textareas" rows="3">

                                            </textarea>
                                    </div> 
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                        <button type="submit" class="mb-0 btn btn-success" wire:click.prevent="update_jdt()" data-bs-dismiss="modal">บันทึก</button>
                                    </div>
                                </div> 
                            </div>
                        
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-add2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แผนงานในสัปดาห์ถัดไป</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                
                <div class="modal-body">
                <form role="form text-left">
                        <div class="card h-100">
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="date"
                                            class="form-control-label">วันเริ่ม</label>
                                            <input wire:model="njdt_start_date" class="form-control" type="date" id="startdate" name="startdate">
                                        <label for="date"
                                            class="form-control-label">วันสิ้นสุด</label>
                                            <input wire:model="njdt_end_date" class="form-control" type="date" id="enddate" name="enddate">
                                    </div>
                                    <div class="form-group">
                                        <label for="area"
                                            class="form-control-label">งานที่ได้รับมอบหมาย</label>
                                            <textarea wire:model="njdt_details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div> 
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                        <button type="submit" class="mb-0 btn btn-success" wire:click.prevent="savenextjob()" data-bs-dismiss="modal">บันทึก</button>
                                    </div>
                                </div> 
                            </div>
                        
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-edit2" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขแผนงานในสัปดาห์ถัดไป</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                
                <div class="modal-body">
                    <form role="form text-left">
                        <div class="card h-100">
                        
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="date"
                                            class="form-control-label">วันเริ่ม</label>
                                            <input wire:model="njdt_start_date" class="form-control" type="date" id="#" name="startdate">
                                        <label for="date"
                                            class="form-control-label">วันสิ้นสุด</label>
                                            <input wire:model="njdt_end_date" class="form-control" type="date" id="#" name="enddate">
                                    </div>
                                    <div class="form-group">
                                        <label for="area"
                                            class="form-control-label">งานที่ได้รับมอบหมาย</label>
                                            <textarea  wire:model="njdt_details" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div> 
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                        <button type="submit" class="mb-0 btn btn-success" wire:click.prevent="update_njdt()" data-bs-dismiss="modal">บันทึก</button>
                                    </div>
                                </div> 
                            </div>
                        
                        </div>
                    </form>    
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-delete1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบข้อมูล</h5>
                </div>
               <div class="modal-body">
                    <p>แน่ใจหรือว่าต้องการลบแผนงานนี้ ?</p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="submit" wire:click.prevent="delete_jdt()" class="btn btn-danger" class="mb-0 btn btn-primary" data-bs-dismiss="modal">ตกลง</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-delete2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบข้อมูล</h5>
                </div>
               <div class="modal-body">
                    <p>แน่ใจหรือว่าต้องการลบแผนงานนี้ ?</p>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="submit" wire:click.prevent="delete_njdt()" class="btn btn-danger" class="mb-0 btn btn-primary" data-bs-dismiss="modal">ตกลง</button>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="add_problem" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขปัญหาที่พบ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <form  role="form text-left"> 
                        <div class="card h-100">
                            <textarea wire:model="j_problem" class="form-control" type="text" id="textareas" rows="3" id="problem">
                
                            </textarea>
                        </div>
                        
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" class="mb-0 btn btn-success" wire:click.prevent="update_problem()" data-bs-dismiss="modal">บันทึก</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>