@extends('parent')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Inventory Management System</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Category.create') }}"> Create New Category</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Slug</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->slug }}</td>
            <td>
                <form action="{{ route('Category.destroy',$category->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('Category.show',$category->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('Category.edit',$category->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $data->links() !!}
      
@endsection