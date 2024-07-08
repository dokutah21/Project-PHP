@extends('admin.master')
@section('title','Trang quản trị')
@section('title-page','Thêm danh mục')

    <!-- Main content -->

@section('main-content')
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
                <h3 class="box-title">Thêm mới blog</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{route('blog.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="box-body">
                  <div class="form-group @error('name') has-error @enderror">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="tieude">
                    @error('name')
                        <span class="help-block">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tóm tắt</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="tomtat">
                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Nội dung</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="noidung">
                    
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ảnh blog</label>
                    <input type="file" class="form-control" id="exampleInputEmail1" name="anhblog">
                    
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


 