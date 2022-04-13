<?php

namespace App\Imports;

use App\Models\Import\ImportStudent;
use App\Models\Master\PrefixEN;
use App\Models\Master\PrefixTH;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        if (!is_null($row['is_md_pre_th_id']) || !is_null($row['is_md_pre_eng_id'])) {
            return new ImportStudent([
                'is_st_num' => preg_replace('/\s+/', '', $row['is_st_num']),
                'is_md_pre_th_id' => $this->getPrefixTHByText(preg_replace('/\s+/', '', $row['is_md_pre_th_id']))->id,
                'is_firstname_th' => preg_replace('/\s+/', '', $row['is_firstname_th']),
                'is_lastname_th' => preg_replace('/\s+/', '', $row['is_lastname_th']),
                'is_md_pre_eng_id' => $this->getPrefixENByText(preg_replace('/\s+/', '', $row['is_md_pre_eng_id']))->id,
                'is_firstname_en' =>  preg_replace('/\s+/', '', ucwords($row['is_firstname_en'])),
                'is_lastname_en' => preg_replace('/\s+/', '', ucwords($row['is_lastname_en'])),
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