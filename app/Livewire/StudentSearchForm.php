<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use Livewire\WithPagination;

class StudentSearchForm extends Component
{
    public $search;
    use WithPagination;

    protected $queryString = ['search'];
    protected $paginationTheme =  'bootstrap';

    public function render()
    {
        $students = Student::where('name','LIKE','%'.$this->search.'%')
        ->OrWhere('email','LIKE','%'.$this->search.'%')
        ->OrWhere('department','LIKE','%'.$this->search.'%')
        ->OrWhere('course','LIKE','%'.$this->search.'%')
        ->paginate(7);
        return view('livewire.student-search-form',['students' => $students]);
    }
}
