<div>
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0 px-3 d-flex justify-content-between">
                    <h6 class="mb-0">{{ __('ตารางนำเข้ารายชื่ออาจารย์ที่ปรึกษา') }}</h6>
                    <div>
                        <button type="button" class="btn btn-secondary" wire:click="">ย้อนกลับ</button>
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
                                        ชื่อ - สกุล (ไทย)</th>
                                    <th
                                        class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 ps-2 text-center">
                                        ชื่อ - สกุล (อังกฤษ)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teachers as $index => $list)
                                    <tr>
                                        <td class="align-middle text-center text-md">
                                            <div class="form-check mb-0 d-flex justify-content-center">
                                                <input class="form-check-input" type="checkbox"
                                                    wire:model="selectTeacher" name="select-teacher"
                                                    value="{{ $list->it_id }}" />
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-md">
                                            <p class="text-md font-weight-bold mb-0">{{ $index + 1 }}</p>
                                        </td>
                                        <td class="align-middle text-center text-md">
                                            <p class="text-md font-weight-bold mb-0">
                                                {{ $list->it_firstname_th . ' ' . $list->it_lastname_th }}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-md font-weight-bold">{{ $list->it_firstname_en . ' ' . $list->it_lastname_en }}</span>
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
            var checkboxes = document.getElementsByName('select-teacher');
            for (var checkbox of checkboxes) {
                checkbox.checked = this.checked;
            }
        }
    </script>
@endpush
