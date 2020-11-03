@extends('layouts.app_master_admin')
@section('content')
    <section class="content-header">
        <h1>
            Thêm danh mục sản phẩm
            <small>coupon</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.coupon.index')}}">coupon</a></li>
            <li class="active">List</li>
        </ol>
    </section>
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header width-border">


                <div class="box-body">
                    <div class="col-md-8">
                        <form role="form" method="POST">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input name="cp_name" class="form-control" id="exampleInputEmail1"
                                           placeholder="coupon name ...">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Code</label>
                                    <input name="cp_code" class="form-control" id="exampleInputPassword1"
                                           placeholder="coupon code ...">
                                </div>
                                <div class="form-group">
                                    <label>Select</label>
                                    <select class="form-control" name="cp_type">
                                        <option value="0">Giảm theo %</option>
                                        <option value="1">Giảm theo tiền</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Number</label>
                                    <input name="cp_number" class="form-control" id="exampleInputPassword1"
                                           placeholder="coupon number ...">
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary"> Save <i class="fa fa-save"></i></button>
                                <a href="{{route('admin.coupon.index')}}" class="btn btn-primary">Quay lại <i
                                        class="fa fa-undo"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection
