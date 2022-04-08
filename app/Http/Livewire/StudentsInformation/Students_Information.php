<?php

namespace App\Http\Livewire\StudentsInformation;

use App\Http\Livewire\StudentsInformation;
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
use Livewire\WithFileUploads;

class Students_Information extends Component
{
    use WithFileUploads;
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

    public function mount()
    {
        $user = auth()->user()->ref_id;

        $this->stu_id = $user;

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
        $si_id = $this->stu_id;
        $this->studentID = $si_id;
        $studentInformation = StudentInformation::find($si_id);
        // dd($studentInformation);
        $this->studentPrefixTH = $studentInformation->si_md_pre_th_id;
        $this->studentPrefixEN = $studentInformation->si_md_pre_eng_id;
        $this->studentFirstNameTH = $studentInformation->si_firstname_th;
        $this->studentLastNameTH = $studentInformation->si_lastname_th;
        $this->studentFirstNameEN = $studentInformation->si_firstname_en;
        $this->studentLastNameEN = $studentInformation->si_lastname_en;
        $this->studentNumber = $studentInformation->si_st_num;

        return view('livewire.student-information.index');
        // 'studentinformation' => $studentInformation,
    }

    public function save()
    {

        if ($this->studentID) {
            // dd($this->studentID);
            // $inform = StudentInformation::find($this->studentID);
            $this->update();
        }
    }

    public function update()
    {
        $inform = StudentInformation::find($this->studentID);
        $inform->si_st_num = $this->studentNumber;
        $inform->si_md_pre_th_id = $this->studentPrefixTH;
        $inform->si_firstname_th = $this->studentFirstNameTH;
        $inform->si_middlename_th = $this->studentMidleNameTH;
        $inform->si_lastname_th = $this->studentLastNameTH;
        $inform->si_md_pre_eng_id = $this->studentPrefixEN;
        $inform->si_firstname_en = $this->studentFirstNameEN;
        $inform->si_middlename_en = $this->studentMidleNameEN;
        $inform->si_lastname_en = $this->studentLastNameEN;
        $inform->si_st_card = $this->StudentCard;
        $inform->si_nickname = $this->StudentNickName;
        $inform->si_md_year_of_study_id = $this->YearsStudy;
        $inform->si_md_year_class_id = $this->YearsClass;
        $inform->si_md_faculty_id = $this->StudentFaculty;
        $inform->si_md_field_id = $this->StudentField;
        $inform->si_md_course_id = $this->StudentCourse;
        $inform->si_dob = $this->StudentDOB;
        $inform->si_md_ethnicity_id = $this->StudentEthnicity;
        $inform->si_md_nationality_id = $this->StudentNationality;
        $inform->si_md_gender_id = $this->StudentGender;
        $inform->si_weight = $this->StudentWeight;
        $inform->si_height = $this->StudentHeight;
        $inform->si_gpa = $this->StudentGPA;
        $inform->si_last_gpa = $this->StudentLastGPA;
        $inform->si_phone_num = $this->StudentPhone;
        $inform->si_email = $this->StudentEmail;
        $inform->si_emergency_contact_name = $this->StudentContactName;
        $inform->si_emergency_contact = $this->StudentContactAs;
        $inform->si_address = $this->StudentAddress;
        $inform->si_md_province_id = $this->StudentProvince;
        $inform->si_md_district_id = $this->StudentDistrict;
        $inform->si_md_sub_district_id = $this->StudentSubDistrict;
        $inform->si_md_postal_code_id = $this->StudentPostalcode;

        if ($this->StudentAvatar) {
            // dd($this->StudentAvatar);
            $fileName = time() . '_' . $this->StudentAvatar->getClientOriginalName();
            $fname = $this->StudentAvatar->storeAs('photos', $fileName);
            $inform->si_avatar_file = $fname;
        }

        $inform->save();
    }
}
