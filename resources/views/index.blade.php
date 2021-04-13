@extends('layouts.app')

@section('content')

<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <div class="row">
        @foreach($albums as $album)
         <div class="col-lg-3">
            <div class="col-md mg-t-20 mg-md-t-0">
                <div class="card bd-0">
                    <img class="card-img-top img-fluid" src="../albums/{{$album->cover_image}}" alt="Image">
                    <div class="card-body rounded-bottom bg-success">
                      <p class="card-text tx-white">
                        <h5 class="card-text tx-white center">{{$album->name}}</h5>
                        <h6 class="card-text tx-white">{{$album->description}}</h6>
                        <h6 class="card-text tx-white">{{count($album->Photos)}} image(s).</h6>
                        <h6 class="card-text tx-white">{{ date("d F Y",strtotime($album->created_at)) }}</h6>
                        <a href="{{route('show_album', ['id'=>$album->id])}}" class="btn btn-oblong btn-outline-primary center mt-3">Show Gallery</a>
                      </p>
                    </div>
                </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
</div>

@endsection
