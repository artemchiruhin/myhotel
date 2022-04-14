<?php

namespace App\Http\Livewire\Admin\Tasks;

use App\Models\Room;
use Livewire\Component;

class CreateTask extends Component
{
    public $numbers;
    public $activity;
    public $activities;
    public $employee;
    public function render()
    {
        return view('livewire.admin.tasks.create-task');
    }

    public function mount()
    {
        $this->activities = json_decode($this->employee->activities(), true);
        $this->activity = $this->activities[1] ?? '';
        if($this->activity == 'тест уборщик') {
            $this->numbers = Room::select('number')->orderBy('number', 'asc')->get();
        } else {
            $this->numbers = [];
        }
    }

    public function updated()
    {
        if($this->activity == 'тест уборщик') {
            $this->numbers = Room::select('number')->orderBy('number', 'asc')->get();
        } else {
            $this->numbers = [];
        }
    }
}
