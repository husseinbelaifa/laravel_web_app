<?php

use Illuminate\Database\Seeder;
use \App\User;
class article extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        
        $faker=Faker\Factory::create();



         $data=[];
         $user=User::pluck('id')->toArray();
        for ($i=0; $i <100 ; $i++) { 
            # code...

            array_push($data,[
                'name'=>$faker->sentence,
                'body'=>$faker->realText,
                'published_at'=>$faker->dateTime(),
                'user_id'=>$faker->randomElement($user)
               
            ]);

           
        }
        DB::table('articles')->insert($data);
    }
}
