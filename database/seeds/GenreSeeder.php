<?php
use App\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Genre::create([
            'genre_name'     => 'Arts',
        ]);
      Genre::create([
            'genre_name'     => 'General Work',
        ]);
      Genre::create([
            'genre_name'     => 'History, biography, and geography',
        ]);
      Genre::create([
            'genre_name'     => 'Language',
        ]);
      Genre::create([
            'genre_name'     => 'Literature and rhetoric',
        ]);
      Genre::create([
            'genre_name'     => 'Natural sciences and mathematics',
        ]);
      Genre::create([
            'genre_name'     => 'Philosophy and Psychology',
        ]);
      Genre::create([
            'genre_name'     => 'Religion',
        ]);
      Genre::create([
            'genre_name'     => 'Social sciences',
        ]);
      Genre::create([
            'genre_name'     => 'Technology',
        ]);
    }
}
