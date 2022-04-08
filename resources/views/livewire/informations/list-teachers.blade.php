<div>
    <div class="container-fluid py-4">
        <div class="card mt-2">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('ตารางแสดงรายชื่ออาจารย์') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                            ลำดับ</th>                                       
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                            ชื่อ - สกุล (ไทย)</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                            ชื่อ - สกุล (อังกฤษ)</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $index => $list)
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0 text-center">{{$index+1}}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <p class="text-xs font-weight-bold mb-0">
                                                {{$list->ta_firstname_th.' '.$list->ta_lastname_th}}
                                            </p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{$list->ta_firstname_en.' '.$list->ta_lastname_en}}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('informations', $list->ta_id) }}" class="mx-3" data-bs-toggle="tooltip" 
                                                data-bs-original-title="Edit user">
                                                <i class="fas fa-user-edit text-secondary" aria-hidden="true"></i>
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
</div>