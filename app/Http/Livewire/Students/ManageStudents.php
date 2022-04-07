<?php

namespace App\Http\Livewire\Students;

use App\Imports\StudentImport;
use App\Models\Import\ImportStudent;
use App\Models\Master\PrefixEN;
use App\Models\Master\PrefixTH;
use App\Models\Master\YearClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class ManageStudents extends Component
{
    use WithFileUploads;

    protected $listeners = [
        'getLatitudeForInput'
    ];

    public $prefixTH;
    public $prefixEN;
    public $yearClass;

    public $studentID;
    public $studentNumber;
    public $studentPrefixTH;
    public $studentFirstNameTH;
    public $studentLastNameTH;
    public $studentPrefixEN;
    public $studentFirstNameEN;
    public $studentLastNameEN;
    public $studentClassYear;

    public $studentFileImport;

    public function mount()
    {
        $this->yearClass = YearClass::all()->sortDesc();
        $this->prefixTH = PrefixTH::all();
        $this->prefixEN = PrefixEN::all();
    }

    public function render()
    {
        $student = Student::all();

        return view('livewire.manage-students.index', [
            'students' => $student,
        ]);
    }

    public function save()
    {
        $this->validate([
            'studentNumber' => 'required',
            'studentPrefixTH' => 'required',
            'studentFirstNameTH' => 'required',
            'studentLastNameTH' => 'required',
            'studentPrefixEN' => 'required',
            'studentFirstNameEN' => 'required',
            'studentLastNameEN' => 'required'
        ]);
        if ($this->studentID) {
            $student = Student::find($this->studentID);
            $student->si_st_num = $this->studentNumber;
            $student->si_md_pre_th_id = $this->studentPrefixTH;
            $student->si_firstname_th = $this->studentFirstNameTH;
            $student->si_lastname_th = $this->studentLastNameTH;
            $student->si_md_pre_eng_id = $this->studentPrefixEN;
            $student->si_firstname_en = $this->studentFirstNameEN;
            $student->si_lastname_en = $this->studentLastNameEN;
            $student->update();
            $this->clear();
        } else {
            $student_id = Student::create([
                'si_st_num' => $this->studentNumber,
                'si_md_pre_th_id' => $this->studentPrefixTH,
                'si_firstname_th' => $this->studentFirstNameTH,
                'si_lastname_th' => $this->studentLastNameTH,
                'si_md_pre_eng_id' => $this->studentPrefixEN,
                'si_firstname_en' => $this->studentFirstNameEN,
                'si_lastname_en' => $this->studentLastNameEN
            ])->si_id;

            $student = Student::find($student_id);

            User::create([
                'username' => $student->si_st_num,
                'password' => Hash::make($student->si_st_num),
                'ref_id' => $student_id,
                'ref_type' => 'student'
            ]);
            $this->clear();
        }
    }

    public function clear()
    {
        $this->studentID = '';
        $this->studentNumber = '';
        $this->studentPrefixTH = '';
        $this->studentFirstNameTH = '';
        $this->studentLastNameTH = '';
        $this->studentPrefixEN = '';
        $this->studentFirstNameEN = '';
        $this->studentLastNameEN = '';
    }

    public function updateConfirm($id)
    {
        $student = Student::find($id);

        $this->studentID = $id;
        $this->studentNumber = $student->si_st_num;
        $this->studentPrefixTH = $student->si_md_pre_th_id;
        $this->studentFirstNameTH = $student->si_firstname_th;
        $this->studentLastNameTH = $student->si_lastname_th;
        $this->studentPrefixEN = $student->si_md_pre_eng_id;
        $this->studentFirstNameEN = $student->si_firstname_en;
        $this->studentLastNameEN = $student->si_lastname_en;
    }

    public function deleteConfirm($id)
    {
        $student = Student::find($id);
        $this->studentID = $id;
        $this->dispatchBrowserEvent('modal-delete', [
            'student' => $student
        ]);
    }

    public function delete()
    {
        Student::find($this->studentID)->delete();
    }

    public function import()
    {
        $this->dispatchBrowserEvent('modal-import');
    }

    public function upload()
    {
        Excel::import(new StudentImport, $this->studentFileImport);

        return redirect()->route('import-student');
    }
}