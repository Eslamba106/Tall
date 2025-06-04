    @forelse ($estates as $estate)
                                <div class="col-lg-4 col-sm-12">
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
                                                    <li class="flag-tag primary">{{$estate->goal}}</li>
                                                    <li class="flag-tag style-1">{{$estate->type}}</li>
                                                </ul>
                                                
                                            </div>
                                            @if ($estate->city)
                                            <div class="bottom">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9C7.46957 9 6.96086 8.78929 6.58579 8.41421C6.21071 8.03914 6 7.53043 6 7C6 6.46957 6.21071 5.96086 6.58579 5.58579C6.96086 5.21071 7.46957 5 8 5C8.53043 5 9.03914 5.21071 9.41421 5.58579C9.78929 5.96086 10 6.46957 10 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path d="M13 7C13 11.7613 8 14.5 8 14.5C8 14.5 3 11.7613 3 7C3 5.67392 3.52678 4.40215 4.46447 3.46447C5.40215 2.52678 6.67392 2 8 2C9.32608 2 10.5979 2.52678 11.5355 3.46447C12.4732 4.40215 13 5.67392 13 7Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                                {{$estate->state}}, {{$estate->city}}  
                                            </div>
                                            @endif
                                        </a>
                                        
                                    </div>
                                    <div class="archive-bottom">
                                        <div class="content-top"> <a href="{{route('products',$estate->id)}}" class="link-pov"></a>

                                                                <a href="{{route('products',$estate->id)}}" class="link"><h6 class="text-capitalize">{{$estate->name}}</h6></a>

                                                <ul class="meta-list">
                                                @php
                                                    $props = App\Models\EstateGroupe::where('estate',$estate->id)->get();
                                                    $user = App\Models\User::find($estate->user);
                                                    @endphp
                                                @foreach ($props as $prop)
                                                    <li class="item">
                                                        <span class="text-variant-1">{{$prop->name}}:</span>
                                                        <span class="fw-6">{{$prop->value}}</span>
                                                    </li>
                                                @endforeach
                                                </ul>
                                            
                                        </div>
                                        
                                        <div class="content-bottom">
                                            <div class="d-flex gap-8 align-items-center">
                                                @if ($user)
                                                <div class="avatar avt-40 round">
                                                @if ($user->img)
                                                    <img src="{{url('/uploads/users/').$user->img}}" alt="{{$user->name}}">
                                                @else
                                                <img src="{{url('/uploads/users/none.webp')}}" alt="جديد">
                                                @endif
                                                </div>
                                                <span class="user-name-part">{{$user->name}}</span>
                                                @else
                                                <div class="avatar avt-40 round">
                                                    <img src="{{url('/uploads/users/none.webp')}}" alt="جديد">
                                                </div>
                                                <span class="user-name-part">بائع جديد</span>
                                                @endif
                                            </div>
                                            <h6 class="price">{{$estate->price}} رس</h6>
                                        </div>
                                    </div>
                                </div></div>
                                @empty
                                <p class="empty">لا توجد اي نتائج</p>
@endforelse
                                