<?php

namespace App\Http\Livewire\Students;

use App\Models\Import\ImportStudent;
use App\Models\Student;
use App\Models\User;
use Hash;
use Livewire\Component;

class ImportStudents extends Component
{

    public $exportState = true;
    public $selectAll = false;
    public $selectStudent = [];

    public function mount()
    {
    }

    public function render()
    {
        $student = ImportStudent::all();
        $this->exportState = count($this->selectStudent) < 1;

        return view('livewire.manage-students.import', [
            'students' => $student,
        ]);
    }

    public function import()
    {
        $import = ImportStudent::query()
            ->whereIn('is_id', $this->selectStudent)
            ->get();

        foreach ($import as $list) {
            $student_id = Student::create([
                'si_st_num' => $list->is_st_num,
                'si_md_pre_th_id' => $list->is_md_pre_th_id,
                'si_firstname_th' => $list->is_firstname_th,
                'si_lastname_th' => $list->is_lastname_th,
                'si_md_pre_eng_id' => $list->is_md_pre_eng_id,
                'si_firstname_en' => ucwords($list->is_firstname_en),
                'si_lastname_en' => ucwords($list->is_lastname_en)
            ])->si_id;

            $student = Student::find($student_id);

            User::create([
                'username' => $student->si_st_num,
                'password' => Hash::make($student->si_st_num),
                'ref_id' => $student_id,
                'ref_type' => 'student'
            ]);
        }

        ImportStudent::query()->truncate();

        return redirect()->route('manage-students');
    }

    public function back()
    {
        ImportStudent::query()->truncate();
        return redirect()->route('manage-students');
    }
}