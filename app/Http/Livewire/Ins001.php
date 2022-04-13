<?php

namespace App\Http\Livewire;


use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentInformation;
use Doctrine\DBAL\Schema\Index;
use App\Models\FormInformation;


class Ins001 extends Component
{
    public $test = 1;
    public $student;
    public $si_firstname_th, $si_st_num, $si_st_card, $si_md_pre_th_id, $si_middlename_th, $si_lastname_th, $si_md_pre_eng_id, $si_firstname_en, $si_middlename_en, $si_lastname_en,
        $si_nickname, $si_md_year_of_study_id, $si_md_year_class_id, $si_md_faculty_id, $si_md_field_id, $si_md_course_id, $si_dob, $si_md_ethnicity_id, $si_md_nationality_id,
        $si_md_gender_id, $si_weight, $si_height, $si_gpa, $si_last_gpa, $si_phone_num, $si_email, $si_emergency_contact_name, $si_emergency_contact, $si_address, $si_md_province_id,
        $si_md_district_id, $si_md_sub_district_id, $si_md_postal_code_id, $si_avatar_file,
        $master_province, $master_district, $master_sub_district;
    public $fi_phone,$fi_id,$fi_user_id, $fi_gad, $fi_road, $fi_tone, $fi_dormitory, $fi_num_room, $fi_house_num, $fi_road2, $fi_fname_parent, $fi_lname_parent, $fi_house_num_parent, $fi_road_parent, $fi_tone2, $fi_email_parent;

    public function mount()
    {


        $this->student = StudentInformation::leftJoin('master_province', 'students_information.si_md_province_id', '=', 'master_province.id')
            ->leftJoin('master_district', 'students_information.si_md_district_id', '=', 'master_district.id')
            ->leftJoin('master_sub_district', 'students_information.si_md_sub_district_id', '=', 'master_sub_district.id')

            ->where('si_st_num', Auth::user()->username)->first();
        //dd($this->student);
        $this->si_firstname_th = $this->student->si_firstname_th;
        $this->si_st_num = $this->student->si_st_num;
        $this->si_st_card = $this->student->si_st_card;
        $this->si_md_pre_th_id = $this->student->si_md_pre_th_id;
        $this->si_middlename_th = $this->student->si_middlename_th;
        $this->si_lastname_th = $this->student->si_lastname_th;
        $this->si_md_pre_eng_id = $this->student->si_md_pre_eng_id;
        $this->si_firstname_en = $this->student->si_firstname_en;
        $this->si_lastname_en = $this->student->si_lastname_en;
        $this->si_nickname = $this->student->si_nickname;
        $this->si_md_year_of_study_id = $this->student->si_md_year_of_study_id;
        $this->si_md_year_class_id = $this->student->si_md_year_class_id;
        $this->si_md_faculty_id = $this->student->si_md_faculty_id;
        $this->si_md_field_id = $this->student->si_md_field_id;
        $this->si_md_course_id = $this->student->si_md_course_id;
        $this->si_dob = $this->student->si_dob;
        $this->si_md_ethnicity_id = $this->student->si_md_ethnicity_id;
        $this->si_md_nationality_id = $this->student->si_md_nationality_id;
        $this->si_md_gender_id = $this->student->si_md_gender_id;
        $this->si_weight = $this->student->si_weight;
        $this->si_height = $this->student->si_height;
        $this->si_gpa = $this->student->si_gpa;
        $this->si_last_gpa = $this->student->si_last_gpa;
        $this->si_phone_num = $this->student->si_phone_num;
        $this->si_email = $this->student->si_email;
        $this->si_emergency_contact_name = $this->student->si_emergency_contact_name;
        $this->si_emergency_contact = $this->student->si_emergency_contact;
        $this->si_address = $this->student->si_address;
        $this->si_md_province_id = $this->student->si_md_province_id;
        $this->si_md_district_id = $this->student->si_md_district_id;
        $this->si_md_sub_district_id = $this->student->si_md_sub_district_id;
        $this->si_md_postal_code_id = $this->student->si_md_postal_code_id;
        $this->si_avatar_file = $this->student->si_avatar_file;

        $inf = FormInformation::where('fi_user_id', Auth::user()->id)
        ->where('fi_index','IN-S001')
        ->first();
        if (!empty($inf)) {
            $this->fi_id = $inf->fi_id;
            $this->fi_phone = $inf->fi_phone;
            $this->fi_user_id = $inf->fi_user_id;
            $this->fi_gad = $inf->fi_gad;
            $this->fi_road = $inf->fi_road;
            $this->fi_tone = $inf->fi_tone;
            $this->fi_dormitory = $inf->fi_dormitory;
            $this->fi_num_room = $inf->fi_num_room;
            $this->fi_house_num = $inf->fi_house_num;
            $this->fi_road2 = $inf->fi_road2;
            $this->fi_fname_parent = $inf->fi_fname_parent;
            $this->fi_lname_parent = $inf->fi_lname_parent;
            $this->fi_house_num_parent = $inf->fi_house_num_parent;
            $this->fi_road_parent = $inf->fi_road_parent;
            $this->fi_tone2 = $inf->fi_tone2;
            $this->fi_email_parent = $inf->fi_email_parent;
        }
    }
    public function render()
    {
        //dd(Auth::user()->username);




        // dd($this->student);
        return view('livewire.forms.ins001');
    }
    public function submit()
    {
        //dd($this->si_firstname_th);
    }
    public function ins001()
    {
    }
    public function pdf()
    {
        $document = new \Mpdf\Mpdf();
        $document->WriteHTML('<h1>Hello world!</h1>');
        $document->Output();
    }
    public function save()
    {
        //dd(Auth::user()->id);
        $inf = FormInformation::where('fi_user_id', Auth::user()->id)
        ->where('fi_index','IN-S001')
        ->first();
        if (empty($inf)) {
            FormInformation::create([
                'fi_gad' => $this->fi_gad,
                'fi_phone' => $this->fi_phone,
                'fi_index' => 'IN-S001',
                'fi_user_id' => Auth::user()->id,
                'fi_road' => $this->fi_road,
                'fi_tone' => $this->fi_tone,
                'fi_dormitory' => $this->fi_dormitory,
                'fi_num_room' => $this->fi_num_room,
                'fi_house_num' => $this->fi_house_num,
                'fi_road2' => $this->fi_road2,
                'fi_fname_parent' => $this->fi_fname_parent,
                'fi_lname_parent' => $this->fi_lname_parent,
                'fi_house_num_parent' => $this->fi_house_num_parent,
                'fi_road_parent' => $this->fi_road_parent,
                'fi_tone2' => $this->fi_tone2,
                'fi_email_parent' => $this->fi_email_parent,
            ]);
            //dd(Auth::user()->id);
        } else {
            FormInformation::where('fi_user_id', Auth::user()->id)
            ->where('fi_index','IN-S001')
            ->first()
                ->update([
                'fi_gad' => $this->fi_gad,
                'fi_phone' => $this->fi_phone,
                'fi_user_id' => Auth::user()->id,
                'fi_road' => $this->fi_road,
                'fi_tone' => $this->fi_tone,
                'fi_dormitory' => $this->fi_dormitory,
                'fi_num_room' => $this->fi_num_room,
                'fi_house_num' => $this->fi_house_num,
                'fi_road2' => $this->fi_road2,
                'fi_fname_parent' => $this->fi_fname_parent,
                'fi_lname_parent' => $this->fi_lname_parent,
                'fi_house_num_parent' => $this->fi_house_num_parent,
                'fi_road_parent' => $this->fi_road_parent,
                'fi_tone2' => $this->fi_tone2,
                'fi_email_parent' => $this->fi_email_parent,
            ]);
            //dd('update');
        }
    }
}
