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
    <h3>SỬA HOA </h3>
    <form action="{{route('product.update', ['product'=>$product->id])}}" method="post" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="name">Tên hoa</label>
        <input type="text" class="col-sm-10 form-control" id="name" placeholder="Tên hoa" name="name" value="{{count($errors)?old('name'):$product->name}}">
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="avatar">Ảnh</label>
        <div class="col-sm-10">
          @if(file_exists(public_path("./uploads/{$product->id}.jpg")))
          <img width="320" height="300" src={{"/uploads/{$product->id}.jpg"}} alt="">
          @else
          <img width="320" height="300" src={{"/uploads/no_photo.png"}} alt="">
          @endif
          <input type="file" class="form-control" id="avatar" placeholder="Ảnh thẻ" name="avatar" value="{{old('avatar')}}">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="category_id">Loại hoa</label>
        <select class="col-sm-10 form-control" id="category_id" placeholder="Loại hoa" name="category_id" value="{{old('name')}}">
          <?php
          $current_category_id = count($errors) ? old('category_id') : $product->category_id;
          ?>
          @foreach($categories as $category)
          <option value="{{$category->id}}" <?php echo $category->id == $current_category_id ? "selected" : ""; ?>>{{$category->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="style_id">Kiểu hoa</label>
        <select class="col-sm-10 form-control" id="style_id" placeholder="Kiểu hoa" name="style_id" value="{{old('name')}}">
          <?php
          $current_style_id = count($errors) ? old('style_id') : $product->style_id;
          ?>
          @foreach($styles as $style)
          <option value="{{$style->id}}" <?php echo $style->id == $current_style_id ? "selected" : ""; ?>>{{$style->name}}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="size">Kích cỡ</label>
        <input type="text" class="col-sm-10 form-control" id="size" placeholder="Kích cỡ" name="size" value="{{count($errors)?old('size'):$product->size}}">
      </div>

      <!-- <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="weight">Cân nặng</label>
        <input type="number" class="col-sm-10 form-control" id="weight" placeholder="Cân nặng" name="weight" value="{{count($errors)?old('weight'):$product->weight}}">
      </div> -->

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="price">Giá bán</label>
        <input type="number" class="col-sm-10 form-control" id="price" placeholder="Giá bán" name="price" value="{{count($errors)?old('price'):$product->price}}">
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="old_price">Giá cũ</label>
        <input type="number" class="col-sm-10 form-control" id="old_price" placeholder="Giá cũ" name="old_price" value="{{count($errors)?old('old_price'):$product->old_price}}">
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="description">Mô tả</label>
        <textarea class="col-sm-10 form-control" id="description" placeholder="Mô tả" name="description">{{count($errors)?old('description'):$product->description}}</textarea>
      </div>

      <div class="form-group row">
        <input type="submit" class="col-sm-2 form-control" value="Cập Nhật">
        <input type="reset" class="col-sm-2 form-control" value="Nhập lại">
      </div>
    </form>
  </div>
</div>

@endsection