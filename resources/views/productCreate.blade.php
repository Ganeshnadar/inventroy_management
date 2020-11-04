@extends('parent')

@section('content')
@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
<div align="right">
 <a href="{{ route('Product.index') }}" class="btn btn-default">Back</a>
</div>

<form method="post" action="{{ route('Product.store') }}" enctype="multipart/form-data">

 @csrf
 <div class="form-group">
  <label class="col-md-4 text-right">Product Name</label>
  <div class="col-md-8">
   <input type="text" name="product_name" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Select Category</label>
  <div class="col-md-8">
  <select class="form-control" id="selectCategory" name="category">
    <option value="" disabled selected>Please select Category</option>        
    @foreach($data as $category)
    <option value="{{$category->id}}">{{ $category->name }}</option>
    @endforeach
  </select>
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Product Quantity</label>
  <div class="col-md-8">
   <input type="text" name="product_quantity" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Product Price</label>
  <div class="col-md-8">
   <input type="text" name="product_price" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Product Status</label>
  <div class="col-md-8 text-right">
   <input type="radio" name="product_status" class="form-control input-lg" />
  </div>
 </div>
 <br />
 <br />
 <br />
 <div class="form-group">
  <label class="col-md-4 text-right">Select Product Image</label>
  <div class="col-md-8">
   <input type="file" name="image" />
  </div>
 </div>
 <br /><br /><br />
 <div class="form-group text-center">
  <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
 </div>

</form>

@endsection
