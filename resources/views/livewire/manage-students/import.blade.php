<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0 px-3 d-flex justify-content-between">
                    <h6 class="mb-0">{{ __('ตารางนำเข้ารายชื่อนิสิต') }}</h6>
                    <div>
                        <button type="button" class="btn btn-secondary" wire:click="back()">ย้อนกลับ</button>
                        <button type="button" class="btn bg-gradient-dark" wire:click="import()">นำเข้าข้อมูล</button>
                    </div>

                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-md">
                                        <div class="form-check mb-0 d-flex justify-content-center">
                                            <input class="form-check-input" type="checkbox" id="select-all" />
                                        </div>
                                    </th>
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $index => $list)
                                    <tr>
                                        <td class="align-middle text-center text-md">
                                            <div class="form-check mb-0 d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model="selectStudent" name="select-student"
                                                    value="{{ $list->is_id }}" />
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-md">
                                            <p class="text-md font-weight-bold mb-0">{{ $index + 1 }}</p>
                                        </td>
                                        <td class="align-middle text-center text-md">
                                            <p class="text-md font-weight-bold mb-0">{{ $list->is_st_num }}</p>
                                        </td>
                                        <td class="align-middle text-center text-md">
                                            <p class="text-md font-weight-bold mb-0">
                                                {{ $list->is_firstname_th . ' ' . $list->is_lastname_th }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-md font-weight-bold">{{ $list->is_firstname_en . ' ' . $list->is_lastname_en }}</span>
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

@push('scripts')
    <script>
        document.getElementById('select-all').onclick = function() {
            var checkboxes = document.getElementsByName('select-student');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
@endpush
