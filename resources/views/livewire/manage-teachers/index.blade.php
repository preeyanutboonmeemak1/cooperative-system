<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3 d-flex justify-content-between">
                <h6 class="mb-0">{{ __('เพิ่มข้อมูลอาจารย์ที่ปรึกษา') }}</h6>
                <button type="button" class="btn bg-gradient-dark btn-md" wire:click="import()">นำเข้าข้อมูล</button>
            </div>
            <div class="card-body pt-4 p-3">
                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="teacherYearClass" class="form-control-label">{{ __('ปีการศึกษา') }}</label>
                                <div class="@error('teacherYearClass') border border-danger rounded-3 @enderror">
                                    <select class="form-select" wire:model="teacherYearClass">
                                        <option value="">เลือกปีการศึกษา</option>
                                        @foreach ($yearClass as $list_year)
                                            <option value="{{ $list_year->id }}">{{ $list_year->md_year_class }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('teacherYearClass')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="teacherPrefixTH"
                                    class="form-control-label">{{ __('คำนำหน้า (TH)') }}</label>

                                <div class="@error('teacherPrefixTH') border border-danger rounded-3 @enderror">
                                    <select class="form-select" wire:model="teacherPrefixTH">
                                        <option value="">เลือกคำนำหน้า (TH)</option>
                                        @foreach ($prefixTH as $list_th)
                                            <option value="{{ $list_th->id }}">{{ $list_th->md_prefixname_th }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('teacherPrefixTH')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="teacherFirstnameTH"
                                    class="form-control-label">{{ __('ชื่อ (TH)') }}</label>
                                <div class="@error('teacherFirstnameTH') border border-danger rounded-3 @enderror">
                                    <input wire:model="teacherFirstnameTH" class="form-control" type="text"
                                        placeholder="ชื่อ (TH)" id="teacherFirstnameTH">
                                </div>
                                @error('teacherFirstnameTH')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="teacherLastnameTH"
                                    class="form-control-label">{{ __('นามสกุล (TH)') }}</label>
                                <div class="@error('teacherLastnameTH') border border-danger rounded-3 @enderror">
                                    <input wire:model="teacherLastnameTH" class="form-control" type="text"
                                        placeholder="นามสกุล (TH)" id="teacherLastnameTH">
                                </div>
                                @error('teacherLastnameTH')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="teacherPrefixEN"
                                    class="form-control-label">{{ __('คำนำหน้า (EN)') }}</label>
                                <div class="@error('teacherPrefixEN') border border-danger rounded-3 @enderror">
                                    <select class="form-select" wire:model="teacherPrefixEN">
                                        <option value="">เลือกคำนำหน้า (EN)</option>
                                        @foreach ($prefixEN as $list_eng)
                                            <option value="{{ $list_eng->id }}">{{ $list_eng->md_prefixname_eng }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('teacherPrefixEN')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="teacherFirstnameEN"
                                    class="form-control-label">{{ __('ชื่อ (EN)') }}</label>
                                <div class="@error('teacherFirstnameEN') border border-danger rounded-3 @enderror">
                                    <input wire:model="teacherFirstnameEN" class="form-control" type="text"
                                        placeholder="ชื่อ (EN)" id="teacherFirstnameEN">
                                </div>
                                @error('teacherFirstnameEN')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="teacherLastnameEN"
                                    class="form-control-label">{{ __('นามสกุล (EN)') }}</label>
                                <div class="@error('teacherLastnameEN') border border-danger rounded-3 @enderror">
                                    <input wire:model="teacherLastnameEN" class="form-control" type="text"
                                        placeholder="นามสกุล (EN)" id="teacherLastnameEN">
                                </div>
                                @error('teacherLastnameEN')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit"
                            class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'บันทึก' }}</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('ตารางแสดงรายชื่ออาจารย์ที่ปรึกษา') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2 text-center">
                                            ลำดับ</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2 text-center">
                                            ชื่อ - สกุล (ไทย)</th>
                                        <th
                                            class="text-uppercase text-md font-weight-bolder opacity-7 ps-2 text-center">
                                            ชื่อ - สกุล (อังกฤษ)</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2 text-center">
                                            ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $index => $list)
                                        <tr>
                                            <td>
                                                <p class="text-md font-weight-bold mb-0 text-center">
                                                    {{ $index + 1 }}</p>
                                            </td>
                                            <td class="align-middle text-center text-md">
                                                <p class="text-md font-weight-bold mb-0">
                                                    {{ $list->ta_firstname_th . ' ' . $list->ta_lastname_th }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-md font-weight-bold">{{ $list->ta_firstname_en . ' ' . $list->ta_lastname_en }}</span>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit user"
                                                    wire:click="updateConfirm({{ $list->ta_id }})">
                                                    <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
                                                </a>
                                                <a class="mx-3"
                                                    wire:click="deleteConfirm({{ $list->ta_id }})">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">นำเข้าข้อมูลอาจารย์ที่ปรึกษา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card h-100">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="teacherFileImport"
                                            class="form-control-label">{{ __('ไฟล์นำเข้า') }}</label>
                                        <div
                                            class="@error('teacherFileImport') border border-danger rounded-3 @enderror">
                                            <input class="form-control" type="file" id="u1"
                                                wire:model="teacherFileImport">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="upload()" class="mb-0 btn btn-primary"
                        data-bs-dismiss="modal">Import</button>
                </div>

            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="modal-delete" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบข้อมูล</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card h-100">
                        <div class="card-body p-3">
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">ชื่อ -
                                        สกุล
                                        (ไทย) :</strong><span class="ms-3" id="ta_name_th"></span></li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">ชื่อ -
                                        สกุล
                                        (อังกฤษ) :</strong><span class="ms-3" id="ta_name_en"></span></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="delete()" class="mb-0 btn btn-primary"
                        data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('modal-delete', event => {
            const modalDelete = new bootstrap.Modal(document.getElementById('modal-delete'))
            modalDelete.show()

            const {
                teacher
            } = event.detail

            document.getElementById('ta_name_th').innerText = teacher.ta_firstname_th + " " + teacher.ta_lastname_th
            document.getElementById('ta_name_en').innerText = teacher.ta_firstname_en + " " + teacher.ta_lastname_en
        })

        window.addEventListener('modal-import', event => {
            const modalImport = new bootstrap.Modal(document.getElementById('modal-import'))
            modalImport.show()
        })
    </script>
@endpush
