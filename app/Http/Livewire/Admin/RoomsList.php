<?php

namespace App\Http\Livewire\Admin;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;
use function view;

class RoomsList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $sortColumn = 'id';
    public $sortDirection = 'asc';
    public function render()
    {
        $rooms = Room::orderBy($this->sortColumn, $this->sortDirection)->paginate(10);
        return view('livewire.admin.rooms-list', compact('rooms'));
    }

    public function sortBy($column)
    {
        if($this->sortColumn === $column) {
            $this->sortDirection = $this->swapSortDirection();
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortColumn = $column;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }
}
