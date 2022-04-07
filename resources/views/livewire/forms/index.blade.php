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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ลำดับ
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        index
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        แบบฟอร์ม
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        สถานะ
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                                {{ $value['fm_index'] }}</p>
                                        </td>
                                        <td class="text-left">
                                            <p class="text-xs font-weight-bold mb-0" wire:key="{{ $value->index }}">
                                                {{ $value['fm_name'] }}</p>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            @if ($value['fm_status'] == '0')
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
                                                    @if ($value['fm_status'] == '0')
                                                        <li>
                                                            <a href="ins00{{$index}}" class="mx-3" type="button"
                                                                data-bs-toggle="tooltip" data-bs-original-title="Show report">
                                                                <span>
                                                                    <i class="fa-solid fas fa-eye text-secondary"
                                                                        aria-hidden="true">
                                                                        แก้ไขเอกสาร</i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="mx-3" type="button"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                wire:click="setId({{ $value->fm_id }},'{{$value->fm_index}}')">
                                                                <span style=>
                                                                    <i class="fas fa-arrow-up cursor-pointer"
                                                                        aria-hidden="true">
                                                                        นำเข้าเอกสา</i>
                                                                </span>
                                                            </a>

                                                        </li>
                                                    @else
                                                        <li>
                                                            <a class="mx-3" wire:click="downloadDoc({{ $value->fm_id }})">
                                                                <span style=>
                                                                    <i class="fas fa-arrow-up cursor-pointer"
                                                                        aria-hidden="true">
                                                                        ดาวน์โหลด</i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="mx-3" type="button"
                                                                data-bs-toggle="modal" data-bs-target="#deleteDocModal"
                                                                wire:click="setId({{ $value->fm_id }},'{{$value->fm_index}}')">
                                                                <span style=>
                                                                    <i class="fas fa-arrow-up cursor-pointer"
                                                                        aria-hidden="true">
                                                                        ลบ</i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="mx-3" type="button"
                                                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                                wire:click="setId({{ $value->fm_id }},'{{$value->fm_index}}')">
                                                                <span style=>
                                                                    <i class="fas fa-arrow-up cursor-pointer"
                                                                        aria-hidden="true">
                                                                        แก้ไขเอกสาร</i>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    @endif
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
    {{-- Upload Doc --}}
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$headModal}}</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
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
                        <input type="file" class="form-control" wire:model="doc">
                        @error('doc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="uploadDoc" class="btn btn-primary close-modal"
                        data-bs-dismiss="modal">Save
                        changes</button>
                </div>
            </div>
        </div>
    </div>


    {{-- Delete Doc --}}
    <div wire:ignore.self class="modal fade" id="deleteDocModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ลบเอกสาร</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true close-btn">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click.prevent="deleteDoc" class="btn btn-primary close-modal"
                        data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>
