<?php

namespace App\Livewire;

use Livewire\Component;

class FavoriteButton extends Component
{
    public $cardId;
    public $isFavorite;

    public function mount($cardId)
    {
        $this->cardId = $cardId;
        $this->isFavorite = $this->isCardFavorite();
    }

    public function toggleFavorite()
    {
        if ($this->isFavorite) {
            // Remove from favorites
            auth()->user()->cards()->detach($this->cardId);
        } else {
            // Add to favorites
            auth()->user()->cards()->attach($this->cardId);
        }

        $this->isFavorite = $this->isCardFavorite();
    }
    private function isCardFavorite()
    {
        return auth()->user()->cards()->where('card_id', $this->cardId)->exists();
    }

    public function render()
    {
        return view('livewire.favorite-button');
    }
}
