<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Comic;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_comics = config("comics");

        foreach ($_comics as $comic) {

            $new_comic = new Comic();
            $new_comic->title = $comic['title'];
            $new_comic->description = $comic['description'];
            $new_comic->thumb = $comic['thumb'];
            $new_comic->price = substr($comic['price'], 1);
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];

            $new_comic->save();
        }
        //
    }
}