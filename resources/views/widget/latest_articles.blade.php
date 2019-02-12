
@inject('articles', 'App\Article')
<?php
  $size=isset($size) ? $size :10;
 
?>

 <h3>Les Derniers Articles</h3>

 @foreach ($articles->Dernier($size)->get() as $article)

<li ><a href="{{route('article.show',$article->id)}}">{{$article->name}}</a></li>
     
 @endforeach
