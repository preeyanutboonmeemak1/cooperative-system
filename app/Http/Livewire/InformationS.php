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
    public $year = 6;

    public function mount()
    {
        $user = auth()->user()->ref_id;
        $this->stu_id = $user;

        $prefixTH = PrefixTH::all();
        $yearclass = YearClass::all()->sortDesc();

        $this->prefixTH = $prefixTH;
        $this->yearclass = $yearclass;
    }
    public function render()
    {
       
        $Information = Teacher::all();
        $si_id = $this->stu_id;
        $this->studentID = $si_id;
        $Information = Teacher::select('*')
                        ->join('students_information', 'students_information.si_co_teacher', '=', 'ta_co_student')
                        ->join('master_prefix_th', 'master_prefix_th.id', '=', 'si_md_pre_th_id')
                        ->join('master_faculty', 'master_faculty.id', '=', 'si_md_faculty_id')
                        ->join('master_field', 'master_field.id', '=', 'si_md_field_id')
                        ->join('companies', 'companies.cp_co_student', '=', 'si_co_copanie')
                        ->where('ta_id','=',$this->studentID)->where('si_md_year_class_id','=',$this->year)
                        ->get();
        // dd($Information);
        return view('livewire.informations.index', [
            'informations' => $Information,
        ]);
    }

}