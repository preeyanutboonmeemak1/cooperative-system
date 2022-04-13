<?php

namespace App\Imports;

use App\Models\Import\ImportTeacher;
use App\Models\Master\PrefixEN;
use App\Models\Master\PrefixTH;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!is_null($row['it_md_pre_th_id']) || !is_null($row['it_md_pre_eng_id'])) {
            return new ImportTeacher([
                'it_md_pre_th_id' => $this->getPrefixTHByText(preg_replace('/\s+/', '', $row['it_md_pre_th_id']))->id,
                'it_firstname_th' => preg_replace('/\s+/', '', $row['it_firstname_th']),
                'it_lastname_th' => preg_replace('/\s+/', '', $row['it_lastname_th']),
                'it_md_pre_eng_id' => $this->getPrefixENByText(preg_replace('/\s+/', '', $row['it_md_pre_eng_id']))->id,
                'it_firstname_en' =>  preg_replace('/\s+/', '', ucwords($row['it_firstname_en'])),
                'it_lastname_en' => preg_replace('/\s+/', '', ucwords($row['it_lastname_en'])),
            ]);
        }
    }

    public function getPrefixTHByText($text)
    {
        $data = PrefixTH::where('md_prefixname_th', $text)->first();
        return $data;
    }

    public function getPrefixENByText($text)
    {
        $data = PrefixEN::where('md_prefixname_eng', $text)->first();
        return $data;
    }
}