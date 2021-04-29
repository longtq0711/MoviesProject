<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class SearchDropDown extends Component
{
    public $search = '';
    public function render()
    {
        $searchResults = [];
        if(strlen($this->search) > 3){
            $searchResults = Http::get('https://api.themoviedb.org/3/search/movie?api_key=213a6f1741c58682e939653e7edad4b3&query='.$this->search)
                ->json()['results'];
//            dump($searchResults);
        }


        return view('livewire.search-drop-down',[
            'searchResults' => collect($searchResults)->take(6),
        ]);
    }
}
