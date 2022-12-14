<?php

namespace App\Http\Livewire\Frontend\Scrp;

use Goutte\Client;
use Livewire\Component;

class Detail extends Component
{
    public $results = [];

    public function mount($url)
    {
        $client = new Client();
        $content = 'https://bioskopkeren.beauty/' . $url;
        $page = $client->request('GET', $content);
        $page->filter('#film')->each(function ($item) {
            $item->filter('.filmicerik')->each(function ($node) {
                $this->results['data'] = [
                    'title' => $node->filter('p')->filter('span')->filter('strong')->text(),
                    'description' => $node->filter('p')->filter('span')->text(),
                    'link_streaming' => $node->filter('#port-embed')->attr('data-frame') . $node->filter('#port-embed')->attr('data-id')
                ];
            });
        });
    }

    public function render()
    {
        return view('livewire.frontend.scrp.detail')->layout('livewire.frontend.layouts.app', ['title' => 'From Internet']);
    }
}
