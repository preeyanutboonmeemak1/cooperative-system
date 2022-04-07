<?php

namespace App\Models\Import;

use Illuminate\Database\Eloquent\Model;

class ImportStudent extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'import_students';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'is_id';

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
    protected $fillable = ['is_st_num', 'is_md_pre_th_id', 'is_firstname_th', 'is_lastname_th', 'is_md_pre_eng_id', 'is_firstname_en', 'is_lastname_en'];
}