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
            'genre_name'     => 'Arts',
         ),
            1 => 
          array (
            'genre_name'     => 'General Work',
         ),
            2 => 
          array (
            'genre_name'     => 'History, biography, and geography',
         ),
            3 => 
          array (
            'genre_name'     => 'Language',
         ),
            4 => 
          array (
            'genre_name'     => 'Literature and rhetoric',
         ),
            5 => 
          array (
            'genre_name'     => 'Natural sciences and mathematics',
         ),
            6 => 
          array (
            'genre_name'     => 'Philosophy and Psychology',
         ),
            7 => 
          array (
            'genre_name'     => 'Religion',
         ),
            8 => 
          array (
           'genre_name'     => 'Social sciences',
         ),
            9 => 
          array (
            'genre_name'     => 'Technology',
         ),
      ));

    }
}
