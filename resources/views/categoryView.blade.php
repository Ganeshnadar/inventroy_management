@extends('parent')

@section('content')

<div class="jumbotron text-center">
 <div align="right">
  <a href="{{ route('Category.index') }}" class="btn btn-default">Back</a>
 </div>
 <br />
 <h3>Category Name - {{ $data->name }} </h3>
 <h3>Category Slug - {{ $data->slug }}</h3>
</div>
@endsection
