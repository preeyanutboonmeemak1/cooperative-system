<div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-xs font-weight-bold mb-0 text-center">
                                        {{ $document[0]->d_name }}
                                    </th>
                                    <th class="text-xs font-weight-bold mb-0 text-center">
                                        {{ $document[1]->d_name }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="text-center">
                                        <?php if($document[0]->d_status == 0 ){ ?>
                                        <p class="text-xs font-weight-bold mb-0"> ไม่พบข้อมูล</p>
                                        <?php } else { ?>
                                        
                                        <img width="100" height="auto" src="/storage/photos/pdf.png" alt="cover image">
                                        
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($document[1]->d_status == 0){ ?>
                                        <p class="text-xs font-weight-bold mb-0"> ไม่พบข้อมูล</p>
                                        <?php } else { ?>
                                        
                                        <img width="100" height="auto" src="/storage/photos/pdf.png" alt="cover image">
                                        <?php } ?>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    
                        <table class="table align-items-center mb-0 text-center">
                            <thead>
                                <tr>
                                    <th class="text-xs font-weight-bold mb-0">
                                        ลำดับ
                                    </th>
                                   
                                    <th class="text-xs font-weight-bold mb-0" >
                                        เอกสาร
                                    </th>
                                    <th class="text-xs font-weight-bold mb-0">
                                        สถานะ
                                    </th>
                                    <th class="text-xs font-weight-bold mb-0">
                                        ดำเนินการ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($document as $index => $value)
                                    <tr>
                                        <td class="ps-4">
                                            <p class="text-xs font-weight-bold mb-0">{{ ++$index }}</p>
                                        </td>
                                       
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0" wire:key="{{ $value->index }}">
                                                {{ $value['d_name'] }}</p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            @if ($value['d_status'] == '0')
                                                <span
                                                    class="badge badge-sm bg-gradient-secondary">ยังไม่ดำเนินการ</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-success"> ส่งแล้ว</span>
                                            @endif
                                        </td>

                                        <td style="text-align: center;">
                                            <div class="dropdown">
                                                <a class="btn" href="#" role="button" id="dropdownMenuLink"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    . . .
                                                </a>
                                                <!--Edit-->
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <!--Uplode-->
                                                    <?php if($value['d_id'] == 1 && $value['d_status'] == 1){ ?>
                                                    {{-- <li>
                                                            <a href="ins00{{$index}}" class="mx-3" type="button"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Show report">
                                                                <span>
                                                                    <i class="fa-solid fas fa-eye text-secondary"
                                                                        aria-hidden="true">
                                                                        แก้ไขเอกสาร</i>
                                                                </span>
                                                            </a>
                                                        </li> --}}
                                                    <li>
                                                        <a class="mx-3" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#editModal"
                                                            wire:click="setId({{ $value->d_id }})">
                                                            <span style=>
                                                                <i class="fas fa-user-edit "
                                                                aria-hidden="true">
                                                                    แก้ไขเอกสาร</i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <?php } ?>

                                                    <?php if($value['d_status'] == 0 ){ ?>
                                                    <li>
                                                        <a class="mx-3" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            wire:click="setId({{ $value->d_id }})">
                                                            <span style=>
                                                                <i class="fas fa-arrow-up cursor-pointer"
                                                                    aria-hidden="true">
                                                                    นำเข้าเอกสาร</i>
                                                            </span>
                                                        </a>

                                                    </li>
                                                    <?php } ?>
                                                    <?php if($value['d_status'] == 1 ){ ?>
                                                    <li>
                                                        <a class="mx-3"
                                                            wire:click="export({{ $value->d_id }})">
                                                            <span style=>
                                                                <i class="fas fa-arrow-down cursor-pointer"
                                                                    aria-hidden="true">
                                                                    ดาวน์โหลดเอกสาร</i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <?php } ?>

                                                    <?php if($value['d_status'] == 1 ){ ?>
                                                    <li>
                                                        <a class="mx-3" type="button" data-bs-toggle="modal"
                                                            data-bs-target="#deleteDocModal"
                                                            wire:click="setId({{ $value->d_id }})">
                                                            <span style=>
                                                                <i class="cursor-pointer fas fa-trash "
                                                                    aria-hidden="true">
                                                                    ลบเอกสาร</i>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <?php } ?>

                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    
                </div>
            </div>
        </div>
    </div>

    {{--////////////////////////////////////////// นำเข้า //////////////////////////////////////--}}
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">นำเข้าเอกสาร</h5>
                   
                </div>
                <div class="modal-body">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" wire:model="d_file">
                        @error('doc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
                    <button type="button" wire:click.prevent="save" class="btn btn-success btn btn-lg btn-primary">SAVE</button>
                </div>
            </div>
        </div>
    </div>


    {{--///////////////////////////////// ลบ ////////////////////////////////////////////////--}}
    <div wire:ignore.self class="modal fade" id="deleteDocModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ลบเอกสาร</h5>
                    
                </div>
                <div class="modal-body">
                    คุณต้องการลบเอกสารหรือไม่
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }} 
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">CLOSE</button>
                    <button type="button" wire:click.prevent="del" class="btn btn-danger" 
                        data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ///////////////////////////////////////////////modal edit/////////////////////////////////////////////// -->
    <div wire:ignore.self class="modal fade " id="editModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลใบรับรองเพิ่มเติม</h5>
                </div>
                <!-- <form wire:submit.prevent="edit" method="POST" role="form text-left"  -->
                <!-- enctype="multipart/form-data"> -->
                <div class="modal-body">
                    <table width="100%">
                        <tr>
                            <td>
                                <div class="mb-10-row col-sm-15">
                                    <label for="2" class="form-label">หัวข้อโครงงาน</label>
                                </div>

                            </td>
                            <td colspan="2">

                                <div class="mb-2-row col-sm-15">
                                    <label for="1" class="form-label">ภาษาไทย</label>
                                    <div class="col-sm-30">
                                        <div class="@error('dd_name_th') border border-danger rounded-3 @enderror">
                                            <textarea wire:model="dd_name_th" class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                                        </div>
                                        @error('dd_name_th')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td colspan="2">
                                <div class="mb-8-row col-sm-15">
                                    <label for="2" class="form-label">ภาษาอังกฤษ</label>
                                    <div class="col-sm-30">
                                        <div class="@error('dd_name_en') border border-danger rounded-3 @enderror">
                                            <textarea class="form-control" wire:model="dd_name_en" id="exampleFormControlTextarea1" rows="2"></textarea>
                                        </div>
                                        @error('dd_name_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td> <label for="Th" class="form-label">อาจารย์ที่ปรึกษา</label>

                                <div class="@error('dd_teacher') border border-danger rounded-3 @enderror">
                                    <select class="form-select" aria-label="Default select example"
                                        wire:model="dd_teacher">
                                        <option <?php if ($dd_teacher == '') {
    echo 'selected';
} ?>>เลือก
                                        </option>
                                        @foreach ($teacher as $value)
                                            <option {{ $optionSelected = $dd_teacher }} value="{{ $value }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('dd_teacher')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>

                            <td> <label for="Th" class="form-label">อาจารย์ที่ปรึกษาร่วม</label>

                                <div class="@error('dd_teacher_co') border border-danger rounded-3 @enderror">
                                    <select class="form-select" aria-label="Default select example"
                                        wire:model="dd_teacher_co">
                                        <option <?php if ($dd_teacher_co == '') {
    echo 'selected';
} ?>>เลือก
                                        </option>
                                        @foreach ($teacher as $value)
                                            <option {{ $optionSelected = $dd_teacher_co }}
                                                value="{{ $value }}">
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('dd_teacher_co')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div>
                                    <label for="1" class="form-label">วันที่สอบ</label>
                                </div>
                                <div>

                                    <div class="@error('dd_exam_date') border border-danger rounded-3 @enderror">
                                        <input id="startDate" class="form-control" type="date"
                                            wire:model="dd_exam_date">
                                    </div>
                                    @error('dd_exam_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </td>
                            <td>
                                <div>
                                    <label for="2" class="form-label">วันที่อนุมัติ</label>
                                </div>
                                <div>
                                    <div class="@error('dd_confirm_date') border border-danger rounded-3 @enderror">
                                        <input id="startDate" class="form-control" type="date"
                                            wire:model="dd_confirm_date">
                                    </div>
                                    @error('dd_confirm_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CLOSE</button>
                    <button type="button" data-bs-dismiss="modal" wire:click="edit()"
                        class="btn btn-success btn btn-lg btn-primary">SAVE</button>
                    <!-- data-bs-dismiss="modal" -->
                </div>
                </form>
            </div>
        </div>
    </div>

</div>
