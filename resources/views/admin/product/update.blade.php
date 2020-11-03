@extends('layouts.app_master_admin')
@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa danh mục sản phẩm
            <small>Product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.product.index')}}">Product</a></li>
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
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name <span class="text-danger">(*)</span></label>
                                <input type="text" name="p_name" class="form-control" value="{{$product->p_name}}"
                                       placeholder="Name ...">
                                {!!showErrors($errors,'p_name')!!}
                            </div>
                            <div class="form-group">
                                <label>Price <span class="text-danger">(*)</span></label>
                                <input type="text" name="p_price" class="form-control" value="{{$product->p_price}}"  placeholder="Price ...">
                                {!!showErrors($errors,'p_price')!!}
                            </div>
                            <div class="form-group">
                                <label>Trademark <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="t_id" id="trademark">
                                    @foreach($trademarks as $trademark)
                                        <option value="{{$trademark->id}}">{{$trademark->t_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select class="form-control" name="c_id" id="post1">
                                    <option> -------POST------</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Avatar <span class="text-danger">(*)</span></label>
                                <input name="p_image" type="file" accept="image/*" onchange="loadFile(event)">
                                <img id="output" src="{{$product->p_image}}"/>
                            </div>
                            <div class="form-group">
                                <div class="box-body">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Content</label>
                                        <textarea name="p_content" id="editor">{{$product->p_content}}</textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="box-body">
                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea name="p_desc" id="my_desc"> {{$product->p_desc}}</textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="box-footer text-center">
                                <button type="submit" class="btn btn-primary"> Save <i class="fa fa-save"></i></button>
                                <a href="{{route('admin.product.index')}}" class="btn btn-primary">Quay lại <i
                                        class="fa fa-undo"></i></a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <!-- /.box -->

    </section>
    <script src="source/admin/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="./source/admin/ckeditor/ckeditor.js"></script>
    {{--    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>--}}

    {{--    <script>--}}
    {{--        var route_prefix = "laravel-filemanager";--}}
    {{--        $('#lfm').filemanager('image', {prefix: route_prefix});--}}
    {{--    </script>--}}
    <script>
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };
    </script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>

        CKEDITOR.replace('editor', options);
        CKEDITOR.replace('my_desc', options);
    </script>
    <script>
        $(document).ready(function () {
            $('#trademark').change(function () {
                let $this = $(this);
                let id_trademark = $this.val()
                let route = '{{route('admin.ajax_product')}}';
                //alert(id_trademark);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: route,
                    method: 'POST',
                    data: {id_trademark: id_trademark},
                    success: function (data) {
                        $('#post1').html(data);
                    }
                })
            });
        });

    </script>

    <!-- /.content -->


@endsection
