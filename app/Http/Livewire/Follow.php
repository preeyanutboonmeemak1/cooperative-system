<?php

namespace App\Http\Livewire;

use App\Models\StudentInformation;

use Illuminate\Support\Facades\Storage;
use App\Models\Jobs;
use App\Models\JobsDetails;
use App\Models\NextJobs;
use App\Models\Reportweek;
use Livewire\Component;

class Follow extends Component
{
    public $prefixTH;
    public $prefixEN;
    public $course;
    public $district;
    public $ethnicity;
    public $faculty;
    public $field;
    public $gender;
    public $nationality;
    public $postalcode;
    public $province;
    public $subdistrict;
    public $yearclass;
    public $yearofstudy;

    public $stu_id;
    public $studentID;
    public $studentNumber;
    public $studentPrefixTH;
    public $studentFirstNameTH;
    public $studentMidleNameTH;
    public $studentLastNameTH;
    public $studentPrefixEN;
    public $studentFirstNameEN;
    public $studentMidleNameEN;
    public $studentLastNameEN;
    public $StudentNickName;
    public $YearsClass;
    public $YearsStudy;
    public $StudentFaculty;
    public $StudentField;
    public $StudentCourse;
    public $StudentGPA;
    public $StudentLastGPA;
    public $StudentDOB;
    public $StudentEthnicity;
    public $StudentNationality;
    public $StudentSadsana;
    public $StudentGender;
    public $StudentHeight;
    public $StudentWeight;
    public $StudentCard;
    public $StudentAddress;
    public $StudentMhu;
    public $StudentSoy;
    public $StudentRoad;
    public $StudentSubDistrict;
    public $StudentDistrict;
    public $StudentProvince;
    public $StudentPostalcode;
    public $StudentPhone;
    public $StudentEmail;
    public $StudentAvatar;
    public $StudentContactName;
    public $StudentContactAs;
    public $StudentContactPhone;
    

    public $week_id;
    public $details;
    public $problem;
    
    public $j_id;
    public $j_week_id;
    public $j_problem;
    public $j_filereport;
    public $j_file;

    public $jdt_id;
    public $jdt_j_id;
    public $jdt_date;
    public $jdt_details;

    public $njdt_id;
    public $njdt_j_id;
    public $njdt_start_date;
    public $njdt_end_date;
    public $njdt_details;

    public $weekre;



    public function mount($id)
    {
        $this->stu_id = $id;
        $week_job = Reportweek::select('*')
        ->where('wr_st_id',$this->stu_id)
        ->get()
        ->sortDesc();
        // dd($week_job[count($week_job)-1]['wr_week_id']);
        $this->weekre = $week_job[count($week_job)-1]['wr_week_id'];
    }

    public function render()
    {
        
        $report = Jobs::select('*')
        ->join('job_details', 'job.j_id', '=', 'job_details.jdt_j_id')
        ->join('next_job_details', 'job.j_id', '=', 'next_job_details.njdt_j_id')
        ->get();
        
        $week_job = Reportweek::select('*')
        ->where('wr_st_id',$this->stu_id)
        ->get()
        ->sortDesc();
        
       

        $w_id = Reportweek::select('wr_id')
        ->where('wr_st_id',$this->stu_id)
        ->where('wr_week_id',$this->weekre)
        ->get();
        $w_id = $w_id[0]['wr_id'];
        // dd($w_id);
        $job = Jobs::select('*')
         ->where('j_week_id',$w_id)
         ->get();
       
        //  dd($job);
        $jobday = Jobs::select('*')
        ->join('job_details', 'j_id', '=', 'job_details.jdt_j_id')
        ->where('j_week_id',$w_id)
        ->get();

        $jobnext = Jobs::select('*')
        ->join('next_job_details', 'j_id', '=', 'next_job_details.njdt_j_id')
        ->where('j_week_id',$w_id)
        ->get();




        $studentInformation = StudentInformation::all();
        $si_id = $this->stu_id;
        $this->studentID = $si_id;
        $studentInformation = StudentInformation::select('*')
            ->join('master_prefix_th', 'master_prefix_th.id', '=', 'si_md_pre_th_id')
            ->join('master_prefix_eng', 'master_prefix_eng.id', '=', 'si_md_pre_eng_id')
            ->join('master_year_of_study', 'master_year_of_study.id', '=', 'si_md_year_of_study_id')
            ->join('master_year_class', 'master_year_class.id', '=', 'si_md_year_class_id')
            ->join('master_faculty', 'master_faculty.id', '=', 'si_md_faculty_id')
            ->join('master_field', 'master_field.id', '=', 'si_md_field_id')
            ->join('master_course', 'master_course.id', '=', 'si_md_course_id')
            ->join('master_ethnicity', 'master_ethnicity.id', '=', 'si_md_ethnicity_id')
            ->join('master_nationality', 'master_nationality.id', '=', 'si_md_nationality_id')
            ->join('master_gender', 'master_gender.id', '=', 'si_md_gender_id')
            ->join('master_province', 'master_province.id', '=', 'si_md_province_id')
            ->join('master_district', 'master_district.id', '=', 'si_md_district_id')
            ->join('master_sub_district', 'master_sub_district.id', '=', 'si_md_sub_district_id')
            ->join('master_postal_code', 'master_postal_code.id', '=', 'si_md_postal_code_id')
            ->join('companies', 'si_co_copanie', '=', 'cp_co_student')
            ->where('si_id', '=', $this->studentID)
            ->get();

        return view('livewire.followreport.follow',[
            'students' => $studentInformation,
            'dailyreport' => $report,
            'week'  => $week_job,
            'jobs' => $job,
            'jobsday' => $jobday,
            'jobsnext' => $jobnext

        ]);
    }

    public function export($id)
    {
        $job = Jobs::find($id);
        return Storage::download($job->j_filereport);
    }

}