<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use App\Models\Master\PrefixEN;
use App\Models\Master\PrefixTH;
use App\Models\Master\YearClass;
use App\Models\StudentInformation;

class ProfileStudent extends Component
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

    public function mount($id)
    {
        $this->stu_id = $id;

    }

    public function render()
    {
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
                        ->where('si_id','=',$this->studentID)
                        ->get();
        return view('livewire.student-information.profile-student', [
            'students' => $studentInformation,
        ]);
    }

    public function save()
    {
        
      
    }
    
}