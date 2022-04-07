<?php

namespace App\Http\Livewire;

use App\Models\Reportweek;
use App\Models\Jobs;
use Livewire\Component;

class WeekReport extends Component
{

    public $wr_id;
    public $wr_st_id;
    public $wr_week_id;
    public $wr_name;

    public $j_id;
    public $j_week_id;
    public $j_problem;
    public $j_filereport;
    

    //public $wr_status;

    public function mount()
    {
        // $this->wr_id = $document['wr_id'];
        // $this->wr_st_id = $document['wr_st_id'];
        // $this->wr_week_id = $document['wr_week_id'];
        // $this->wr_name = $document['wr_name'];

        //$this->wr_status = $document['status'];
    }

    public function render()
    {
        $report = Reportweek::all();


        return view('livewire.week-report.index', [
            'weekreport' => $report,
        ]);
    }

    public function save()
    {
        
        $this->validate([
            'wr_name' => 'required',

        ]);
        $weekcount = Reportweek::where("wr_st_id",3)->get();
            
        if ($this->wr_id) {
            $report = Reportweek::find($this->wr_id);
            $report->wr_name = $this->wr_name;
            $report->update();
        }else{
            $wr_id = Reportweek::create([
                'wr_name' => $this->wr_name,
                'wr_st_id' => 3,
                'wr_week_id' => count($weekcount)+1,
                'status' => 1,
                ])->wr_id;

            Jobs::create([
                'j_week_id' => $wr_id,
                'j_problem' => '',
                'j_filereport' => '',
            ]);

            
        }
        $this->clear();

    }

    public function clear()
    {
        $this->wr_name = '';
    }

    public function updateConfirm($wr_id)
    {
        $this->wr_id = $wr_id;
        $report = Reportweek::find($wr_id);
        $this->wr_name  = $report->wr_name;
    
    }

    public function update()
    {
        $report = Reportweek::find($this->wr_id);
        $report->wr_name = $this->wr_name ;
        $report->save();
    }

    public function deleteId($wr_id)
    {

        $report = Reportweek::find($wr_id);
        $this->reportID = $wr_id;

    }


    public function delete()
    {
        Reportweek::find($this->reportID)->delete();
        Jobs::find($this->reportID)->delete();
    }
    
}