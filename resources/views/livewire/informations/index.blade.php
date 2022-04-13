<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">{{ __('นิสิตในที่ปรึกษา') }}</h5>

            </div>
            <div class="card-body pt-4 p-3">
                {{-- <form wire:submit.prevent="save" method="GET" role="form text-left"> --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                    <label for="yearclass" class="form-control-label">{{ __('ปีการศึกษา') }}</label>
                    <select class="form-select" wire:model="year">
                        @foreach ($yearclass as $list_th)
                            <option value="{{ $list_th->id }}">{{ $list_th->md_year_class }}</option>
                        @endforeach
                    </select>
                   
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
        {{-- <label for="yearclass" class="form-control-label">{{ __('ปีการศึกษา') }}</label> --}}
        <br>
        <label for="count" class="form-control-label">จำนวนนิสิตทั้งหมด <?php echo count($informations); ?> คน</label>
    </div>
</div>
        </div> 

                    <div class="row">
                        @foreach ($informations  as $list)   
                        <div class="col-md-4">
                            <div class="form-group">
                                <center> <a href="/profile-students/{{$list['si_id']}}"type="button">             
                               <img src="{{ asset('storage/' . $list['si_avatar_file']) }} "
                                        width="250" height="300" /></a> </center>
                                <br>
                                <center>
                                    <label for="studentMidleNameTH" class="form-control-label" style="font-size: 18px">
                                        {{ $list['si_st_num'] }}
                                    </label>
                                    {{-- <br > --}}
                                    <label for="studentMidleNameTH" class="form-control-label" style="font-size: 18px">
                                        {{ $list['md_prefixname_th'] . $list['si_firstname_th'] . ' ' . $list['si_lastname_th'] }}
                                    </label>
                                    <br>
                                    <label for="studentMidleNameTH" class="form-control-label" style="font-size: 15px">
                                        คณะ{{ $list['md_faculty'] }}
                                    </label>
                                    <br>
                                    <label for="studentMidleNameTH" class="form-control-label" style="font-size: 15px">
                                        สาขา{{ $list['md_field'] }}
                                    </label>
                                    <br>
                                    <label for="studentMidleNameTH" class="form-control-label" style="font-size: 15px">
                                        {{ $list['cp_name_th'] }}
                                    </label>
                                    <a href="/follow/{{$list['si_id']}}" class="mx-3" data-bs-toggle="tooltip"
                                    data-bs-original-title="แสดงรายงานประจำสัปดาห์">
                                    <i  class="fa-solid fas fa-eye " aria-hidden="true"></i>
                                </a>
                                </center>
                                
                            </div>
                        </div> 
                        @endforeach
                    </div> 
                   
                {{-- </form> --}}
            </div>
        </div>
    </div>
</div>
