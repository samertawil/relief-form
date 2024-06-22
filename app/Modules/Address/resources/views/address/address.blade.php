<div class="card-text">
    <div class="d-lg-flex">

        <div class="form-group px-2 w13">
            <label for="region_id">المحافظة</label>
            <select name="region_id" @class([
                ' form-control',
                ' js-example-basic-single',
                'is-invalid' => $errors->has('region_id'),
            ])>
                {{-- <option value="{{ $address->region_id }}">{{ $address->regionname->region_name ?? null }}
                </option> --}}

                @foreach (\App\Modules\Address\Models\region::all() as $region)
                    <option {{ old('region_id') == $region->id ? 'selected' : '' }}
                        value="{{ $region->id }}">
                        {{ $region->region_name }}</option>
                @endforeach
            </select>
            @include('layouts._show-error', ['field_name' => 'region_id'])
        </div>
       <div class="form-group px-2 w13">
            <label for="city_id">المدينة</label>
            <select name="city_id" @class([
                'js-example-basic-single form-control',
                'is-invalid' => $errors->has('city_id'),
            ])>
                {{-- <option value="{{ $address->city_id }}">{{ $address->cityname->city_name ?? null }}
                </option> --}}

                @foreach (App\Modules\Address\Models\city::all() as $city)
                    <option {{ old('city_id') == $city->id ? 'selected' : '' }}
                        value="{{ $city->id }}">
                        {{ $city->city_name }}</option>
                @endforeach
            </select>
            @include('layouts._show-error', ['field_name' => 'city_id'])
        </div>

        <div class="form-group px-2 w18">
            <label for="area_id">المنطقة</label>
            <select name="area_id" @class([
                'js-example-basic-single form-control',
                'is-invalid' => $errors->has('area_id'),
            ])>
                {{-- <option value="{{ $address->area_id }}">{{ $address->areaname->area_name ?? null }}
                </option> --}}
                @foreach (App\Modules\Address\Models\area::all() as $area)
                    <option {{ old('area_id') == $area->id ? 'selected' : '' }}
                        value="{{ $area->id }}">
                        {{ $area->area_name }}</option>
                @endforeach
            </select>
            @include('layouts._show-error', ['field_name' => 'area_id'])
        </div>
      
        <div class="form-group px-2 w18">
            <label for="neighbourhood_id">الحي</label>
            <select name="neighbourhood_id" @class([
                'js-example-basic-single form-control',
                'is-invalid' => $errors->has('neighbourhood_id'),
            ])>
                {{-- <option value="{{ $address->neighbourhood_id }}">
                    {{ $address->neighbourhoodname->neighbourhood_name ?? null }}</option> --}}
                @foreach (App\Modules\Address\Models\neighbourhood::all() as $neighbourhood)
                    <option {{ old('neighbourhood_id') == $neighbourhood->id ? 'selected' : '' }}
                        value="{{ $neighbourhood->id }}">
                        {{ $neighbourhood->neighbourhood_name }}
                    </option>
                @endforeach
            </select>
            @include('layouts._show-error', ['field_name' => 'neighbourhood_id'])
        </div>
        
        <div class="form-group px-2 w20">
            <label for="street_id">الشارع</label>
            <select name="street_id" @class([
                'js-example-basic-single form-control',
                'is-invalid' => $errors->has('street_id'),
            ])>
                {{-- <option value="{{ $address->street_id }}">{{ $address->streetname->street_name ?? null }}
                </option> --}}
                @foreach (App\Modules\Address\Models\street::all()  as $street)
                    <option {{ old('street_id') == $street->id ? 'selected' : '' }}
                        value="{{ $street->id }}">{{ $street->street_name }}</option>
                @endforeach
            </select>
            @include('layouts._show-error', ['field_name' => 'street_id'])
        </div>
  
        <div class="form-group px-2 w13">
            <label for="nearest_location_type">{{ $typeName ?? 'اقرب معلم' }}</label>
            <select name="nearest_location_type" @class([
                'js-example-basic-single form-control',
                'is-invalid' => $errors->has('nearest_location_type'),
            ])>
                {{-- <option value="{{ $address->nearest_location_type }}">
                    {{ $address->nearestlocname->status_name ?? null }}</option> --}}
                @foreach (App\Modules\status\Models\status::where('p_id_sub', 2)->get() as $nearloc)
                    <option {{ old('nearest_location_type') == $nearloc->id ? 'selected' : '' }}
                        value="{{ $nearloc->id }}">{{ $nearloc->status_name }}</option>
                @endforeach
            </select>
            @include('layouts._show-error', [
                'field_name' => 'nearest_location_type',
            ])
        </div>
 
        <div class="form-group px-2 w20">
            <label for="near_loc_id">{{ $locationName ?? 'اسم المعلم' }}</label>
            <select name="near_loc_id" @class([
                'js-example-basic-single form-control',
                'is-invalid' => $errors->has('near_loc_id'),
            ])>
                {{-- <option value="{{ $address->near_loc_id }}">{{ $address->locname->location_name ?? null }}
                </option> --}}
                @foreach (App\Modules\address\Models\location::all() as $nearlocname)
                    <option {{ old('near_loc_id') == $nearlocname->id ? 'selected' : '' }}
                        value="{{ $nearlocname->id }}">{{ $nearlocname->location_name }}
                    </option>
                @endforeach
            </select>
            @include('layouts._show-error', ['field_name' => 'near_loc_id'])
        </div>

        <div class="form-group px-2">
            <label>{{ __('mytrans.address_specific') }}</label>
            <input name="address_specific" type="text" name="address_specific"
                {{-- value="{{ old('address_specific', $address->address_specific) }}" --}}
                @class([
                    'form-control',
                    'is-invalid' => $errors->has('address_specific'),
                ])>
            @include('layouts._show-error', ['field_name' => 'address_specific'])
        </div>
    </div>
    

</div>  
