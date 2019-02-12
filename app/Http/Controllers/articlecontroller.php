<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Article;
class articlecontroller extends Controller
{
    //

    public function index()
    {
        # code...
        // return   DB::table('article')->get();

       $articles=Article::recherche()
                          ->paginate(20);
        
    //    $latestarticles=Article::latest('published_at')->paginate(10,['id','name'],'feuille');
       return view("articles.index",compact("articles"));


    }

    public function store(){
        Article::insert([

            'name'=>'mon article',
            'body'=>'mon text',
            'published_at'=>new Carbon('2018-02-10 11:53:20')

        ]);
    }

    public function show($id)
    {
        # code...
     

      $article=Article::findOrfail($id);
       

        // dd($article);
        return view("articles.article_suite",compact('article'));
    }

    public function update()
    {
        # code...
        Article::where('id',1)
           ->update([
               'name'=>'mon article',
               'body'=>'mon text']
           );
    }

    public function destroy()
    {
        # code...
        Article::where('id',2)
        ->delete();
    }
}
