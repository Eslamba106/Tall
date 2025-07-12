<?php

namespace App\Repo;

use Illuminate\Http\Request;
use App\Http\Helpers\ImageManager;
use Illuminate\Pagination\Paginator;

class AbstractRepo
{
    protected $model;

    public function __construct(string $model)
    {
        $this->model = $model;
    }
    public function store_ads(Request $request)
    {
        $data = $request->all();
        $data['status'] = 'active'; // Default status
        $data['name'] = $request->input('name'); // Optional field
        $data['video_link'] = $request->input('video_link', null); // Optional field
        $data['estate_product_id'] = $request->input('estate_product_id', null); // Optional field
        $data['estate_type_id'] = $request->input('estate_type_id', null); // Optional field
        $data['estate_transactions_id'] = $request->input('estate_transactions_id', null); // Optional field
        $data['city_id'] = $request->input('city_id', null); // Optional field
        $data['district_id'] = $request->input('district_id', null); // Optional field
        $data['car_type_id'] = $request->input('car_type_id', null); // Optional field
        $data['car_model_id'] = $request->input('car_model_id', null); // Optional field
        $data['model_year'] = $request->input('model_year', null); // Optional field
        $data['sale_price'] = $request->input('sale_price', null); // Optional field
        $data['rent_price'] = $request->input('rent_price', null); // Optional field    
        $data['description'] = $request->input('description', null); // Optional field
        $data['car_color'] = $request->input('car_color', null); // Optional field
        $data['car_status'] = $request->input('car_status', null); // Optional field
        $data['car_motor_status'] = $request->input('car_motor_status', null); // Optional field
        $data['oil'] = $request->input('oil', null); // Optional field
        $data['financing'] = $request->input('financing', null); // Optional field
        $data['price_when_call'] = $request->input('price_when_call', null);
        $data['thumbnail']       = $request->input('thumbnail', null);
        $data['phone']       = $request->input('phone', null);
        $data['mileage']       = $request->input('mileage', null);
        $data['facade']       = $request->input('facade', null);
        $data['pieceLength']       = $request->input('pieceLength', null);
        $data['space']       = $request->input('space', null);
                    
        $data['method']       = $request->input('method', null);
         if ($request->hasFile('thumbnail')) {
        $image_name = ImageManager::upload('ads/', 'webp', $request->file('thumbnail'));
        $data['thumbnail'] = json_encode($image_name);
         }
        $product_images  = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $image_name = ImageManager::upload('ads/', 'webp', $image);
                $product_images[] = $image_name;
            }
        }
        $data['images']       = json_encode($product_images);

        return $this->create($data);
    }
    public function findOrFail($id)
    {
        return $this->model::findOrfail($id);
    }

    public function getAll()
    {
        return $this->model::get();
    }
    public function show($id)
    {
        return $this->model::where('id', $id)->first();
    }
    public function getAllWith($key, $value)
    {
        return $this->model::where($key, $value)->paginate(6);
    }

    public function getPaginate($paginate = 10)
    {
        return $this->model::paginate($paginate);
    }



    public function getAllOrderBy($column, $sort)
    {
        return $this->model::orderBy($column, $sort)->get();
    }

    public function findWhere($column, $value)
    {
        return $this->model::where($column, $value)->get();
    }

    public function findWhereIn($column, array $values)
    {
        return $this->model::whereIn($column, $values)->get();
    }

    public function getWhereOperand($column, $operand, $value)
    {
        return $this->model::where($column, $operand, $value)->get();
    }


    public function findWhereFirst($column, $value)
    {
        return $this->model::where($column, $value)->firstOrFail();
    }
    public function create($data)
    {
        return $this->model::create($data);
    }

    public function update($data, $item)
    {
        return $item->update($data);
    }
    public function Paginate(array $input, array $wheres, $model = null)
    {
        $currentPage = $input["offset"];
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        $this->model = new $this->model;
        if ($input["resource"] == "custom" && is_array($input["resource_columns"]) && count($input["resource_columns"]) > 0) {
            $this->model = $this->model->select(implode(",", $input["resource_columns"]));
        }
        if ($input["deleted"] == "deleted") {
            $this->model = $this->model->onlyTrashed();
        } else {
            $this->model = $this->model->withTrashed();
        }
        if ($input["with"] != []) {
            $this->model = $this->model->with($input["with"]);
        }
        if ($input["has"] != null) {
            $this->model = $this->model->whereHas($input["has"]);
        }
        if (count($wheres)) {
            foreach ($wheres as $where) {
                switch ($where[1]) {
                    case 'in':
                        $this->model = $this->model->whereIn($where[0], $where[2]);
                        break;
                    default:
                        $this->model = $this->model->where($where[0], $where[1], $where[2]);
                }
            }
        }
        $this->model = $this->model->orderBy($input["field"], $input["sort"]);
        return $input["paginate"] != "false" ? $this->model->paginate($input["limit"]) : $this->model->get();
    }
    public function Meta($data, $input)
    {
        $pages = [];
        if ($input["paginate"] != "false") {
            for ($i = 1; $i <= $data->lastPage(); $i++) {
                $pages[] = $i;
            }
        }
        return [
            'total' => $data->count(),
            'currentPage' => $input["offset"],
            'pages' => $pages,
            'lastPage' => $input["paginate"] != "false" ? $data->lastPage() : 1,
        ];
    }
    public function bulkDelete(array $ids)
    {
        $allRows = $this->model::withTrashed()->find($ids);
        foreach ($allRows as $row) {

            if ($row->trashed()) {
                $row->forceDelete();
            } else {
                $row->delete();
            }
        }
        return true;
    }

    public function bulkRestore(array $ids)
    {
        $allRows = $this->model::onlyTrashed()->find($ids);
        foreach ($allRows as $row) {
            $row->restore();
        }
        return true;
    }

    // ads functions

}
