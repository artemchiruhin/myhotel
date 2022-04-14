<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use function view;

class Room extends Component
{
    public $room;
    public $date_from;
    public $date_to;
    public $cost;
    public function render()
    {
        return view('livewire.user.room');
    }
    public function updated()
    {
        if($this->date_from < $this->date_to && $this->date_to !== '' && $this->date_from !== '') {
            $this->cost = $this->getCost();
        } else {
            $this->cost = 0;
        }
    }
    private function getCost()
    {
        return $this->room->price_per_day * $this->getDaysDifference($this->date_to, $this->date_from);
    }

    private function getDaysDifference($to, $from)
    {
        return date_diff(date_create($to), date_create($from))->days;
    }
}
