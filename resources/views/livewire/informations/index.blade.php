<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">{{ __('นิสิตในที่ปรึกษา') }}</h5>

            </div>
            <div class="card-body pt-4 p-3">
                <form wire:submit.prevent="save" method="GET" role="form text-left">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                    <label for="yearclass" class="form-control-label">{{ __('ปีการศึกษา') }}</label>
                    <select class="form-select" wire:model="yearclass">

                        @foreach ($yearclass as $list_th)
                            <option value="{{ $list_th->id }}">{{ $list_th->md_year_class }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div> 

                    {{-- <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <center><img src="{{ asset('storage/' . $students[0]['si_avatar_file']) }} "
                                        width="250" /></center>
                                <br>
                                <center>
                                    <label for="studentMidleNameTH" class="form-control-label">ชื่อ-นามสกุล :
                                        {{ $students[0]['md_prefixname_th'] . $students[0]['si_firstname_th'] . ' ' . $students[0]['si_lastname_th'] }}
                                    </label>
                                </center>
                                
                            </div>
                        </div>
                    </div> 
                    --}}
                </form>
            </div>
        </div>
    </div>
</div>
