


<div class="container border mt-2 mb-5 bg-white ">
<div class="text-center">
    <p class="lead py-4 fw-bold ">{{($title)??'title is here'}}</p>
</div>

<div class="dropdown-divider"></div>
<div>

    <div class="text-start p-3 d-flex">
        <p class="text-primary fw-bold"> مقدم الاستبانة:</p>
        <p> {{ Auth::user()->full_name }} </p>
        <p class="px-4"><span
                class="text-primary fw-bold">جوال:</span>{{ Auth::user()->profile->mobile1 ?? '' }} </p>
    </div>
</div>

<div class="dropdown-divider"></div>