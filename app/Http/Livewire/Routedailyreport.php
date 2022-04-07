<?php

namespace App\Http\Livewire;

use App\Models\Reportweek;
use Livewire\Component;

class Routedailyreport extends Component
{
    public $post;
 
    public function mount($id)
    {
        $this->post = Reportweek::find($id);
    }
    public function render()
    {
        //$report = Reportweek::all();

        return view('livewire.week-report.dailyreport', [
            'dailyreport' => $this->post,
        ]);
    }
 
}

