<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Carbon\Carbon;
use \App\User;
use \App\Tag;
class Article extends Model
{

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function tags()
  {
      return $this->belongsToMany(Tag::class);
  }
    /*
      scope
    */


    public function scopeDernier($q,$nb=10)
    {
        # code...

        $q->latest('published_at')->take($nb);
    }



    public function scoperecherche($query){

        $q=request('q');

         $query->where('name','like',"%$q%")
               ->orwhere('body','like',"%$q%")
                ->orWhereHas('user',function($user_query) use($q) {
                    $user_query->where('name','like',"%$q%");

                });
                // ->get()
                // ->map(function($article) use($q){
                //     $article->body=str_replace($q, '<span style="color: red;">'.$q.'</span>',$article->body );
                // });

              
         

    }
   

    

    /*
       Attribute
    */

    protected $table="articles";

    protected $dates = [
        'published_at',
    ];

    public function getPublishedAtFormatedAttribute()
    {
        # code...
        return  $this->published_at->diffForHumans();
    }

    
    public function getNameSearchableAttribute(){
        return str_ireplace(request('q'), '<mark class="bg-warning">'.request('q').'</mark>',$this->name );
    }

    public function getBodySearchableAttribute(){
        return str_ireplace(request('q'), '<mark class="bg-warning">'.request('q').'</mark>',$this->body );
    }

    public function getUserNameSearchableAttribute(){
        return str_ireplace(request('q'), '<mark class="bg-warning">'.request('q').'</mark>',$this->user->name );
    }

}
