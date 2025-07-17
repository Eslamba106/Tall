<?php

namespace App\Http\Controllers\Api\admin;

use App\Http\Controllers\Api\Controller;
use App\Models\Customer;
use App\Services\CustomerService;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public $customer;
    public function __construct(CustomerService $customer)
    {
        $this->customer = $customer;
    }

    public function list(Request $request)
    {
        $list = $this->customer->get_customer_list();
        $ids  = $request->bulk_ids;
        if ($request->bulk_action_btn === 'update_status' && is_array($ids) && count($ids)) {
            $data = ['status' => 1];
            (new Customer())->setConnection('tenant')->whereIn('id', $ids)->update($data);
            return back()->with('success', __('general.updated_successfully'));
        }
        $search      = $request['search'];
        $query_param = $search ? ['search' => $request['search']] : '';
        $customer    = (new Customer())->setConnection('tenant')->when($request['search'], function ($q) use ($request) {
            $key = explode(' ', $request['search']);
            foreach ($key as $value) {
                $q->Where('name', 'like', "%{$value}%")
                    ->orWhere('id', $value);
            }
        })
            ->latest()->paginate()->appends($query_param);

        $data = [
            'customers' => $customer,
            'search'   => $search,
        ];
        return view("dash.customer.list", $data);
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $main_customer = $this->customer->store_customer($request);
        if ($main_customer) {
            Toastr::success(translate('Customer_added_successfully'));
            return redirect()->route('admin.customer.list');
        }
        Toastr::error(translate('something_error'));
        return redirect()->back()->with('error', 'حدث خطأ')->withInput();
    }

    public function create(){

        return view('dash.customer.create');
    }
    public function edit($id){

        $customer = $this->customer->get_customer($id);
        $data = [
            'customer' => $customer,
        ];
        return view('dash.customer.edit' , $data);
    }
    public function update(Request $request, $id)
    {
        $customer = $this->customer->update_customer($id, $request);
        if ($customer) {
                    Toastr::success(__('تم التعديل بنجاح'));

            return redirect()->route('admin.customer.list');
        }
        Toastr::error(__('something_error'));
    }
    public function get_customer($id)
    {
        $customer = $this->customer->get_customer($id);
        if (! $customer) {
            return response()->apiFail('Customer not found', 404);
        }
        return response()->apiSuccess('Customer updated successfully', $customer);
    }

    public function delete(Request $request)
    {

        $customer = $this->customer->delete_customer($request->id);
        if (! $customer) {
            return redirect()->back()->with('error', 'لم يتم العثور عليه');
        }
        return redirect()->back()->with('success' , __('تم الحذف بنجاح'));
    }

}
