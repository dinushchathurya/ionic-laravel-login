@extends('layouts.app')

@section('content')

<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
    </nav>
</div>

<div class="br-pagebody">
    <div class="br-section-wrapper">
        @if (isset($errors) && $errors->has(''))
        <div class="alert alert-block alert-error fade in" id="error-block">
            <?php
             $messages = $errors->all('<li>:message</li>');
            ?>
            <button type="button" class="close" data-dismiss="alert">×</button>

            <h4>Warning!</h4>
            <ul>
                @foreach($messages as $message)
                {{$message}}
                @endforeach
            </ul>
        </div>
        @endif
        <form name="addimagetoalbum" method="POST" action="{{URL::route('add_image_to_album')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="album_id" value="{{$album->id}}" />
            <div class="form-layout form-layout-1">

                <div class="row mg-b-25">

                    <div class="col-lg-4">
                       <div class="form-group">
                           <label for="description">Image Description</label>
                           <textarea name="description" type="text" class="form-control" placeholder="Imagedescription"></textarea>
                       </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="image">Select an Image</label>
                            {{Form::file('image')}}
                        </div>
                    </div>

                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info">Add Image</button>
                    <button class="btn btn-secondary">Cancel</button>
                </div>

            </div>
        </form>
    </div>
</div>

@endsection

