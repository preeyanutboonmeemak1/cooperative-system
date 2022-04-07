<?php

namespace App\Http\Livewire;
use App\Models\StudentscompanysModel;
use App\Models\Master\YearClass;
use App\Models\Master\Faculty;
use App\Models\Master\Course;
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

    public function mount()
    {
        $yearclass = YearClass::all();
        $course = Course::all();
        $faculty = Faculty::all();
        $companys = Companys::all();
        $teachers = Teacher::all();
        $students = StudentInformation::all();
        $this->teachers = $teachers;
        $this->companys = $companys;
        $this->course = $course;
        $this->faculty = $faculty;
        $this->yearclass = $yearclass;
        $this->students = $students;
        
    }

    public function render()
    {
        $ss = new StudentscompanysModel();
        $data['Companys'] = $ss->getData();
        // dd($data['Companys']);
        return view('livewire.students-companys.index',$data);
    }

    public function delete($sc_id)
    {
        StudentscompanysModel::find($sc_id)->delete();
    }

    public function save()
    {

    }
    public function search($companys, $teachers, $yearclass, $faculty, $course)
    {
        StudentscompanysModel::find($companys, $teachers, $yearclass, $faculty, $course)->find();
    }
}
