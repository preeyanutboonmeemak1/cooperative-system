<?php

namespace App\Http\Livewire;

use App\Models\Master\PrefixTH;
use App\Models\Master\YearClass;
use App\Models\StudentInformation;
use App\Models\Teacher;
use Livewire\Component;

class InformationS extends Component
{
    public $prefixTH;
    public $yearclass;

    public $studentPrefixTH;
    public $studentFirstNameTH;
    public $studentMidleNameTH;
    public $studentLastNameTH;
    public $YearsClass;
    public $avatars;

    public function mount()
    {
        // $this->tea_id = $id;

        $prefixTH = PrefixTH::all();
        $yearclass = YearClass::all()->sortDesc();

        $this->prefixTH = $prefixTH;
        $this->yearclass = $yearclass;
    }
    public function render()
    {
        $Information = Teacher::all();
        // $si_id = $this->inf_id;
        // $this->studentID = $si_id;
        // $Information = StudentInformation::select('*')
                        // ->join('master_prefix_th', 'master_prefix_th.id', '=', 'si_md_pre_th_id')
                        // ->join('master_prefix_eng', 'master_prefix_eng.id', '=', 'si_md_pre_eng_id')
                        // ->join('master_year_of_study', 'master_year_of_study.id', '=', 'si_md_year_of_study_id')
                        // ->join('master_year_class', 'master_year_class.id', '=', 'si_md_year_class_id')
                        // ->join('master_faculty', 'master_faculty.id', '=', 'si_md_faculty_id')
                        // ->join('master_field', 'master_field.id', '=', 'si_md_field_id')
                        // ->join('master_course', 'master_course.id', '=', 'si_md_course_id')
                        // ->join('master_ethnicity', 'master_ethnicity.id', '=', 'si_md_ethnicity_id')
                        // ->join('master_nationality', 'master_nationality.id', '=', 'si_md_nationality_id')
                        // ->join('master_gender', 'master_gender.id', '=', 'si_md_gender_id')
                        // ->join('master_province', 'master_province.id', '=', 'si_md_province_id')
                        // ->join('master_district', 'master_district.id', '=', 'si_md_district_id')
                        // ->join('master_sub_district', 'master_sub_district.id', '=', 'si_md_sub_district_id')
                        // ->join('master_postal_code', 'master_postal_code.id', '=', 'si_md_postal_code_id')
                        // ->where('ta_id','=',$this->studentID)
                        // ->get();

        return view('livewire.informations.index', [
            'informations' => $Information,
        ]);
    }
}