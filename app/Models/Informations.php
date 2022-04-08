<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class informations extends Model
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
    protected $fillable = ['si_st_num', 'si_st_card', 'si_md_pre_th_id', 'si_firstname_th', 'si_middlename_th', 'si_lastname_th', 'si_md_pre_eng_id', 'si_firstname_en', 'si_middlename_en', 'si_lastname_en', 'si_nickname', 'si_md_year_of_study_id', 'si_md_year_class_id', 'si_md_faculty_id', 'si_md_field_id', 'si_md_course_id', 'si_dob', 'si_md_ethnicity_id', 'si_md_nationality_id', 'si_md_gender_id', 'si_weight', 'si_height', 'si_gpa', 'si_last_gpa', 'si_phone_num', 'si_email', 'si_emergency_contact_name', 'si_emergency_contact', 'si_address', 'si_md_province_id', 'si_md_district_id', 'si_md_sub_district_id', 'si_md_postal_code_id', 'si_avatar_file'];
}