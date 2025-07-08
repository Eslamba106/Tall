<?php
namespace App\Http\Controllers;

use App\Http\Helpers\Helpers;
use Illuminate\Http\Request;
use App\Models\BusinessSetting;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\File;
use function App\Http\Helpers\auto_translator;
use function App\Http\Helpers\getLanguageCode; 

class LanguageController extends Controller
{

    public function index()
    {
        return view('admin-views.settings.language.index');
    }

    public function index_app()
    {
        return view('admin-views.settings.language.index-app');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Language is required!',
        ]);

        $language   =(new BusinessSetting())->setConnection('tenant')->where('type', 'language')->first();
        $lang_array = [];
        $codes      = [];
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] != $request['code']) {
                if (! array_key_exists('default', $data)) {
                    $default = ['default' => ($data['code'] == 'en') ? true : false];
                    $data    = array_merge($data, $default);
                }
                array_push($lang_array, $data);
                array_push($codes, $data['code']);
            }
        }
        array_push($codes, $request['code']);

        if (! file_exists(base_path('lang/' . $request['code']))) {
            mkdir(base_path('lang/' . $request['code']), 0777, true);
        }

        $lang_file = fopen(base_path('lang/' . $request['code'] . '/' . 'messages.php'), "w") or die("Unable to open file!");
        $read      = file_get_contents(base_path('lang/en/messages.php'));
        fwrite($lang_file, $read);

        $lang_array[] = [
            'id'        => count(json_decode($language['value'], true)) + 1,
            'name'      => $request['name'],
            'code'      => $request['code'],
            'direction' => $request['direction'],
            'status'    => 0,
            'default'   => false,
        ];

        (new BusinessSetting())->setConnection('tenant')->updateOrInsert(['type' => 'language'], [
            'value' => $lang_array,
        ]);

        $pnc  = DB::connection('tenant')->table('business_settings')->updateOrInsert(['type' => 'pnc_language'], [
            'value' => json_encode($codes),
        ]); 
        Toastr::success(translate('Language_Added'));
        return back();
    }

    public function update_status(Request $request)
    {
        $language   = (new BusinessSetting())->setConnection('tenant')->where('type', 'language')->first();
        $lang_array = [];
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] == $request['code']) {
                $lang = [
                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'direction' => $data['direction'] ?? 'ltr',
                    'code'      => $data['code'],
                    'status'    => $data['status'] == 1 ? 0 : 1,
                    'default'   => (array_key_exists('default', $data) ? $data['default'] : (($data['code'] == 'en') ? true : false)),
                ];
                $lang_array[] = $lang;
            } else {
                $lang = [
                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'direction' => $data['direction'] ?? 'ltr',
                    'code'      => $data['code'],
                    'status'    => $data['status'],
                    'default'   => (array_key_exists('default', $data) ? $data['default'] : (($data['code'] == 'en') ? true : false)),
                ];
                $lang_array[] = $lang;
            }
        }
        $businessSetting = (new BusinessSetting())->setConnection('tenant')->where('type', 'language')->update([
            'value' => $lang_array,
        ]);

        return $businessSetting;
    }

    public function update_default_status(Request $request)
    {
        $language   = (new BusinessSetting())->setConnection('tenant')->where('type', 'language')->first();
        $lang_array = [];
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] == $request['code']) {
                $lang = [
                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'direction' => $data['direction'] ?? 'ltr',
                    'code'      => $data['code'],
                    'status'    => 1,
                    'default'   => true,
                ];
                $lang_array[] = $lang;
            } else {
                $lang = [
                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'direction' => $data['direction'] ?? 'ltr',
                    'code'      => $data['code'],
                    'status'    => $data['status'],
                    'default'   => false,
                ];
                $lang_array[] = $lang;
            }
        }
        (new BusinessSetting())->setConnection('tenant')->where('type', 'language')->update([
            'value' => $lang_array,
        ]);

        Toastr::success(translate('Default_Language_Changed'));
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Language is required!',
        ]);

        $language   = (new BusinessSetting())->setConnection('tenant')->where('type', 'language')->first();
        $lang_array = [];
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] == $request['code']) {
                $lang = [
                    'id'        => $data['id'],
                    'name'      => $request['name'],
                    'direction' => $request['direction'] ?? 'ltr',
                    'code'      => $data['code'],
                    'status'    => 0,
                    'default'   => (array_key_exists('default', $data) ? $data['default'] : (($data['code'] == 'en') ? true : false)),
                ];
                $lang_array[] = $lang;
            } else {
                $lang = [
                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'direction' => $data['direction'] ?? 'ltr',
                    'code'      => $data['code'],
                    'status'    => $data['status'],
                    'default'   => (array_key_exists('default', $data) ? $data['default'] : (($data['code'] == 'en') ? true : false)),
                ];
                $lang_array[] = $lang;
            }
        }
        (new BusinessSetting())->setConnection('tenant')->where('type', 'language')->update([
            'value' => $lang_array,
        ]);
        Toastr::success(translate('Language_updated'));
        return back();
    }

    public function translate($lang)
    {
        return view('admin-views.business-settings.language.translate', compact('lang'));
    }

    public function translate_list($lang)
    {
        $data = [];
        $path = base_path('lang/' . $lang . '/messages.php');
        if (File::exists($path)) {
            $lang_data = include base_path('lang/' . $lang . '/messages.php');
            ksort($lang_data);
            foreach ($lang_data as $key => $value) {
                $data[] = [
                    'key'   => $key,
                    'value' => $value,
                ];
            }
        }
        return response()->json($data);
    }

    public function translate_key_remove(Request $request, $lang)
    {
        $full_data = include base_path('lang/' . $lang . '/messages.php');
        unset($full_data[$request['key']]);
        $str = "<?php return " . var_export($full_data, true) . ";";
        file_put_contents(base_path('lang/' . $lang . '/messages.php'), $str);
    }

    public function translate_submit(Request $request, $lang)
    {
        $full_data     = include base_path('lang/' . $lang . '/messages.php');
        $data_filtered = [];
        foreach ($full_data as $key => $data) {
            $data_filtered[Helpers::remove_invalid_charcaters($key)] = $data;
        }
        $data_filtered[$request['key']] = $request['value'];
        $str                            = "<?php return " . var_export($data_filtered, true) . ";";
        file_put_contents(base_path('lang/' . $lang . '/messages.php'), $str);
    }

    public function auto_translate(Request $request, $lang): \Illuminate\Http\JsonResponse
    {
        $lang_code     = getLanguageCode($lang);
        $full_data     = include base_path('lang/' . $lang . '/messages.php');
        $data_filtered = [];

        foreach ($full_data as $key => $data) {
            $data_filtered[Helpers::remove_invalid_charcaters($key)] = $data;
        }

        $translated                     = auto_translator($request['key'], 'en', $lang_code);
        $data_filtered[$request['key']] = $translated;

        $str = "<?php return " . var_export($data_filtered, true) . ";";
        file_put_contents(base_path('lang/' . $lang . '/messages.php'), $str);

        return response()->json([
            'translated_data' => $translated,
        ]);
    }

    public function delete($lang)
    {
        $language = (new BusinessSetting())->setConnection('tenant')->where('type', 'language')->first();

        $del_default = false;
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] == $lang && array_key_exists('default', $data) && $data['default'] == true) {
                $del_default = true;
            }
        }

        $lang_array = [];
        foreach (json_decode($language['value'], true) as $key => $data) {
            if ($data['code'] != $lang) {
                $lang_data = [
                    'id'        => $data['id'],
                    'name'      => $data['name'],
                    'direction' => $data['direction'] ?? 'ltr',
                    'code'      => $data['code'],
                    'status'    => ($del_default == true && $data['code'] == 'en') ? 1 : $data['status'],
                    'default'   => ($del_default == true && $data['code'] == 'en') ? true : (array_key_exists('default', $data) ? $data['default'] : (($data['code'] == 'en') ? true : false)),
                ];
                array_push($lang_array, $lang_data);
            }
        }

        (new BusinessSetting())->setConnection('tenant')->where('type', 'language')->update([
            'value' => $lang_array,
        ]);

        $dir = base_path('lang/' . $lang);
        if (File::isDirectory($dir)) {
            $it    = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
            $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
            foreach ($files as $file) {
                if ($file->isDir()) {
                    rmdir($file->getRealPath());
                } else {
                    unlink($file->getRealPath());
                }
            }
            rmdir($dir);
        }

        $languages    = [];
        $pnc_language = (new BusinessSetting())->setConnection('tenant')->where('type', 'pnc_language')->first();
        foreach (json_decode($pnc_language['value'], true) as $key => $data) {
            if ($data != $lang) {
                array_push($languages, $data);
            }
        }
        if (in_array('en', $languages)) {
            unset($languages[array_search('en', $languages)]);
        }
        array_unshift($languages, 'en');

        DB::table('business_settings')->updateOrInsert(['type' => 'pnc_language'], [
            'value' => json_encode($languages),
        ]);

        Toastr::success(translate('Removed_Successfully'));
        return back();
    }
}
