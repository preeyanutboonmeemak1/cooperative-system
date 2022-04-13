<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormInformation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'form_information';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'fi_id';

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
    protected $fillable = ['fi_phone','fi_id','fi_index','fi_user_id','fi_gad', 'fi_road', 'fi_tone', 'fi_dormitory', 'fi_num_room', 'fi_house_num', 'fi_road2', 'fi_fname_parent', 'fi_lname_parent', 'fi_house_num_parent', 'fi_road_parent', 'fi_tone2', 'fi_email_parent'];
}