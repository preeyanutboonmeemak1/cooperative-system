<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students_information';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'si_id';

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
    protected $fillable = ['si_st_num', 'si_md_pre_th_id', 'si_firstname_th', 'si_lastname_th', 'si_md_pre_eng_id', 'si_firstname_en', 'si_lastname_en'];
}