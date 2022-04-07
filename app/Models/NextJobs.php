<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NextJobs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'next_job_details';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'njdt_id';

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
     protected $fillable = ['njdt_id','njdt_j_id', 'njdt_start_date', 'njdt_end_date', 'njdt_details'];
}