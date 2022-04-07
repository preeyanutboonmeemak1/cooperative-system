<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">{{ __('จับคู่อาจารย์ที่ปรึกษากับนิสิต') }}</h5>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="card">
                    <div class="d-flex flex-column mx-3 mt-3">
                        <div class="d-flex flex-row justify-content-between">
                            <div>
                                <h5 class="mb-0">รายชื่อข้อมูลนิสิตในที่ปรึกษา</h5>
                            </div>
                            <button class="btn bg-gradient-primary btn-sm mb-0" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+&nbsp; เพิ่มรายชื่อนิสิต</button>
                        </div>
                        <div class="d-flex flex-row">
                            <div class="form-group">
                                <label for="designation">ที่ปรึกษา</label>
                                <select id="designation" name="designation" class="form-control">
                                    <option value="" disabled selected>--- เลือกที่ปรึกษา ---</option>
                                    @foreach($teachers as $list_teachers)
                                    <option value="{{$list_teachers->ta_id}}">{{$list_teachers->ta_firstname_th}} {{$list_teachers->ta_lastname_th}}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="YearsClass" class="form-control-label">{{ __('ปีการศึกษา') }}</label>
                                <select id="designation" name="designation" class="form-control">
                                    <option value="" disabled selected>--- เลือกปี พ.ศ. ---</option>
                                    @foreach($yearclass as $list_yearclass)
                                    <option value="{{$list_yearclass->id}}">{{$list_yearclass->md_year_class}}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="faculty">คณะ</label>
                                <select id="designation" name="designation" class="form-control">
                                    <option value="" disabled selected>--- เลือกคณะ ---</option>
                                    @foreach($faculty as $list_faculty)
                                    <option value="{{$list_faculty->id}}">{{$list_faculty->md_faculty}}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;
                            <div class="form-group">
                                <label for="designation">หลักสูตรการศึกษา</label>
                                <select id="designation" name="designation" class="form-control">
                                    <option value="" disabled selected>--- เลือกหลักสูตรการศึกษา ---</option>
                                    @foreach($course as $list_course)
                                    <option value="{{$list_course->id}}">{{$list_course->md_course}}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;&nbsp;&nbsp;
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'ค้นหา' }}</button>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <div class="d-flex mt-3 align-items-center justify-content-center">
                                <p class="text-secondary pt-2">Show&nbsp;&nbsp;</p>
                                <select wire:model="perPage" class="form-control" id="entries">
                                    <option value="5">5</option>
                                    <option selected="" value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                </select>
                                <p class="text-secondary pt-2">&nbsp;&nbsp;entries</p>
                            </div>
                            <div class="mt-3 ">
                                <input wire:model="search" type="text" class="form-control" placeholder="Search..." onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mx-3">
                        <table class="table table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th style="padding: 0.75rem 0.5rem">
                                        <a wire:click="sortBy('id')" class="text-xs text-secondary text-uppercase">
                                            <span>ลำดับ</span>

                                            <span>
                                                <i class="fas fa-sort-up cursor-pointer" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem">
                                        <span class="text-xs text-secondary text-uppercase">รหัสนิสิต</span>

                                        <span>
                                            <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                        </span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem">
                                        <a wire:click="sortBy('first_name')">
                                            <span class="text-xs text-secondary text-uppercase">ชื่อ-นามสกุล</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                            </span>
                                        </a>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem">
                                        <span class="text-xs text-secondary text-uppercase">คณะ</span>

                                        <span>
                                            <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                        </span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem">
                                        <span class="text-xs text-secondary text-uppercase">หลักสูตรการศึกษา</span>

                                        <span>
                                            <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                        </span>
                                    </th>
                                    <th style="padding: 0.75rem 0.5rem">
                                        <span class="text-xs text-secondary text-uppercase">ดำเนินการ</span>

                                        <span>
                                            <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                        </span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($Student as $list_Student)
                                <tr>
                                    <td class="text-xs font-weight-bold align-middle">
                                        <span class="my-2 text-xs">{{$list_Student->st_id}}</span>
                                    </td>
                                    <td class="text-xs font-weight-bold align-middle">
                                        <span class="my-2 text-xs">{{$list_Student->st_st_num}}</span>
                                    </td>
                                    <td class="text-xs font-weight-bold align-middle">
                                        <span class="my-2 text-xs">{{$list_Student->st_name}}</span>
                                    </td>
                                    <td class="text-xs font-weight-bold align-middle">
                                        <span class="my-2 text-xs">{{$list_Student->md_faculty}}</span>
                                    </td>
                                    <td class="text-xs font-weight-bold align-middle">
                                        <span class="my-2 text-xs">{{$list_Student->md_course}}</span>
                                    </td>
                                    <td>
                                        <a href="#de" class="mx-3" type="button" wire:click="delete({{$list_Student->st_id}})" data-bs-toggle="modal" data-bs-target="#de" data-bs-original-title="Edit user">
                                            <span>
                                                <i class="cursor-pointer fas fa-trash text-secondary">ลบ</i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="datatable-bottom">
                        <div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายชื่อนิสิต</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive mx-3">
                            <table class="table table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <a wire:click="sortBy('id')" class="text-xs text-secondary text-uppercase">
                                                <span>ลำดับ</span>

                                                <span>
                                                    <i class="fas fa-sort-up cursor-pointer" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <span class="text-xs text-secondary text-uppercase">รหัสนิสิต</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                            </span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <a wire:click="sortBy('first_name')">
                                                <span class="text-xs text-secondary text-uppercase">ชื่อ-นามสกุล</span>

                                                <span>
                                                    <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                                </span>
                                            </a>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <span class="text-xs text-secondary text-uppercase">คณะ</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                            </span>
                                        </th>
                                        <th style="padding: 0.75rem 0.5rem">
                                            <span class="text-xs text-secondary text-uppercase">หลักสูตรการศึกษา</span>

                                            <span>
                                                <i class="fas fa-sort cursor-pointer" aria-hidden="true"></i>
                                            </span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $list_students)
                                    <tr>
                                        <td class="text-xs font-weight-bold align-middle">
                                            <span class="my-2 text-xs">{{$list_students->si_id}}</span>
                                        </td>
                                        <td class="text-xs font-weight-bold align-middle">
                                            <span class="my-2 text-xs">{{$list_students->si_st_num}}</span>
                                        </td>
                                        <td class="text-xs font-weight-bold align-middle">
                                            <span class="my-2 text-xs">{{$list_students->si_firstname_th}} {{$list_students->si_lastname_th}}</span>
                                        </td>
                                        <td class="text-xs font-weight-bold align-middle">
                                            <span class="my-2 text-xs">{{$list_students->si_md_faculty_id}}</span>
                                        </td>
                                        <td class="text-xs font-weight-bold align-middle">
                                            <span class="my-2 text-xs">{{$list_students->si_md_course_id}}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </div>