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
         ),
             1 => 
            array (
            'id'          => 2,
            'user_id'     => 2,
         ),
             2 => 
            array (
            'id'          => 3,
            'user_id'     => 3,
         ),
        ));
    }
}
