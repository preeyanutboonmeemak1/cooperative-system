<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'job';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'j_id';

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
     protected $fillable = ['j_id','j_week_id', 'j_problem', 'j_filereport'];
}