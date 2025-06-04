@extends('layouts.admin')
@section('page-title')
    {{ __('الاعدادات') }}
@endsection
@push('css-page')
<link rel="stylesheet" href="{{asset('assets/css/choices.min.css')}}">
@endpush
@section('content')
<style>
    .card-content {
    border-bottom: 2px solid #f5f5f9;
}.card-content {
    background: #f3f5f7;
    border-radius: 20px;
    padding: 30px;
}
.card-content h5 {
    font-size: 16px;
}.form-control {
    border-radius: 20px;
    margin-bottom: 15px;
}
.form-switch .form-check-input {
    height: 1.3em;
}
.choices, .choices__inner {
    border-radius: 20px !important;
    background: #fff;   
}
.file-upload-h {
    background: #fff;
    border-radius: 20px;
    padding: 0.4375rem 0.875rem;
}
</style>
<form action="{{route('themeUpdatePost',$theme)}}" method="post" enctype="multipart/form-data">
    @csrf
<div class="card0">
    <div class="card-body py-1">
    <div class="row">
        <div class="col-lg-6">
            <h2>اعدادات القالب</h2>
        </div>
        <div class="col-lg-6 text-right d-flex  justify-content-end align-items-center">
        <input type="submit" class="btn bg-gradient-primary mb-0" value="تحديث"/>
    </div>
    </div>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12 mt-lg-0 mt-4">
        <div class="card0">
            <div class="card-body">
                <div class="row">

                <div class="col-12">
                    @foreach ($getStoreThemeSetting as $json_key => $section)

                        @php
                            $id = '';
                            @endphp
                            <input type="hidden" name="array[{{ $json_key }}][section_name]"
                                value="{{ $section['section_name'] }}">
                            <input type="hidden" name="array[{{ $json_key }}][section_slug]"
                                value="{{ $section['section_slug'] }}">
                            <input type="hidden" name="array[{{ $json_key }}][array_type]"
                                value="{{ $section['array_type'] }}">
                            <input type="hidden" name="array[{{ $json_key }}][loop_number]"
                                value="{{ $section['loop_number'] }}">
                            @php
                                $loop = 1;
                                $section = (array) $section;
                            @endphp

                                @if($json_key == 0 || $json_key-1 > -1 && $getStoreThemeSetting[$json_key-1]['section_slug'] != $section['section_slug'])
                                    <div class="card-content mb-4 pb-3" id="{{ $id }}" >
                                        <div class="content-header d-flex justify-content-between">
                                            <div> <h5> {{ $section['section_name'] }} </h5> </div>
                                            <div class="text-end">
                                                <div class="form-check form-switch ">
                                                    <input type="hidden"
                                                        name="array[{{ $json_key }}][section_enable]{{ $section['section_enable'] }}"
                                                        value="off">
                                                    <input type="checkbox" class="form-check-input mx-2 off switch"
                                                            data-toggle="switchbutton"
                                                            name="array[{{ $json_key }}][section_enable]{{ $section['section_enable'] }}"
                                                            id="array[{{ $json_key }}]{{ $section['section_slug'] }}"
                                                            {{ $section['section_enable'] == 'on' ? 'checked' : '' }}
                                                        >
                                                </div>
                                            </div>
                                        </div>

                                @endif
                                    <div class="content-card">
                                        @php $loop1 = 1; @endphp
                                        @if ($section['array_type'] == 'multi-inner_list')
                                            @php
                                                $loop1 = (int)$section['loop_number'];
                                            @endphp
                                        @endif

                                        @for ($i = 0; $i < $loop1; $i++)
                                            <div class="row">

                                            @foreach ($section['inner_list'] as $inner_list_key => $field)

                                                <?php $field = (array)$field; ?>

                                                <input type="hidden"
                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_name]"
                                                    value="{{ $field['field_name'] }}">
                                                <input type="hidden"
                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_slug]"
                                                    value="{{ $field['field_slug'] }}">
                                                <input type="hidden"
                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_help_text]"
                                                    value="{{ $field['field_help_text'] }}">
                                                <input type="hidden"
                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]"
                                                    value="{{ $field['field_default_text'] }}">
                                                <input type="hidden"
                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_type]"
                                                    value="{{ $field['field_type'] }}">
                                                @if ($field['field_type'] == 'diver')
                                                <div class="col-12"></div>
                                                @endif
                                                @if ($field['field_type'] == 'text')
                                                    <div class="col-lg-6 col-sm-12" >
                                                        <div class="form-group">
                                                            <label class="float-start form-label">{{ $field['field_name'] }}</label>
                                                            @php
                                                                $checked1 = $field['field_default_text'];
                                                                if (!empty($section[$field['field_slug']][$i])) {
                                                                    $checked1 = $section[$field['field_slug']][$i];
                                                                }
                                                            @endphp
                                                            @if ($section['array_type'] == 'multi-inner_list')
                                                                <input type="text"
                                                                    name="array[{{ $json_key }}][{{ $field['field_slug'] }}][{{ $i }}]"
                                                                    class="form-control" value="{{ $checked1 }}"
                                                                    placeholder="{{ $field['field_help_text'] }}">
                                                            @else
                                                                <input type="text"
                                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]"class="form-control"
                                                                    value="{{ $field['field_default_text'] }}"
                                                                    placeholder="{{ $field['field_help_text'] }}">
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($field['field_type'] == 'color')
                                                    <div class="col-lg-3 mt-4 col-sm-12" >
                                                        <div class="form-group">
                                                            <label class="float-start form-label">{{ $field['field_name'] }}</label>
                                                            @php
                                                                $checked1 = $field['field_default_text'];
                                                                if (!empty($section[$field['field_slug']][$i])) {
                                                                    $checked1 = $section[$field['field_slug']][$i];
                                                                }
                                                            @endphp
                                                            <input type="color" name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]"class="form-control"
                                                            value="{{ $field['field_default_text'] }}">
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($field['field_type'] == 'text area')
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-label">{{ $field['field_name'] }}</label>
                                                            @php
                                                                $checked1 = $field['field_default_text'];
                                                                if (!empty($section[$field['field_slug']][$i])) {
                                                                    $checked1 = $section[$field['field_slug']][$i];
                                                                }
                                                            @endphp
                                                            @if ($section['array_type'] == 'multi-inner_list')
                                                                <textarea class="form-control" name="array[{{ $json_key }}][{{ $field['field_slug'] }}][{{ $i }}]"
                                                                    rows="3" placeholder="{{ $field['field_help_text'] }}">{{ $checked1 }}</textarea>
                                                            @else
                                                                <textarea class="form-control"
                                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]" {{-- name="array[{{ $section['section_slug'] }}][{{ $field['field_slug'] }}]" --}}
                                                                    rows="3" placeholder="{{ $field['field_help_text'] }}">{{ $field['field_default_text'] }}</textarea>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($field['field_type'] == 'data')
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-label">{{ $field['field_name'] }}</label>
                                                            @php
                                                                $checked1 = $field['field_default_text'];
                                                                if (!empty($section[$field['field_slug']][$i])) {
                                                                    $checked1 = $section[$field['field_slug']][$i];
                                                                }
                                                            @endphp  
                                                    <select  class="form-control data-pa"
                                                            name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]" placeholder="{{ $field['field_help_text'] }}" id="data" data-val="{{ $field['field_default_text'] }}">
                                                        @if ($field['field_help_text'] == 'categories')
                                                        @php 
                                                            $cats = App\Models\Deal::all();
                                                        @endphp
                                                        @forelse ($cats as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @empty
                                                        <option disabled>لا توجد اي نتائج</option>
                                                        @endforelse
                                                        @elseif ($field['field_help_text'] == 'type')
                                                        @php 
                                                            $camps = App\Models\EstateType::where('active',1)->get();
                                                        @endphp
                                                        @forelse ($camps as $camp)
                                                            <option value="{{$camp->id}}">{{$camp->name}}</option>
                                                        @empty
                                                        <option disabled>لا توجد اي نتائج</option>
                                                        @endforelse
                                                        @endif
                                                        </select>
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($field['field_type'] == 'photo upload')
                                                    <div class="col-sm-4">
                                                        @if ($section['array_type'] == 'inner_list')
                                                            @php
                                                                $checked2 = $field['field_default_text'];
                                                                if (!empty($section[$field['field_slug']])) {
                                                                    $checked2 = $section[$field['field_slug']][$i];
                                                                    if (is_array($checked2)) {
                                                                        $checked2 = $checked2['field_prev_text'];
                                                                    }
                                                                }
                                                            @endphp
                                                            <div class="form-group">
                                                                <label
                                                                    class="form-label">{{ $field['field_name'] }}</label>
                                                                <input type="hidden"
                                                                    name="array[{{ $json_key }}][{{ $field['field_slug'] }}][{{ $i }}][field_prev_text]"
                                                                    value="{{ $checked2 }}">

                                                                    <div class="file-upload-h mt-3">
                                                                        <span class="txt-h dz-button">حدد صورة</span>
                                                                        <input type="file" name="array[{{ $json_key }}][{{ $field['field_slug'] }}][{{ $i }}][image]"
                                                                        placeholder="{{ $field['field_help_text'] }}" class="form-control custom-input-file-h">
                                                                    </div>
                                                            </div>

                                                            @if (isset($checked2) && !is_array($checked2))

                                                                <img src="{{ asset( 'uploads' . $checked2) }}"
                                                                    style="width: auto; max-height: 80px;    border-radius: 10px;margin: 0 auto;display: block;">
                                                            @else
                                                                <img src="{{ asset('uploads'. $field['field_default_text']) }}"
                                                                    style="width: auto; max-height: 80px;   border-radius: 10px;margin: 0 auto;display: block;">
                                                            @endif
                                                        @else
                                                            <div class="form-group">
                                                                <label
                                                                    class="form-label">{{ $field['field_name'] }}</label>
                                                                <input type="hidden"
                                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_prev_text]"
                                                                    value="{{ $field['field_default_text'] }}">

                                                                    <div class="file-upload-h mt-3">
                                                                        <span class="txt-h dz-button">حدد صورة</span>
                                                                        <input type="file"
                                                                        name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]"
                                                                        placeholder="{{ $field['field_help_text'] }}" class="form-control custom-input-file-h">
                                                                    </div>
                                                            </div>

                                                            <img src="{{ asset( 'uploads'.$field['field_default_text']) }}"
                                                                @if ($field['field_slug'] == 'homepage-footer-logo') style="width: auto; height: 80px;"
                                                            @else
                                                                style="width: 200px; height: 200px;" @endif>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if ($field['field_type'] == 'button')
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label
                                                                class="form-label">{{ $field['field_name'] }}</label>
                                                            <input type="text"
                                                                name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]"
                                                                class="form-control"
                                                                value="{{ $field['field_default_text'] }}"
                                                                placeholder="{{ $field['field_help_text'] }}">
                                                        </div>
                                                    </div>
                                                @endif

                                                @if ($field['field_type'] == 'checkbox')

                                                        <hr>
                                                        <div class="col-sm-12 d-flex mt-3 mb-3 justify-content-start">
                                                        <label class="form-label float-start">{{ $field['field_name'] }}</label>
                                                        <div class="form-check form-switch  mb-2">
                                                            @if ($section['array_type'] == 'multi-inner_list')

                                                                @php
                                                                    $checked1 = '';

                                                                    if (!empty($section[$field['field_slug']][$i]) && $section[$field['field_slug']][$i] == 'on') {
                                                                        $checked1 = 'checked';
                                                                    }else{
                                                                        if(!empty($section['section_enable']) && $section['section_enable'] == 'on'){
                                                                            $checked1 = 'checked';

                                                                        }
                                                                    }

                                                                @endphp

                                                                <input type="hidden"
                                                                    name="array[{{ $json_key }}][{{ $field['field_slug'] }}][{{ $i }}]"
                                                                    value="off">
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="array[{{ $json_key }}][{{ $field['field_slug'] }}][{{ $i }}]"
                                                                    id="array[{{ $section['section_slug'] }}][{{ $field['field_slug'] }}]"
                                                                    {{ $checked1 }}>
                                                            @else

                                                                    @php
                                                                        $checked = '';
                                                                        if(!empty($field['field_default_text']) && $field['field_default_text'] == 'on')
                                                                        {
                                                                            $checked = 'checked';
                                                                        }
                                                                    @endphp
                                                                <input type="hidden"
                                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]"
                                                                    value="off">
                                                                <input type="checkbox" class="form-check-input mx-2"
                                                                    name="array[{{ $json_key }}][inner_list][{{ $inner_list_key }}][field_default_text]"
                                                                    id="array[{{ $section['section_slug'] }}][{{ $field['field_slug'] }}]"
                                                                        {{ $checked }}
                                                                    >

                                                            @endif

                                                            <label class="form-check-label"
                                                                for="array[ {{ $section['section_slug'] }}][{{ $field['field_slug'] }}]">
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                            </div>
                                        @endfor

                                    </div>
                                    @if($json_key+1 <= count($getStoreThemeSetting)-1)
                                        @if($getStoreThemeSetting[$json_key+1]['section_slug'] != $section['section_slug'])
                                </div>
                                        @endif
                                    @endif
                    @endforeach
                
                </div>
                </div>
            </div>  
        </div>
    </div>
  
</form>

@endsection
@push('js-page')
<script  src="{{asset('assets/js/choices.min.js')}}"></script>
<script>
    $('.data-pa').each(function() {
        $defaultBal = $(this).attr('data-val');
        $(this).children("option[value='"+$defaultBal+"']").attr("selected", true);
        var color = new Choices($(this)[0], {
        removeItemButton: true,shouldSort: false,
        noChoicesText: 'لا توجد قيم أخرى',
      });
    });

    //$("#categories option[value='{{getSetting('system_wilaya')}}']").attr("selected", true);
    // $("#theme option[value='{{getSetting('theme')}}']").attr("selected", true);
    // $("#checkout_page option[value='{{getSetting('checkout_page')}}']").attr("selected", true);
    // $("#stock_location_id option[value='{{getSetting('stock_location_id')}}']").attr("selected", true);
</script>
@endpush