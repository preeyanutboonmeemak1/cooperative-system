<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companys extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'cp_id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cp_name_th',
        'cp_name_en',
        'cp_address_no',
        'cp_address_moo',
        'cp_address_soy',
        'cp_address_road',
        'cp_address_sub_district',
        'cp_address_district',
        'cp_address_province',
        'cp_address_zipcode',
        'cp_address_latitude',
        'cp_address_longitude'
    ];
}