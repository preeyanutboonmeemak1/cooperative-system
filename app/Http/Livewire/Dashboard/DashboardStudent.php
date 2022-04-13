<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Documents;
use App\Models\DocumentDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use App\Models\Reportweek;
use App\Models\StudentInformation;
use App\Models\Form;
use Illuminate\Support\Facades\Auth;
class DashboardStudent extends Component
{
    use WithFileUploads;
    public $d_id;
    public $d_student_id;
    public $d_name;
    public $d_status;
    public $d_path;
    public $d_file;
    public $d_id2;
    public $d_student_id2;
    public $d_name2;
    public $d_status2;
    public $d_path2;
    public $d_file2;

    public $check;

    public $dd_id;
    public $dd_user_id;
    public $dd_name_th;
    public $dd_name_en;
    public $dd_teacher;
    public $dd_teacher_co;
    public $dd_exam_date;
    public $dd_confirm_date;
    public $teacher;
    public $headModal;

    public $numreport;
    public $uplodeforms;


    public function mount()
    {
        $user = auth()->user()->ref_id;
        $this->stu_id = $user;
        $document_detail = DocumentDetail::find(1);
        $this->dd_name_th = $document_detail->dd_name_th;
        $this->dd_name_en = $document_detail->dd_name_en;
        $this->dd_teacher = $document_detail->dd_teacher;
        $this->dd_teacher_co = $document_detail->dd_teacher_co;
        $this->dd_exam_date = $document_detail->dd_exam_date;
        $this->dd_confirm_date = $document_detail->dd_confirm_date;


        $this->uplodeforms = Form::leftJoin('students_information','forms.fm_student_id','=','students_information.si_id')
            ->where('si_st_num', Auth::user()->username)
            ->where('fm_status','=',1)
            ->count();

        $this->teacher = ["ดร.ณัฐพร ภักดี", "ดร.อธิตา อ่อนเอื้อน", "อาจารย์วันทนา ศรีสมบูรณ์", "อาจารย์พีระศักดิ์ เพียรประสิทธิ์", "อาจารย์อภิสิทธิ์ แสงใส"];

    }
    public function render()
    {
        
        $studentInformation = StudentInformation::all();
        $si_id = $this->stu_id;
        $this->studentID = $si_id;
        $studentInformation = StudentInformation::select('*')
            ->join('master_prefix_th', 'master_prefix_th.id', '=', 'si_md_pre_th_id')
            ->join('master_prefix_eng', 'master_prefix_eng.id', '=', 'si_md_pre_eng_id')
            ->join('master_year_of_study', 'master_year_of_study.id', '=', 'si_md_year_of_study_id')
            ->join('master_year_class', 'master_year_class.id', '=', 'si_md_year_class_id')
            ->join('master_faculty', 'master_faculty.id', '=', 'si_md_faculty_id')
            ->join('master_field', 'master_field.id', '=', 'si_md_field_id')
            ->join('master_course', 'master_course.id', '=', 'si_md_course_id')
            ->join('master_ethnicity', 'master_ethnicity.id', '=', 'si_md_ethnicity_id')
            ->join('master_nationality', 'master_nationality.id', '=', 'si_md_nationality_id')
            ->join('master_gender', 'master_gender.id', '=', 'si_md_gender_id')
            ->join('master_province', 'master_province.id', '=', 'si_md_province_id')
            ->join('master_district', 'master_district.id', '=', 'si_md_district_id')
            ->join('master_sub_district', 'master_sub_district.id', '=', 'si_md_sub_district_id')
            ->join('master_postal_code', 'master_postal_code.id', '=', 'si_md_postal_code_id')
            ->join('teachers', 'teachers.ta_id', '=', 'si_co_teacher')
            ->join('companies', 'companies.cp_id', '=', 'si_co_copanie')
            ->where('si_id', '=', $si_id)
            ->get();
            if(!isset($studentInformation[0]['md_prefixname_th'])){
                $studentInformation = StudentInformation::select('*')
                ->join('master_prefix_th', 'master_prefix_th.id', '=', 'si_md_pre_th_id')
                ->where('si_id', '=', $si_id)
                ->get();
                // dd($studentInformation);
            }
            // dd($studentInformation);
        $document = Documents::all();
        $report = Reportweek::select('*')
            ->where('wr_st_id', '=', $this->stu_id)
            ->get();
        

        return view('livewire.dashboard.dashboard-student', [
            'document' => $document,
            'weekly' => $report,
            'students' => $studentInformation,
            //'formsSta'=> $forms,

        ]);
    }

    public function set($id)
    {
        $this->check = $id;
    }

    public function save()
    {
        $this->validate([
            'd_file' => 'required'
        ]);
        // $document->d_student_id = 1;
        if ($this->d_file) {
            $document = Documents::find($this->d_id);
            $document->d_status = 1;
            $fileName = time() . '_' . $this->d_file->getClientOriginalName();
            $fname = $this->d_file->storeAs('photos', $fileName);
            $document->d_path = $fname;
            $document->update();
        }
    }
    public function save2($id)
    {
        $this->validate([
            'd_file2' => 'required'
        ]);
        // $document->d_student_id = 1;
        if ($this->d_file2) {
            $document = Documents::find($id);
            $document->d_status = 1;
            $fileName = time() . '_' . $this->d_file2->getClientOriginalName();
            $fname = $this->d_file2->storeAs('photos', $fileName);
            $document->d_path = $fname;
            $document->update();
        }
    }

    public function upload2()
    {
        $document = Documents::find(2);
        $document->d_status = 1;
        $document->d_student_id = 1;
        $document->update();

        // if ($this->File) {
        //     // dd($this->StudentAvatar);
        //     $fileName = time() . '_' . $this->File->getClientOriginalName();
        //     $fname = $this->File->storeAs('photos', $fileName);
        //     $document->d_path = $fname;
        // }
    }


    public function edit()
    {
        // dd($this->dd_name_th);
        $this->validate([
            'dd_name_th' => 'required',
            'dd_name_en' => 'required',
            'dd_teacher' => 'required',
            'dd_teacher_co' => 'required',
            'dd_exam_date' => 'required',
            'dd_confirm_date' => 'required'
        ]);
        $document = DocumentDetail::find(1);
        $document->dd_name_th = $this->dd_name_th;
        $document->dd_name_en = $this->dd_name_en;
        $document->dd_teacher = $this->dd_teacher;
        $document->dd_teacher_co = $this->dd_teacher_co;
        $document->dd_exam_date = $this->dd_exam_date;
        $document->dd_confirm_date = $this->dd_confirm_date;
        $document->update();
    }

    public function del()
    {

        $document = Documents::find($this->d_id);
        $document->d_status = 0;
        $document->d_path = "";
        $document->update();
        $document = Documents::all();
        return view('livewire.document.index', [
            'document' => $document
        ]);
        // Documents::create([
        //     'd_status' => 0
        // ]).where();

    }
    public function export($id)
    {
        $document = Documents::find($id);
        return Storage::download($document->d_path);
    }

    public function setId($id)
    {
        $this->d_id = $id;
        $this->headModal = 1;
    }
}