 @extends('layouts.master')



 @section('content')
     <div class="container">

         @include('layouts._error-form')

         @include('layouts._alert-session')

     </div>


     @include('layouts._title-header', ['title' => 'استبانة حصر اضرار قطاع النقل والمواصلات '])

     <form action="{{ route('damages.transports.store') }}" method="post" enctype="multipart/form-data">

         <input name="created_by" type="hidden" value="{{ Auth::user()->profile->id ?? 9999999999 }}">


         @csrf

         <div class="d-lg-flex justify-content-between align-items-center">


             <div>
                 <label @class(['form-label px-3 text-center '])>{{ __('mytrans.transport_category') }}</label>

                 <div class="px-3 d-flex ">
                     <div>

                         <input type="radio" id="id89" name="transport_category" value="89"
                             @checked(old('transport_category') == 89)
                             class="form-check-input catclass @error('transport_category')
                                   is-invalid
                               @enderror">
                         <label for="id89" class="form-label fw-normal mr-4">مركبة</label>
                         @include('layouts._show-error', ['field_name' => 'transport_category'])
                     </div>

                     <div class="mx-4">

                         <input type="radio" id="id90" name="transport_category" value="90"
                             @checked(old('transport_category') == 90)
                             class="form-check-input catclass @error('transport_category')
                               is-invalid
                           @enderror">
                         <label for="id90" class="form-label fw-normal mr-4 ">منشأه</label>

                     </div>

                 </div>
             </div>


             <div class="p-3">

                 <div class="form-group px-2  ">
                     <label for="transport_type">{{ __('mytrans.transport_type') }}</label>
                     <select name="transport_type" id="transport_type" @class([
                         ' form-select',
                     
                         'is-invalid' => $errors->has('transport_type'),
                     ])>

                     </select>
                     @include('layouts._show-error', ['field_name' => 'transport_type'])
                 </div>

             </div>

             <div class="p-3 ">
                <div class="form-group px-2  ">
                <label for="" class="form-label">الاسم: (المركبة / المنشأه )</label>

                <input type="text" name="owner_name" id="owner_name" value="{{ old('owner_name') }}"
                    @class(['form-control', 'is-invalid' => $errors->has('owner_name')])>
                @include('layouts._show-error', ['field_name' => 'owner_name'])
            </div>
            </div>
            
             <div class="p-3">

                 <label for="" class="form-label">{{ __('mytrans.transport_no') }}</label>
                 <input type="text" name="transport_no" id="transport_no" value="{{ old('transport_no') }}"
                     @class(['form-control', 'is-invalid' => $errors->has('transport_no')])>
                 @include('layouts._show-error', ['field_name' => 'transport_no'])
                 <p id="citzenname"></p>
             </div>

         </div>


         <div class="d-lg-flex justify-content-between ">
             <div class="p-3 w-lg-25">

                 <label for="" class="form-label">{{ __('mytrans.regestration_idc') }}</label> <span
                     style="font-size: 10px;" class="text-muted">حسب تسجيل الرخصة</span>

                 <input type="text" name="regestration_idc" id="regestration_idc" value="{{ old('regestration_idc') }}"
                     @class([
                         'form-control',
                         'is-invalid' => $errors->has('regestration_idc'),
                     ])>
                 @include('layouts._show-error', ['field_name' => 'regestration_idc'])
                 <p id="citzenname"></p>
             </div>

                 <div class="p-3">

                 <label for="" class="form-label">{{ __('mytrans.damage_date') }}</label>
                 <div>

                 </div>
                 <input type="date" name="damage_date" value="{{ old('damage_date') }}" @class(['form-control', 'is-invalid' => $errors->has('damage_date')])>
                 @include('layouts._show-error', ['field_name' => 'damage_date'])

             </div>

             <div class="p-3">


                 <label for="" @class(['form-label px-3 text-center '])>{{ __('mytrans.damage_size') }}</label>
                 <div class="d-flex">
                     <div>

                         <input type="radio" id="id92" name="transport_damage_size" value="92"
                             @checked(old('transport_damage_size') == 92)
                             class="form-check-input @error('transport_damage_size')
                               is-invalid
                           @enderror">
                         <label for="id92" class="form-label fw-normal mr-4">ضرر كلي</label>
                     </div>

                     <div class="mx-4">

                         <input type="radio" id="id93" name="transport_damage_size" value="93"
                             @checked(old('transport_damage_size') == 93)
                             class="form-check-input @error('transport_damage_size')
                           is-invalid
                       @enderror">
                         <label for="id93" class="form-label fw-normal mr-4 ">ضرر جزئي</label>
                         @include('layouts._show-error', ['field_name' => 'transport_damage_size'])
                     </div>

                 </div>

             </div>

         </div>

         <div class="p-3" >
             <label>اضافة صور عن الاضرار</label> <span class="text-muted  " style="font-size: 10px;">يمكن رفع اكثر من صورة في اختيار واحد</span>
             <input type="file" id="attachments" name="attachments[]" 
             @class([
                'form-control',
                'is-invalid'=>$errors->has('attachments'),
             ]) multiple accept="image/*">
             @include('layouts._show-error',['field_name'=>'attachments'])
         </div>

        

         @include('layouts.2button')
     </form>

     <script src="{{ asset('js/jQuery.js') }}"></script>
     <script>
         $('.catclass').on('click', function() {

             let x1 = $(this).val();
             if (x1 == 89) {

                 $('#transport_type').find('option').remove().end().append('<option hidden value="">اختار</option>')
                     .val('');

                 let card = `  @foreach ($transport_type->where('p_id_sub', 94) as $type)
                    <option {{ old('transport_type') == $type->id ? 'selected' : '' }}
                        value="{{ $type->id }}">
                        {{ $type->status_name }}
                    </option>
                @endforeach
              `

                 $('#transport_type').append(card);

             } else if (x1 == 90) {

                 $('#transport_type').find('option').remove().end().append('<option hidden value="">اختار</option>')
                     .val('');
                 let card = `  @foreach ($transport_type->where('p_id_sub', 100) as $type)
                    <option {{ old('transport_type') == $type->id ? 'selected' : '' }}
                        value="{{ $type->id }}">
                        {{ $type->status_name }}
                    </option>
                @endforeach
               `

                 $('#transport_type').append(card);
             }


         });
     </script>
 @endsection
