<?php

namespace App\Http\Livewire;

use App\Models\Student;
use App\Models\Master\PrefixEN;
use App\Models\Master\PrefixTH;
use App\Models\Master\YearClass;

use Livewire\Component;

class FollowReport extends Component
{
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

    public $studentEdit;

    public function mount()
    {

        $this->yearClass = YearClass::all()->sortDesc();
        $this->prefixTH = PrefixTH::all();
        $this->prefixEN = PrefixEN::all();


    }

    public function render()
    {
        $student = Student::all();
        return view('livewire.followreport.index',[
            'students' => $student,
        ]);

    }
}
