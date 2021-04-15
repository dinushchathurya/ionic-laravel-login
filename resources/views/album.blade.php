@extends('layouts.app')

@section('content')

  <div class="card shadow-base bd-0 rounded-0 widget-4">
      <div class="card-header ht-75" style="background-color:#17A2B8;">
      </div>
      <div class="card-body" style="background-color:#2e415b;">
          <div class="card-profile-img">
              <img src="/albums/{{$album->cover_image}}" alt="" style="width:100px;height:100px;">
          </div>
          <h4 class="tx-normal tx-roboto tx-white">{{$album->name}}</h4>
          <p class="mg-b-25">{{$album->description}}</p>

          <p class="mg-b-0 tx-24">
            <a href="{{route('add_image',array('id'=>$album->id))}}"><button type="button" class="btn btn-primary btn-large">Add New Image to Album</button></a>
            <a href="{{route('delete_album',array('id'=>$album->id))}}" onclick="return confirm('Are yousure?')"><button type="button" class="btn btn-danger btn-large">Delete Album</button></a>
          </p>
      </div><!-- card-body -->
  </div>
  
   <div class="row mt-5">
       @foreach($album->Photos as $photo)
       <div class="col-lg-3">
           <div class="col-md mg-t-20 mg-md-t-0">
               <div class="card bd-0">
                   <img class="card-img-top img-fluid" src="/albums/{{$photo->image}}" alt="Image">
                   <div class="card-body rounded-bottom bg-success">
                       <p class="card-text tx-white">
                           <h6 class="card-text tx-white">{{$photo->description}}</h6>
                           <h6 class="card-text tx-white">{{ date("d F Y",strtotime($photo->created_at)) }}</h6>
                           <a href="{{URL::route('delete_image',array('id'=>$photo->id))}}" onclick="returnconfirm('Are you sure?')"><button type="button" class="btn btn-danger btn-small center">Delete Image</button></a>
                       </p>
                   </div>
               </div>
           </div>
       </div>
       @endforeach
   </div>

@endsection