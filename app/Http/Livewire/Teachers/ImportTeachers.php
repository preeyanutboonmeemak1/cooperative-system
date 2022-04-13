<?php

namespace App\Http\Livewire\Teachers;

use App\Models\Import\ImportTeacher;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Hash;
use Livewire\Component;

class ImportTeachers extends Component
{

    public $exportState = true;
    public $selectAll = false;
    public $selectTeacher = [];

    public function mount()
    {
    }

    public function render()
    {
        $teachers = ImportTeacher::all();
        $this->exportState = count($this->selectTeacher) < 1;

        return view('livewire.manage-teachers.import', [
            'teachers' => $teachers,
        ]);
    }

    public function import()
    {
        $import = ImportTeacher::query()
            ->whereIn('it_id', $this->selectTeacher)
            ->get();

        foreach ($import as $list) {
            $teacher_id = Teacher::create([
                'ta_md_pre_th_id' => $list->it_md_pre_th_id,
                'ta_firstname_th' => $list->it_firstname_th,
                'ta_lastname_th' => $list->it_lastname_th,
                'ta_md_pre_eng_id' => $list->it_md_pre_eng_id,
                'ta_firstname_en' => $list->it_firstname_en,
                'ta_lastname_en' => $list->it_lastname_en
            ])->ta_id;

            $teacher = Teacher::find($teacher_id);

            User::create([
                'username' => $teacher->ta_firstname_th,
                'password' => Hash::make($teacher->ta_firstname_th),
                'ref_id' => $teacher_id,
                'ref_type' => 'teacher'
            ]);
        }

        ImportTeacher::query()->truncate();

        return redirect()->route('manage-teachers');
    }
}