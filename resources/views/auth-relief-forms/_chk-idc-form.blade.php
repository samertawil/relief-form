



    <div class="d-flex" style="height: 600px; ">

        <div class="container  m-auto px-5  ">

            <div>

                <div class=" fw-bolder h4 text-dark d-flex justify-content-center align-items-center">

                    <strong class="mx-2">الخدمات الالكترونية الموحدة</strong>

                    <div class="mx-2" style="width: 90px; height: 100px;">
                        <img src="{{ asset('assets/media/pal.png') }}" alt="palestine"
                            style="width: 100%; height: 100%;">
                    </div>

                </div>
            </div>
         

                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card ">

                            <div class="card-header ">حسابات المستخدمين</div>
                            
                            <div class="card-body">

                                <div class=" mb-3">
                                    <label for="idc" class="  col-form-label ">{{ __('mytrans.idc') }}</label>

                                    <div>
                                        <input id="idc" type="text"
                                            class="form-control @error('idc') is-invalid @enderror" name="idc"
                                            value="{{ old('idc') }}" autocomplete="idc" autofocus>

                                        @error('idc')
                                            <span class="invalid-feedback" role="alert">
                                                <small>{{ $message }}</small>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="d-grid gap-2">

                                    <button type="submit" class="  btn btn-primary btn-block my-5">
                                        {{$buttontitle??'استمرار'}}
                                       
                                    </button>
                                </div>
         


        </div>
    </div>
    </div>
    </div>
    </div>
    </div>


