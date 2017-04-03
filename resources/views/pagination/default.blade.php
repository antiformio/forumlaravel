@if ($paginator->lastPage() > 1)
    <ul class="pager nomargin">
        {{--Se já estivermos na primeira página desactiva o botão--}}
        <li class="previous {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            {{--Saltar para a próxima pagina e para a secção 'posts' da homepage--}}
            <a href="{{ $paginator->fragment('posts')->url(1) }}">&larr; Mais Recentes</a>
        </li>

        {{--Se já estivermos na última página desactiva o butão--}}
        <li class="next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            {{--Saltar para a página anterior e para a secção 'posts' da homepage--}}
            <a href="{{ $paginator->fragment('posts')->url($paginator->currentPage()+1) }}" >Mais Antigos &rarr;</a>
        </li>
    </ul>
@endif