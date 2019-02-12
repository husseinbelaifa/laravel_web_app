@extends('default')


@section('title')

Mon Blog
    
@endsection

@section('content')

<div class="row">
    <div class="col-md-9">

            <h1>List des Articles</h1>
            <form class="form-inline mb-3">
              <label for=""></label>
          
            <input type="text" class="form-control" value="{{request('q')}}" name="q" id="" aria-describedby="helpId" placeholder="">
                  

               
                    <button class="btn btn-primary">Search</button>
                  
            </form>
             
              {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
             
           
            @foreach ($articles as $article)
            <h2>{{$loop->iteration}}- {!!$article->namesearchable!!} 
                <small>{{ $article->publishedatformated }}</small></h2>
                {{-- {{dd(str_replace(request('q'), '<span style="color: red;">'.request('q').'</span>',$article->body ))}} --}}
            {{-- <p> {{str_limit($article->body,200)}}</p> --}}
          <p>
           {!!$article->bodysearchable!!}

          </p>

                  <p>Publier Par: {!!$article->usernamesearchable!!}</p>
             

                  @if ($article->tags->isNotEmpty())
                  <p>Tags: {{$article->tags()->pluck('name')->implode(',')}}</p>
                  @endif
            
            <a class="btn btn-info" href="{{ route('article.show', $article->id)}}">Lire la Suite</a>

          

            @if ($loop->remaining!=0)
               <hr>
            @endif
            
            
            
            @endforeach


            <div class="mt-5 justify-content-center d-flex">
                {{ $articles->appends(request()->all())->links()}}
            </div>

    </div>

    <div class="col-md-3">

        {{-- recent articles --}}

         @include('widget/latest_articles')

    </div>
</div>


    
@endsection

