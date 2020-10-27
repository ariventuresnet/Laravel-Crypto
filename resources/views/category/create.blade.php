@extends('admin.layout')

@section('main-content')

<section>
    <div class="container-fluid pt-5">
        <div class="row mt-3">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col-md-8">
                        <div class="d-flex justify-content-end mb-2">
                            <div><a href="{{route('categories.index')}}" class="btn btn-info px-3"> <i class="fas fa-long-arrow-alt-left text-white mr-2"></i>Back</a></div>
                        </div>
                        <!--Show flash Message -->
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }} font-weight-bold">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>

                        <div class="card">
                            <div class="card-header">
                                {{ isset($category)? 'Edit Category': 'Create Category' }}
                            </div>
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
                    
                                <form action="{{ isset($category)? route('categories.update', $category->id) :route('categories.store') }}" method="POST">
                                @csrf
                                @if ( isset($category))
                                    @method('PUT')   
                                @endif
                    
                                    <div class="form-group">
                                        <label for="cat-name">Name</label>
                                    <input type="text" id="cat-name" name="name" class="form-control" value="{{ isset($category)? $category->name : ''}}" placeholder="category name">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success"> {{isset($category)? 'Update' :'Create'}} </button>
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