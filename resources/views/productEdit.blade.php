@extends('parent')

@section('content')
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="right">
                <a href="{{ route('Product.index') }}" class="btn btn-default">Back</a>
            </div>
            <br />
     <form method="post" action="{{ route('Product.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
      <div class="form-group">
       <label class="col-md-4 text-right">Product Name</label>
       <div class="col-md-8">
        <input type="text" name="product_name" value="{{ $data->name }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
        <label class="col-md-4 text-right">Select Category</label>
        <div class="col-md-8">
        <select class="form-control" id="selectCategory" name="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->id == $data->category_id  ? 'selected' : ''}}>{{ $category->name}}</option>
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
        <input type="text" name="product_quantity" value="{{ $data->qty }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Product Price</label>
       <div class="col-md-8">
        <input type="text" name="product_price" value="{{ $data->price }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Product Status</label>
       <div class="col-md-8">
       <input type="radio" name="product_status" {{ ($data->price) ? "checked" : ''}} class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Select Profile Image</label>
       <div class="col-md-8">
        <input type="file" name="image" />
              <img src="{{ URL::to('/') }}/images/{{ $data->photo }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $data->photo }}" />
       </div>
      </div>
      <br /><br /><br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
      </div>
     </form>

@endsection

