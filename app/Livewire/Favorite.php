<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class Favorite extends Component
{
    use WithPagination;







    public function deleteFavorite($cardId)
    {

        auth()->user()->cards()->detach($cardId);
    }

    public function render()
    {
        $cards = auth()->user()->cards()->get();
        return view('livewire.favorite',['cards' => $cards]);
    }


}
