@extends('admin.master')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1 style="color: red;">
      Page Category
    </h1>
  </section>
  <div class="container" style="padding: 50px;">
    <h3>THÊM LOẠI HOA</h3>

    <div>
      <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>

    <form action="{{route('category.store')}}" method="post">
      @csrf
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="name">Tên loại hoa</label>
        <input type="text" class="col-sm-10 form-control" id="name" placeholder="Tên loại hoa" name="name" value="{{old('name')}}">
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="feature">Đặc biệt</label>
        <input type="radio" class="form-check-inline" id="feature" placeholder="Đặc biệt" name="feature" value="1" {{old('feature')?"checked":""}}">Có

        <input style="margin-left: 2000" type="radio" class="form-check-inline" id="feature" placeholder="Đặc biệt" name="feature" value="0" {{old('feature')?"":"checked"}}">Không
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