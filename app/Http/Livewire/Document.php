<?php

namespace App\Http\Livewire;

// use App\Models;
// use App\Models\DocumentDetail;

use App\Models\Documents;
use App\Models\DocumentDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;




class Document extends Component
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

    public function mount()
    {
        $document_detail = DocumentDetail::find(1);
        $this->dd_name_th = $document_detail->dd_name_th;
        $this->dd_name_en = $document_detail->dd_name_en;
        $this->dd_teacher = $document_detail->dd_teacher;
        $this->dd_teacher_co = $document_detail->dd_teacher_co;
        $this->dd_exam_date = $document_detail->dd_exam_date;
        $this->dd_confirm_date = $document_detail->dd_confirm_date;
        
        $this->teacher = ["ดร.ณัฐพร ภักดี","ดร.อธิตา อ่อนเอื้อน","อาจารย์วันทนา ศรีสมบูรณ์","อาจารย์พีระศักดิ์ เพียรประสิทธิ์","อาจารย์อภิสิทธิ์ แสงใส"];
    }

    public function render()
    {
        $document = Documents::all();
        
        return view('livewire.document.index', [
            'document' => $document 
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

    public function setId($id){
        $this->d_id = $id;
        $this->headModal = 1;
    }

}