<?php

namespace App\Http\Livewire\Admin;

use App\Models\Employee;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class EmployeesList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $term;

    public function render()
    {
        $employees = Employee::where('full_name', 'LIKE', "%$this->term%")->orderBy('id')->with('position')->paginate(10);
        return view('livewire.admin.employees-list', compact('employees'));
    }
}
