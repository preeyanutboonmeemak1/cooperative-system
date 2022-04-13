<main>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="studentClassYear"
                                        class="form-control-label">{{ __('ปีการศึกษา') }}</label>
                                    <div>
                                        <select class="form-select" wire:model="studentClassYear">
                                            <option value="">เลือกปีการศึกษา</option>
                                            @foreach ($yearClass as $list_year)
                                                <option value="{{ $list_year->id }}">
                                                    {{ $list_year->md_year_class }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentFaculty" class="form-control-label">{{ __('คณะ') }}</label>
                                    <div>
                                        <select class="form-select" wire:model="studentFaculty">
                                            <option value="">เลือกคณะ</option>
                                            @foreach ($facultyList as $faculty)
                                                <option value="{{ $faculty->id }}">
                                                    {{ $faculty->md_faculty }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="studentNumber" class="form-control-label">{{ __('สาขาวิชา') }}</label>
                                    <div class="">
                                        <select class="form-select" wire:model="studentField">
                                            <option value="">เลือกสาขาวิชา</option>
                                            @foreach ($fieldeList as $field)
                                                <option value="{{ $field->id }}">
                                                    {{ $field->md_field }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                        จำนวนนิสิตทั้งหมดที่สหกิจศึกษา</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $allStudents->count() }}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                        จำนวนนิสิตที่ผ่านการสหกิจศึกษา</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $allPassStudent->count() }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-success shadow text-center border-radius-md">
                                    <i class="fa fa-user text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>จำนวนนิสิตที่สหกิจศึกษาจำแนกตามสถานประกอบการ</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 text-center">
                                            สถานประกอบการ</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 text-center">
                                            จำนวนนิสิต</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($listCompanies->count() > 0)
                                        @foreach ($listCompanies as $list)
                                            <tr>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-md font-weight-bold text-center">{{ $list->cp_name_th }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-md font-weight-bold text-center">{{ $list->student_count }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="align-middle text-center text-sm" colspan="2">
                                                <span class="text-md font-weight-bold text-center">ไม่พบข้อมูล
                                                </span>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-md-6">
                                <h6>จำนวนนิสิตที่สหกิจศึกษาจำแนกตามอาจารย์ที่ปรึกษา</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 text-center">
                                            อาจารย์ที่ปรึกษา</th>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 text-center">
                                            จำนวนนิสิต</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($listTeachers->count() > 0)
                                        @foreach ($listTeachers as $list)
                                            <tr>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-md font-weight-bold text-center">{{ $list->ta_firstname_th . ' ' . $list->ta_lastname_th }}
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="text-md font-weight-bold text-center">{{ $list->student_count }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td class="align-middle text-center text-sm" colspan="2">
                                                <span class="text-md font-weight-bold text-center">ไม่พบข้อมูล
                                                </span>
                                            </td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
