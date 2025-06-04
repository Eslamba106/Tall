@extends('layouts.admin')
@section('page-title')
    {{ __('الاشتراكات') }}
@endsection
@section('content')
<style>
  body {
      background-color: #f8f9fa; /* لون خلفية فاتح */
      /* Optional: Add a nice Arabic font */
      /* font-family: 'Cairo', sans-serif; */
  }

  .pricing-section {
      padding: 60px 0;
  }

  .pricing-card {
      border-radius: 15px;
      border: 1px solid #e0e0e0;
      transition: all 0.3s ease;
      background-color: #ffffff;
      margin-bottom: 30px; /* للمسافة بين الكروت في وضع الموبايل */
      overflow: hidden; /* لإخفاء أي تجاوز للـ badge */
  }

  .pricing-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  }

  .pricing-card .card-header {
      background-color: transparent;
      border-bottom: 1px solid #eee;
      padding: 30px 20px;
      text-align: center;
  }

  .pricing-card .card-title {
      margin-bottom: 10px;
      font-size: 1.8rem;
      font-weight: 700;
      color: #333;
  }

  .pricing-card .price {
      font-size: 2.8rem;
      font-weight: bold;
      color: #212529; /* أسود غامق للسعر */
      margin-bottom: 5px;display: flex
;
    margin: 0 auto 10px;
    justify-content: center;
    align-items: flex-end;
  }

   .pricing-card .price .currency {
    font-size: 1rem;
    font-weight: normal;
    vertical-align: super;
    margin-right: 5px;
    color: #999;   }

  .pricing-card .period {
      font-size: 0.9rem;
      color: #6c757d; /* رمادي */
  }

  .pricing-card .list-group-item {
      border: none;
      padding: 12px 25px;
      font-size: 0.95rem;
      color: #555;
      display: flex; /* لترتيب الأيقونة والنص */
      align-items: center; /* لمحاذاة الأيقونة والنص عمودياً */
  }

  .pricing-card .list-group-item i {
      margin-left: 12px; /* مسافة بين الأيقونة والنص (في RTL) */
      width: 20px; /* عرض ثابت للأيقونة للمحاذاة */
      text-align: center;
  }

  .pricing-card .card-footer {
      background-color: transparent;
      border-top: none;
      padding: 25px;
  }

  .btn-choose-plan {
      border-radius: 50px; /* أزرار دائرية الحواف */
      padding: 12px 30px;
      font-weight: bold;
      font-size: 1rem;
      width: 100%;
      transition: all 0.3s ease;
  }

  /* Featured Plan Styling */
  .featured-plan {
    border: 2px solid #009877;
    transform: scale(1.05);
    z-index: 1;
    box-shadow: 0 10px 25px rgb(15 108 16 / 30%);
    position: relative;
    }

  .featured-badge {
      position: absolute;
      top: -1px; /* يغطي جزء بسيط من الأعلى */
      left: 50%;
      transform: translateX(-50%); /* لتوسيط الـ badge */
      background-color: #009877;
      color: #ffffff;      padding: 5px 20px;
      border-radius: 0 0 10px 10px; /* حواف دائرية من الأسفل */
      font-size: 0.9rem;
      font-weight: bold;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  li.list-group-item svg {
    width: 26px;
    height: 26px;
    fill: #009877;
    margin-left: 10px;
}li.list-group-item svg.redd {
    fill: #F44336;
}.ifactive {
    text-align: center;
    font-weight: 600;
    padding: 10px 0px 0;
    color: #000;
}
  /* تخصيص ألوان الأيقونات */
  .fa-check { color: #28a745; } /* أخضر */
  .fa-times { color: #dc3545; } /* أحمر */
  .text-muted-feature i { color: #6c757d; } /* أيقونة رمادية للميزات الأساسية غير المميزة */
   .text-warning-feature i { color: #ffc107; } /* أصفر للملاحظات */

   .ifactive {
    text-align: center;
    font-weight: 600;
}.ifactive span.badge-sm.badge-success {
    display: block;
}.iftxt {
    padding-bottom: 7px;
}ul.list-group.list-group-flush {
    padding: 10px 0px;
}
</style>
<div class="row">
    <div class="col-12 mt-4">
    <div class="card">
    @php
      $user = Auth::user();
    @endphp

    <div class="card-header pb-0">

    <div class="card-body px-0 pb-0">
      <section class="pricing-section">
        <div class="container">
            <h2 class="text-center" style="font-weight: bold; color: #333;margin-bottom:3em">اختر الخطة التي تناسب احتياجاتك</h2>

            <div class="row justify-content-center align-items-center"> <!-- align-items-center للمحاذاة العمودية إذا كانت الكروت مختلفة الارتفاع -->

                <!-- الخطة الأساسية (البيسك) -->
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card">
                        <div class="card-header">
                            <h3 class="card-title">البيسك</h3>
                            <div class="price">
                                <!-- ضع السعر هنا إذا لم تكن مجانية -->
                                0 <span class="currency">ريال</span>
                            </div>
                            <div class="period">/ شهرياً</div>
                        </div>
                        @if ($user->subscription == $subscription[0]->id)
                        <div class="ifactive">
                   <div class="iftxt">       مفعل</div>
                          <span class="badge-sm badge-success">{{ date('d-m-Y', strtotime($user->subscriptionPeriod)) }}</span></div>
                      @endif
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> 7 إعلانات</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> 7 طلبات</li>                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> قالب موقع 1</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> تفعيل الواتساب</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> تصميم شعار + 3 بنرات</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> تصدير بيانات العملاء</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> الربط مع أدوات تسويقية</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> ربط دومين خاص</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> انشاء تطبيق (iOS/Android)</li>
                        </ul>
                        <div class="card-footer">
                            <a href="{{route('main.subscribe',$subscription[0]->id)}}" class="btn btn-outline-primary btn-choose-plan">ابدأ الآن</a>
                        </div>
                    </div>
                </div>

                <!-- خطة بلس (المميزة) -->
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card featured-plan">
                        <div class="featured-badge">الأكثر طلباً</div>
                        <div class="card-header">
                            <h3 class="card-title">بلس</h3>
                             <div class="price">
                                99 <span class="currency">ريال</span>
                            </div>
                             <div class="period">/ شهرياً</div>
                        </div>
                        @if ($user->subscription == $subscription[1]->id)
                        <div class="ifactive">
                   <div class="iftxt">       مفعل</div>
                          <span class="badge-sm badge-success">{{ date('d-m-Y', strtotime($user->subscriptionPeriod)) }}</span></div>
                      @endif

                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> 20 إعلان</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> 40 طلب</li>
                            
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> تفعيل الواتساب</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> تصميم شعار + 3 بنرات مجانية</li>
                            <li class="list-group-item text-muted-feature"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> قالب موقع 1</li> <!-- تأكد من أن هذه الميزة هنا -->
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> تصدير بيانات العملاء</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> الربط مع أدوات تسويقية</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> ربط دومين خاص</li>
                            <li class="list-group-item"><svg class="redd" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 36 36" version="1.1" preserveAspectRatio="xMidYMid meet">
    <path class="clr-i-solid clr-i-solid-path-1" d="M18,2A16,16,0,1,0,34,18,16,16,0,0,0,18,2Zm8,22.1a1.4,1.4,0,0,1-2,2l-6-6L12,26.12a1.4,1.4,0,1,1-2-2L16,18.08,9.83,11.86a1.4,1.4,0,1,1,2-2L18,16.1l6.17-6.17a1.4,1.4,0,1,1,2,2L20,18.08Z"/>
    <rect x="0" y="0" width="36" height="36" fill-opacity="0"/>
</svg> انشاء تطبيق (iOS/Android)</li>
                        </ul>
                        <div class="card-footer">
                            <a href="{{route('main.subscribe',$subscription[1]->id)}}" class="btn btn-warning btn-choose-plan">اختر بلس</a>
                        </div>
                    </div>
                </div>

                <!-- خطة برو -->
                <div class="col-lg-4 col-md-6">
                    <div class="card pricing-card">
                        <div class="card-header">
                             <h3 class="card-title">برو</h3>
                            <div class="price">
                                299 <span class="currency">ريال</span>
                            </div>
                            <div class="period">/ شهرياً</div>
                        </div>
                        @if ($user->subscription == $subscription[2]->id)
                        <div class="ifactive">
                   <div class="iftxt">       مفعل</div>
                          <span class="badge-sm badge-success">{{ date('d-m-Y', strtotime($user->subscriptionPeriod)) }}</span>
                        </div>
                      @endif
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> عدد لامحدود من الاعلانات</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> عدد لامحدود من الطلبات</li>
                           
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> تفعيل الواتساب</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> قوالب موقع احترافية</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> تصميم شعار + 3 بنرات مجانية</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> تصدير بيانات العملاء (Excel)</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> الربط مع أدوات تسويقية</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
</svg> ربط دومين خاص</li>
                            <li class="list-group-item text-warning-feature"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                              <path fill-rule="evenodd" clip-rule="evenodd" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM16.0303 8.96967C16.3232 9.26256 16.3232 9.73744 16.0303 10.0303L11.0303 15.0303C10.7374 15.3232 10.2626 15.3232 9.96967 15.0303L7.96967 13.0303C7.67678 12.7374 7.67678 12.2626 7.96967 11.9697C8.26256 11.6768 8.73744 11.6768 9.03033 11.9697L10.5 13.4393L12.7348 11.2045L14.9697 8.96967C15.2626 8.67678 15.7374 8.67678 16.0303 8.96967Z"/>
                              </svg> انشاء تطبيق (بتكلفة إضافية)</li>
                        </ul>
                        <div class="card-footer">
                            <a href="{{route('main.subscribe',$subscription[2]->id)}}" class="btn btn-primary btn-choose-plan">اختر برو</a>
                        </div>
                    </div>
                </div>
            </div> <!-- نهاية الصف row -->
        </div> <!-- نهاية الحاوية container -->
    </section>

    {{-- <div class="table-responsive">
    <table class="table table-flush" id="products-list">
    <thead class="thead-light">
    <tr>
    <th>الخطة</th>
    <th>السعر</th>
    <th>المدة</th>
    <th>عدد الوحدات</th>
    <th>الوصف</th>
    <th>الاجرائات</th>
    </tr>
    </thead>
    <tbody>
      @foreach ($subscription as $key => $subs)
      <tr>
        <td>
          <h6 class="mr-2 ms-3 my-auto">{{$subs->name}}</h6>
          </td>
        <td>{{$subs->price}}رس
        </td>
        <td>
          @if ($user->subscription == $subs->id)
          ينتهي في
          <span class="badge-sm badge-success">{{ date('d-m-Y', strtotime($user->subscriptionPeriod)) }}</span>
          @else
          {{$subs->duration}}يوم
          @endif
          </td>
        <td>{{$subs->max_orders}}</td>
        <td>
          {{$subs->description}}
          </td>
        <td>
          @if ($user->subscription == $subs->id)
          <span class="badge-sm badge-success">مفعل</span>
            @else
            <a href="{{route('main.subscribe',$subs->id)}}" class="editer">تفعيل</a>
          @endif
       </td>   
        </tr>
        @endforeach
    </tbody>
    </table>

<!--pagination start-->
<div class="d-flex align-items-center justify-content-between py-3 px-4">
  <span class="smaller">يتم عرض 
      {{ $subscription->firstItem() }} {{ __('الى') }} {{ $subscription->lastItem() }} {{ __('من') }}
      {{ $subscription->total() }} {{ __('الخطط') }}</span>
  <nav class="paginate">
      {{ $subscription->links() }}
  </nav>
</div>
<!--pagination end-->
  
    </div> --}}
    </div>
    </div>
    </div>
    </div>
  
@endsection
@push('js-page')
<script src="{{asset('assets/js/datatables.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    if (document.getElementById('products-list')) {
      const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
        searchable: false,
        fixedHeight: false,
        paging: false,
        perPage: 7
      });
    };


                // update publish status 
                function updatePublishedStatus(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('estate.status') }}', {
                    _token: '{{ csrf_token() }}',
                    id: el.value,
                    status: status
                },
                function(data) {
                    if (data.flag == 1) {
                      if (data.status == 1) {
                        toastr.success("تم تفعيل العقار",'نجاح');
                      }else{
                        toastr.warning("تم تعطيل العقار",'نجاح');
                      }
                    } else {
                      toastr.error(data.msg,"حدث خطأ ما");
                    }
                });
        }
  </script>

@endpush