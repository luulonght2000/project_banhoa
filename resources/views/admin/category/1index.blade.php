@extends('admin.master')


@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1 style="color: red;">
      Page Category
    </h1>
  </section>
  <h5><a href="{{route('category.create')}}">Thêm loại hoa</a></h5>

  <table class="table table-hover table-dark" border="1">
    <thead>
      <tr style="text-align: center;">
        <th>Tên loại hoa</th>
        <th>feature</th>
        <th>Mô tả</th>
        <th>Action</th>
      </tr>
    </thead>
    @foreach($categories as $category)
    <tr>
      <td>{{$category->name}}</td>
      <td>{{$category->feature?"Nổi bật":"Không nổi bật"}}</td>
      <td>{{$category->description}}</td>
      <td>
        <a href="{{route('category.edit', ['category'=>$category->id])}}"><button>Sửa</button></a>

        <form action="{{route('category.destroy', ['category'=>$category->id])}}" method="POST" onsubmit="return(confirm('bạn có thực sự muốn xóa?'))">
          @method('DELETE')
          @csrf
          <input type="submit" value="Xóa">
        </form>
      </td>
    </tr>
    @endforeach
  </table>

  <div class="pagination justify-content-center">
    {{$categories->onEachSide(5)->links()}}
  </div>
</div>

@endsection