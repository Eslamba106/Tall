    @forelse ($estates as $estate)
    <div class="col-lg-3 col-sm-12">
        <div class="homelengo-box">
            <div class="archive-top">
                <a href="{{route('products',$estate->id)}}" class="images-group">
                    <div class="images-style">
                        @if ($estate->thumbnail_image)
                        <img class=" ls-is-cached" src="{{url('/uploads/cover_image/sd_').$estate->thumbnail_image}}" alt="{{$estate->name}}">
                        @else
                        <img class=" ls-is-cached" src="{{url('/uploads/none.jpg')}}" alt="{{$estate->name}}">

                        @endif
                    </div>
                    <div class="top">
                        <ul class="d-flex mps">
                            <li class="flag-tag primary">
                                @if ($estate->status == 0)
                                    غير متاح
                                    @else
                                    متاح
                                @endif
                                </li>
        </ul>
                        
                    </div>
                </a>
                
            </div>
            <div class="archive-bottom">
                <div class="content-top">
                    @php
                    $props = App\Models\EstateGroupe::where('estate',$estate->id)->get();
                    $user = App\Models\User::find($estate->user);
                    @endphp

                                        <a href="{{route('products',$estate->id)}}" class="link"><h6 class="text-capitalize">{{$estate->name}}</h6></a>

                    <div class="user-small">
                        
                    @if ($user)
                    <span class="user-name-part">{{$user->name}}</span>
                    @else
                    @php
                        $propss = App\Models\EstateGroupe::where('estate',$estate->id)->where('name',operator: 'حالة السيارة')->first();
                    @endphp
                    <span class="user-name-part">الحالة : {{$estate->newer}}</span>
                    @endif
                </div>
                        <ul class="meta-list">
                        @foreach ($props as $prop)
                        @if ($prop->name == 'الممشى')
                        <li class="item">
                            <span class="text-variant-1">                                        <img src="{{url('uploads/icons/1.jpg')}}" class="icon-img" alt="المسافة">
                            </span>
                            <span class="fw-6">{{$prop->value}}</span>
                        </li>
                        @endif
                        @endforeach
                        
                        <li class="item">
                            <span class="text-variant-1">                                        <img src="{{url('uploads/icons/2.jpg')}}" class="icon-img" alt="المسافة">
                            </span>
                            <span class="fw-6">{{$estate->gas}}</span>
                        </li>
                        <li class="item">
                            <span class="text-variant-1">
                                <img src="{{url('uploads/icons/3.jpg')}}" class="icon-img" alt="المسافة">

                            </span>
                            <span class="fw-6">{{$estate->motor}}</span>
                        </li>
                        </ul>

                </div>
                
                <div class="content-bottom">
                    <h6 class="price">{{$estate->price}} رس</h6>
                    <a href="{{route('products',$estate->id)}}">
                    <div class="d-flex gap-8 align-items-center btn-sx">
                        <div class="sttxt">{{$estate->trade}}</div>
                        <svg class="sttxtr" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                            <g id="Arrow / Arrow_Undo_Up_Left">
                            <path id="Vector" d="M7 13L3 9M3 9L7 5M3 9H16C18.7614 9 21 11.2386 21 14C21 16.7614 18.7614 19 16 19H11" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            </svg>
                        </div></a>
                </div>
            </div>
        </div></div>
                                @empty
                                <p class="empty">لا توجد اي نتائج</p>
@endforelse
                                