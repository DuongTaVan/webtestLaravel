<style>
    .filter a.active{
        color: #288ad6 !important;
    }
</style>
<div class="filter">
    <div class="fil">Lọc theo :</div>
    <div>
        <ul>
            <li><a href="{{route('user.list_rating',$product->p_slug)}}" class="active">Tất cả</a></li>
            @for ($i = 5 ; $i >= 1 ; $i --)
                <li><a href="{{route('user.filter_rating',[$product->p_slug, $i])}}" >{{ $i }} sao</a></li>
            @endfor
        </ul>
    </div>
</div>
<div style="clear: both;"></div>
