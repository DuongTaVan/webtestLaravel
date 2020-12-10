@extends('layouts.app_master_page')
@section('slider')
    @include('layouts.components.slider')
@endsection
@section('content')
    @if(\Cart::count()>0)
        <div class="cart_update">
            @include('frontend.pages.cart.include.index')
        </div>
    @else
        <div>Giỏ hàng trống</div>
    @endif
@section('script')
    <script src="source/admin/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <script>
        function update(rowId, qty) {
            // let $this = $(this);
            // let quantity = $this.val();
            let route = '{{route('frontend.shopping.update')}}';
            //let rowId = $this.data('rowid');
            //alert(rowId);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: route,
                data: {rowId: rowId, qty: qty},
                success: function (data) {
                    $('.cart_update').html(data.html);
                }
            })
        };

        function myFunction(rowId) {
            let route = '{{route('frontend.shopping.delete')}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: route,
                data: {rowId: rowId},
                success: function (data) {
                    $('.cart_update').html(data.html);
                }
            })

        };

        function coupon() {
            if (document.getElementById('check_coupon').checked) {
                //var returnVal = confirm("Are you sure?");
                $(this).prop("checked");
                $('.inputDisabled').removeAttr("disabled");
            } else if (!$(this).attr('checked')) {
                //alert('is checked');
                $('.inputDisabled').val('');
                $('.inputDisabled').attr("disabled", "disabled");
            }

        };

        function abcd() {
            let code = $(".code").val();
            //alert(code);
            let route = '{{route('admin.ajax_coupon')}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: route,
                data: {code: code},
                success: function (data) {
                    // alert(data.html);
                    $('.cart_update').html(data.html);
                }
            })
        };

        function destroy() {
            //let code = $(".code").val();
            //alert(1);
            let route = '{{route('admin.delete.ajax_coupon')}}';
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: route,
                success: function (data) {
                    // alert(data.html);
                    $('.cart_update').html(data.html);
                }
            })
        };

        function city() {
            let route = '{{route('ajax_get.location')}}';
            let parentID = $(".js_location").val();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: route,
                data: {parentID: parentID},
                success: function (msg) {
                    let html = '';
                    $.each(msg.data, function (value, index) {
                        html += "<option value='" + index.code + "'>" + index.name + "</option>"
                    })
                    $(".district").html(html);
                }
            })
        }


    </script>
@endsection
@endsection
