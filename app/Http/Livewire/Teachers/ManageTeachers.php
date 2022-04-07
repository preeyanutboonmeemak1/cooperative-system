<?php

namespace App\Http\Livewire\Teachers;

use App\Models\Master\PrefixEN;
use App\Models\Master\PrefixTH;
use App\Models\Master\YearClass;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ManageTeachers extends Component
{
    public $yearClass;
    public $prefixTH;
    public $prefixEN;

    public $teacherId;
    public $teacherYearClass;
    public $teacherPrefixTH;
    public $teacherFirstnameTH;
    public $teacherLastnameTH;
    public $teacherPrefixEN;
    public $teacherFirstnameEN;
    public $teacherLastnameEN;

    public function mount()
    {
        $this->yearClass = YearClass::all()->sortDesc();
        $this->prefixTH = PrefixTH::all();
        $this->prefixEN = PrefixEN::all();
    }

    public function render()
    {
        $teacher = Teacher::all();
        return view('livewire.manage-teachers.index', [
            'teachers' => $teacher
        ]);
    }

    public function save()
    {
        $this->validate([
            'teacherYearClass' => 'required',
            'teacherPrefixTH' => 'required',
            'teacherFirstnameTH' => 'required',
            'teacherLastnameTH' => 'required',
            'teacherPrefixEN' => 'required',
            'teacherFirstnameEN' => 'required',
            'teacherLastnameEN' => 'required'
        ]);

        if ($this->teacherId) {
            $teacher = Teacher::find($this->teacherId);
            $teacher->ta_yc_id = $this->teacherYearClass;
            $teacher->ta_prefix_th_id = $this->teacherPrefixTH;
            $teacher->ta_firstname_th = $this->teacherFirstnameTH;
            $teacher->ta_lastname_th = $this->teacherLastnameTH;
            $teacher->ta_prefix_en_id = $this->teacherPrefixEN;
            $teacher->ta_firstname_en = $this->teacherFirstnameEN;
            $teacher->ta_lastname_en = $this->teacherLastnameEN;
            $teacher->update();
            $this->clear();
        } else {
            $teacher_id = Teacher::create([
                'ta_yc_id' => $this->teacherYearClass,
                'ta_prefix_th_id' => $this->teacherPrefixTH,
                'ta_firstname_th' => $this->teacherFirstnameTH,
                'ta_lastname_th' => $this->teacherLastnameTH,
                'ta_prefix_en_id' => $this->teacherPrefixEN,
                'ta_firstname_en' => $this->teacherFirstnameEN,
                'ta_lastname_en' => $this->teacherLastnameEN,
            ])->ta_id;

            $teacher = Teacher::find($teacher_id);

            User::create([
                'username' => $teacher->ta_firstname_en,
                'password' => Hash::make($teacher->ta_firstname_en),
                'ref_id' => $teacher_id,
                'ref_type' => 'teacher'
            ]);
            $this->clear();
        }
    }

    public function clear()
    {
        $this->teacherYearClass = '';
        $this->teacherPrefixTH = '';
        $this->teacherFirstnameTH = '';
        $this->teacherLastnameTH = '';
        $this->teacherPrefixEN = '';
        $this->teacherFirstnameEN = '';
        $this->teacherLastnameEN = '';
    }

    public function updateConfirm($id)
    {
        $teacher = Teacher::find($id);
        $this->teacherId = $id;
        $this->teacherYearClass = $teacher->ta_yc_id;
        $this->teacherPrefixTH = $teacher->ta_prefix_th_id;
        $this->teacherFirstnameTH = $teacher->ta_firstname_th;
        $this->teacherLastnameTH = $teacher->ta_lastname_th;
        $this->teacherPrefixEN = $teacher->ta_prefix_en_id;
        $this->teacherFirstnameEN = $teacher->ta_firstname_en;
        $this->teacherLastnameEN = $teacher->ta_lastname_en;
    }

    public function deleteConfirm($id)
    {
        $teacher = Teacher::find($id);
        $this->teacherId = $id;
        $this->dispatchBrowserEvent('modal-delete', [
            'teacher' => $teacher
        ]);
    }

    public function delete()
    {
        Teacher::find($this->teacherId)->delete();
    }
}