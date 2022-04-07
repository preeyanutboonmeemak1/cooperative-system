<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reportweek extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'week_reports';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'wr_id';

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
    protected $fillable = ['wr_st_id', 'wr_week_id', 'wr_name', 'status'];
}