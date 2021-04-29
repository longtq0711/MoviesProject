<div class="mt-8">
    <a href="{{route('movies.show', $movie['id'])}}">
        <img src="<?php echo 'https://image.tmdb.org/t/p/w500/' .$movie['poster_path'] ?>" alt="aaa" class="hover:opacity-75 transition ease-in-out duration 150">
    </a>
    <div class="mt-2">
        <a href="{{route('movies.show', $movie['id']),}}" class="text-lg mt-2 hover:text-gray:300"><?php echo $movie['title']?></a>
        <div class="flex items-center text-gray-400 text-sm mt-1">

        </div>
    </div><span><?php ?></span>
    <span class="ml-1"><?php echo $movie['vote_average']*10 .'%'?></span>
    <span class="mx-2">|</span>
    <span><?php $result = Carbon\Carbon::parse($movie['release_date'])->format('M d,y');
        echo $result;
        ?>
            </span>

    <div class="text-gray-400 text-sm">
        @foreach($movie['genre_ids'] as $genre)
            <?php
            echo $genres->get($genre);
            if(!$loop->last) echo ', ';
            ?>
        @endforeach
    </div>
</div>