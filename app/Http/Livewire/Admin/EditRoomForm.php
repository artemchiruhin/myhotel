<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use function view;

class EditRoomForm extends Component
{
    public $categories;
    public $room;
    public $images;
    public $removedImages;

    public function mount()
    {
        $this->images = json_decode($this->room->images);
        $this->removedImages = [];
    }
    public function render()
    {
        return view('livewire.admin.edit-room-form');
    }

    public function removeImage($index)
    {
        $this->removedImages[] = $this->images[$index];
        unset($this->images[$index]);
        //array_values($this->images);
        array_keys($this->images);
    }
}
