<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plan;
use App\Models\User;
use App\Models\Store;
use App\Models\Tenant;
use App\Facade\Tenants;
use App\Models\EstateComb;
use App\Models\EstateType;
use App\Models\TenantStor;
use App\Models\EstateProps;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Models\ThemeSettings;
use App\Models\affiliateAdmin;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;

class MainRegistration extends Controller
{
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:'.Tenant::class,'regex:/^[a-zA-Z0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ],[
            'username.unique' => 'اسم المستخدم موجود من قبل',
            'username.regex' => 'اسم المستخدم غير صالح',
            'email.unique' => 'البريد الالكتروني موجود بالفعل جرب تسجيل الدخول',
        ]);
        if ($validator->fails()) {
            $msg['flag'] = 'error';
            $msg['msg']  = $validator->errors()->first();
            return $msg;
        }
        //$request->theme = 'theme1';
        $request->name = strtolower($request->name);
        if ($request->name == 'www') {
            $msg['flag'] = 'error';
            $msg['msg']  = 'هذا الرابط غير صالح';
            return $msg;
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone'=>$request->phone,
            'password' => Hash::make($request->password),
            'duration' => Carbon::now()->addDays(7),
            'subscription' =>1,
            'type' =>1,
        ]);
        if ($request->aft) {
            $user->affiliate = $request->aft;
            $user->save();
            $aft = affiliateAdmin::where('code',$request->aft)->first();
            $aft->number1 = $aft->number1+1;
            $aft->save();

        }
        $db = env('prfx_URL').'_'.$request->username;
        $tenant = Tenant::create([
            'username' => $request->username,
            'user_id' => $user->id,
            'nametxt' =>$request->name,
            'domain' =>$request->username . '.'. env('HOST_URL'),
            'db' => $db,
        ]);
        $tenantstore = TenantStor::create([
            'tenant_id' => $tenant->id,
            'name' => $request->username,
            'user_id' =>$user->id,
            'subscription' => 1,
            'duration' => 30,
            'active' => true,
        ]);
        event(new Registered($user));
        Auth::login($user);
        Tenants::createDB($tenant);
        $usertanent = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'type'=>'1',
            'phone'=>$request->phone,
            'duration' => Carbon::now()->addDays(7),
            'subscription' =>1,
            'password' => Hash::make($request->password),
        ]);
        if ($request->aft) {
            $user->affiliate = $request->aft;
            $user->save();
        }
        $store = Store::create([
            'domain' =>$request->username . '.'. env('HOST_URL'),
            'name' =>$request->username
        ]);
        $plan = Plan::create([
            'plan' =>1,
            'active' =>$tenantstore->active,
            'orders_max' =>30,
            'orders' =>0
        ]);
        $orderTxt = 'بع سيارتك';
        if ($request->theme == 'theme1') {
            $orderTxt = 'اعرض عقارك';
        }
        SystemSetting::insert([
            ['entity' => 'system_title', 'value' => $request->username],
            ['entity' => 'theme',        'value' => $request->theme],
            ['entity' => 'main_color',   'value' => '#000000'],
            ['entity' => 'global_txt_m',   'value' => $orderTxt],
            ['entity' => 'global_copyright',   'value' => 'جميع الحقوق محفوظة ©2025'],
            ['entity' => 'logo',   'value' => ''],
        ]);
        if ($request->theme == 'theme2') {

            EstateType::insert([
                ['id' => 11, 'name' => 'تويوتا', 'active' => 1],
                ['id' => 12, 'name' => 'فورد', 'active' => 1],
                ['id' => 13, 'name' => 'شيفروليه', 'active' => 1],
                ['id' => 14, 'name' => 'نيسان', 'active' => 1],
                ['id' => 15, 'name' => 'هيونداي', 'active' => 1],
                ['id' => 16, 'name' => 'جنسس', 'active' => 1],
                ['id' => 17, 'name' => 'لكزس', 'active' => 1],
                ['id' => 18, 'name' => 'جي ام سي', 'active' => 1],
                ['id' => 19, 'name' => 'مرسيدس', 'active' => 1],
                ['id' => 20, 'name' => 'هوندا', 'active' => 1],
                ['id' => 21, 'name' => 'بي ام دبليو', 'active' => 1],
                ['id' => 22, 'name' => 'كيا', 'active' => 1],
                ['id' => 23, 'name' => 'دودج', 'active' => 1],
                ['id' => 24, 'name' => 'كرايزلر', 'active' => 1],
                ['id' => 25, 'name' => 'جيب', 'active' => 1],
                ['id' => 26, 'name' => 'ميتسوبيشي', 'active' => 1],
                ['id' => 27, 'name' => 'مازدا', 'active' => 1],
                ['id' => 28, 'name' => 'لاند روفر', 'active' => 1],
                ['id' => 29, 'name' => 'ايسوزو', 'active' => 1],
                ['id' => 30, 'name' => 'كاديلاك', 'active' => 1],
                ['id' => 31, 'name' => 'بورش', 'active' => 1],
                ['id' => 32, 'name' => 'أودي', 'active' => 1],
                ['id' => 33, 'name' => 'سوزوكي', 'active' => 1],
                ['id' => 34, 'name' => 'انفنيتي', 'active' => 1],
                ['id' => 35, 'name' => 'همر', 'active' => 1],
                ['id' => 36, 'name' => 'لنكولن', 'active' => 1],
                ['id' => 37, 'name' => 'فولكس واجن', 'active' => 1],
                ['id' => 38, 'name' => 'دايهاتسو', 'active' => 1],
                ['id' => 39, 'name' => 'جيلي', 'active' => 1],
                ['id' => 40, 'name' => 'ميركوري', 'active' => 1],
                ['id' => 41, 'name' => 'فولفو', 'active' => 1],
                ['id' => 42, 'name' => 'بيجو', 'active' => 1],
                ['id' => 43, 'name' => 'بنتلي', 'active' => 1],
                ['id' => 44, 'name' => 'جاكوار', 'active' => 1],
                ['id' => 45, 'name' => 'سوبارو', 'active' => 1],
                ['id' => 46, 'name' => 'MG', 'active' => 1],
                ['id' => 47, 'name' => 'ZXAUTO', 'active' => 1],
                ['id' => 48, 'name' => 'شانجان', 'active' => 1],
                ['id' => 49, 'name' => 'رينو', 'active' => 1],
                ['id' => 50, 'name' => 'بويك', 'active' => 1],
                ['id' => 51, 'name' => 'مازيراتي', 'active' => 1],
                ['id' => 52, 'name' => 'رولز رويس', 'active' => 1],
                ['id' => 53, 'name' => 'لامبورجيني', 'active' => 1],
                ['id' => 54, 'name' => 'اوبل', 'active' => 1],
                ['id' => 55, 'name' => 'سكودا', 'active' => 1],
                ['id' => 56, 'name' => 'فيراري', 'active' => 1],
                ['id' => 57, 'name' => 'سيتروين', 'active' => 1],
                ['id' => 58, 'name' => 'شيري', 'active' => 1],
                ['id' => 59, 'name' => 'سيات', 'active' => 1],
                ['id' => 60, 'name' => 'دايو', 'active' => 1],
                ['id' => 61, 'name' => 'ساب', 'active' => 1],
                ['id' => 62, 'name' => 'فيات', 'active' => 1],
                ['id' => 63, 'name' => 'سانج يونج', 'active' => 1],
                ['id' => 64, 'name' => 'استون مارتن', 'active' => 1],
                ['id' => 65, 'name' => 'بروتون', 'active' => 1],
                ['id' => 66, 'name' => 'هافال', 'active' => 1],
                ['id' => 67, 'name' => 'جي ايه سي GAC', 'active' => 1],
                ['id' => 68, 'name' => 'جريت وول Great Wall', 'active' => 1],
                ['id' => 69, 'name' => 'فاو FAW', 'active' => 1],
                ['id' => 70, 'name' => 'BYD', 'active' => 1],
                ['id' => 71, 'name' => 'الفا روميو', 'active' => 1],
                ['id' => 72, 'name' => 'تاتا', 'active' => 1],
                ['id' => 73, 'name' => 'جى ام سي JMC', 'active' => 1],
                ['id' => 74, 'name' => 'جيتور', 'active' => 1],
                ['id' => 75, 'name' => 'سي ام سي', 'active' => 1],
                ['id' => 76, 'name' => 'فوتون', 'active' => 1],
                ['id' => 77, 'name' => 'فيكتوري اوتو', 'active' => 1],
                ['id' => 78, 'name' => 'ليفان', 'active' => 1],
                ['id' => 79, 'name' => 'ماكسيس', 'active' => 1],
                ['id' => 80, 'name' => 'ماكلارين', 'active' => 1],
                ['id' => 81, 'name' => 'جاك JAC', 'active' => 1],
                ['id' => 82, 'name' => 'بايك', 'active' => 1],
                ['id' => 83, 'name' => 'دونج فينج', 'active' => 1],
                ['id' => 84, 'name' => 'اكسيد', 'active' => 1],
                ['id' => 85, 'name' => 'تسلا', 'active' => 1],
                ['id' => 86, 'name' => 'ساوايست', 'active' => 1],
                ['id' => 87, 'name' => 'ماهيندرا', 'active' => 1],
                ['id' => 88, 'name' => 'زوتي', 'active' => 1],
                ['id' => 89, 'name' => 'هونشي', 'active' => 1],
                ['id' => 90, 'name' => 'سمارت', 'active' => 1],
                ['id' => 91, 'name' => 'تانك', 'active' => 1],
                ['id' => 92, 'name' => 'لينك اند كو', 'active' => 1],
                ['id' => 93, 'name' => 'لوسيد', 'active' => 1],
                ['id' => 94, 'name' => 'اينيوس', 'active' => 1],
            ]);

            EstateProps::insert([
                ['id' => 1, 'name' => 'الممشى', 'actve' => 1, 'show' => 1],
            ]);


            ThemeSettings::insert([
                ['id' => 1, 'theme' => 'theme2', 'value' => '[{"section_name":"\u0627\u0644\u0647\u0627\u064a\u062f\u0631","section_slug":"homepage-header","array_type":"inner_list","loop_number":"1","section_enable":"on","inner_list":[{"field_name":"1 \u0627\u0644\u062e\u0644\u0641\u064a\u0629","field_slug":"homepage_header_bg_image","field_help_text":null,"field_default_text":"\/themes\/theme1.jpg","field_type":"photo upload"},{"field_name":"2 \u0627\u0644\u062e\u0644\u0641\u064a\u0629","field_slug":"homepage_header_bg_image2","field_help_text":null,"field_default_text":"\/themes\/theme1.jpg","field_type":"photo upload"},{"field_name":"3 \u0627\u0644\u062e\u0644\u0641\u064a\u0629","field_slug":"homepage_header_bg_image3","field_help_text":null,"field_default_text":"\/themes\/theme1.jpg","field_type":"photo upload"}],"homepage_header_bg_image":[{"field_prev_text":"\/themes\/0_24_250502.png"}],"homepage_header_bg_image2":[{"field_prev_text":"\/themes\/0_61_250502.jpg"}],"homepage_header_bg_image3":[{"field_prev_text":"\/themes\/0_13_250502.jpg","image":"\/themes\/0_13_250502.jpg"}]},{"section_name":"\u0623\u0641\u0636\u0644 \u0627\u0644\u0639\u0642\u0627\u0631\u0627\u062a","section_slug":"homepage-products","array_type":"inner_list","loop_number":"1","section_enable":"on","inner_list":[{"field_name":"\u0639\u0646\u0648\u0627\u0646","field_slug":"homepage-products-title","field_help_text":null,"field_default_text":"\u0623\u0641\u0636\u0644 \u0627\u0644\u0639\u0642\u0627\u0631\u0627\u062a","field_type":"text"},{"field_name":"\u0648\u0635\u0641 \u0627\u0644\u0639\u0646\u0648\u0627\u0646","field_slug":"homepage-products-sub","field_help_text":null,"field_default_text":"\u0627\u062e\u062a\u0631 \u0645\u0646 \u0628\u064a\u0646 \u0623\u0641\u0636\u0644 \u0627\u0644\u0633\u064a\u0627\u0631\u0627\u062a","field_type":"text"},{"field_name":"\u0639\u062f\u062f \u0627\u0644\u0639\u0646\u0627\u0635\u0631 \u0627\u0644\u0645\u0639\u0631\u0648\u0636\u0629","field_slug":"homepage-st-num0","field_help_text":null,"field_default_text":"9","field_type":"text"},{"field_name":"\u0644\u0648\u0646 \u0627\u0644\u0639\u0646\u0648\u0627\u0646","field_slug":"homepage-header-desc-color00","field_help_text":null,"field_default_text":"#000000","field_type":"color"},{"field_name":"\u0644\u0648\u0646 \u0627\u0644\u0639\u0646\u0648\u0627\u0646 \u0627\u0644\u0642\u0635\u064a\u0631","field_slug":"homepage-header-desc-color00","field_help_text":null,"field_default_text":"#32a466","field_type":"color"}]},{"section_name":null,"section_slug":"homepage-st","array_type":"inner_list","loop_number":"1","section_enable":"on","inner_list":[{"field_name":"\u0639\u0646\u0648\u0627\u0646","field_slug":"homepage-st-title","field_help_text":null,"field_default_text":"\u0634\u0631\u0627\u0621 \u0627\u0644\u0633\u064a\u0627\u0631\u0627\u062a","field_type":"text"}]},{"section_name":"\u0627\u0644\u062a\u0648\u0627\u0635\u0644 \u0627\u0644\u0627\u062c\u062a\u0645\u0627\u0639\u064a","section_slug":"homepage-icons","array_type":"inner_list","loop_number":"1","section_enable":"on","inner_list":[{"field_name":"facebook","field_slug":"homepage-header-facebook","field_help_text":"\u0631\u0627\u0628\u0637 \u0627\u0644\u0635\u0641\u062d\u0629","field_default_text":"https:\/\/www.facebook.com","field_type":"text"},{"field_name":"instagram","field_slug":"homepage-header-instagram","field_help_text":"\u0631\u0627\u0628\u0637 \u0627\u0644\u062d\u0633\u0627\u0628","field_default_text":"https:\/\/www.instagram.com","field_type":"text"},{"field_name":"twitter","field_slug":"homepage-header-twitter","field_help_text":"\u0631\u0627\u0628\u0637 \u0627\u0644\u062d\u0633\u0627\u0628","field_default_text":"https:\/\/www.twitter.com\/","field_type":"text"},{"field_name":"whatsapp","field_slug":"homepage-header-whatsapp","field_help_text":"\u0627\u0644\u0648\u0627\u062a\u0633\u0627\u0628","field_default_text":"00000000","field_type":"text"},{"field_name":"snapchat","field_slug":"homepage-header-email","field_help_text":"snapchat","field_default_text":"https:\/\/www.snapchat.com","field_type":"text"},{"field_name":"tiktok","field_slug":"homepage-header-email","field_help_text":"tiktok","field_default_text":"https:\/\/tiktok.com","field_type":"text"},{"field_name":"\u0627\u0644\u0627\u064a\u0645\u0627\u064a\u0644","field_slug":"homepage-header-email","field_help_text":"\u0627\u0644\u0628\u0631\u064a\u062f \u0627\u0644\u0627\u0644\u0643\u062a\u0631\u0648\u0646\u064a","field_default_text":"test@gmail.com","field_type":"text"}]}]'],
            ]);


        }elseif($request->theme == 'theme1'){

            EstateType::insert([
                ['name' => 'مزرعة', 'active' => 1],
                ['name' => 'استراحة', 'active' => 1],
                ['name' => 'عمارة', 'active' => 1],
                ['name' => 'محل تجاري', 'active' => 1],
                ['name' => 'مكتب تجاري', 'active' => 1],
                ['name' => 'مستودع', 'active' => 1],
                ['name' => 'شاليه', 'active' => 1],
                ['name' => 'محطة بنزين', 'active' => 1],
                ['name' => 'أرض', 'active' => 1],
                ['name' => 'شقة', 'active' => 1],
                ['name' => 'دور', 'active' => 1],
                ['name' => 'دوبلكس', 'active' => 1],
                ['name' => 'فيلا', 'active' => 1],
                ['name' => 'قصر', 'active' => 1],
                ['name' => 'غرفة', 'active' => 1],
                ['name' => 'استديو', 'active' => 1],
            ]);
            
            EstateProps::insert([
                ['id' => 1, 'name' => 'المساحة', 'actve' => 1, 'show' => 1],
                ['id' => 2, 'name' => 'الواجهة', 'actve' => 1, 'show' => 1],
                ['id' => 3, 'name' => 'طول القطعة', 'actve' => 1, 'show' => 1],
                ['id' => 4, 'name' => 'عرض القطعة', 'actve' => 1, 'show' => 1],
                ['id' => 5, 'name' => 'عمر العقار', 'actve' => 1, 'show' => 1],
                ['id' => 6, 'name' => 'الغرف', 'actve' => 1, 'show' => 1],
            ]);
            EstateComb::insert([
                ['id' => 1, 'type' => 1, 'props' => 1],
                ['id' => 2, 'type' => 1, 'props' => 2],
                ['id' => 3, 'type' => 1, 'props' => 3],
                ['id' => 4, 'type' => 4, 'props' => 1],
                ['id' => 5, 'type' => 4, 'props' => 2],
                ['id' => 6, 'type' => 4, 'props' => 3],
                ['id' => 7, 'type' => 4, 'props' => 5],
                ['id' => 8, 'type' => 4, 'props' => 6],
            ]);
            ThemeSettings::insert([
                ['id' => 1, 'theme' => 'theme1', 'value' => '[{"section_name":"\u0627\u0644\u0647\u0627\u064a\u062f\u0631","section_slug":"homepage-header","array_type":"inner_list","loop_number":"1","section_enable":"on","inner_list":[{"field_name":"1 \u0627\u0644\u062e\u0644\u0641\u064a\u0629","field_slug":"homepage_header_bg_image","field_help_text":null,"field_default_text":"\/themes\/theme1.jpg","field_type":"photo upload"},{"field_name":"2 \u0627\u0644\u062e\u0644\u0641\u064a\u0629","field_slug":"homepage_header_bg_image2","field_help_text":null,"field_default_text":"\/themes\/theme1.jpg","field_type":"photo upload"},{"field_name":"3 \u0627\u0644\u062e\u0644\u0641\u064a\u0629","field_slug":"homepage_header_bg_image3","field_help_text":null,"field_default_text":"\/themes\/theme1.jpg","field_type":"photo upload"}],"homepage_header_bg_image":[{"field_prev_text":"\/themes\/0_40_250502.jpg"}],"homepage_header_bg_image2":[{"field_prev_text":"\/themes\/0_51_250502.jpg"}],"homepage_header_bg_image3":[{"field_prev_text":"\/themes\/0_81_250502.jpg","image":"\/themes\/0_81_250502.jpg"}]},{"section_name":"\u0623\u0641\u0636\u0644 \u0627\u0644\u0639\u0642\u0627\u0631\u0627\u062a","section_slug":"homepage-products","array_type":"inner_list","loop_number":"1","section_enable":"on","inner_list":[{"field_name":"\u0639\u0646\u0648\u0627\u0646","field_slug":"homepage-products-title","field_help_text":null,"field_default_text":"\u0623\u0641\u0636\u0644 \u0627\u0644\u0639\u0642\u0627\u0631\u0627\u062a","field_type":"text"},{"field_name":"\u0648\u0635\u0641 \u0627\u0644\u0639\u0646\u0648\u0627\u0646","field_slug":"homepage-products-sub","field_help_text":null,"field_default_text":"\u0627\u062e\u062a\u0631 \u0645\u0646 \u0628\u064a\u0646 \u0623\u0641\u0636\u0644 \u0627\u0644\u0639\u0642\u0627\u0631\u0627\u062a","field_type":"text"},{"field_name":"\u0639\u062f\u062f \u0627\u0644\u0639\u0646\u0627\u0635\u0631 \u0627\u0644\u0645\u0639\u0631\u0648\u0636\u0629","field_slug":"homepage-st-num0","field_help_text":null,"field_default_text":"9","field_type":"text"},{"field_name":"\u0644\u0648\u0646 \u0627\u0644\u0639\u0646\u0648\u0627\u0646","field_slug":"homepage-header-desc-color00","field_help_text":null,"field_default_text":"#000000","field_type":"color"},{"field_name":"\u0644\u0648\u0646 \u0627\u0644\u0639\u0646\u0648\u0627\u0646 \u0627\u0644\u0642\u0635\u064a\u0631","field_slug":"homepage-header-desc-color00","field_help_text":null,"field_default_text":"#32a466","field_type":"color"}]},{"section_name":null,"section_slug":"homepage-st","array_type":"inner_list","loop_number":"1","section_enable":"on","inner_list":[{"field_name":"\u0639\u0646\u0648\u0627\u0646","field_slug":"homepage-st-title","field_help_text":null,"field_default_text":"\u0634\u0631\u0627\u0621 \u0627\u0644\u0639\u0642\u0627\u0631\u0627\u062a","field_type":"text"}]},{"section_name":"\u0627\u0644\u062a\u0648\u0627\u0635\u0644 \u0627\u0644\u0627\u062c\u062a\u0645\u0627\u0639\u064a","section_slug":"homepage-icons","array_type":"inner_list","loop_number":"1","section_enable":"on","inner_list":[{"field_name":"facebook","field_slug":"homepage-header-facebook","field_help_text":"\u0631\u0627\u0628\u0637 \u0627\u0644\u0635\u0641\u062d\u0629","field_default_text":"https:\/\/www.facebook.com","field_type":"text"},{"field_name":"instagram","field_slug":"homepage-header-instagram","field_help_text":"\u0631\u0627\u0628\u0637 \u0627\u0644\u062d\u0633\u0627\u0628","field_default_text":"https:\/\/www.instagram.com","field_type":"text"},{"field_name":"twitter","field_slug":"homepage-header-twitter","field_help_text":"\u0631\u0627\u0628\u0637 \u0627\u0644\u062d\u0633\u0627\u0628","field_default_text":"https:\/\/www.twitter.com\/","field_type":"text"},{"field_name":"whatsapp","field_slug":"homepage-header-whatsapp","field_help_text":"\u0627\u0644\u0648\u0627\u062a\u0633\u0627\u0628","field_default_text":null,"field_type":"text"},{"field_name":"snapchat","field_slug":"homepage-header-email","field_help_text":"snapchat","field_default_text":"https:\/\/www.snapchat.com","field_type":"text"},{"field_name":"tiktok","field_slug":"homepage-header-email","field_help_text":"tiktok","field_default_text":"https:\/\/tiktok.com","field_type":"text"},{"field_name":"\u0627\u0644\u0627\u064a\u0645\u0627\u064a\u0644","field_slug":"homepage-header-email","field_help_text":"\u0627\u0644\u0628\u0631\u064a\u062f \u0627\u0644\u0627\u0644\u0643\u062a\u0631\u0648\u0646\u064a","field_default_text":null,"field_type":"text"}]}]'],
            ]);
        }

        $link = 'https://'. $tenantstore->name . '.'. env('HOST_URL').'/autoLoginBase/'.encrypt($tenant->domain);
        $msg['flag'] = 'success';
        $msg['msg']  = $link;
        return $msg;
    }
}
