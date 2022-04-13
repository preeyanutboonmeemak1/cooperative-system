<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class StudentscompanysModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students_companys';

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
    protected $fillable = ['si_st_num', 'si_st_num', 'si_md_pre_th_id', 'si_firstname_th', 'si_middlename_th', 'si_lastname_th', 'si_md_pre_eng_id', 'si_firstname_en', 'si_middlename_en', 'si_lastname_en', 'si_nickname', 'si_md_year_of_study_id', 'si_md_year_class_id', 'si_md_faculty_id', 'si_md_field_id', 'si_md_course_id', 'si_dob', 'si_md_ethnicity_id', 'si_md_nationality_id', 'si_md_gender_id', 'si_weight', 'si_height', 'si_gpa', 'si_last_gpa', 'si_phone_num', 'si_email', 'si_emergency_contact_name', 'si_emergency_contact', 'si_address', 'si_md_province_id', 'si_md_district_id', 'si_md_sub_district_id', 'si_md_postal_code_id', 'si_avatar_file'];

    public function getData($c,$f,$t,$co,$y)
    {
        $c2 = "=";
        $t2 = "=";
        $y2 = "=";
        $f2 = "=";
        $c2 = "=";
        $co2 = "=";
        if($c == 0){
            $c2 = "!=";
        }
        if($t == 0){
            $t2 = "!=";
        }
        if($co == 0){
            $co2 = "!=";
        }
        if($f == 0){
            $f2 = "!=";
        }
        if($y == 0){
            $y2 = "!=";
        }
        $query = DB::table('students_information')
            ->select('*')
            ->leftJoin('master_course', 'master_course.id', '=', 'si_md_course_id')
            ->leftJoin('master_faculty', 'master_faculty.id', '=', 'si_md_faculty_id')
            ->leftJoin('master_prefix_th', 'master_prefix_th.id', '=', 'si_md_pre_th_id')
            ->where('si_co_teacher', $t2, $t)
            ->where('si_md_year_class_id', $y2, $y)
            ->where('si_md_faculty_id', $f2, $f)
            ->where('si_md_course_id', $c2, $c)
            ->where('si_co_copanie', $co2, $co);
          
        return $query->get();
    }
    public function getData2()
    {
        $query = DB::table('students_information')
            ->select('*')
            ->leftJoin('master_course', 'master_course.id', '=', 'si_md_course_id')
            ->leftJoin('master_faculty', 'master_faculty.id', '=', 'si_md_faculty_id')
            ->leftJoin('master_prefix_th', 'master_prefix_th.id', '=', 'si_md_pre_th_id')
            ->where('si_co_teacher', '=', NULL);
        return $query->get();
    }
}