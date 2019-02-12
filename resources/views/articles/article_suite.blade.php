@extends('default')


@section('title')

{{$article->name}} 
    
@endsection


@section('content')

<div class="row">
    <div class="col-sm-9">

            <h1>Suite de l'article with id :  {{$article->id}}</h1>

            <h2>Title : {{$article->name}} </h2>
            <p>Body: {{$article->body}} </p>
            <p>Published Date:{{$article->published_at}}</p>

    </div>

    <div class="col-sm-3">

            @include('widget/latest_articles',['size'=>5])

    </div>
</div>


    
@endsection
