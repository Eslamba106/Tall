<style>
    .theme-options {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .theme-option {
        border: 1px solid #fff;
        border-radius: 8px;
        padding: 20px;
        width: 250px;
        background-color: #000;
        color: #fff;
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease-in-out;
        text-align: center;
    }

    .theme-option:hover,
    .theme-option input:checked+label {
        border: 2px solid #4F46E5;
        /* اللون الأزرق عند التحديد */
    }

    .theme-option input {
        position: absolute;
        top: 15px;
        left: 15px;
        accent-color: #4F46E5;
    }

    .theme-img {
        width: 100%;
        height: 150px;
        border-radius: 6px;
        margin-top: 15px;
        background-size: cover;
        background-position: center;
    }

    .next-button {
        margin-top: 30px;
        text-align: center;
    }

    .next-button button {
        background-color: #3B38FF;
        border: none;
        padding: 10px 30px;
        border-radius: 10px;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }
</style>

<div class="text-center mb-4">
    <h3 style="color:white;">ابدأ مشروعك الأن</h3>
    <p style="color: #aaa;">موقع متكامل لمعاملاتك التجارية</p>
</div>

<div class="theme-options">
    <!-- Theme 1 -->
    <label class="theme-option" for="theme1">
        <input type="radio" name="theme" value="theme1" id="theme1" class="theme-radio">
        <div>متجر السيارات</div>
        <div class="theme-img" style="background-image: url('{{ asset('assets/images/theme1.jpg') }}');"></div>
    </label>

    <!-- Theme 2 -->
    <label class="theme-option" for="theme2">
        <input type="radio" name="theme" value="theme2" id="theme2" class="theme-radio">
        <div>متجر العقارات</div>
        <div class="theme-img" style="background-image: url('{{ asset('assets/images/theme2.jpg') }}');"></div>
    </label>
</div>
<div style="display: flex; justify-content: space-between; margin-top: 30px;">
    <button type="button"
        style="background-color: #00997b; color: white; padding: 10px 30px; border: none; border-radius: 6px; font-size: 16px;"
        id="first_next_btn">التالي</button>

</div>
<script>
    $(document).ready(function() { 
        
        $("#first_next_btn").on('click', function(e) {
            e.preventDefault();  
            $("#first_step").addClass('d-none');
            $("#second_step").removeClass('d-none');
        });
        $("#first_pre_btn").on('click', function(e) {
            e.preventDefault(); 
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
