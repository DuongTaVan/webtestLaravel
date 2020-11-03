@extends('layouts.app_master_admin')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lí mã giảm giá
            <small>Coupon</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.coupon.index')}}">coupon</a></li>
            <li class="active">List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header width-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{route('admin.coupon.create')}}" class="btn btn-primary">Thêm mới
                            <i class="fa fa-plus"></i></a></h3>
                </div>

                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Number</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            @foreach($coupons as $coupon)
                                <tr>
                                    <td>{{$coupon->id}}</td>
                                    <td>{{$coupon->cp_name}}</td>
                                    <td>{{$coupon->cp_code}}</td>
                                    <td>
                                        {{$coupon->cp_number}}
                                        @if($coupon->cp_type == 0)
                                            %
                                        @else
                                            vnđ
                                        @endif
                                    </td>

                                    <td>
                                        @if($coupon->cp_status==0)
                                            <a href="{{route('admin.coupon.active',$coupon->id)}}"
                                               class="label label-default">Hide</a>
                                        @else
                                            <a href="{{route('admin.coupon.active', $coupon->id)}}"
                                               class="label label-info">Show</a>

                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.coupon.update',$coupon->id)}}"
                                           class="btn btn-xs btn-primary"><i class="fa fa-pencil">Edit</i></a>
                                        <a href="{{route('admin.coupon.delete',$coupon->id)}}"
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
