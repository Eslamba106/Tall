<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Estate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ordersExport implements FromCollection, WithHeadings
{

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $orders = Estate::latest();

        if (\Str::contains( $this->request->input('date_range'), '-') && $this->request->input('date_range') != null) {
            $date_var = explode(" - ", $this->request->input('date_range'));
        } else {
            $date_var = [date("d-m-Y", strtotime('7 days ago')), date("d-m-Y", strtotime('today'))];
        }

        $orders = $orders->where('created_at', '>=', date("Y-m-d", strtotime($date_var[0])))->where('created_at', '<=',  date("Y-m-d", strtotime($date_var[1]) + 86400000))->get();

        return $orders->map(function ($order) {
            if ($order->orderGroup) {
            //$json = file_get_contents(asset('assets/wilaya.json')); 
            $ItemName = ProductsNameAdvs($order);

            return [
                'order_name' => $order->orderGroup->guest_user_name,
                'order_phone' => $order->orderGroup->phone_no,
                'phone2' => '',
                'products' => $ItemName[0],
                'qnt' => $ItemName[1],
                'adress' => optional($order->orderGroup)->guest_user_addrs,
                'wilaya' => $order->orderGroup->wilaya,
                //'wilayaname' => json_decode($json,true)[$order->orderGroup->wilaya-1]['name'],
                'city' => optional($order->orderGroup)->city,
                'total' => optional($order->orderGroup)->grand_total_amount,
                'note' => optional($order->orderGroup)->notes,
                'stopdesk' => ($order->shipping_delivery_type == 1)?'0':'1',
            ];
        }

        });
    }

    public function headings(): array
    {
        return [
            'Nom complet',
            'Téléphone 1',
            'Téléphone 2',
            'Produit',
            'Quantité',
            'Adresse',
            'Wilaya',
            //'Wilaya Nom',
            'Commune',
            'Total a ramasser',
            'Note',
            'Stopdesk',
        ];
    }
}