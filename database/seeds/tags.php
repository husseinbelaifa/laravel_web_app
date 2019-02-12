<?php

use Illuminate\Database\Seeder;
use \App\Tag;
use \App\Article;
class tags extends Seeder
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
                'name'=>$faker->unique()->word
              
            ]);

           
        }
        Tag::insert($data);

        $data=[];
        $articles=Article::pluck('id')->toArray();
        $tags=Tag::pluck('id')->toArray();

        for ($i=0; $i <100 ; $i++) { 
            # code...

            array_push($data,[
                'article_id'=>$faker->randomElement($articles),
                'tag_id'=>$faker->randomElement($tags)
              
            ]);

           
        }
        DB::table('article_tag')->insert($data);

    }
}
