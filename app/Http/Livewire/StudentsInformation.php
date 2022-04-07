<?php

namespace App\Http\Livewire;

use App\Models\Master\Course;
use App\Models\Master\District;
use App\Models\Master\Ethnicity;
use App\Models\Master\Faculty;
use App\Models\Master\Field;
use App\Models\Master\Gender;
use App\Models\Master\Nationality;
use App\Models\Master\PostalCode;
use App\Models\Master\PrefixEN;
use App\Models\Master\PrefixTH;
use App\Models\Master\Province;
use App\Models\Master\SubDistrict;
use App\Models\Master\YearClass;
use App\Models\Master\YearOfStudy;
// use App\Models\Master\YearOfStudy;
//use App\Models\Student;
use App\Models\StudentInformation;
use Livewire\Component;

class StudentsInformation extends Component
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

    public function mount()
    {
        $prefixTH = PrefixTH::all();
        $prefixEN = PrefixEN::all();
        $course = Course::all();
        $district = District::all();
        $ethnicity = Ethnicity::all();
        $faculty = Faculty::all();
        $field = Field::all();
        $gender = Gender::all();
        $nationality = Nationality::all();
        $postalcode = PostalCode::all();
        $province = Province::all();
        $subdistrict = SubDistrict::all();
        $yearclass = YearClass::all();
        $yearofstudy = YearOfStudy::all();

        $this->prefixTH = $prefixTH;
        $this->prefixEN = $prefixEN;
        $this->course = $course;
        $this->district = $district;
        $this->ethnicity = $ethnicity;
        $this->faculty = $faculty;
        $this->field = $field;
        $this->gender = $gender;
        $this->nationality = $nationality;
        $this->postalcode = $postalcode;
        $this->province = $province;
        $this->subdistrict = $subdistrict;
        $this->yearclass = $yearclass;
        $this->yearofstudy = $yearofstudy;
    }

    public function render()
    {
        $studentInformation = StudentInformation::all();
        
        return view('livewire.student-information.index', [
            'student' => $studentInformation,
        ]);
    }

    public function save()
    {
        $this->validate([
            'studentNumber' => 'required',
            'studentPrefixTH' => 'required',
            'studentFirstNameTH' => 'required',
            'studentMidleNameTH' => 'required',
            'studentLastNameTH' => 'required',
            'studentPrefixEN' => 'required',
            'studentFirstNameEN' => 'required',
            'studentMidleNameEN' => 'required',
            'studentLastNameEN' => 'required',
            'StudentNickName' => 'required',
            'YearsClass' => 'required',
            'YearsStudy' => 'required',
            'StudentFaculty' => 'required',
            'StudentField' => 'required',
            'StudentCourse' => 'required',
            'StudentGPA' => 'required',
            'StudentLastGPA' => 'required',
            'StudentDOB' => 'required',
            'StudentEthnicity' => 'required',
            'StudentNationality' => 'required',
            'StudentGender' => 'required',
            'StudentHeight' => 'required',
            'StudentWeight' => 'required',
            'StudentCard' => 'required',
            'StudentAddress' => 'required',
            'StudentSubDistrict' => 'required',
            'StudentDistrict' => 'required',
            'StudentProvince' => 'required',
            'StudentPostalcode' => 'required',
            'StudentPhone' => 'required',
            'StudentEmail' => 'required',
            'StudentAvatar' => 'required',
            'StudentContactName' => 'required',
            'StudentContactAs' => 'required'
            //'StudentContactPhone' => 'required'
        ]);

        StudentInformation::create([
            'si_st_num' => $this->studentNumber,
            'si_md_pre_th_id' => $this->studentPrefixTH,
            'si_firstname_th' => $this->studentFirstNameTH,
            'si_middlename_th' => $this->studentMidleNameTH,
            'si_lastname_th' => $this->studentLastNameTH,
            'si_md_pre_eng_id' => $this->studentPrefixEN,
            'si_firstname_en' => $this->studentFirstNameEN,
            'si_middlename_en' => $this->studentMidleNameEN,
            'si_lastname_en' => $this->studentLastNameEN,
            'si_st_card' => $this->StudentCard,
            'si_nickname' => $this->StudentNickName,
            'si_md_year_of_study_id' => $this->YearsStudy,
            'si_md_year_class_id' => $this->YearsClass,
            'si_md_faculty_id' => $this->StudentFaculty,
            'si_md_field_id' => $this->StudentField,
            'si_md_course_id' => $this->StudentCourse,
            'si_dob' => $this->StudentDOB,
            'si_md_ethnicity_id' => $this->StudentEthnicity,
            'si_md_nationality_id' => $this->StudentNationality,
            'si_md_gender_id' => $this->StudentGender,
            'si_weight' => $this->StudentWeight,
            'si_height' => $this->StudentHeight,
            'si_gpa' => $this->StudentGPA,
            'si_last_gpa' => $this->StudentLastGPA,
            'si_phone_num' => $this->StudentPhone,
            'si_email' => $this->StudentEmail,
            'si_emergency_contact_name' => $this->StudentContactName,
            'si_emergency_contact' => $this->StudentContactAs,
            'si_address' => $this->StudentAddress,
            'si_md_province_id' => $this->StudentProvince,
            'si_md_district_id' => $this->StudentDistrict,
            'si_md_sub_district_id' => $this->StudentSubDistrict,
            'si_md_postal_code_id' => $this->StudentPostalcode,
            'si_md_avatar_file' => $this->StudentAvatar
            
        ]);
    }
}