<?php

namespace App\Http\Livewire\Backend\Film;

use GuzzleHttp\Client;
use Livewire\Component;

class Index extends Component
{
    public $dataFilm;

    public function render()
    {
        /**
         * Akses API Localhost : http://localhost:port/path
         */

        $client = new Client();
        $response = $client->request('GET', 'http://localhost/web_film/public/api/film');
        $result = json_decode($response->getBody(), true);
        $this->dataFilm = $result['data'];
        // dd($this->dataFilm);

        return view('livewire.backend.film.index')->layout('livewire.backend.layouts.app', ['title' => 'Film']);
    }
}
