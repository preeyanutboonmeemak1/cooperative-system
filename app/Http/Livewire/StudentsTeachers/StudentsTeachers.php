<?php

namespace App\Http\Livewire\StudentsTeachers;


use App\Models\Master\YearClass;
use App\Models\StudentsTeachers;
use App\Models\Master\Course;
use App\Models\Master\Faculty;
use Livewire\Component;

class StudentsTeacher extends Component
{
    public $students;
    public function mount()
    {
        $Studentsteachers = new Studentsteachers();
        $this->students = $Studentsteachers->getData();
    }

    public function render()
    {
        dd($this->students);
        return view('livewire.students-teachers.index');
    }

    public function deleteConfirm($id)
    {
        $Studentsteachers = Studentsteachers::find($id);
        $this->studentID = $id;
        $this->dispatchBrowserEvent('modal-delete', [
            'students' => $Studentsteachers
        ]);
    }

    public function delete()
    {
        Studentsteachers::find($this->studentID)->delete();
    }

    public function find()
    {
        $this->validate([
            
            'YearsClass' => 'required',
            
            'StudentFaculty' => 'required',
            
            'StudentCourse' => 'required'
            
        ]);
        Studentsteachers::find([
            'st_md_year_class_id' => $this->YearsClass,
            'st_md_faculty_id' => $this->StudentFaculty,
            'st_md_course_id' => $this->StudentCourse
        ]);
    }
}
