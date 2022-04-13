<?php

namespace App\Http\Livewire;

use App\Models\Form;


use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Forms extends Component
{

    use WithFileUploads;

    
    public $document, $fm_id, $fm_student_id, $fm_index, $fm_name, $fm_status, $fm_path;
    public $doc;
    public $title = "Game";
    public $headModal;

    public function render()
    {
        $this->document = Form::all();
        return view('livewire.forms.index');
    }

    public function setId($id,$index){
        $this->fm_id = $id;
        $this->headModal = $index;
    }

    public function uploadDoc()
    {
        $this->validate([
            'doc' => 'required'
        ]);
        if($this->doc) {
            $document = Form::find($this->fm_id);
            $document->fm_status = 1;
            $fileName = time() . '_' . $this->doc->getClientOriginalName();
            $fname = $this->doc->storeAs('photos', $fileName);
            $document->fm_path = $fname;
            $document->update();
            session()->flash('message', 'File uploaded.');
            return redirect('/forms');
        }
    }

    public function deleteDoc()
    {
        $document = Form::find($this->fm_id);
        $document->fm_status = 0;
        $document->fm_path = "";
        $document->update();
    }

    public function downloadDoc($id)
    {
        //dd($id);
        $document = Form::find($id);
        return Storage::download($document->fm_path);
    }


}
