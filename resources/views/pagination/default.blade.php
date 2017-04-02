@if ($paginator->lastPage() > 1)
    <ul class="pagination nomargin">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}">&larr; Mais Recentes</a>
        </li>

        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Mais Antigos &rarr;</a>
        </li>
    </ul>
@endif