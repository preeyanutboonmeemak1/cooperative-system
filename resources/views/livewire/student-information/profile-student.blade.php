<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">{{ __('ข้อมูลนิสิต') }}</h5>
              
            </div>
            <div class="card-body pt-4 p-3">
                <form wire:submit.prevent="save" method="GET" role="form text-left">
                
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                               
                            <center><img src="{{ asset('storage/'.$students[0]['si_avatar_file']) }} " width="250"/></center>
                                
                                <!-- </div>
                                @error('StudentSubDistrict') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="studentMidleNameTH"
                                    class="form-control-label">ชื่อ-นามสกุล : {{$students[0]['md_prefixname_th'].$students[0]['si_firstname_th'].' '.$students[0]['si_lastname_th']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">รหัสนิสิต : {{$students[0]['si_st_num']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">อายุ : 22
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">น้ำหนัก : {{$students[0]['si_weight']}} กก.
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">เชื้อชาติ : {{$students[0]['md_ethnicity']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">ศาสนา : {{$students[0]['si_md_ethnicity_id']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">คณะ : {{$students[0]['md_faculty']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">ปีการศึกษา : {{$students[0]['md_year_class']}}
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="studentMidleNameTH"
                                    class="form-control-label">{{$students[0]['md_prefixname_eng'].$students[0]['si_firstname_en'].' '.$students[0]['si_lastname_en']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">ชั้นปีที่ : {{$students[0]['md_year_of_study']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">เพศ : {{$students[0]['md_gender']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">ส่วนสูง : {{$students[0]['si_height']}} ซม.
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">สัญชาติ : {{$students[0]['md_nationality']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">บัตรประจำตัวประชาชน : {{$students[0]['si_st_card']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">สาขาวิชา : {{$students[0]['md_field']}}
                                </label>
                                <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">เบอร์โทรศัพท์ : {{$students[0]['si_phone_num']}}
                                </label>
                            </div>
                        </div>                  
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- </div>
                                @error('StudentSubDistrict') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>  
                        <div class="col-md-8">
                            <div class="form-group">
                            <label for="studentMidleNameTH"
                                    class="form-control-label">ที่อยู่ตามทะเบียนบ้าน
                            </label>
                            <br>
                                <label for="studentMidleNameTH"
                                    class="form-control-label">บ้านเลขที่ {{$students[0]['si_address']}} ตำบล {{$students[0]['md_sub_district']}} อำเภอ {{$students[0]['md_district']}} จังหวัด {{$students[0]['md_province']}} รหัสไปรษณีย์ {{$students[0]['md_postal_code']}}
                                </label>
                            </div>
                        </div> 
                    </div>
                    <!-- <img src="{{ asset('storage/photos/1648240052_getstudentimage.jpg') }} " /> -->
                    <div class="d-flex justify-content-end">
                        <!-- <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'บันทึก' }}</button> -->
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
