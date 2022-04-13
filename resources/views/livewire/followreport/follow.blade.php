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
    <div class="container-fluid py-4">
        <div class="card mt-2">
            <div class="card-header pb-0 px-3">

                <h3 class="mb-1">ติดตามรายงานความก้าวหน้า</h3>
            </div>
            <br>
            <div class="card-body pt-4 p-3">
                <div class="row">
                    <div class="col-12">
                    
                    <h6 class="mx-1">
                        รหัสนิสิต : {{$students[0]['si_st_num']}}  
                    </h6> 
                    <h6 class="mx-1 ">
                        ชื่อ : {{$students[0]['md_prefixname_th'].'  '.$students[0]['si_firstname_th'].' '.$students[0]['si_lastname_th']}}  
                    </h6> 
                    <h6 class="mx-1">
                        คณะ : {{$students[0]['md_faculty']}}  
                    </h6> 
                    <h6 class="mx-1">สาขา : {{$students[0]['md_field']}}
                    </h6> 
                    <h6 class="mx-1">บริษัท : {{$students[0]['cp_name_th']}} 
                    </h6> 

                    <br>
                    <br>
                    
                    <div class="row d-flex justify-content">
                        <div class="col-md-3 text-center">

                            <div class="form-group mx-1 text-center">
                                <label for="report" class="form-control-label  h4">{{ __('รายงานครั้งที่') }}</label>
                                <select class="form-select text-center" wire:model="weekre">
            
                                    @foreach ($week as $listreport)
                                        <option value="{{ $listreport->wr_week_id }}">{{ $listreport->wr_week_id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            

                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card-header">
                        <h5 class="card-title">งานที่ได้ดำเนินการในสัปดาห์นี้</h5>
                            <div class="card-body"> 
                        
                                <div class="card-group">
                                    <div class="card"> 
                                        <!--loop-->  
                                        <?php $i = 1; ?>
                                        @foreach($jobsday as $listwork)
                                        <div class="card-body pt-2">
                                            <h6 class="my-2">งานที่ #{{$i++}}</h6>
                                            

                                            <p  class="card-title h6 d-block text-darker">
                                                <?php echo "วันที่ : ".DateThai($listwork->jdt_date); ?>
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
                                
                                <div class="card-group">
                                    <div class="card"> 
                                        <!--loop-->  
                                        <?php $i = 1; ?>
                                        @foreach($jobsnext as $listwork)
                                        <div class="card-body pt-2">
                                            <h6 class="my-2">แผนงานที่ #{{$i++}}</h6>
                                                   
                                            <p  class="card-title h6 d-block text-darker">
                                                <?php echo "วันที่ ".DateThai($listwork->njdt_start_date); ?> ถึง วันที่ <?php echo "".DateThai($listwork->njdt_end_date); ?>
                                            </p>

                                            <p class="card-description mb-4">
                                            งานที่ได้รับมอบหมาย
                                            </p>
                                            <p class="form-control" rows="2" disabled>
                                                {{$listwork->njdt_details}}
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
                            @foreach($jobs as $listwork)
                            <div>
                                <h6 class="col-sm-3 col-form-label">ปัญหาที่พบภายในสัปดาห์นี้</h6>
                                <p class="form-control" type="text" id="textareas" rows="3" disabled>
                                    {{$listwork->j_problem}}
                                </p>
                            </div>

                           
                            <div> 
                                    <label form="file" class="col-sm-2 col-form-label mt-2">ไฟล์แนบ</label>
                              </div>
                              <div class="form-group col-sm-4">
                                <p class="form-control" type="text" id="textareas" rows="3">
                                    {{$listwork->j_filereport}}  
                                    <i class="fas fa-download cursor-pointer"
                                    aria-hidden="true" wire:click="export({{$listwork->j_id }})"> ดาวน์โหลดเอกสาร</i>
                                    
                                </p>
                                {{-- <div>
                                <a class="mx-3"
                                        
                                        <span style=>
                                            <i class="fas fa-arrow-down cursor-pointer"
                                                aria-hidden="true">
                                                 ดาวน์โหลดเอกสาร</i>
                                        </span>
                                    </a>
                                <div>    --}}
                                     
                              </div>
                              @endforeach
                        </form>

                    </div>
                    
        </div>
    </div>
</div>