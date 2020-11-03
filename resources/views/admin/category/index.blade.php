@extends('layouts.app_master_admin')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lí danh mục sản phẩm
            <small>Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.category.index')}}">Category</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header width-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{route('admin.category.create')}}" class="btn btn-primary">Thêm mới
                            <i class="fa fa-plus"></i></a></h3>
                </div>

                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Avatar</th>
                                <th>Status</th>
                                <th>Hot</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                            @foreach($categories as $cate)
                                <tr>
                                    <td>{{$cate->id}}</td>
                                    <td>{{$cate->c_name}}</td>
                                    <td>{{$cate->c_avatar}}</td>
                                    <td>
                                        @if($cate->c_status ==1)
                                            <a href="{{route('admin.category.active',$cate->id)}}"
                                               class="label label-info">Show</a>
                                        @else
                                            <a href="{{route('admin.category.active',$cate->id)}}"
                                               class="label label-default">Hide</a>
                                        @endif
                                    </td>
                                    <td>
                                        @if($cate->c_hot==1)
                                            <a href="{{route('admin.category.hot',$cate->id)}}"
                                               class="label label-info">Hot</a>
                                        @else
                                            <a href="{{route('admin.category.hot',$cate->id)}}"
                                               class="label label-default">None</a>

                                        @endif
                                    </td>
                                    <td>{{$cate->created_at}}</td>
                                    <td>
                                        <a href="{{route('admin.category.update',$cate->id)}}"
                                           class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                                        <a href="{{route('admin.category.delete',$cate->id)}}"
                                           class="btn btn-xs btn-danger"><i class="fa fa-trash">Delete</i></a>
                                    </td>

                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Footer
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->


@endsection
