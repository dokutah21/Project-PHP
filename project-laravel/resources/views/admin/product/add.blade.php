@extends('admin.master')
@section('title','Trang quản trị')
@section('title-page','Thêm sản phẩm')

    <!-- Main content -->

@section('main-content-product')
<section class="content">

    <!-- Default box -->
      <div class="col-xs-12">
          <div class="box">
            @if ($message = Session::get('status'))

      <div class="alert alert-success alert-block">

        <button type="button" class="close" data-dismiss="alert">×</button>	

              <strong>{{ $message }}</strong>

      </div>

      @endif
          <!-- /.box-header -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Thêm mới sản phẩm</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('product.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                  <div class="form-group @error('name') has-error @enderror">
                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="ten">
                    @error('name')
                        <span class="help-block">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh sản phẩm</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="anhdaidien">
                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Giá</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="gia">
                    
                  </div>
                  
                </div>
                <!-- /.box-body -->
  
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Thêm mới</button>
                </div>
              </form>
            </div>
         
            <!-- /.box -->
  
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    <!-- /.box -->

  </section>
@endsection


 