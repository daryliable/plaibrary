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
    \DB::table('genre')->insert(array (
          0 => 
            array (
            'id'             => 1,
            'genre_name'     => 'Arts',
         ),
            1 => 
          array (
            'id'             => 2,
            'genre_name'     => 'General Work',
         ),
            2 => 
          array (
            'id'             => 3,
            'genre_name'     => 'History, biography, and geography',
         ),
            3 => 
          array (
            'id'             => 4,
            'genre_name'     => 'Language',
         ),
            4 => 
          array (
                 'id'             => 5,
            'genre_name'     => 'Literature and rhetoric',
         ),
            5 => 
          array (
            'id'             => 6,
            'genre_name'     => 'Natural sciences and mathematics',
         ),
            6 => 
          array (
            'id'             => 7,
            'genre_name'     => 'Philosophy and Psychology',
         ),
            7 => 
          array (
            'id'             => 8,
            'genre_name'     => 'Religion',
         ),
            8 => 
          array (
            'id'             => 9,
            'genre_name'     => 'Social sciences',
         ),
            9 => 
          array (
            'id'             => 10,
            'genre_name'     => 'Technology',
         ),
      ));

    }
}
