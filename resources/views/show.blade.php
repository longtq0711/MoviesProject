@extends('layouts.main')

@section('content')
    <div class="movie-info border-b border-gray-800">
        <div class="container mx-auto px-4 pt-16 flex flex-col md:flex-row">
            <img src="<?php echo 'https://image.tmdb.org/t/p/w500/' .$movie['poster_path'] ?>" alt="äaaa" class="w-64 md:w-96">
            <div class="md:ml-24">
                <div class="text-4xl font-semibold mb-3">{{$movie['title']}}</div>
                <div class="flex flex-wrap items-center text-gray-400 text-sm">
                    <span></span>
                    <span class="ml-1"><?php echo $movie['vote_average']*10 .'%'?></span>
                    <span class="mx-2">|</span>
                    <span><?php $result = Carbon\Carbon::parse($movie['release_date'])->format('M d,y');
                        echo $result;
                        ?>
                    </span>
                    <span class="mx-2">|</span>
                    <span>
                        @foreach($movie['genres'] as $genre)
                            {{$genre['name']}} @if (!$loop->last), @endif
                        @endforeach
                    </span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{$movie['overview']}}
                </p>

                <div class="mt-12">
                    <h4 class="text-white font-semibold">Featured Crew</h4>
                    <div class="flex mt-4">
                        @foreach($movie['credits']['crew'] as $crew)
                            @if($loop->index < 2)
                        <div class="mr-8">
                            <div>{{$crew['name']}}</div>
                            <div class="text-sm text-gray-400">{{$crew['job']}}</div>
                        </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                    @if(count($movie['videos']['results']) > 0)
                    <div class="mt-12">
                        <a href="http://www.youtube.com/watch?v={{$movie['videos']['results'][0]['id']}}" style="color: black;background: orange" class="flex inline-flex items-center bg-orange-500 text-gray-900 rounded font-semibold px-5 py-4 hover:bg-orange-600 transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 24 24">
                                <path d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
                            </svg>
                            <span class="ml-2">Play Trailer</span>
                        </a>
                    </div>
                    @endif()

            </div>
        </div>
    </div>

    <div class="movie-cast border-b border-gray-800">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Cast</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">

                    @foreach($movie['credits']['cast'] as $cast)
                        @if($loop->index < 5)
                        <div class="mt-8">
                            <a href="#">
                                <img src="{{'https://image.tmdb.org/t/p/w300/' . $cast['profile_path']}}" alt="cast" class="hover:opacity-75 transition ease-in-out duration 150">
                            </a>
                            <div class="mt-2">
                                <a href="#" class="text-lg mt-2 hover:text-gray:300">{{$cast['name']}}</a>
                                <div class="flex items-center text-gray-400 text-sm mt-1">
                                    <span>{{$cast['character']}}</span>
                                </div>
                            </div>
                            <div class="text-gray-400 text-sm"></div>
                        </div>
                        @endif
                    @endforeach
            </div>
        </div>
    </div>

    <div class="movie-images">
        <div class="container mx-auto px-4 py-16">
            <h2 class="text-4xl font-semibold">Images</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-8">
                @foreach($movie['images']['backdrops'] as $image)
                    @if($loop->index < 6)
                         <div class="mt-8">
                            <img src="{{'https://image.tmdb.org/t/p/w300/' . $image['file_path']}}" alt="image" class="hover:opacity-75 transition ease-in-out duration 150">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>
@endsection