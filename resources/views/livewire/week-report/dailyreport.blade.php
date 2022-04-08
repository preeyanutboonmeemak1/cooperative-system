<div>
    <div class="container-fluid py-4" style="width: 60rem;">
        <div class="card mt-2">
        
        <div class="card container-fluid py-4" >
        <h3 class="card-header mx-3">รายงานประจำสัปดาห์</h3>
                <div class="d-flex justify-content"> 
                 
                
                <h4 class="mx-6">ครั้งที่ {{$jobs->wr_week_id}}</h4>
               
                </div>
            </div>
            
            <hr>
            <div class="col-md-12">
                <div class="card-header">
                        <h5 class="card-title">แผนงานในสัปดาห์</h5>
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
                                        @foreach($jobdetails as $listwork)
                                        <div class="card-body pt-2">
                                            <h5 class="my-2">แผนงาน #{{$listwork->jdt_id}}</h5>
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
                                                        wire:click="deletejdt({{ $listwork->jdt_id }})">
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
                                                วันที่ {{$listwork->jdt_date}} 
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
                        <h5 class="card-title">แผนงานในสัปดาห์ถัดไป</h5>
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
                                        @foreach($nextjobs as $listnext)
                                        <div class="card-body pt-2">
                                        <h5 class="my-2">แผนงาน #{{$listnext->njdt_id}}</h5>
                                           
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
                                                วันที่ {{$listnext->njdt_start_date}} to วันที่ {{$listnext->njdt_end_date}}
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
                                <textarea wire:model="j_problem" class="form-control" type="text" id="textareas" rows="3" disabled>
                                
                                </textarea>
                            </div>

                            <div> 
                                  <label form="file" class="col-sm-2 col-form-label mt-2">ไฟล์แนบ</label>
                            </div>
                            <div class="col-sm-4">
                                    <input type="file" class="form-control" id="inputGroupFile02">
                            </div>
                            
                        </form>
                    </div>
                    <div class="d-flex justify-content-end">
                <button type="cancel" class="btn bg-gradient-dark btn-md mx-1">ยกเลิก</button>
                <button type="submit" class="btn bg-gradient-dark btn-md mx-2">บันทึก</button>
            </div>
            </div>
            
       
        </div>
    </div>


    <div wire:ignore.self class="modal fade" id="modal-add1" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แผนงานในสัปดาห์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                
                <div class="modal-body">
                    
                        <div class="card h-100">
                        
                            <div class="row">
                                <div class="col-md-12">
                                <form  wire:submit.prevent="savejob" method="POST" role="form text-left">
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
                                        <button type="button" wire:click="alert()" class="mb-0 btn btn-success" >บันทึก</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขแผนงานในสัปดาห์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                </div>
                
                <div class="modal-body">
                <form  wire:submit.prevent="update_jdt" method="POST" role="form text-left">
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
                                        <button type="submit" class="mb-0 btn btn-success" >บันทึก</button>
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
                <form  wire:submit.prevent="savenextjob" method="POST" role="form text-left">
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
                                        <button type="submit" class="mb-0 btn btn-success" >บันทึก</button>
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
                    <form  wire:submit.prevent="update_njdt" method="POST" role="form text-left">
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
                                        <button type="submit" class="mb-0 btn btn-success" >บันทึก</button>
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
                <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" wire:click.prevent="delete_jdt()" class="btn btn-danger" class="mb-0 btn btn-primary" data-bs-dismiss="modal">Delete</button>
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
                <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" wire:click.prevent="delete_njdt()" class="btn btn-danger" class="mb-0 btn btn-primary" data-bs-dismiss="modal">Delete</button>
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
                     <form  wire:submit.prevent="update_problem" method="POST" role="form text-left"> 
                        <div class="card h-100">
                            <textarea wire:model="j_problem" class="form-control" type="text" id="textareas" rows="3" id="problem">
                
                            </textarea>
                        </div>
                        
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="mb-0 btn btn-primary" >Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>