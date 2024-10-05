<?php

namespace App\Models\merchant;

use Illuminate\Database\Eloquent\Model;

class MerchantsInfo extends Model
{
    public $timestamps = false;

    protected $table = 'merchants';

    protected $fillable = ['id', 'uid', 'user_id', 'owner_name', 'owner_phone', 'owner_email',
        'company_name', 'company_phone', 'company_email', 'address',
        'status', 'create_by', 'create_date', 'update_by', 'update_date'];

}

