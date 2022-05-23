@extends('admin.master')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1 style="color: red;">
      Page Product
    </h1>
  </section>
  <div>
    <ul>
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
    </ul>
  </div>

  <div class="container">
    <h3>THÊM HOA </h3>
    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="name">Tên hoa</label>
        <input type="text" class="col-sm-10 form-control" id="name" placeholder="Tên hoa" name="name" value="{{old('name')}}">
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="avatar">Ảnh thẻ</label>
        <input type="file" class="col-sm-10 form-control" id="avatar" placeholder="Ảnh thẻ" name="avatar" value="{{old('avatar')}}">
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="category_id">Loại hoa</label>
        <select class="col-sm-10 form-control" id="category_id" placeholder="Loại hoa" name="category_id" value="{{old('name')}}">
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="style_id">Kiểu hoa</label>
        <select class="col-sm-10 form-control" id="style_id" placeholder="Kiểu hoa" name="style_id" value="{{old('name')}}">
          @foreach($styles as $style)
          <option value="{{$style->id}}">{{$style->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="size">Kích cỡ</label>
        <input type="text" class="col-sm-10 form-control" id="size" placeholder="Kích cỡ" name="size" value="{{old('size')}}">
      </div>

      <!-- <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="weight">Cân nặng</label>
        <input type="number" class="col-sm-10 form-control" id="weight" placeholder="Cân nặng" name="weight" value="{{old('weight')}}">
      </div> -->

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="price">Giá bán</label>
        <input type="number" class="col-sm-10 form-control" id="price" placeholder="Giá bán" name="price" value="{{old('price')}}">
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="old_price">Giá cũ</label>
        <input type="number" class="col-sm-10 form-control" id="old_price" placeholder="Giá cũ" name="old_price" value="{{old('old_price')}}">
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="description">Mô tả</label>
        <textarea class="col-sm-10 form-control" id="description" placeholder="Mô tả" name="description">{{old('description')}}</textarea>
      </div>

      <div class="form-group row">
        <input type="submit" class="col-sm-2 form-control" value="Thêm">
        <input type="reset" class="col-sm-2 form-control" value="Nhập lại">
      </div>
    </form>
  </div>
</div>

@endsection