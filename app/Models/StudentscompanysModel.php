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
    protected $primaryKey = 'sc_id';

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
    protected $fillable = ['sc_id', 'sc_st_num', 'sc_name', 'sc_md_year_class_id', 'sc_md_faculty_id', 'sc_md_course_id', 'sc_companys_name', 'sc_teachers_name'];

    public function getData()
    {
        $query = DB::table('students_companys')
            ->select('sc_md_year_class_id', 'sc_md_faculty_id', 'sc_md_course_id', 'md_faculty', 'md_course', 'sc_id', 'sc_st_num', 'sc_name')
            ->leftJoin('master_course', 'master_course.id', '=', 'sc_md_course_id')
            ->leftJoin('master_faculty', 'master_faculty.id', '=', 'sc_md_faculty_id');
        return $query->get();
    }
}
