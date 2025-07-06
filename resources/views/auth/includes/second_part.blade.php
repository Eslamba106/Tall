<div style="max-width: 1000px; margin: auto; direction: rtl; color: white;" class="text-right">
    <h3 style="font-size: 28px; font-weight: bold;color:white">انشاء حساب جديد</h3>
    <p style="color: #aaa;">أدخل معلومات حسابك</p>

    <form>
        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            <!-- الاسم الكامل -->
            <div style="flex: 1 1 48%;">
                <label>الاسم الكامل <span style="color: red;">*</span></label>
                <input type="text" name="name" id="name" placeholder="أدخل الاسم الكامل" required
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #999; background: #000; color: white;">
            </div>

            <!-- اسم المتجر -->
            <div style="flex: 1 1 48%;">
                <label>الاسم المتجر <span style="color: red;">*</span></label>
                <input type="text" name="username" id="username" placeholder="أدخل اسم المتجر" required
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #999; background: #000; color: white;">
            </div>

            <!-- البريد الالكتروني -->
            <div style="flex: 1 1 48%;">
                <label>البريد الالكتروني <span style="color: red;">*</span></label>
                <input type="email" name="email" id="email" placeholder="أدخل البريد الالكتروني الاساسي للمتجر" required
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #999; background: #000; color: white;">
            </div>

            <!-- البريد الالكتروني -->
            <div style="flex: 1 1 48%;">
                <label>اسم المستخدم<span style="color: red;">*</span></label>
                <input type="text" name="user_name" placeholder="أدخل اسم المستخدم" required
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #999; background: #000; color: white;">
            </div>

            <!-- رقم الهاتف -->
            <div style="flex: 1 1 48%;">
                <label>رقم الهاتف <span style="color: red;">*</span></label>
                <input type="tel" name="phone" id="phone" placeholder="أدخل رقم الهاتف" required
                    maxlength="13" 
                    {{-- pattern="[0-9]{4} [0-9]{2} [0-9]{2} [0-9]{2}" --}}
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #999; background: #000; color: white;">
            </div>

            <!-- كلمة السر -->
            <div style="flex: 1 1 48%;">
                <label>كلمة السر <span style="color: red;">*</span></label>
                <input type="password" name="password" id="password" placeholder="قم بادخال كلمة سر قوية" required
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #999; background: #000; color: white;">
            </div>

            <!-- تأكيد كلمة السر -->
            <div style="flex: 1 1 48%;">
                <label>تأكيد كلمة السر <span style="color: red;">*</span></label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="تأكيد كلمة السر" required
                    style="width: 100%; padding: 10px; border-radius: 6px; border: 1px solid #999; background: #000; color: white;">
            </div>
        </div>

        <!-- أزرار التالي والسابق -->
        <div style="display: flex; justify-content: space-between; margin-top: 30px;">
            <button type="button" style="background-color: #1e2249; color: white; padding: 10px 30px; border: none; border-radius: 6px; font-size: 16px;" id="first_pre_btn">السابق</button>
            <button type="submit" style="background-color: #00997b; color: white; padding: 10px 30px; border: none; border-radius: 6px; font-size: 16px;">التالي</button>
        </div>
    </form>
</div>
 <script>
        $(document).ready(function() {
            // Handle the click event for the next button
            $("#first_next_btn").on('click', function(e) {
                e.preventDefault();

                // Hide the first step and show the second step
                $("#first_step").addClass('d-none');
                $("#second_step").removeClass('d-none');
            });
            $("#first_pre_btn").on('click', function(e) {
                e.preventDefault();

                // Hide the first step and show the second step
                $("#first_step").removeClass('d-none');
                $("#second_step").addClass('d-none');
            });
        });
        // $("#first_next_btn").on('click', function(e) {
        //     e.preventDefault();

        //     $("#first_step").addClass('d-none');
        //     $("#second_step").removeClass('d-none');
        // });
    </script>