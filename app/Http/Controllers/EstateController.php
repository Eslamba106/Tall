<?php

namespace App\Http\Controllers;

use Image;
use App\Models\Estate;
use App\Models\EstateComb;
use App\Models\EstateType;
use App\Models\EstateProps;
use App\Models\EstateGroupe;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\singleSubscription;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EstateController extends Controller
{
    public function index(Request $request)
    {
        $ids = $request->bulk_ids;

        if ($request->bulk_action_btn === 'delete' &&  is_array($ids) && count($ids)) {


            Estate::whereIn('id', $ids)->delete();
            return back()->with('success', __('تم حذف الاعلانات بنجاح!'));
        }

        $estates = Estate::latest()->paginate(10);

        return view('estate.index', compact('estates'));
    }
    public function create()
    {
        $types = EstateType::latest()->get();
        return view('estate.create', compact('types'));
    }
    public function edit(Request $request, $id)
    {
        $estate =  Estate::findOrFail($id);
        $estateGroupe =  EstateGroupe::where('estate', $id)->get();
        if (getSetting('theme') == 'theme1') {
            $estateCombs = EstateComb::where('type', $estate->estate)->pluck('props')->all();
            $estateProps = EstateProps::whereIn('id', $estateCombs)->get();
        } else {
            $estateProps = EstateProps::all();
        }
        $theme = getSetting('theme');
        if ($theme == 'theme1') {
            $types = EstateType::find($estate->estate);
        } else {
            $types = EstateType::where('name', $estate->estate)->first();
        }
        return view('estate.edit', compact('estate', 'types', 'estateProps', 'estateGroupe'));
    }
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'string', 'unique:' . Estate::class],
        ], [
            'name.unique' => 'اسم المنتج مستخدم من قبل',
        ]);
        $subsUser = auth()->user();
        $subscription  = singleSubscription::find($subsUser->subscription);
        if ($subscription && $subscription->id != 3 && $subscription->ads < $subsUser->subscriptionAds) {
            $msg['flag'] = 'error';
            $msg['msg']  = 'يجب تجديد الاشتراك';
            return $msg;
        }
        $subsUser->subscriptionAds = $subsUser->subscriptionAds + 1;
        $subsUser->save();

        if ($validator->fails()) {
            $msg['flag'] = 'error';
            $msg['msg']  = $validator->errors()->first();
            return $msg;
        }
        $theme = getSetting('theme');
        if ($theme == 'theme1') {
            $types = EstateType::find($request->estate);
        } else {
            $types = EstateType::where('name', $request->estate)->first();
        }
        $estate             = new Estate();
        $estate->name     = $request->name;
        $estate->type     = $request->type;
        if ($theme == 'theme2') {
            $estate->goal     = 'بيع';
            $estate->model     = $request->model;
        } else {
            $estate->goal     = $request->goal;
        }

        $estate->estate     = $request->estate;
        $estate->estatetxt     = $types->name;
        $estate->city     = $request->city;
        $estate->state     = $request->state;
        $estate->statetxt     = $request->statetxt;
        $estate->maps     = $request->map;
        $estate->save();
        return ['status' => true, 'id' => $estate->id];
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        if ($request->is_cover_image_q == 'on') {
            $validator =  Validator::make($request->all(), [
                'multiple_files.*' => 'required|mimes:jpeg,png,jpg,webp|max:5048',
                'price' => ['required', 'integer'],
            ], [
                'price.required' => 'يجب تحديد سعر',
                'multiple_files.mimes' => 'صيغ الصور غير ملائمة تأكد من استخدام jpeg,png,jpg,webp',
                'multiple_files.max.file' => 'حجم الصور الأقصى 5M',
                'is_cover_image.max.file' => 'حجم الصور الأقصى 5M',
            ]);
        } else {
            $validator =  Validator::make($request->all(), [
                'is_cover_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5048',
                'multiple_files.*' => 'required|mimes:jpeg,png,jpg,webp|max:5048',
                'price' => ['required', 'integer'],
            ], [
                'is_cover_image.image' => 'الرجاء تحديد صورة للمنتج',
                'price.required' => 'يجب تحديد سعر',
                'is_cover_image.mimes' => 'صيغ الصور غير ملائمة تأكد من استخدام jpeg,png,jpg,webp',
                'multiple_files.mimes' => 'صيغ الصور غير ملائمة تأكد من استخدام jpeg,png,jpg,webp',
                'multiple_files.max.file' => 'حجم الصور الأقصى 5M',
                'is_cover_image.max.file' => 'حجم الصور الأقصى 5M',
            ]);
        }

        if ($validator->fails()) {
            $msg['flag'] = 'error';
            $msg['msg']  = $validator->errors()->first();
            return $msg;
        }
        if (!empty($request->multiple_files) && count($request->multiple_files) > 0) {
            File::cleanDirectory(public_path('uploads/product_image/' . $id . '/'));
            foreach ($request->multiple_files as $file) {
                $path = public_path('uploads/product_image/' . $id . '/');

                $image = Image::make($file);

                !(file_exists($path)) && mkdir($path, 0777, true);

                $uniqe_id = uniqid();

                $name = $uniqe_id . '_' . str_replace(' ', '', $file->getClientOriginalName());

                $name_cover_fhd =  'fhd_' . $uniqe_id . '_' . str_replace(' ', '', $file->getClientOriginalName());

                $image->widen(800, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });


                $image->save($path . $name_cover_fhd);

                $name_cover_hd =  'hd_' . $uniqe_id . '_' . str_replace(' ', '', $file->getClientOriginalName());

                $image->fit(520, 520);
                $image->save($path . $name_cover_hd);

                $name_cover_sd =  'sd_' . $uniqe_id . '_' . str_replace(' ', '', $file->getClientOriginalName());

                $image->fit(85, 85, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $image->save($path . $name_cover_sd);

                $file_name[]     = $name;
            }
        }

        if (!empty($request->is_cover_image) && $request->is_cover_image_q != 'on') {


            $path = public_path('uploads/cover_image/');

            !(file_exists($path)) && mkdir($path, 0777, true);
            $image = Image::make($request->is_cover_image);
            $uniqe_id = uniqid();

            $name_cover =  $uniqe_id . '_' . str_replace(' ', '', $request->is_cover_image->getClientOriginalName());

            $name_cover_hdf =  'fhd_' . $uniqe_id . '_' . str_replace(' ', '', $request->is_cover_image->getClientOriginalName());

            $image->widen(800, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });

            $image->save($path . $name_cover_hdf);

            $name_cover_hd =  'hd_' . $uniqe_id . '_' . str_replace(' ', '', $request->is_cover_image->getClientOriginalName());

            $image->fit(520, 520);
            //  $image->insert(asset('uploads/settings/watermark/'.getSetting('watermark')), 'bottom-right', 15, 15);
            $image->save($path . $name_cover_hd);

            $name_cover_sd =  'sd_' . $uniqe_id . '_' . str_replace(' ', '', $request->is_cover_image->getClientOriginalName());

            $image->fit(460, 300, function ($constraint) {
                $constraint->upsize();
            });
            $image->save($path . $name_cover_sd);

            $name_cover_sd =  's2_' . $uniqe_id . '_' . str_replace(' ', '', $request->is_cover_image->getClientOriginalName());

            $image->fit(260, 240, function ($constraint) {
                $constraint->upsize();
            });
            $image->save($path . $name_cover_sd);


            $name_cover_sm =  'sm_' . $uniqe_id . '_' . str_replace(' ', '', $request->is_cover_image->getClientOriginalName());

            $image->fit(75, 75, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save($path . $name_cover_sm);
        }
        $estate             =  Estate::findOrFail($id);
        $estate->price     = $request->price;
        if ($request->publish) {
            $estate->status     = 1;
        } else {
            $estate->status     = 0;
        }
        $estate->description     = $request->description;
        if ($request->gas) {
            $estate->gas     = $request->gas;
        }
        if ($request->newer) {
            $estate->newer     = $request->newer;
        }
        if ($request->motor) {
            $estate->motor     = $request->motor;
        }
        if ($request->video) {
            $estate->video     = $request->video;
        }
        if ($request->trade) {
            $estate->trade     = $request->trade;
        }
        $estate->maps     = $request->map;
        $estate->city     = $request->city;
        $estate->color     = $request->colorCode;
        $estate->colortxt     = $request->colortxt;
        $estate->phone     = $request->phone3;
        // $estate->methode     = $request->methode;
        $estate->state     = $request->state;
        if ($request->is_cover_image_q != 'on') {
            $estate->thumbnail_image = !empty($request->is_cover_image) ? $name_cover : '';
        }
        $estate->save();
        if ($request->props) {

            foreach ($request->props as $key => $prop) {
                $estate_groupe = EstateGroupe::updateOrCreate([
                    'estate' => $estate->id,
                    'props' => $request->ids[$key],
                    'name'  => $request->names[$key],
                ], [
                    'value' => $prop,
                ]);
            }
        }
        $objStore_old = ProductImage::where('estate_id', $request->id)->get()->pluck('id');
        ProductImage::destroy($objStore_old);

        if (!empty($file_name)) {

            foreach ($file_name as $file) {
                $objStore = ProductImage::create(
                    [
                        'estate_id' => $request->id,
                        'product_images' => $file,
                    ]
                );
            }
        }

        return ['status' => true, 'id' => $estate->id];
    }

    public function status(Request $request)
    {
        $estate =  Estate::findOrFail($request->id);
        $estate->status = $request->status;
        $estate->save();
        return ['flag' => 1, 'status' => $request->status];
    }
    public function imagesUpload(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5048',
        ]);
        if ($validator->fails()) {
            return \Response::json(['status' => 0], 400);
        }
        if (!empty($request->image)) {
            $path = public_path('uploads/content/');

            !(file_exists($path)) && mkdir($path, 0777, true);
            $image = Image::make($request->image);
            $uniqe_id = uniqid();

            $name_cover_hdf =  'fhd_' . $uniqe_id . '_' . str_replace(' ', '', $request->image->getClientOriginalName());

            $image->fit(860, null, function ($constraint) {
                $constraint->upsize();
            });

            $image->save($path . $name_cover_hdf);
            return \Response::json(['status' => 1, 'path' => $name_cover_hdf], 200);
        }
    }

    public function destroy($id)
    {
        $estate = Estate::findOrFail((int)$id);
        $estateGroupe = EstateGroupe::where('estate', $id);
        $estate->delete();
        $estateGroupe->delete();
        return redirect()->back()->with(
            'success',
            __('تم حذف الاعلان بنجاح!')
        );
    }
}
