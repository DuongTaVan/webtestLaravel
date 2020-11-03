@extends('layouts.app_master_admin')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa danh mục thương hiệu
            <small>Trademark</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.trademark.index')}}">Trademark</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header width-border">


                <div class="box-body">
                    <div class="col-md-8">


                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" method="POST">
                            @csrf

                            <div class="form-group">
                                <label>Name <span class="text-danger">(*)</span></label>
                                <input type="text" name="t_name" class="form-control" value="{{$trademark->t_name}}">
                                {!!showErrors($errors,'t_name')!!}
                            </div>


                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary"> Save <i class="fa fa-save"></i></button>
                                <a href="{{route('admin.trademark.index')}}" class="btn btn-primary">Quay lại <i
                                        class="fa fa-undo"></i></a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
