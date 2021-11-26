<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ecom_sale extends Model
{
    use HasFactory;

    protected $table = 'ecomsales';

    protected $fillable = [
        'mt_client_id',
        'sale_ecom_id',
        'sale_id',
        'sale_channel',
        'sale_date',
        'sale_hour',
        'sale_amount',
        'sale_fee',
        'product_cost',
        'product_category',
        'buyer_name',
        'buyer_doc_type',
        'buyer_doc_number',
        'buyer_province',
        'buyer_country',
    ];

    public function getSaleHourAttribute($value)
    {
        return new \DateTime($value);
    }
}
