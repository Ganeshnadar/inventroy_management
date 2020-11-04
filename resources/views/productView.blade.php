@extends('parent')

@section('content')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('Product.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 <img src="{{ URL::to('/') }}/images/{{ $data->photo }}" class="img-thumbnail" />
 <h3>Product Name - {{ $data->name }} </h3>
 <h3>Product Quantity - {{ $data->qty }}</h3>
 <h3>Category Name - {{ $data->category['name'] }}</h3>
 <h3>Product Price - {{ $data->price }}</h3>
 <h3>Product Status - {{ ($data->is_active)?'active':'Inactive' }}</h3>
 <h3>Product Created Date - {{ $data->created_at }}</h3>
</div>
@endsection
