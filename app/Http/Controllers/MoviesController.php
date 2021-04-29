<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $populars = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=213a6f1741c58682e939653e7edad4b3')
            ->json()['results'];
        $nowPlaying = Http::get('https://api.themoviedb.org/3/movie/now_playing?api_key=213a6f1741c58682e939653e7edad4b3&language=en-US')
            ->json()['results'];
        $genresArray = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=213a6f1741c58682e939653e7edad4b3&language=en-US')
            ->json()['genres'];

        $genres = collect($genresArray)->mapWithKeys(function ($item){
            return [$item['id'] => $item['name']];
        });
//        dump($populars);

        return view('index',[
            'populars' => $populars,
            'nowPlaying' => $nowPlaying,
            'genres' => $genres,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Http::get('https://api.themoviedb.org/3/movie/' .$id .'?api_key=213a6f1741c58682e939653e7edad4b3&append_to_response=credits,videos,images')
            ->json();

//        dump($movie);
        return view('show',[
            'movie' => $movie,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
