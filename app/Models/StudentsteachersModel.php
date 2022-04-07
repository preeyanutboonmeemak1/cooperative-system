<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class StudentsteachersModel extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'students_teachers';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'st_id';

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
     protected $fillable = ['st_id','st_st_num', 'st_name', 'st_md_year_class_id', 'st_md_faculty_id', 'st_md_course_id', 'st_teachers_name'];

     public function getData(){
        $query = DB::table('students_teachers')
                    ->select('st_md_year_class_id','st_md_faculty_id','st_md_course_id','md_faculty','md_course','st_id','st_st_num', 'st_name')
                    ->leftJoin('master_course','master_course.id','=','st_md_course_id')
                    ->leftJoin('master_faculty','master_faculty.id','=','st_md_faculty_id');
        return $query->get();
        
    }
}