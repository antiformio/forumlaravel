@if ($paginator->lastPage() > 1)
    <ul class="pager nomargin">
        <li class="previous {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->fragment('posts')->url(1) }}">&larr; Mais Recentes</a>
        </li>

        <li class="next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->fragment('posts')->url($paginator->currentPage()+1) }}" >Mais Antigos &rarr;</a>
        </li>
    </ul>
@endif