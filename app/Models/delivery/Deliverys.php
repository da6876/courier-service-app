<?php

namespace App\Models\delivery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverys extends Model
{
    protected $table = 'delivery';

    public $timestamps = false;
    protected $fillable = ['id','uid','tracking_number','store_id', 'prod_type_id','merchant_order_id', 'recipient_phone',
        'recipient_sec_phone','recipient_name','recipient_address', 'div_id', 'dis_id', 'out_id','thn_id',
        'special_remark','delivery_type','total_weight','quantity','amount_to_collect', 'price', 'item_description',
        'status', 'create_by', 'create_date', 'update_by', 'update_date'];

}
