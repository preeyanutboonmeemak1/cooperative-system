<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Master\Faculty;
use App\Models\Master\Field;
use App\Models\Master\YearClass;
use App\Models\Master\YearOfStudy;
use App\Models\StudentInformation;
use App\Models\Teacher;
use App\Models\Companys;
use App\Models\Documents;
use App\Models\StudentscompanysModel;
use Livewire\Component;

class DashboardAdmin extends Component
{
    public $yearClass;
    public $facultyList;
    public $fieldeList;

    public $studentClassYear;
    public $studentFaculty;
    public $studentField;

    public function mount()
    {
        $this->yearClass = YearClass::all()->sortDesc();
        $this->facultyList = Faculty::all();
        $this->fieldeList = Field::all();
    }

    public function render()
    {
        $allStudents = $this->getAllStudent();
        $allPassStudent = $this->getAllPassStudent();
        $companyStudent = $this->getAllStudentCompany();
        $teacherStudent = $this->getAllTeacherStudent();

        return view('livewire.dashboard.dashboard-admin', [
            'allStudents' => $allStudents,
            'allPassStudent' => $allPassStudent,
            'listCompanies' => $companyStudent,
            'listTeachers' => $teacherStudent
        ]);
    }

    public function getAllStudent()
    {
        $array_search  = array();
        if ($this->studentClassYear) {
            $array_search = array_merge($array_search, array('si_md_year_class_id' => $this->studentClassYear));
        }

        if ($this->studentFaculty) {
            $array_search = array_merge($array_search, array('si_md_faculty_id' => $this->studentFaculty));
        }

        if ($this->studentField) {
            $array_search = array_merge($array_search, array('si_md_field_id' => $this->studentField));
        }

        return StudentInformation::where($array_search)->get();
    }

    public function getAllPassStudent()
    {
        $array_search  = array();
        $array_search = array_merge($array_search, array('d_status' => 1));
        if ($this->studentClassYear) {
            $array_search = array_merge($array_search, array('si_md_year_class_id' => $this->studentClassYear));
        }

        if ($this->studentFaculty) {
            $array_search = array_merge($array_search, array('si_md_faculty_id' => $this->studentFaculty));
        }

        if ($this->studentField) {
            $array_search = array_merge($array_search, array('si_md_field_id' => $this->studentField));
        }

        return Documents::query()->join('students_information', 'document.d_student_id', '=', 'si_id')->where($array_search)->get();
    }

    public function getAllStudentCompany()
    {
        $array_search  = array();
        if ($this->studentClassYear) {
            $array_search = array_merge($array_search, array('si_md_year_class_id' => $this->studentClassYear));
        }

        if ($this->studentFaculty) {
            $array_search = array_merge($array_search, array('si_md_faculty_id' => $this->studentFaculty));
        }

        if ($this->studentField) {
            $array_search = array_merge($array_search, array('si_md_field_id' => $this->studentField));
        }

        return StudentInformation::query()
            ->selectRaw('*, COUNT(si_st_num) as student_count')
            ->join('companies', 'companies.cp_id', '=', 'si_co_copanie')
            ->where($array_search)
            ->groupBy('si_co_copanie')
            ->get();
    }

    public function getAllTeacherStudent()
    {
        $array_search  = array();
        if ($this->studentClassYear) {
            $array_search = array_merge($array_search, array('si_md_year_class_id' => $this->studentClassYear));
        }

        if ($this->studentFaculty) {
            $array_search = array_merge($array_search, array('si_md_faculty_id' => $this->studentFaculty));
        }

        if ($this->studentField) {
            $array_search = array_merge($array_search, array('si_md_field_id' => $this->studentField));
        }

        return StudentInformation::query()
            ->selectRaw('*, COUNT(si_st_num) as student_count')
            ->join('teachers', 'teachers.ta_id', '=', 'si_co_teacher')
            ->where($array_search)
            ->groupBy('si_co_teacher')
            ->get();
    }
}