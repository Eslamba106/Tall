<?php
namespace App\Http\Controllers;

use App\Http\Helpers\Helpers;
use App\Models\EstateProduct;
use App\Models\Translation;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index(Request $request)
    {
        $query_param = [];
        $search      = $request['search'];
        if ($request->has('search')) {
            $key      = explode(' ', $request['search']);
            $products = EstateProduct::where(function ($q) use ($key) {

                $translation_ids = Translation::where('translationable_type', 'App\Models\EstateProduct')
                    ->where('key', 'name')
                    ->where(function ($q) use ($key) {
                        foreach ($key as $value) {
                            $q->orWhere('value', 'like', "%{$value}%");
                        }
                    })->pluck('translationable_id');

                foreach ($key as $value) {
                    $q->orWhere('name', 'like', "%{$value}%")->orWhereIn('id', $translation_ids);
                }
            });
            $query_param = ['search' => $request['search']];
        } else {
            $products = EstateProduct::whereNotNull('id');
        }

        $products = $products->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('admin-views.settings.view', compact('products', 'search'));
    }
}
