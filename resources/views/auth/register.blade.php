<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tall3</title>
    <link rel="icon" type="image/x-icon" href="../../../assets/fav.ico" />
    <!-- ==================== -->
    <!-- Import Bootstrap Style -->
    <!-- ==================== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- ==================== -->
    <!-- Import Material Web -->
    <!-- ==================== -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <script type="importmap">
      {
        "imports": {
          "@material/web/": "https://esm.run/@material/web/"
        }
      }
    </script>
    <script type="module">
        import "@material/web/all.js";
        import {
            styles as typescaleStyles
        } from "@material/web/typography/md-typescale-styles.js";
        document.adoptedStyleSheets.push(typescaleStyles.styleSheet);
    </script>
    <!-- ==================== -->
    <!-- Import main CSS -->
    <!-- ==================== -->
    <link rel="stylesheet" href="{{ asset('css/main_register_style.css') }}" />
    <!-- ==================== -->
    <!-- Import Login CSS -->
    <!-- ==================== -->
    <link rel="stylesheet" href="{{ asset('css/register_style.css') }}" />
</head>

<body>

  
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="container h-100">
            <div class="auth-form px-5 d-flex flex-column align-items-start justify-content-start">
                <div class="main-image logo-image mb-4" style="width: 100px">
                    <img src="{{ asset('Images/Logo.png') }}" alt="login" />
                </div>
                <div class="text-end w-100 mb-3">
                    <h2 class="fw-bold">مرحبـــــاً انشاء موقع جديد !.</h2>
                    <p>اختار نوع الموقع</p>
                </div>
                <form class="w-100 d-flex flex-column gap-4" action="{{ route('register_tenant') }}" method="POST">
                    @csrf
                <div class="auth-types mb-5">
                    <label class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <md-icon>directions_car</md-icon>
                            <div>
                                <h6>موقع سيارات</h6>
                                <p>موقع متكامل + لوحة تحكم</p>
                            </div>
                        </div>
                        <md-checkbox touch-target="wrapper" name="theme" value="theme1"></md-checkbox>
                    </label>
                    <label class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <md-icon>home</md-icon>
                            <div>
                                <h6>موقع عقارات</h6>
                                <p>موقع متكامل + لوحة تحكم</p>
                            </div>
                        </div>
                        <md-checkbox touch-target="wrapper" name="theme" value="theme2"></md-checkbox>
                    </label>
                </div>

                
                    <md-outlined-text-field name="name" label="إســم المــوقع" placeholder="مثــال : أحمد العتيبــي">
                        <md-icon slot="trailing-icon">account_circle</md-icon>
                    </md-outlined-text-field>
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <md-outlined-text-field name="phone" label="رقم الجـــوال" placeholder="مثــال : 5xx xxx xxx">
                        <md-icon slot="trailing-icon">call</md-icon>
                    </md-outlined-text-field>
                    @error('phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <md-outlined-text-field name="email" label="البريد الإلكتروني"
                        placeholder="مثــال : exampla@gmail.com">
                        <md-icon slot="trailing-icon">email</md-icon>
                    </md-outlined-text-field>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    <md-outlined-text-field name="password" label="كلمة المرور" type="password"
                        placeholder="أدخل كلمة المرور هنــــا">
                        <md-icon-button toggle slot="trailing-icon">
                            <md-icon>visibility</md-icon>
                            <md-icon slot="selected">visibility_off</md-icon>
                        </md-icon-button>
                    </md-outlined-text-field>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                    {{-- <md-outlined-text-field name="domain"
              label="المدينة"
              placeholder="أدخل المدينة هنــــا"
            >
              <md-icon slot="trailing-icon">add_location</md-icon> --}}
                    </md-outlined-text-field>
                    <div class="d-flex align-items-center justify-content-start gap-2 w-100">
                        <md-outlined-text-field label="tala3." disabled style="width: 100px">
                        </md-outlined-text-field>
                        <md-outlined-text-field name="username" label="اسم نشاطك"
                            placeholder="اكتب اسم نشاطك بالإنجليزي" style="flex: 1">
                        </md-outlined-text-field>
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <label class="d-flex align-items-center justify-content-start">
                        <md-checkbox touch-target="wrapper"></md-checkbox>
                        <p>
                            لقد قرأت وأوافق على
                            <strong>الشروط والأحكام و سيــاسة الخصوصيـة</strong>
                        </p>
                    </label>
                    <md-filled-button class="mb-2">إبــدأ الان</md-filled-button>
                    <a href="/pages/auth/login" class="main-link text-center login-link">هل لديك حساب بالفعل !
                        <strong>سجّــل الدخــول</strong></a>
                </form>
            </div>
            <div class="auth-frame d-flex flex-column gap-4 justify-content-center h-100 rounded-4 py-4 px-5">
                <div class="main-image auth-image-1">
                    <img src="{{ asset('Images/auth-2.png') }}" alt="login" />
                </div>
                <div class="main-image auth-image-2">
                    <img src="{{ asset('Images/auth-1.png') }}" alt="login" />
                </div>
            </div>
        </div>
    </div>
</body>

</html>
