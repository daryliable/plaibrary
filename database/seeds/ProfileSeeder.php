<?php
use App\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert(array (
          0 => 
            array (
            'id'          => 1,
            'user_id'     => 1,
            'designation'     =>'test1',
            'address'     =>'test1',
         ),
             1 => 
            array (
            'id'          => 2,
            'user_id'     => 2,
            'designation'     =>'test2',
            'address'     =>'test2',
         ),
             2 => 
            array (
            'id'          => 3,
            'user_id'     => 3,
            'designation'     =>'test3',
            'address'     =>'test3',
         ),
        ));
    }
}
