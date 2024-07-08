@extends('admin.master')
@section('title','Trang quản trị')

    <!-- Main content -->

@section('main-content-product')

<section class="content" style="min-height: 900px">

    <!-- Default box -->
    <div class="col-xs-12">
      <div class="col-xs-12">
        <div class="col-xs-12">
          <div class="box">
            @if ($message = Session::get('success'))
  
      <div class="alert alert-success alert-block">
  
        <button type="button" class="close" data-dismiss="alert">×</button>	
  
              <strong>{{ $message }}</strong>
  
      </div>
  
      @endif
        <div class="box">
          <div class="box-header">
         <a href="{{route('product.create')}}" class="btn btn-success">+Thêm mới sản phầm</a>

            <div class="box-tools">
              <div class="input-group input-group-sm">
                <form method = "get" action="{{ route('product.search') }}">
                    <input style="width: 150px;" type="text" name="search" value="{{ old('search', $search ?? '') }}" class="form-control pull-right" placeholder="Search" >

                    <div class="input-group-btn" style="width: 50px;">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <tbody><tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Ảnh sản phẩm</th>
                <th>Giá</th>
                <th>Ngày cập nhật</th>
                <th>Tùy chọn</th>
              </tr>
              
              @forelse ($products as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->TenSP}}</td>
                <td><img src="{{asset('uploads/sanpham/'.$item->AnhSP)}}" alt="" width="70px" height="70"></td>
                <td>{{$item->Gia}}</td>
                <td>{{$item->created_at}}</td>

                <td>
                <a href="{{route('product.edit',['id'=> $item->id])}}" class="btn btn-success">Sửa</a>
                <a href="{{route('product.delete',['id'=> $item->id])}}" class="btn btn-danger">Xóa</a>
                </td>
              </tr>
              @empty
                  <span>Chưa có dữ liệu</span>
              @endforelse
              
            </tbody></table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- /.box -->

  </section>
@endsection


 