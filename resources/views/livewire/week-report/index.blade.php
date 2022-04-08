
<div>
    <div class="container-fluid py-4">
        <div class="card mt-2">
            <div class="card-header pb-0 px-3">

                <h4 class="mb-1">รายงานประจำสัปดาห์</h4>
                <div class="d-flex justify-content-end">
                    <button data-bs-toggle="modal" data-bs-target="#add-modal" type="button"
                        class="btn bg-gradient-info fa fa-plus"> เพิ่มรายงาน </button>
                </div>
            </div>

            <div class="card-body pt-4 p-3">
                <div class="row">
                    <div class="col-12">

                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        สัปดาห์ที่</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        รายงานประจำสัปดาห์</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ดำเนินการ
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($weekreport as $list)
                                <tr>
                                    <td>
                                        <p class="text-center text-xs font-weight-bold mb-0">{{$list->wr_week_id}}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{$list->wr_name}}</p>
                                    </td>

                                    <td style="text-align : center;">
                                        <div class="dropdown">
                                            <a class="btn" href="#" role="button" id="dropdownMenuLink"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                . . .
                                            </a>
                                            <!--Edit-->
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <li>
                                                    <a class="mx-3" type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit"
                                                        data-bs-original-title="Edit report" wire:click="updateConfirm({{ $list->wr_id }})">
                                                        <span>
                                                            <i class="fas fa-user-edit"
                                                                > แก้ไขชื่อรายงาน</i>
                                                        </span>
                                                    </a>

                                                </li>
                                                <!--delete-->
                                                <li>
                                                    <a class="mx-3" type="button" data-bs-toggle="modal" data-bs-target="#modal-delete" wire:click="deleteId({{ $list->wr_id }})">
                                                        <span>
                                                            <i class="cursor-pointer fas fa-trash"
                                                                aria-hidden="true">
                                                                ลบรายงาน</i>
                                                        </span>
                                                    </a>
                                                </li>
                                                <!--show-->
                                                <li>
                                                    <a href="dailyreport/{{$list->wr_id}}" class="mx-3" type="button"
                                                        data-bs-toggle="tooltip" data-bs-original-title="Show report">
                                                        <span>
                                                            <i class="fa-solid fas fa-eye"
                                                                aria-hidden="true">
                                                                แสดงรายงาน</i>
                                                        </span>
                                                    </a>
                                                </li>
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
    </div>

    <div wire:ignore.self class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขชื่อรายงานความก้าวหน้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form  wire:submit.prevent="update" method="POST" role="form text-left">
                    <div class="modal-body">
                        <div class="card h-100">
    
                            <ul class="list-group">
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm">
                                    <input wire:model="wr_name" class="form-control" type="text"
                                    placeholder="ชื่อรายงานความก้าวหน้าประจำสัปดาห์" id="namereport">
                                </li>
                            </ul>
                        
                        </div>
                        
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="mb-0 btn btn-success" >Save</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายงานความก้าวหน้า</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                     <form  wire:submit.prevent="save" action="#" method="POST" role="form text-left"> 
                        <div class="card h-100">
                            <input wire:model="wr_name" class="form-control" type="text"
                                placeholder="ชื่อรายงานความก้าวหน้าประจำสัปดาห์" id="namereport">
                               
                        </div>
                        
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="mb-0 btn btn-primary" >Add</button>
                </div>
                </form>
            </div>
        </div>

    </div>

    <div wire:ignore.self class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">ยืนยันการลบข้อมูล</h5>
                        </div>
                       <div class="modal-body">
                            <p>แน่ใจหรือว่าต้องการลบรายงานความก้าวหน้านี้ ?</p>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" wire:click.prevent="delete()" class="btn btn-danger" class="mb-0 btn btn-primary" data-bs-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>

</div>