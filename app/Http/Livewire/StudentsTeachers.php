<?php

namespace App\Http\Livewire;
use App\Models\StudentsteachersModel;
use App\Models\Master\YearClass;
use App\Models\Master\Faculty;
use App\Models\Master\Course;
use App\Models\Teacher;
use App\Models\StudentInformation;
use Livewire\Component;

class StudentsTeachers extends Component
{
    
    public $teachers;
    public $yearclass;
    public $faculty;
    public $course;
    public $students;
    
    public function mount()
    {
        $yearclass = YearClass::all();
        $course = Course::all();
        $faculty = Faculty::all();
        $teachers = Teacher::all();
        $students = StudentInformation::all();
        
        $this->teachers = $teachers;
        $this->course = $course;
        $this->faculty = $faculty;
        $this->yearclass = $yearclass;
        $this->students = $students;
        
    }

    public function render()
    {
        $ss = new StudentsteachersModel();
        $data['Student'] = $ss->getData();
        return view('livewire.students-teachers.index',$data);
    }

    public function delete($st_id)
    {
        StudentsteachersModel::find($st_id)->delete();
    }
}
