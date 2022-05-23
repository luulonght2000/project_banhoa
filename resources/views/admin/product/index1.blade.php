@extends('admin.master')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1 style="color: red;">
      Page Product
    </h1>
  </section>
  <div class="container">
    <h3>DANH SÁCH SẢN PHẨM</h3>

    <div class="col-md-4" style="float: right; border: 1px solid grey; padding:10px 0px 0px 10px;">
      @if($last_product)
      <h5>HOA CẬP NHẬT CUỐI CÙNG </h5>
      <ul>
        <li>Mã SP: {{$last_product->id}}</li>
        <li>Tên: {{$last_product->name}}</li>
        <li>Loại hoa: {{$last_product->category->name}}</li>
        <li>Thời gian cập nhật: {{$last_product->updated_at}}</li>
      </ul>
      @endif
    </div>

    <h5><a href="{{route('product.create')}}">Thêm hoa</a></h5>

    <table class="table table-hover table-dark" border="1">
      <thead>
        <tr style="text-align: center">
          <th>Ảnh</th>
          <th>Tên hoa</th>
          <th>Loại hoa</th>
          <th>Kiểu hoa</th>
          <th>Giá</th>
          <th>Giá cũ</th>
          <th>Mô tả</th>
          <th>Đã bán</th>
          <th>Thao tác</th>
        </tr>
      </thead>

      @foreach($products as $product)
      <tr>
        <td>
          @if(file_exists(public_path("./uploads/{$product->id}.jpg")))
          <img width="75" height="100" src={{"/uploads/{$product->id}.jpg"}} alt="">
          @else
          <img width="75" height="100" src={{"/uploads/no_photo.png"}} alt="">
          @endif
        </td>
        <td>{{$product->name}}</td>
        <td>{{$product->category->name ?? 'None'}}</td>
        <td>{{$product->style->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->old_price}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->sold}}</td>

        <td>
          <a href="{{route('product.edit', ['product'=>$product->id])}}"><button>Sửa</button></a>

          <form action="{{route('product.destroy', ['product'=>$product->id])}}" method="POST" onsubmit="return(confirm('bạn có thực sự muốn xóa?'))">
            @method('DELETE')
            @csrf
            <input type="submit" value="Xóa">
          </form>
        </td>
      </tr>
      @endforeach
    </table>

    <div class="pagination justify-content-center">
      {{$products->onEachSide(10)->links()}}
    </div>
  </div>
</div>
@endsection