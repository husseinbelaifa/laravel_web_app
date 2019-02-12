<?php

use Illuminate\Database\Seeder;

class user extends Seeder
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

        for ($i=0; $i <10 ; $i++) { 
            # code...

            array_push($data,[
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>bcrypt(1234)
            ]);

           
        }
        DB::table('users')->insert($data);
    }
}
