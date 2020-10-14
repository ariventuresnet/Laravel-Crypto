@extends('admin.layout')

@section('main-content')

   <section>
    <div class="container-fluid pt-5">
        <div class="row mt-3">
            <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                <div class="row align-items-center mb-5">
                    <div class="col">

                        <div class="d-flex justify-content-end mb-2">
                            <div><a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a></div>
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
                            <div class="card-header">Post</div>
                            <div class="card-body">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th></th>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td> {{ $loop->index + 1 }} </td>
                                                <td> {{ substr(ucfirst($post->title), 0, 30) . '...' }} </td>
                                                <td> {{ ucfirst($post->category->name) }} </td>
                                                <td> {!! $post->status == '1' ? '<p class="text-success font-weight-bold">Active</p>' : '<p class="text-warning font-weight-bold">Inactive</p>' !!} </td>
                                                <td> 
                                                    <a href="{{route('posts.show', $post->id)}}" class="text-primary mr-2"><i class="far fa-list-alt"></i></a>
                                                    <a href="{{route('posts.edit', $post->id)}}" class="text-success mr-2"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('posts.delete', $post->id)}}" id="delete" class="text-danger mr-2" ><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                    
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
    <!-- sweet alert cdn  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        $(document).on('click', "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr('href');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((willDelete) => {
                if (willDelete.value) {
                    window.location.href = link;
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                
            });
        });
    </script>
@endsection