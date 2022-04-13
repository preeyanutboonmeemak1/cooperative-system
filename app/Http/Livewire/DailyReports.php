<?php

namespace App\Http\Livewire;

use App\Models\Jobs;
use App\Models\JobsDetails;
use App\Models\NextJobs;
use Livewire\WithFileUploads;

use Livewire\Component;

class DailyReports extends Component
{
    use WithFileUploads;
    public $week_id;
    public $details;
    public $problem;
    
    public $j_id;
    public $j_week_id;
    public $j_problem;
    public $j_filereport;
    public $j_file;

    public $jdt_id;
    public $jdt_j_id;
    public $jdt_date;
    public $jdt_details;

    public $njdt_id;
    public $njdt_j_id;
    public $njdt_start_date;
    public $njdt_end_date;
    public $njdt_details;

    

    public function mount($id)
    {
        $this->week_id = $id;
        $report = jobs::find($this->week_id);
        $this->j_filereport = $report->j_filereport;
        
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
        if ($this->jdt_id) {
            $report = JobsDetails::find($this->jdt_id);
            $report->jdt_date = $this->jdt_date ;
            $report->jdt_details = $this->jdt_details;
            $report->update();
        
        }else{
                 JobsDetails::create([      
                 'jdt_j_id' => $this->week_id, 
                 'jdt_date' => $this->jdt_date,
                 'jdt_details' => $this->jdt_details,
                 ]);
        }       
    }

    public function check_jdt($jdt_id)
    {
        $this->jdt_id = $jdt_id;
        $report = JobsDetails::find($jdt_id);
        $this->jdt_date  = $report->jdt_date;
        $this->jdt_details  = $report->jdt_details;
    
    }

    public function update_jdt()
    {
        $report = JobsDetails::find($this->jdt_id);
        $report->jdt_date = $this->jdt_date ;
        $report->jdt_details = $this->jdt_details;
        $report->update();
    }

    public function deletejdt($jdt_id)
    {

        $report = JobsDetails::find($jdt_id);
        $this->reportID = $jdt_id;

    }


    public function delete_jdt()
    {
        JobsDetails::find($this->reportID)->delete();
    }

    public function savenextjob()
    {
        if ($this->njdt_id) {
            $report = NextJobs::find($this->njdt_id);
            $report->njdt_start_date = $this->njdt_start_date ;
            $report->njdt_end_date = $this->njdt_end_date;
            $report->njdt_details = $this->njdt_details;
            $report->update();
        }else{
                NextJobs::create([
                'njdt_j_id' => $this->week_id, 
                'njdt_start_date' => $this->njdt_start_date,
                'njdt_end_date' => $this->njdt_end_date,
                'njdt_details' => $this->njdt_details,
                ]);
        }
    }

    public function check_njdt($njdt_id)
    {
        $this->njdt_id = $njdt_id;
        $report = NextJobs::find($njdt_id);
        $this->njdt_start_date  = $report->njdt_start_date;
        $this->njdt_end_date  = $report->njdt_end_date;
        $this->njdt_details  = $report->njdt_details;
    
    }

    public function update_njdt()
    {
        $report = NextJobs::find($this->njdt_id);
        $report->njdt_start_date = $this->njdt_start_date ;
        $report->njdt_end_date = $this->njdt_end_date;
        $report->njdt_details = $this->njdt_details;
        $report->update();
    }

    public function deletenjdt($njdt_id)
    {

        $report = NextJobs::find($njdt_id);
        $this->reportID = $njdt_id;

    }


    public function delete_njdt()
    {
        NextJobs::find($this->reportID)->delete();
    }
    
    public function check_job($j_id)
    {
        $this->j_id = $j_id;
        $report = jobs::find($j_id);
        $this->j_problem  = $report->j_problem;
    }

    public function saveproblem()
    {
        if ($this->j_id) {
            $report = jobs::find($this->j_id);
            $report->j_problem = $this->j_problem;
            $report->update();
        }
    }

    public function update_problem()
    {
        $report = jobs::find($this->j_id);
        $report->j_problem = $this->j_problem;
        $report->update();
    }

    public function update_file()
    {
        $this->validate([
            'j_file' => 'required'
        ]);
        // $document->d_student_id = 1;
        if ($this->j_file) {
            $report = jobs::find($this->week_id);
            $fileName = time() . '_' . $this->j_file->getClientOriginalName();
            $fname = $this->j_file->storeAs('photos', $fileName);
            $report->j_filereport = $fname;
            $report->update();
        } 
    }

}