<?php

namespace App\Models\Import;

use Illuminate\Database\Eloquent\Model;

class ImportTeacher extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'import_teachers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'it_id';

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
    protected $fillable = ['it_md_pre_th_id', 'it_firstname_th', 'it_lastname_th', 'it_md_pre_eng_id', 'it_firstname_en', 'it_lastname_en'];
}