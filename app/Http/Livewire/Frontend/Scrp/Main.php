<?php

namespace App\Http\Livewire\Frontend\Scrp;

use Goutte\Client;
use Livewire\Component;
use Illuminate\Support\Str;

class Main extends Component
{
    public $results = [];

    public function render()
    {
        $client = new Client();
        $setPage = 5;
        $domain = "https://bioskopkeren.beauty";

        for ($i = 1; $i <= $setPage; $i++) {
            $crawler = $client->request("GET", "$domain/2022/page/$i/");
            $crawler->filter('.moviefilm')->each(function ($node) {
                $this->results[Str::after($node->filter('a')->attr('href'), 'beauty/')] = [
                    'title' => $node->filter('.movief')->text(),
                    'image' => $node->filter('img')->attr('src'),
                ];
            });
        }
        // dd($dataFilm);
        return view('livewire.frontend.scrp.main')->layout('livewire.frontend.layouts.app', ['title' => 'From Internet']);
    }
}
