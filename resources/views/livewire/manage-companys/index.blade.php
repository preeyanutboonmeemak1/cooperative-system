<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">
                    {{ __('เพิ่มข้อมูลสถานประกอบการ') }}
                </h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form wire:submit.prevent="save" action="#" method="POST" role="form text-left">
                    <h6 class="mb-2">
                        {{ __('ข้อมูลสถานประกอบการ') }}
                    </h6>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cp_name_th"
                                    class="form-control-label">{{ __('ชื่อสถานประกอบการ (TH)') }}</label>
                                <div class="@error('cp_name_th') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_name_th" class="form-control" type="text"
                                        placeholder="ชื่อสถานประกอบการ (TH)" id="cp_name_th">
                                </div>

                                @error('cp_name_th')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cp_name_en"
                                    class="form-control-label">{{ __('ชื่อสถานประกอบการ (EN)') }}</label>
                                <div class="@error('cp_name_en') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_name_en" class="form-control" type="text"
                                        placeholder="ชื่อสถานประกอบการ (EN)" id="cp_name_en">
                                </div>
                                @error('cp_name_en')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <h6 class="mb-2">
                        {{ __('ที่ตั้งสถานประกอบการ') }}
                    </h6>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="cp_address_no" class="form-control-label">{{ __('เลขที่') }}</label>
                                <div class="@error('cp_address_no') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_address_no" class="form-control" type="text"
                                        placeholder="เลขที่" id="cp_address_no">
                                </div>
                                @error('cp_address_no')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cp_address_moo" class="form-control-label">{{ __('หมู่') }}</label>
                                <div class="@error('cp_address_moo') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_address_moo" class="form-control" type="text"
                                        placeholder="หมู่" id="cp_address_moo">
                                </div>
                                @error('cp_address_moo')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="cp_address_soy" class="form-control-label">{{ __('ซอย') }}</label>
                                <div class="@error('cp_address_soy') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_address_soy" class="form-control" type="text"
                                        placeholder="ซอย" id="cp_address_soy">
                                </div>
                                @error('cp_address_soy')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="cp_address_road" class="form-control-label">{{ __('ถนน') }}</label>
                                <div class="@error('cp_address_road') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_address_road" class="form-control" type="text"
                                        placeholder="ถนน" id="cp_address_road">
                                </div>
                                @error('cp_address_road')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cp_address_sub_district"
                                    class="form-control-label">{{ __('ตำบล/แขวง') }}</label>
                                <div class="@error('cp_address_sub_district') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_address_sub_district" class="form-control" type="text"
                                        placeholder="ตำบล/แขวง" id="cp_address_sub_district">
                                </div>
                                @error('cp_address_sub_district')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cp_address_district"
                                    class="form-control-label">{{ __('อำเภอ/เขต') }}</label>
                                <div class="@error('cp_address_district') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_address_district" class="form-control" type="text"
                                        placeholder="อำเภอ/เขต" id="cp_address_district">
                                </div>
                                @error('cp_address_district')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cp_address_province"
                                    class="form-control-label">{{ __('จังหวัด') }}</label>
                                <div class="@error('cp_address_province') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_address_province" class="form-control" type="text"
                                        placeholder="จังหวัด" id="cp_address_province">
                                </div>
                                @error('cp_address_province')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cp_address_zipcode"
                                    class="form-control-label">{{ __('รหัสไปรษณีย์') }}</label>
                                <div class="@error('cp_address_zipcode') border border-danger rounded-3 @enderror">
                                    <input wire:model="cp_address_zipcode" class="form-control" type="text"
                                        placeholder="รหัสไปรษณีย์" id="cp_address_zipcode">
                                </div>
                                @error('cp_address_zipcode')
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
                <h6 class="mb-0">
                    {{ __('ตารางแสดงรายชื่อสถานประกอบการ') }}
                </h6>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-md font-weight-bolder opacity-7 text-center">
                                            ลำดับ</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                            ชื่อสถานประกอบการ</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-md font-weight-bolder opacity-7">
                                            ที่ตั้งสถานประกอบการ</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($companys as $index => $list_cp)
                                        <tr>
                                            <td>
                                                <p class="text-md font-weight-bold mb-0 text-center">
                                                    {{ $index + 1 }}</p>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-md">{{ $list_cp->cp_name_th }}</h6>
                                                        <p class="text-md text-secondary mb-0">
                                                            {{ $list_cp->cp_name_en }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-md">
                                                <p class="text-md font-weight-bold mb-0">
                                                    {{ $list_cp->cp_address_no .' ' .$list_cp->cp_address_moo .' ' .$list_cp->cp_address_soy .' ' .$list_cp->cp_address_road .' ' .$list_cp->cp_address_sub_district .' ' .$list_cp->cp_address_district .' ' .$list_cp->cp_address_province .' ' .$list_cp->cp_address_zipcode }}
                                                </p>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit user"
                                                    wire:click="updateConfirm({{ $list_cp->cp_id }})">
                                                    <i class="fas fa-edit text-secondary" aria-hidden="true"></i>
                                                </a>
                                                <a href="#" class="mx-3" data-bs-toggle="tooltip"
                                                    data-bs-original-title="Edit Location"
                                                    wire:click="updateLocation({{ $list_cp->cp_id }})">
                                                    <i class="fas fa-home text-secondary" aria-hidden="true"></i>
                                                </a>
                                                <a class="mx-3"
                                                    wire:click="deleteConfirm({{ $list_cp->cp_id }})">
                                                    <i class="cursor-pointer fas fa-trash text-secondary"
                                                        aria-hidden="true"></i>
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
                                        class="text-dark">ชื่อสถานประกอบการ (ไทย)
                                        :</strong><span class="ms-3" id="span_cp_name_th"></span>
                                </li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">ชื่อสถานประกอบการ (อังกฤษ)
                                        :</strong><span class="ms-3" id="span_cp_name_en"></span>
                                </li>
                                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                        class="text-dark">ที่ตั้งสถานประกอบการ
                                        :</strong><span class="ms-3" id="cp_address"></span>
                                </li>
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

    <div wire:ignore.self class="modal fade" id="modal-location" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" style="max-width: 1200px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลที่ตั้งสถานประกอบการ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card h-100">
                        <div class="card-body p-3">
                            <h6 class="mb-2">
                                {{ __('ตำแหน่งที่ตั้งสถานประกอบการ') }}
                            </h6>

                            <div class="container-fluid px-0">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input id="cp_location" wire:ignore.self class="form-control" type="text"
                                            placeholder="Search Box" />
                                        <input id="cp_lat_hide" type="hidden" wire:model="cp_address_latitude" />
                                        <input id="cp_lng_hide" type="hidden" wire:model="cp_address_longitude" />
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn bg-gradient-dark btn-md"
                                            id="button-search">{{ 'Search' }}</button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="map" wire:ignore style="height: 400px; width: 100%;"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="mb-0 btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" wire:click="updateLocationById()" class="mb-0 btn btn-success"
                        data-bs-dismiss="modal">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initialize">
    </script>
    <script>
        document.addEventListener('livewire:load', function() {
            console.log(1)
        })
    </script>
    <script>
        var searchBox, map, geocoder, location;

        function processPlacesSearch() {
            var places = searchBox.getPlaces();
        }

        function processButtonSearch(location) {
            geocoder = new google.maps.Geocoder();
            geocoder.geocode({
                'address': location
            }, function(results, status) {
                if (status == 'OK') {
                    const locations = results[0].geometry.location
                    document.getElementById('cp_lat_hide').value = locations.lat()
                    document.getElementById('cp_lng_hide').value = locations.lng()

                    Livewire.emit('getLatitudeForInput', locations.lat());
                    Livewire.emit('getLongitudeForInput', locations.lng());
                    map.setCenter(locations);
                    var marker = new google.maps.Marker({
                        map: map,
                        position: locations
                    });
                } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                }
            });
        }

        function initialize() {
            console.log(2)
            console.log(document.getElementById('cp_lat_hide').value)
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -33.8688,
                    lng: 151.2195
                },
                zoom: 13,
                mapTypeId: "roadmap",
            });
            searchBox = new google.maps.places.SearchBox(document.getElementById('cp_location'));
            google.maps.event.addListener(searchBox, 'places_changed', processPlacesSearch);
        }



        var button = document.getElementById('button-search');
        var searchbox = document.getElementById('cp_location');

        button.onclick = function() {
            var location = searchbox.value;
            processButtonSearch(location);
        }

        window.addEventListener('modal-delete', event => {
            const modalDelete = new bootstrap.Modal(document.getElementById('modal-delete'))
            modalDelete.show()

            const {
                company
            } = event.detail

            document.getElementById('span_cp_name_th').innerText = company.cp_name_th
            document.getElementById('span_cp_name_en').innerText = company.cp_name_en
            document.getElementById('cp_address').innerText = company.cp_address_no + " " + company
                .cp_address_moo +
                " " + company.cp_address_soy + " " + company.cp_address_road + " " + company
                .cp_address_sub_district +
                " " + company.cp_address_district + " " + company.cp_address_province + " " + company
                .cp_address_zipcode
        })

        window.addEventListener('modal-location', event => {
            const modalLocation = new bootstrap.Modal(document.getElementById('modal-location'))
            modalLocation.show()

            const {
                company
            } = event.detail

            document.getElementById('cp_location').value = company.cp_address_no + " " + company
                .cp_address_moo +
                " " + company.cp_address_soy + " " + company.cp_address_road + " " + company
                .cp_address_sub_district +
                " " + company.cp_address_district + " " + company.cp_address_province + " " + company
                .cp_address_zipcode

            var location = searchbox.value;
            processButtonSearch(location);
        })
    </script>
@endpush
