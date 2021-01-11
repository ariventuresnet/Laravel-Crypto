<?php

use App\Post;
use App\WebScrape;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            "title" => 'Lorem ipsum dolor sit amet, consectetur adipiscing.',
            "slug" => Str::slug('Lorem ipsum dolor sit amet, consectetur adipiscing.'),
            "sub_title" => 'dolor sit amet consectetur',
            "content" => 'Mauris efficitur ligula felis, non luctus diam porta at. Ut tincidunt, tortor non accumsan accumsan, enim velit condimentum ligula, vel viverra velit leo in massa. Vestibulum vitae quam id ex scelerisque molestie. Donec accumsan, ligula ut molestie eleifend, lorem nunc aliquet ante, vitae fermentum lorem nisl vel mi. Vivamus vitae risus semper, placerat diam nec, viverra libero. Vestibulum semper aliquam interdum. In pharetra turpis eget eros lobortis hendrerit.',
            "category_id" => 1,

        ]);

        WebScrape::create([
            "state" => "empty",
        ]);
    }
}
