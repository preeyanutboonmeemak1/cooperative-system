<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3 d-flex justify-content-between">
                <h6 class="mb-0">{{ __('เพิ่มข้อมูลนิสิต') }}</h6>
                <button type="button" class="btn bg-gradient-dark btn-md" wire:click="import()">นำเข้าข้อมูล</button>
            </div>
            <div class="card-body p-3">
                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="studentNumber" class="form-control-label">{{ __('รหัสนิสิต') }}</label>
                                <div class="@error('studentNumber') border border-danger rounded-3 @enderror">
                                    <input wire:model="studentNumber" class="form-control" type="text"
                                        placeholder="รหัสนิสิต" id="user-name">
                                </div>
                                @error('studentNumber')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="studentPrefixTH"
                                    class="form-control-label">{{ __('คำนำหน้า (TH)') }}</label>

                                <div class="@error('studentPrefixTH') border border-danger rounded-3 @enderror">
                                    <select class="form-select" wire:model="studentPrefixTH">
                                        <option value="">เลือกคำนำหน้า (TH)</option>
                                        @foreach ($prefixTH as $list_th)
                                            <option value="{{ $list_th->id }}">{{ $list_th->md_prefixname_th }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('studentPrefixTH')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="studentFirstNameTH"
                                    class="form-control-label">{{ __('ชื่อ (TH)') }}</label>
                                <div class="@error('studentFirstNameTH') border border-danger rounded-3 @enderror">
                                    <input wire:model="studentFirstNameTH" class="form-control" type="text"
                                        placeholder="ชื่อ (TH)" id="user-email">
                                </div>
                                @error('studentFirstNameTH')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="studentLastNameTH"
                                    class="form-control-label">{{ __('นามสกุล (TH)') }}</label>
                                <div class="@error('studentLastNameTH') border border-danger rounded-3 @enderror">
                                    <input wire:model="studentLastNameTH" class="form-control" type="text"
                                        placeholder="นามสกุล (TH)" id="phone">
                                </div>
                                @error('studentLastNameTH')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="studentPrefixEN"
                                    class="form-control-label">{{ __('คำนำหน้า (EN)') }}</label>
                                <div class="@error('studentPrefixEN') border border-danger rounded-3 @enderror">
                                    <select class="form-select" wire:model="studentPrefixEN">
                                        <option value="">เลือกคำนำหน้า (EN)</option>
                                        @foreach ($prefixEN as $list_eng)
                                            <option value="{{ $list_eng->id }}">{{ $list_eng->md_prefixname_eng }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('studentPrefixEN')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="studentFirstNameEN"
                                    class="form-control-label">{{ __('ชื่อ (EN)') }}</label>
                                <div class="@error('studentFirstNameEN') border border-danger rounded-3 @enderror">
                                    <input wire:model="studentFirstNameEN" class="form-control" type="text"
                                        placeholder="ชื่อ (EN)" id="user-email">
                                </div>
                                @error('studentFirstNameEN')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="studentLastNameEN"
                                    class="form-control-label">{{ __('นามสกุล (EN)') }}</label>
                                <div class="@error('studentLastNameEN') border border-danger rounded-3 @enderror">
                                    <input wire:model="studentLastNameEN" class="form-control" type="text"
                                        placeholder="นามสกุล (EN)" id="phone">
                                </div>
                                @error('studentLastNameEN')
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
                <h6 class="mb-0">{{ __('ตารางแสดงรายชื่อนิสิต') }}</h6>
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
                                            รหัสนิสิต</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2 text-center">
                                            ชื่อ - สกุล (ไทย)</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2 text-center">
                                            ชื่อ - สกุล (อังกฤษ)</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2 text-center">
                                            ดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($students->count() > 0)
                                        @foreach ($students as $index => $list)
                                            <tr>
                                                <td>
                                                    <p class="text-md font-weight-bold mb-0 text-center">
                                                        {{ $index + 1 }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-md font-weight-bold mb-0 text-center">
                                                        {{ $list->si_st_num }}</p>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <p class="text-md font-weight-bold mb-0">
                                                        {{ $list->si_firstname_th . ' ' . $list->si_lastname_th }}
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-md font-weight-bold">{{ $list->si_firstname_en . ' ' . $list->si_lastname_en }}</span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                        data-bs-original-title="Edit user"
                                                        wire:click="updateConfirm({{ $list->si_id }})">
                                                        <i class="fas fa-user-edit text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                    <a class="mx-3"
                                                        wire:click="deleteConfirm({{ $list->si_id }})">
                                                        <i class="cursor-pointer fas fa-trash text-secondary"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                    @endif
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
                    <h5 class="modal-title" id="exampleModalLabel">นำเข้าข้อมูลนิสิต</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card h-100">
                        <div class="card-body p-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="studentFileImport"
                                            class="form-control-label">{{ __('ไฟล์นำเข้า') }}</label>
                                        <div
                                            class="@error('studentFileImport') border border-danger rounded-3 @enderror">
                                            <input class="form-control" type="file" id="u1"
                                                wire:model="studentFileImport">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" wire:click="upload()" class="mb-0 btn btn-primary"
                        data-bs-dismiss="modal">นำเข้าข้อมูล</button>
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
                                        class="text-dark">รหัสนิสิต
                                        :</strong><span class="ms-3" id="si_number"></span>
                                </li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">ชื่อ -
                                        สกุล
                                        (ไทย) :</strong><span class="ms-3" id="si_name_th"></span></li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">ชื่อ -
                                        สกุล
                                        (อังกฤษ) :</strong><span class="ms-3" id="si_name_en"></span></li>
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
                student
            } = event.detail

            document.getElementById('si_number').innerText = student.si_st_num
            document.getElementById('si_name_th').innerText = student.si_firstname_th + " " + student.si_lastname_th
            document.getElementById('si_name_en').innerText = student.si_firstname_en + " " + student.si_lastname_en
        })

        window.addEventListener('modal-import', event => {
            const modalImport = new bootstrap.Modal(document.getElementById('modal-import'))
            modalImport.show()

            const {
                year_class
            } = event.detail
        })
    </script>
@endpush
