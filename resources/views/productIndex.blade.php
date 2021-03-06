@extends('parent')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Inventory Management System</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('Product.create') }}"> Create New Product</a>
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
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Category Name</th>
            <th>Price</th>
            <th>Product status</th>
            <th>Created Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($data as $product)
        <tr>
            <td>{{ ++$i }}</td>
            <td> <img src="{{ URL::to('/') }}/images/{{ $product->photo }}" class="img-thumbnail" width="75" /></td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->qty }}</td>
            <td>{{ $product->category['name'] }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ ($product->is_active)?'active':'Inactive' }}</td>
            <td>{{ $product->created_at }}</td>
            <td>
                <form action="{{ route('Product.destroy',$product->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('Product.show',$product->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('Product.edit',$product->id) }}">Edit</a>
   
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