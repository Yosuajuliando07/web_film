<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Film;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Maize\Markable\Models\Favorite;


class DetailFilm extends Component
{
    public $data;

    public $view_judul;

    public $wishlist;

    public function mount($judul)
    {
        $film = Film::where('judul', $judul)->first();
        $this->view_judul = $film->judul;
        $this->data = $film;
    }

    public function favoriteAdd()
    {
        $film = Film::where('judul', $this->view_judul)->first();
        $user =
            auth()->user();
        Favorite::add($film, $user);

        $this->wishlist = Favorite::whereHasFavorite(
            auth()->user()
        )->get();
    }

    public function render()
    {
        return view('livewire.frontend.detail-film')->layout('livewire.frontend.layouts.app', ['title' => $this->data['judul']]);
    }
}
