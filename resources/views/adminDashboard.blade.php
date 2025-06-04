@extends('layouts.admin')
@section('page-title')
    {{ __('الرئيسية') }}
@endsection

@section('content')
<style>.pu-s h4, .pu-s h3 {
    margin: 0;
}
    h4.title-pu {
    font-size: 0.75em;
    color: #999;
}h3.title-pu {
    FONT-SIZE: 2EM;
    COLOR: #000;
}
    .pusvg svg {
    width: 27px;
    height: 27px;
    fill: #2196F3;
}.pusvg {float: right;
    display: inline-block;
    border: 2px solid #ebf3f9;
    border-radius: 10px;
    padding: 10px;
}h4.title-pu {
    font-size: 0.75em;
    margin-right: 10px;
    color: #000000;
}.pu-s {
    display: flex;
    align-items: center;
}h3.title-pu {
    FONT-SIZE: 3.5EM;
    text-align: center;
    margin: 0;
    color: #4d4d4d;
    font-weight: 500;
}
.dff {
    display: flex;
    align-items: flex-end;
    justify-content: center;
}h4.sub-pu {
    font-size: 0.85em;
    font-weight: 500;
    color: #999;
    margin-right: 5px;
}h3.title-dash {
  color: #5f6ba7;
  letter-spacing: -0.5px;
    font-size: 1em;
}span.wfdt {
    display: inline-block;
    width: 7px;
    border-radius: 10px;
    height: 7px;
}
/***********/
.pusvgs h4.title-pus {
    font-size: 0.85em;
    font-weight: 500;
    margin-bottom: 0;
    margin-top: 0;
}h3.title-pus {
    font-size: 2em;
    padding: 0px 5px;
    margin-bottom: 0;
    margin-top: 0;color: #000
}h4.sub-pus {
    margin: 0;
    font-size: 0.75em;
    font-weight: 500;
}.jstc {
    display: flex;
    align-items: center;
    justify-content: space-between;
}span.title-link {
    font-size: 12px;
    color: #000;
    width: 100%;
    display: block;
}span.title-link {
    font-size: 12px;
    color: #000;
    width: 100%;
    display: block;
}a.rtyy {
    background: #009877;
    color: #fff;
    border-radius: 12px;
    padding: 9px 26px;
    margin-top: 20px;
    display: inline-block;
}a.rtyy.nwst {
    border: 1px solid #000000;
    color: #000000;
    background: none;
}
h4.title-error {
    margin: 0;
    color: red;
}
</style>
<div class="container-fluid py-4">
  <div class="d-flex jstc">
    <h5>مرحبا {{\Auth::user()->name}}</h5>
    {{-- <div class="card store-link">
      <div class="card-body p-3 position-relative">
      <span class="title-link">المتجر الالكتروني</span>
      <a href="{{route('index')}}">https://{{$tenant->domain}}</a>
    </div>
  </div> --}}
</div>
    <div class="row mt-4">            
              {{-- <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-body p-3 position-relative">
                    <div class="content-pu">
                        <div class="pu-s">
                        <div class="pusvg">
                            <svg style="
                            fill: #009877;
                        " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.329 19.6c-.185.252-.47.385-.759.385-.194 0-.389-.06-.558-.183-.419-.309-.509-.896-.202-1.315l1.077-1.456c.308-.417.896-.508 1.315-.199.421.306.511.895.201 1.313l-1.074 1.455zm-.825-2.839c.308-.418.217-1.007-.201-1.316-.421-.308-1.008-.216-1.317.203l-1.073 1.449c-.309.419-.217 1.009.202 1.317.417.307 1.007.218 1.315-.202l1.074-1.451zm-1.9-1.388c.309-.417.217-1.007-.203-1.315-.418-.307-1.007-.216-1.314.202l-1.083 1.461c-.308.419-.209.995.209 1.304.421.308 1 .229 1.308-.19l1.083-1.462zm-1.898-1.386c.308-.419.219-1.007-.203-1.315-.419-.309-1.007-.218-1.315.201l-1.075 1.451c-.308.418-.217 1.008.202 1.315.419.307 1.008.218 1.315-.202l1.076-1.45zm17.294-8.438s-1.555.301-2.667.479c-2.146.344-4.144-.416-6.361-1.562-.445-.229-.957-.466-1.458-.466-.461 0-.913.209-1.292.639-1.366 1.547-2.16 2.915-3.785 3.864-.801.468.14 1.934 1.86 1.331.878-.308 1.736-.895 2.706-1.677.762-.615 1.22-.524 1.879.135 1.238 1.238 5.404 5.351 5.404 5.351 1.317-.812 2.422-1.312 3.713-1.792v-6.302zm-10.524 12.662c-.158.459-.618 1.001-.953 1.455.297.235.608.334.882.334.717 0 1.188-.671.542-1.318l-.471-.471zm6.506-3.463c-1.07-1.055-4.732-4.667-5.803-5.713-.165-.161-.421-.18-.608-.044-.639.464-2.082 1.485-2.944 1.788-1.685.59-3.115-.222-3.422-1.359-.192-.712.093-1.411.727-1.781 1.008-.589 1.657-1.375 2.456-2.363-.695-.539-1.35-.732-1.991-.732-1.706 0-3.317 1.366-5.336 1.231-1.373-.09-3.061-.403-3.061-.403v6.333c1.476.321 2.455.464 3.92 1.199l.462-.624c.364-.496.949-.792 1.564-.792.87 0 1.622.578 1.861 1.388.951 0 1.667.602 1.898 1.387.826-.031 1.641.519 1.897 1.385 1.171 0 2.017.92 1.981 2.007l1.168 1.168c.367.368.963.367 1.331 0 .368-.368.368-.964 0-1.332l-1.686-1.687c-.22-.22.113-.553.333-.333l2.032 2.033c.368.368.963.368 1.331 0s.368-.963 0-1.331l-2.501-2.502c-.221-.218.113-.553.333-.333l2.7 2.701c.368.368.963.368 1.331 0 .358-.356.361-.922.027-1.291z"></path></svg>
                        </div>
                            <h4 class="title-pu">طلبات:</h4>
                        </div>
                       <div class="dff"> <h3 class="title-pu">{{$deal}}</h3><h4 class="sub-pu">صفقة</h4></div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-body p-3 position-relative">
                    <div class="content-pu">
                        <div class="pu-s">
                        <div class="pusvg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 24 24"><path d="M13 2h2v2h1v19h1v-15l6 3v12h1v1h-24v-1h1v-11h7v11h1v-19h1v-2h2v-2h1v2zm8 21v-2h-2v2h2zm-15 0v-2h-3v2h3zm8 0v-2h-3v2h3zm-2-4v-13h-1v13h1zm9 0v-1h-2v1h2zm-18 0v-2h-1v2h1zm4 0v-2h-1v2h1zm-2 0v-2h-1v2h1zm9 0v-13h-1v13h1zm7-2v-1h-2v1h2zm-18-1v-2h-1v2h1zm2 0v-2h-1v2h1zm2 0v-2h-1v2h1zm14-1v-1h-2v1h2zm0-2.139v-1h-2v1h2z"></path></svg>                        </div>
                            <h4 class="title-pu">الاعلانات:</h4>
                        </div>
                            <div class="dff"> <h3 class="title-pu">{{$estate}}</h3><h4 class="sub-pu">عقار</h4></div>
                        </div>
                  </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card">
                  <div class="card-body p-3 position-relative">
                    <div class="content-pu">
                        <div class="pu-s">
                        <div class="pusvg">
                            <svg style="
                            fill: #FF5722;
                        " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <circle cx="152" cy="184" r="72"></circle>
                                <path d="M234 296c-28.16-14.3-59.24-20-82-20c-44.58 0-136 27.34-136 82v42h150v-16.07c0-19 8-38.05 22-53.93c11.17-12.68 26.81-24.45 46-34">
                                </path>
                                <path d="M340 288c-52.07 0-156 32.16-156 96v48h312v-48c0-63.84-103.93-96-156-96"></path>
                                <circle cx="340" cy="168" r="88"></circle>
                            </svg></div>
                            <h4 class="title-pu">العملاء:</h4>
                        </div>
                            <div class="dff"> <h3 class="title-pu">{{$customer}}</h3><h4 class="sub-pu">عميل</h4></div>
                        </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                  <div class="card">
                    <div class="card-body p-3 position-relative">
                      <div class="content-pu">
                          <div class="pu-s">
                          <div class="pusvg">
                              <svg style="
                              fill: #673ab7;
                          " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                  <circle cx="152" cy="184" r="72"></circle>
                                  <path d="M234 296c-28.16-14.3-59.24-20-82-20c-44.58 0-136 27.34-136 82v42h150v-16.07c0-19 8-38.05 22-53.93c11.17-12.68 26.81-24.45 46-34">
                                  </path>
                                  <path d="M340 288c-52.07 0-156 32.16-156 96v48h312v-48c0-63.84-103.93-96-156-96"></path>
                                  <circle cx="340" cy="168" r="88"></circle>
                              </svg></div>
                              <h4 class="title-pu">طلبات خاصة:</h4>
                          </div>
                              <div class="dff"> <h3 class="title-pu">{{$order}}</h3><h4 class="sub-pu">عميل</h4></div>
                          </div>
                      </div>
                    </div>
                  </div>  --}}
                  @php
                    $subsUser = auth()->user();
                    $subscription  = App\Models\singleSubscription::find($subsUser->subscription);
                  @endphp
                  @if ($subscription && $subscription->id != 3)
                    
                  @if ($subscription->orders <= $subsUser->subscriptionOrders || $subscription->ads <= $subsUser->subscriptionAds )
                  <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                    <div class="card" style="background: #ffe6e6;">
                      <div class="card-body p-3 position-relative">
                        <div class="content-pus">
                            <div class="pu-ss">
                            <div class="pusvgs">
                                <h4 class="title-pus">نفذ الاشتراك:</h4>
                            </div>
                           <div class="dffs"> <h4 class="title-error">يجب تفعيل اشتراك جديد حتى تتمكن من استقبال المزيد من الطلبات</h4><h4 class="sub-pus"><a href="{{route('subscription.index')}}" class="rtyy">تجديد الاشتراك</a></h4></div>
                        </div>
                      </div>
                    </div>
                </div>
                  </div>     
                  @endif
                  @endif

                  <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <div class="card-body p-3 position-relative">
                        <div class="content-pus">
                            <div class="pu-ss">
                            <div class="pusvgs">
                              
                                <h4 class="title-pus">الطلبات:</h4>
                            </div>
                           <div class="dffs"> <h3 class="title-pus">{{$deal}}+</h3><h4 class="sub-pus"><a href="{{route('deals.create')}}" class="rtyy">طلب جديد</a></h4></div>
                        </div>
                      </div>
                    </div>
                </div>

                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <div class="card-body p-3 position-relative">
                        <div class="content-pus">
                            <div class="pu-ss">
                            <div class="pusvgs">
                              
                                <h4 class="title-pus">الاعلانات:</h4>
                            </div>
                           <div class="dffs"> <h3 class="title-pus">{{$estate}}+</h3><h4 class="sub-pus"><a href="{{route('estate.create')}}" class="rtyy nwst">اعلان جديد</a></h4></div>
                        </div>
                      </div>
                    </div>
                </div>

                  </div><div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <div class="card-body p-3 position-relative">
                        <div class="content-pus">
                            <div class="pu-ss">
                            <div class="pusvgs">
                              
                                <h4 class="title-pus">العملاء:</h4>
                            </div>
                           <div class="dffs"> <h3 class="title-pus">{{$customer}}+</h3><h4 class="sub-pus"><a href="{{route('customers.create')}}" class="rtyy nwst">عملاء الجدد</a></h4></div>
                        </div>
                      </div>
                    </div>
                </div>

                  </div>
                  <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="card">
                      <div class="card-body p-3 position-relative">
                        <div class="content-pus">
                            <div class="pu-ss">
                            <div class="pusvgs">
                              
                                <h4 class="title-pus">الطلبات الخاصة:</h4>
                            </div>
                           <div class="dffs"> <h3 class="title-pus">{{$order}}+</h3><h4 class="sub-pus"><a href="{{route('orders.requests')}}" class="rtyy nwst">العروض المستقبلة</a></h4></div>
                        </div>
                      </div>
                    </div>
                </div>

                  </div> 
            <div class="col-lg-8 col-md-4 col-sm-12 mt-4">
                <div class="card">
                  <div class="card-body p-3 position-relative">
                    <h3 class="title-dash">عدد الزيارات على الموقع الإلكتروني
                    </h3>
                    <div class="card-body p-3">
                        <div class="chart">
                          <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                        </div>
                      </div>
          
                  </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 mt-4">
                <div class="card" style="height:100%;">
                  <div class="card-body p-3 position-relative">
                    <h3 class="title-dash">الطلبات
                    </h3>
                    <span class="badge badge-dot d-block text-start pb-0 mt-3">
                        <span class="wfdt" style="
                        background: #009877;
                    "></span>
                        <span class="text-muted text-xs font-weight-bold">طلب جديد</span>
                      </span>
                      
                       
                      <span class="badge badge-dot d-block text-start pb-0 mt-3">
                        <span class="wfdt" style="
                        background: #ffeb3b;
                    "></span>
                        <span class="text-muted text-xs font-weight-bold">المفاوضات</span>
                      </span>
                      <span class="badge badge-dot d-block text-start pb-0 mt-3">
                        <span class="wfdt" style="
                        background: #4caf50;
                    "></span>
                        <span class="text-muted text-xs font-weight-bold">
                            تمت البيعة</span>
                      </span>
                      <span class="badge badge-dot d-block text-start pb-0 mt-3">
                        <span class="wfdt" style="
                        background: #e91e63;
                    "></span>
                        <span class="text-muted text-xs font-weight-bold">
                            الغية البيعة</span>
                      </span>

                    <div class="card-body p-3">
                        <div class="chart mt-4">
                            <canvas id="chart-bar" class="chart-canvas" height="150"></canvas>
                        </div>
                      </div>
          
                  </div>
                </div>
            </div></div>
    </div>
</div>
@endsection

@push('js-page')
<script src="{{asset('assets/js/chartjs.min.js')}}"></script>
<script>


    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var ctx2 = document.getElementById("chart-bar").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(75,100,226,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(75,100,226,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(75,100,226,0)'); //purple colors

    var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(75,100,226,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(75,100,226,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(75,100,226,0)'); //purple colors

    new Chart(ctx1, {
      type: "line",
      data: {
        labels: [{!! $totalOrdersData->labels !!}],
        datasets: [{
            label: "عدد الزيارات على الموقع الالكتروني",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#009877",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [{!! $totalOrdersData->amount !!}],
            maxBarThickness: 6

          }
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#009877',
              font: {
                size: 11,
                family: "Noto Kufi Arabic",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#009877',
              padding: 20,
              font: {
                size: 11,
                family: "Noto Kufi Arabic",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    new Chart(ctx2, {
      type: "doughnut",
      data: {
        labels: ['طلب جديد', 'المفاوضات','تمت البيعة','الغية البيعة'],
        datasets: [{
          label: "الطلبات",
          weight: 20,
          cutout: 55,spacing: 12,
          tension: 1,
          pointRadius: 30,
          borderWidth: 0,
          borderRadius: 10,
          backgroundColor: ['#009877', '#ffeb3b','#4caf50','#e91e63'],
          data: [{{$deal1}}, {{$deal3}},{{$deal4}},{{$deal5}}],
          fill: false
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              display: false
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {font: {
                size: 11,
                family: "Noto Kufi Arabic",
                style: 'normal',
                lineHeight: 2
              },
              display: false,
            }
          },
        },
      },
    });

  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

@endpush