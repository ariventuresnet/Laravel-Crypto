@extends('admin.layout')

@section('main-content')

   <section>
    <div class="container-fluid pt-5">
        <div class="row mt-3">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col-md-8">
                        <!--Show flash Message -->
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }} font-weight-bold">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>

                        <div class="card">
                            <div class="card-header">Create Post</div>
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf 
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="sub-title">Sub Title</label>
                                        <input type="text" name="sub_title" id="sub-title" class="form-control" value="{{ old('sub_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="category">Category</label>
                                        <select class="form-control" name="category_id" id="category">
                                          <option>Choose...</option>
                                          @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{ ucfirst($category->name) }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                          <input type="file" name="img" class="custom-file-input" id="img">
                                          <label class="custom-file-label" for="img">Choose image</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" class="form-control" id="content" cols="30" rows="5">{{ old('content') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Create</button>
                                    </div>
                        
                                </form>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('custom-script')
    <!-- ckeditor5 CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/19.0.0/classic/ckeditor.js"></script>

    <script>        
        $(document).ready(function(){

            if($('#content').length ){
                ClassicEditor
                .create( document.querySelector( '#content' ) )
                .catch( error => {
                    console.error( error );
                } );
            }

            $('#img').on('change',function(){
                //get the file name
                var fileName = $(this).val().replace('C:\\fakepath\\', "");
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            });

        });

    </script>
 
@endsection