<div class="thumb relative">
    <div class="thumb-img" style="background-image: url({{url('/uploads/cover_image/sd_').$estate->thumbnail_image}});"></div>
</div>
<div class="product-card">
    <div class="d-flex justify-content-between">
    <div class="right-content">
    <div class="product-title-row">
        <h2 class="product-title">
            <a href="{{route('products',$estate->id)}}">
                {{$estate->name}}
            </a>
        </h2>
    </div>
    <div class="product-pricing">
        <span class="price-txt true-price">{{$estate->price}} رس</span>
        <span class="place-txt">في -  {{$estate->city}}</span>
    </div>
    @php
        $props = App\Models\EstateGroupe::where('estate',$estate->id)->get();
    @endphp
    <div class="product-props mt-3">
        <div class="row">
        @foreach ($props as $prop)
            <li class="col-lg-6 col-sm-6 list-namer-x"><span class="name-x">{{$prop->name}}:</span><span class="valeu-x">{{$prop->value}}</span></li>
        @endforeach
    </div></div>
    </div>

</div>
</div>