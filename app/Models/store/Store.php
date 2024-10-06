<?php

namespace App\Models\store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';

    public $timestamps = false;
    protected $fillable = ['id','user_id', 'uid','store_name', 'address', 'contact_phone',
        'secondary_phone','email', 'div_id', 'dis_id', 'out_id','thn_id',
        'status', 'create_by', 'create_date', 'update_by', 'update_date'];


}
