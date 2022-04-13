<?php

namespace App\Http\Livewire;

use App\Models\StudentscompanysModel;
use App\Models\Master\YearClass;
use App\Models\Master\Faculty;
use App\Models\Master\Course;
use App\Models\Master\PrefixTH;
use App\Models\Companys;
use App\Models\Teacher;
use App\Models\StudentInformation;
use Livewire\Component;

class StudentsCompanys extends Component
{
    public $teachers;
    public $companys;
    public $yearclass;
    public $faculty;
    public $course;
    public $students;
    public $prefixTH;

    public $studentid;
    public $c=0;
    public $f=0;
    public $t=0;
    public $co=0;
    public $y=6;
    public $selectedUsers = [];
    public $check=0;
    public function mount()
    {
        $prefixTH = PrefixTH::all();
        $yearclass = YearClass::all()->sortDesc();
        $course = Course::all();
        $faculty = Faculty::all();
        $companys = Companys::all();
        $teachers = Teacher::all();
        $students = StudentInformation::all();

        $this->prefixTH = $prefixTH;
        $this->teachers = $teachers;
        $this->companys = $companys;
        $this->course = $course;
        $this->faculty = $faculty;
        $this->yearclass = $yearclass;
        $this->students = $students;
    }

    public function render()
    {
        if($this->c!=0 && $this->f!=0 && $this->t!=0 && $this->co!=0 && $this->y!=0){
            $this->check=1;
        }else{
            $this->check=0;
        }
        $ss = new StudentscompanysModel();
        $data['Companys'] = $ss->getData($this->c,$this->f,$this->t,$this->co,$this->y);

        $data['Companys2'] = $ss->getData2();
        
        return view('livewire.students-companys.index', $data);

    }

    public function delete($si_id)
    {
        $students = StudentInformation::find($si_id);
        $students->si_co_teacher = NULL;
        $students->update();
    }

    public function save()
    {
        for ($i = 0; $i < count($this->selectedUsers); $i++) {
            $students = StudentInformation::find($this->selectedUsers[$i]);
            $students->si_md_year_class_id = $this->y;
            $students->si_md_faculty_id = $this->f;
            $students->si_md_course_id = $this->c;
            $students->si_co_teacher = $this->t;
            $students->si_co_copanie = $this->co;
            $students->update();
        }
    }
}
