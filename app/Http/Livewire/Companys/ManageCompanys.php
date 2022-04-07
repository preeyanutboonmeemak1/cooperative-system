<?php

namespace App\Http\Livewire\Companys;

use App\Models\Companys;
use Livewire\Component;

class ManageCompanys extends Component
{
    public $cp_id;
    public $cp_name_th;
    public $cp_name_en;
    public $cp_address_no;
    public $cp_address_moo;
    public $cp_address_soy;
    public $cp_address_road;
    public $cp_address_sub_district;
    public $cp_address_district;
    public $cp_address_province;
    public $cp_address_zipcode;
    public $cp_address_latitude;
    public $cp_address_longitude;

    public function render()
    {
        $company = Companys::all();
        return view('livewire.manage-companys.index', [
            'companys' => $company
        ]);
    }

    public function save()
    {
        $this->validate([
            'cp_name_th' => 'required',
            'cp_address_no' => 'required',
            'cp_address_sub_district' => 'required',
            'cp_address_district' => 'required',
            'cp_address_province' => 'required',
            'cp_address_zipcode' => 'required',
        ]);

        if ($this->cp_id) {
            $company = Companys::find($this->cp_id);
            $company->cp_name_th = $this->cp_name_th;
            $company->cp_name_en = $this->cp_name_en;
            $company->cp_address_no = $this->cp_address_no;
            $company->cp_address_moo = $this->cp_address_moo;
            $company->cp_address_soy = $this->cp_address_soy;
            $company->cp_address_road = $this->cp_address_road;
            $company->cp_address_sub_district = $this->cp_address_sub_district;
            $company->cp_address_district = $this->cp_address_district;
            $company->cp_address_province = $this->cp_address_province;
            $company->cp_address_zipcode = $this->cp_address_zipcode;
            $company->cp_address_latitude = $this->cp_address_latitude;
            $company->cp_address_longitude = $this->cp_address_longitude;

            $company->update();
            $this->clear();
        } else {
            $company_id = Companys::create([
                'cp_name_th' => $this->cp_name_th,
                'cp_name_en' => $this->cp_name_en,
                'cp_address_no' => $this->cp_address_no,
                'cp_address_moo' => $this->cp_address_moo,
                'cp_address_soy' => $this->cp_address_soy,
                'cp_address_road' => $this->cp_address_road,
                'cp_address_sub_district' => $this->cp_address_sub_district,
                'cp_address_district' => $this->cp_address_district,
                'cp_address_province' => $this->cp_address_province,
                'cp_address_zipcode' => $this->cp_address_zipcode,
                'cp_address_latitude' => $this->cp_address_latitude,
                'cp_address_longitude' => $this->cp_address_longitude
            ]);

            $this->clear();
        }
    }

    public function clear()
    {
        $this->cp_name_th = '';
        $this->cp_name_en = '';
        $this->cp_address_no = '';
        $this->cp_address_moo = '';
        $this->cp_address_soy = '';
        $this->cp_address_road = '';
        $this->cp_address_sub_district = '';
        $this->cp_address_district = '';
        $this->cp_address_province = '';
        $this->cp_address_zipcode = '';
        $this->cp_address_latitude = '';
        $this->cp_address_longitude = '';
    }

    public function updateConfirm($id)
    {
        $company = Companys::find($id);
        $this->cp_id = $id;
        $this->cp_name_th = $company->cp_name_th;
        $this->cp_name_en = $company->cp_name_en;
        $this->cp_address_no = $company->cp_address_no;
        $this->cp_address_moo = $company->cp_address_moo;
        $this->cp_address_soy = $company->cp_address_soy;
        $this->cp_address_road = $company->cp_address_road;
        $this->cp_address_sub_district = $company->cp_address_sub_district;
        $this->cp_address_district = $company->cp_address_district;
        $this->cp_address_province = $company->cp_address_province;
        $this->cp_address_zipcode = $company->cp_address_zipcode;
        $this->cp_address_latitude = $company->cp_address_latitude;
        $this->cp_address_longitude = $company->cp_address_longitude;
    }

    public function deleteConfirm($id)
    {
        $company = Companys::find($id);
        $this->cp_id = $id;
        $this->dispatchBrowserEvent('modal-delete', [
            'company' => $company
        ]);
    }

    public function delete()
    {
        Companys::find($this->cp_id)->delete();
    }
}