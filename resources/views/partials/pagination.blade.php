@if ($paginator->hasPages())

<div class="store-filter clearfix">
    <span class="store-qty">Showing {{$paginator->perPage()*$paginator->currentPage()}}
        -{{$paginator->total()}} products</span>
    <ul class="store-pagination">
        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
        @foreach($elements[0] as $pageNumber => $link)
        <li @class(['active' => $paginator->currentPage() == $pageNumber])><a href="{{$link}}">{{$pageNumber}}</a></li>
        @endforeach
        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
    </ul>
</div>
@endif
