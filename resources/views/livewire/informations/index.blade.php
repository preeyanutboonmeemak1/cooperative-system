<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h5 class="mb-0">{{ __('นิสิตในที่ปรึกษา') }}</h5>
              
            </div>
            <div class="card-body pt-4 p-3">
                <form wire:submit.prevent="save" method="GET" role="form text-left">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <img src="{{ asset('storage/photos/1648240052_getstudentimage.jpg') }} " />
                                <!-- </div>
                                @error('StudentSubDistrict') <div class="text-danger">{{ $message }}</div> @enderror -->
                            </div>
                        </div>                       
                    </div>
                    <!-- <img src="{{ asset('storage/photos/1648240052_getstudentimage.jpg') }} " /> -->
                    <div class="d-flex justify-content-end">
                        <!-- <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'บันทึก' }}</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
