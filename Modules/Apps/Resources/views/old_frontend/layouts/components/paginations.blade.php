@if ($paginator->lastPage() > 1)
    <div class="pagination-items mt-30 wow fadeInUp">
        <ul class="pagination d-md-flex justify-content-center align-items-md-center">
            <li class="page-item {{$paginator->currentPage() > 1 ?'':'disabled'}}">
                <a class="page-link" href="{{ $paginator->url($paginator->currentPage() - 1)}}" aria-label="Previous">
                    <span aria-hidden="true">«</span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>

            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url($i) }}">{{$i}}</a>
                </li>

            @endfor
            <li class="page-item {{($paginator->currentPage() == $paginator->lastPage()) ?'disabled':''}}">
                <a class="page-link"
                   href="{{$paginator->url($paginator->currentPage()+1)}}" aria-label="Next">
                    <span aria-hidden="true">»</span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>

    </div>
@endif
