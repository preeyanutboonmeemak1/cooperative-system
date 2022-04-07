<?php

namespace App\Http\Livewire;

use App\Models\Jobs;
use App\Models\JobsDetails;
use App\Models\NextJobs;

use Livewire\Component;

class DailyReports extends Component
{
    public $week_id;
    public $details_id;
    public $problem;
    
    public $j_id;
    public $j_week_id;
    public $j_problem;
    public $j_filereport;

    public $jdt_j_id;
    public $jdt_date;
    public $jdt_details;

    public $njdt_j_id;
    public $njdt_start_date;
    public $njdt_end_date;
    public $njdt_details;


    public function mount($id)
    {
        $this->week_id = $id;
    }

    public function render()
    {
              $report = Jobs::select('*')
                        ->join('job_details', 'job.j_id', '=', 'job_details.jdt_j_id')
                        ->join('next_job_details', 'job.j_id', '=', 'next_job_details.njdt_j_id')
                        ->get();
        // dd(Jobs::find($this->j_id));

        $week_job = Jobs::select('*')
        ->join('week_reports', 'job.j_id', '=', 'week_reports.wr_id')
        ->where('j_week_id',$this->week_id)
        ->first();

        return view('livewire.week-report.dailyreport', [
            
            'dailyreport' => $report,
            'jobs' => $week_job,
            'jobdetails' => JobsDetails::where('jdt_j_id',$week_job->j_id)->get(),
            'nextjobs' => NextJobs::where('njdt_j_id',$week_job->j_id)->get(),
        ]);
    }

    public function savejob()
    {
                 JobsDetails::create([      
                 'jdt_j_id' => $this->week_job, 
                 'jdt_date' => $this->jdt_date,
                 'jdt_details' => $this->jdt_details,
                 ]);
                
    }


    public function savenextjob()
    {
                NextJobs::create([
                'njdt_start_date' => $this->njdt_start_date,
                'njdt_end_date' => $this->njdt_end_date,
                'njdt_details' => $this->njdt_details,
                ]);
    }
    
}