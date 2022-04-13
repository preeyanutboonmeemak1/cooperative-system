<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">{{ __('ข้อมูลผู้ปฏิบัติงานสหกิจศึกษา') }}</h5>
                
            </div>
            <div class="card-body pt-4 p-3">
                <form wire:submit.prevent="save" method="GET" role="form text-left">

                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="studentPrefixTH"
                                    class="form-control-label">{{ __('คำนำหน้า (TH)') }}</label>
                                <!-- <div class="@error('studentPrefixTH')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="studentPrefixTH">
                                    
                                    @foreach($prefixTH as $list_th)
                                    <option value="{{$list_th->id}}">{{$list_th->md_prefixname_th}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('studentPrefixTH') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="studentFirstNameTH" class="form-control-label">{{ __('ชื่อ (TH)') }}</label>
                                <div class="@error('studentFirstNameTH')border border-danger rounded-3 @enderror">
                                    <input wire:model="studentFirstNameTH" class="form-control" type="text"
                                        placeholder="ชื่อ (TH)" id="studentFirstNameTH">
                                </div>
                                @error('studentFirstNameTH') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="studentMidleNameTH"
                                    class="form-control-label">{{ __('ชื่อกลาง (TH)') }}</label>
                                <!-- <div class="@error('studentMidleNameTH')border border-danger rounded-3 @enderror"> -->
                                    <input wire:model="studentMidleNameTH" class="form-control" type="text"
                                        placeholder="ชื่อ (TH)" id="studentMidleNameTH">
                                <!-- </div> -->
                                <!-- @error('studentMidleNameTH') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="studentLastNameTH"
                                    class="form-control-label">{{ __('นามสกุล (TH)') }}</label>
                                <div class="@error('studentLastNameTH')border border-danger rounded-3 @enderror">
                                    <input wire:model="studentLastNameTH" class="form-control" type="text"
                                        placeholder="นามสกุล (TH)" id="studentLastNameTH">
                                </div>
                                @error('studentLastNameTH') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-1">
                            <div class="form-group">
                                <label for="studentPrefixEN"
                                    class="form-control-label">{{ __('คำนำหน้า (EN)') }}</label>
                                <!-- <div class="@error('studentPrefixEN')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="studentPrefixEN">
                                    @foreach($prefixEN as $list_en)
                                    <option value="{{$list_en->id}}">{{$list_en->md_prefixname_eng}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('studentPrefixEN') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="studentFirstNameEN" class="form-control-label">{{ __('ชื่อ (EN)') }}</label>
                                <div class="@error('studentFirstNameEN')border border-danger rounded-3 @enderror">
                                    <input wire:model="studentFirstNameEN" class="form-control" type="text"
                                        placeholder="ชื่อ (EN)" id="studentFirstNameEN">
                                </div>
                                @error('studentFirstNameEN') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="studentMidleNameEN"
                                    class="form-control-label">{{ __('ชื่อกลาง (EN)') }}</label>
                                <!-- <div class="@error('studentMidleNameEN')border border-danger rounded-3 @enderror"> -->
                                    <input wire:model="studentMidleNameEN" class="form-control" type="text"
                                        placeholder="ชื่อ (EN)" id="studentMidleNameEN">
                                <!-- </div> -->
                                <!-- @error('studentMidleNameEN') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="studentLastNameEN"
                                    class="form-control-label">{{ __('นามสกุล (EN)') }}</label>
                                <div class="@error('studentLastNameEN')border border-danger rounded-3 @enderror">
                                    <input wire:model="studentLastNameEN" class="form-control" type="text"
                                        placeholder="นามสกุล (EN)" id="studentLastNameEN">
                                </div>
                                @error('studentLastNameEN') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="studentNumber" class="form-control-label">{{ __('รหัสนิสิต') }}</label>
                                <div class="@error('studentNumber')border border-danger rounded-3 @enderror">
                                    <input wire:model="studentNumber" class="form-control" type="text"
                                        placeholder="รหัสนิสิต" id="studentNumber">
                                </div>
                                @error('studentNumber') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentNickName" class="form-control-label">{{ __('ชื่อเล่น') }}</label>
                                <div class="@error('StudentNickName')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentNickName" class="form-control" type="text"
                                        placeholder="ชื่อเล่น" id="StudentNickName">
                                </div>
                                @error('StudentNickName') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="YearsStudy" class="form-control-label">{{ __('ชั้นปีที่') }}</label>
                                <!-- <div class="@error('YearsStudy')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="YearsStudy">
                                    @foreach($yearofstudy as $list_yearstudy)
                                    <option value="{{$list_yearstudy->id}}">{{$list_yearstudy->md_year_of_study}}
                                    </option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('YearsStudy') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="YearsClass" class="form-control-label">{{ __('ปีการศึกษา') }}</label>
                                <!-- <div class="@error('YearsClass')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="YearsClass">
                                    @foreach($yearclass as $list_yearclass)
                                    <option value="{{$list_yearclass->id}}">{{$list_yearclass->md_year_class}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('YearsClass') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="StudentFaculty" class="form-control-label">{{ __('คณะ') }}</label>
                                <!-- <div class="@error('StudentFaculty')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentFaculty">
                                    @foreach($faculty as $list_fac)
                                    <option value="{{$list_fac->id}}">{{$list_fac->md_faculty}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentFaculty') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="StudentField" class="form-control-label">{{ __('สาขาวิชา') }}</label>
                                <!-- <div class="@error('StudentField')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentField">
                                    @foreach($field as $list_field)
                                    <option value="{{$list_field->id}}">{{$list_field->md_field}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentField') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentCourse" class="form-control-label">{{ __('หลักสูตร') }}</label>
                                <!-- <div class="@error('StudentCourse')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentCourse">
                                    @foreach($course as $list_course)
                                    <option value="{{$list_course->id}}">{{$list_course->md_course}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentCourse') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentGPA"
                                    class="form-control-label">{{ __('เกรดเฉลี่ยที่ผ่านมา') }}</label>
                                <div class="@error('StudentGPA')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentGPA" class="form-control" type="text" placeholder="0.00"
                                        id="StudentGPA">
                                </div>
                                @error('StudentGPA') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentLastGPA"
                                    class="form-control-label">{{ __('เกรดเฉลี่ยสะสม') }}</label>
                                <div class="@error('StudentLastGPA')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentLastGPA" class="form-control" type="text"
                                        placeholder="0.00" id="StudentLastGPA">
                                </div>
                                @error('StudentLastGPA') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="StudentDOB" class="form-control-label">{{ __('วันเดือนปีที่เกิด') }}</label>
                                <div class="@error('StudentDOB')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentDOB" class="form-control" type="date" placeholder=""
                                        id="StudentDOB">
                                </div>
                                @error('StudentDOB') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="StudentEthnicity" class="form-control-label">{{ __('เชื้อชาติ') }}</label>
                                <!-- <div class="@error('StudentEthnicity')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentEthnicity">
                                    @foreach($ethnicity as $list_ethnicity)
                                    <option value="{{$list_ethnicity->id}}">{{$list_ethnicity->md_ethnicity}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentEthnicity') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="StudentNationality" class="form-control-label">{{ __('สัญชาติ') }}</label>
                                <!-- <div class="@error('StudentNationality')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentNationality">
                                    @foreach($nationality as $list_nationality)
                                    <option value="{{$list_nationality->id}}">{{$list_nationality->md_nationality}}
                                    </option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentNationality') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="StudentSadsana" class="form-control-label">{{ __('ศาสนา') }}</label>
                                <div class="@error('StudentSadsana')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentSadsana" class="form-control" type="text"
                                        placeholder="ศาสนา" id="StudentSadsana">
                                </div>
                                @error('StudentSadsana') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="StudentGender" class="form-control-label">{{ __('เพศ') }}</label>
                                <!-- <div class="@error('StudentGender')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentGender">
                                    @foreach($gender as $list_gender)
                                    <option value="{{$list_gender->id}}">{{$list_gender->md_gender}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentGender') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="StudentHeight" class="form-control-label">{{ __('ส่วนสูง') }}</label>
                                <div class="@error('StudentHeight')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentHeight" class="form-control" type="text"
                                        placeholder="0.00" id="StudentHeight">
                                </div>
                                @error('StudentHeight') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="StudentWeight" class="form-control-label">{{ __('น้ำหนัก') }}</label>
                                <div class="@error('StudentWeight')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentWeight" class="form-control" type="text"
                                        placeholder="0.00" id="StudentWeight">
                                </div>
                                @error('StudentWeight') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="StudentCard"
                                    class="form-control-label">{{ __('บัตรประจำตัวประชาชน') }}</label>
                                <div class="@error('StudentCard')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentCard" class="form-control" type="text"
                                        placeholder="xxx-xxxxx-xx-x" id="StudentCard">
                                </div>
                                @error('StudentCard') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="StudentAddress" class="form-control-label">{{ __('ที่อยู่') }}</label>
                                <div class="@error('StudentAddress')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentAddress" class="form-control" type="text"
                                        placeholder="1/1" id="StudentAddress">
                                </div>
                                @error('StudentAddress') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <!-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="mhu" class="form-control-label">{{ __('หมู่') }}</label>
                                <div class="@error('mhu')border border-danger rounded-3 @enderror">
                                    <input wire:model="mhu" class="form-control" type="text"
                                        placeholder="1" id="mhu">
                                </div>
                                @error('mhu') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="soy" class="form-control-label">{{ __('ซอย') }}</label>
                                <div class="@error('soy')border border-danger rounded-3 @enderror">
                                    <input wire:model="soy" class="form-control" type="text"
                                        placeholder="1" id="soy">
                                </div>
                                @error('soy') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="road" class="form-control-label">{{ __('ถนน') }}</label>
                                <div class="@error('road')border border-danger rounded-3 @enderror">
                                    <input wire:model="road" class="form-control" type="text"
                                        placeholder="ถนน" id="road">
                                </div>
                                @error('road') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div> -->
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentSubDistrict" class="form-control-label">{{ __('ตำบล') }}</label>
                                <!-- <div class="@error('StudentSubDistrict')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentSubDistrict">
                                    @foreach($subdistrict as $list_subdistrict)
                                    <option value="{{$list_subdistrict->id}}">{{$list_subdistrict->md_sub_district}}
                                    </option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentSubDistrict') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentDistrict" class="form-control-label">{{ __('อำเภอ') }}</label>
                                <!-- <div class="@error('StudentDistrict')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentDistrict">
                                    @foreach($district as $list_district)
                                    <option value="{{$list_district->id}}">{{$list_district->md_district}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentDistrict') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentProvince" class="form-control-label">{{ __('จังหวัด') }}</label>
                                <!-- <div class="@error('StudentProvince')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentProvince">
                                    @foreach($province as $list_province)
                                    <option value="{{$list_province->id}}">{{$list_province->md_province}}</option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentProvince') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentPostalcode"
                                    class="form-control-label">{{ __('รหัสไปรษณีย์') }}</label>
                                <!-- <div class="@error('StudentPostalcode')border border-danger rounded-3 @enderror"> -->
                                <select class="form-select" wire:model="StudentPostalcode">
                                    @foreach($postalcode as $list_postalcode)
                                    <option value="{{$list_postalcode->id}}">{{$list_postalcode->md_postal_code}}
                                    </option>
                                    @endforeach
                                </select>
                                <!-- </div>
                                @error('StudentPostalcode') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentPhone" class="form-control-label">{{ __('เบอร์มือถือ') }}</label>
                                <div class="@error('StudentPhone')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentPhone" class="form-control" type="text"
                                        placeholder="xxx-xxx-xxxx" id="StudentPhone">
                                </div>
                                @error('StudentPhone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentEmail" class="form-control-label">{{ __('E-mail') }}</label>
                                <div class="@error('StudentEmail')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentEmail" class="form-control" type="email"
                                        placeholder="emai@mail.com" id="StudentEmail">
                                </div>
                                @error('StudentEmail') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="StudentAvatar"
                                    class="form-control-label">{{ __('รูปประจำตัวนิสิต') }}</label>
                                <div class="@error('StudentAvatar')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentAvatar" class="form-control" type="file"
                                        placeholder="จังหวัด" id="StudentAvatar">
                                </div>
                                @error('StudentAvatar') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="StudentContactName"
                                    class="form-control-label">{{ __('บุคคลที่ติดต่อได้ในกรณีฉุกเฉิน') }}</label>
                                <div class="@error('StudentContactName')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentContactName" class="form-control" type="text"
                                        placeholder="ชื่อ-นามสกุล" id="StudentContactName">
                                </div>
                                @error('StudentContactName') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentContactAs"
                                    class="form-control-label">{{ __('เกี่ยวข้องเป็น') }}</label>
                                <div class="@error('StudentContactAs')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentContactAs" class="form-control" type="text"
                                        placeholder="ความสัมพันธ์" id="StudentContactAs">
                                </div>
                                @error('StudentContactAs') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="StudentContactPhone"
                                    class="form-control-label">{{ __('เบอร์โทรศัพท์') }}</label>
                                <div class="@error('StudentContactPhone')border border-danger rounded-3 @enderror">
                                    <input wire:model="StudentContactPhone" class="form-control" type="text"
                                        placeholder="xxx-xxx-xxxx" id="StudentContactPhone">
                                </div>
                                @error('StudentContactPhone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>

                    
                    <div class="d-flex justify-content-end">
                        <button data-bs-toggle="modal" data-bs-target="#add-modal" type="submit" class="btn btn-success btn-md mt-4 mb-4">{{ 'บันทึก' }}</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel"aria-hidden="true">
    {{-- <a href="/profile-student/" class="mx-3" data-bs-toggle="tooltip"> --}}
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">บันทึกสำเร็จ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                {{-- <div class="modal-footer "text-align="right">
                        <button type="button" class="mb-0 btn btn-success" data-bs-dismiss="modal" >ตกลง</button>                  
                </div>               --}}
                <a href="profile-student/" class="mx-3" type="button"data-bs-toggle="tooltip"">
                    <span>
                        <div class="modal-footer "text-align="right">
                        <button type="button" class="mb-0 btn btn-success">ตกลง</button>  
                        </div>
                    </span>
                </a>
            </div>
        </div>
    {{-- </a> --}}

    </div>
</div>
