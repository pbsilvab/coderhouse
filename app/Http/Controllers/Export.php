<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ecom_sale;

class Export extends Controller
{
    public function index ($mt_client_id) {

        $client = $this->get_clients($mt_client_id);

        $sqlclient = $this->get_sqlsvr_clients();
        dd($sqlclient);
        // $page = 0;
        // while ($orders = $this->get_orders_from_ecom($mt_client_id, $page)) {
        //     foreach($orders as $order) {
        //         dd($order);
        //     }
        //     $page++;
        // }

        dd($orders);
       // $products = $this->get_client_products($mt_client_id);

        dd($client);
        dd('done');
    }

    public function get_orders_from_ecom($client, $page) {

        return \DB::connection('ecom')
                ->table('mt_orders')
                ->select(
                        'mt_orders.id',
                        'mt_orders.mt_client_id',
                        'mt_orders.owner',
                        'mt_orders.owner_id',
                        'mt_orders.created',
                        'mt_contacts.first_name',
                        'mt_contacts.doc_type',
                        'mt_contacts.doc_number',
                        'mt_contacts.country_id',
                        'mt_contacts.address_state',
                        )
                ->join('mt_contacts', 'mt_contacts.id', 'mt_orders.mt_contact_id')
                ->where('mt_orders.mt_client_id', $client)
                ->where('mt_orders.created', '>=', '2019-01-01 00:00:00')
                ->limit(50)
                ->offset($page * 50)
                ->get();
    }

    public function get_clients($client) {
        return \DB::connection('ecom')
                ->table('mt_clients')
                ->where('id', $client)
                ->first();
    }

    public function get_client_products($client, $page) {
        return \DB::connection('ecom')
                ->table('mt_products')
                ->where('mt_client_id', $client)
                ->offset($page * 50)
                ->get();
    }

    public function get_order_list($mt_order_id) {
        return \DB::connection('ecom')
                ->table('mt_order_lists')
                ->where('mt_order_id', $mt_order_id)
                ->first();
    }

    public function get_order_contact($mt_contact_id) {
        return \DB::connection('ecom')
                ->table('mt_contacts')
                ->where('id', $mt_contact_id)
                ->first();
    }


    public function get_sqlsvr_clients() {
        return \DB::connection('sqlsrv')
                ->table('ecom_clients')
                ->first();
    }
}
