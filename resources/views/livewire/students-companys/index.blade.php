<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">{{ __('จับคู่ระหว่างสถานประกอบการ ที่ปรึกษาและนิสิต') }}</h5>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="card">
                    <div class="d-flex flex-column mx-3 mt-3">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">รายชื่อข้อมูลนิสิตในสถานประกอบการและที่ปรึกษา</h5>
                            </div>
                            
                            <button class="btn bg-gradient-info btn-sm mb-0" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" id="add" <?php if ($check == 0) {
                                    echo 'disabled';
                                } ?>>+&nbsp;
                                เพิ่มรายชื่อนิสิต</button>
                        </div>
                        <br>
                        <div class="d-flex flex-row">
                            <div class="form-group">
                                <label for="designation">สถานประกอบการ</label>
                                <select id="companys" name="companys" class="form-control" wire:model="co">
                                    <option value="0" selected class="text-center">--- เลือกสถานประกอบการ ---</option>
                                    @foreach ($companys as $list_companys)
                                        <option value="{{ $list_companys->cp_id }}">
                                            {{ $list_companys->cp_name_en }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="designation">ที่ปรึกษา</label>
                                <select id="teachers" name="teachers" class="form-control" wire:model="t">
                                    <option value="0" selected class="text-center">--- เลือกที่ปรึกษา ---</option>
                                    @foreach ($teachers as $list_teachers)
                                        <option value="{{ $list_teachers->ta_id }}">
                                            {{ $list_teachers->ta_firstname_th }}
                                            {{ $list_teachers->ta_lastname_th }}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="YearsClass" class="form-control-label">{{ __('ปีการศึกษา') }}</label>
                                <select id="yearclass" name="yearclass" class="form-control" wire:model="y">
                                    <option value="0" selected class="text-center">--- เลือกปี พ.ศ. ---</option>
                                    @foreach ($yearclass as $list_yearclass)
                                        <option value="{{ $list_yearclass->id }}">
                                            {{ $list_yearclass->md_year_class }}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="faculty">คณะ</label>
                                <select id="faculty" name="faculty" class="form-control" wire:model="f">
                                    <option value="0" selected class="text-center">--- เลือกคณะ ---</option>
                                    @foreach ($faculty as $list_faculty)
                                        <option value="{{ $list_faculty->id }}">{{ $list_faculty->md_faculty }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="designation">หลักสูตรการศึกษา</label>
                                <select id="course" name="course" class="form-control" wire:model="c">
                                    <option value="0" selected class="text-center">--- เลือกหลักสูตรการศึกษา ---</option>
                                    @foreach ($course as $list_course)
                                        <option value="{{ $list_course->id }}">{{ $list_course->md_course }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;&nbsp;&nbsp;
                        </div>

                        <div class="table-responsive mx-3">
                            <table class="table table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <a class="text-xs text-secondary text-uppercase">
                                                <span>ลำดับ</span>
                                            </a>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <span class="text-xs text-secondary text-uppercase">รหัสนิสิต</span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <a>
                                                <span class="text-xs text-secondary text-uppercase">ชื่อ-นามสกุล</span>
                                            </a>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <span class="text-xs text-secondary text-uppercase">คณะ</span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <span class="text-xs text-secondary text-uppercase">หลักสูตรการศึกษา</span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <span class="text-xs text-secondary text-uppercase">ดำเนินการ</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($Companys as $list_students)
                                        <tr>
                                            <td class="text-xs font-weight-bold align-middle">
                                                <span class="my-2 text-xs">{{ $i++ }}</span>
                                            </td>
                                            <td class="text-xs font-weight-bold align-middle">
                                                <span class="my-2 text-xs">{{ $list_students->si_st_num }}</span>
                                            </td>
                                            <td class="text-xs font-weight-bold align-middle">
                                                <span class="my-2 text-xs">{{ $list_students->md_prefixname_th }}{{ $list_students->si_firstname_th }}
                                                    {{ $list_students->si_lastname_th }}</span>
                                            </td>
                                            <td class="text-xs font-weight-bold align-middle">
                                                <span class="my-2 text-xs">{{ $list_students->md_faculty }}</span>
                                            </td>
                                            <td class="text-xs font-weight-bold align-middle">
                                                <span class="my-2 text-xs">{{ $list_students->md_course }}</span>
                                            </td>

                                            <td>
                                                <a href="#de" class="mx-3" type="button"
                                                    wire:click="delete({{ $list_students->si_id }})"
                                                    data-bs-toggle="modal" data-bs-target="#de">
                                                    <span>
                                                        <i class="cursor-pointer fas fa-trash text-secondary">
                                                            ลบ</i>
                                                    </span>
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

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายชื่อนิสิต</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive mx-3">
                                <table class="table table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th style="padding: 0.75rem 0.5rem">
                                                <span>

                                                </span>
                                            </th>
                                            <th style="padding: 0.75rem 0.5rem">
                                                <a class="text-xs text-secondary text-uppercase">
                                                    <span>ลำดับ</span>
                                            </th>
                                            <th style="padding: 0.75rem 0.5rem">
                                                <span class="text-xs text-secondary text-uppercase">รหัสนิสิต</span>
                                            </th>
                                            <th style="padding: 0.75rem 0.5rem">

                                                <span class="text-xs text-secondary text-uppercase">ชื่อ-นามสกุล</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach ($Companys2 as $list_students)
                                            <tr>
                                                <td>
                                                    <label class="form-label">
                                                        <input type="checkbox" id="checkbox"
                                                            wire:model.defer="selectedUsers" class=""
                                                            name="checkbox[]" value="{{ $list_students->si_id }}"
                                                            required> <span class="label"></span>
                                                    </label>
                                                </td>
                                                <td class="text-xs font-weight-bold align-middle">
                                                    <span class="my-2 text-xs">{{ $i++ }}</span>
                                                </td>
                                                <td class="text-xs font-weight-bold align-middle">
                                                    <span
                                                        class="my-2 text-xs">{{ $list_students->si_st_num }}</span>
                                                </td>
                                                <td class="text-xs font-weight-bold align-middle">
                                                    <span
                                                        class="my-2 text-xs">{{ $list_students->si_firstname_th }}
                                                        {{ $list_students->si_lastname_th }}</span>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <button type="button" data-bs-dismiss="modal" wire:click="save()"
                                class="btn btn-success">บันทึก</button>
                        </div>
                    </div>
                </div>
            </div>
