@extends('app')

@section('title', 'Listagem de Livros')

@section('content')
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <ul class="list-group list-group-flush">
                    @foreach($livros as $livro)
                        <a href="{{ url('/livros/detalhar/' . $livro->Codl) }}" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1">{{ $livro->Titulo }}</h5>
                                <small>{{ $livro->AnoPublicacao }}</small>
                            </div>
                            <p class="mb-1">Assunto</p>
                            <small>
                                @foreach($livro->autores as $autor)
                                    {{ $autor->Nome }} @if (!$loop->last) | @endif
                                @endforeach
                            </small>
                        </a>
                        <div class="btn btn-primary" href="{{ url("/livros/$livro->CodL/alterar") }}">Alterar</div>
                        <div class="btn btn-danger" href="{{ url("livros/$livro->CodL/excluir") }}">Excluir</div>
                    @endforeach
                </ul>
            </div>
        </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="d-flex justify-content-center">{{ $livros->links() }}</div>
        </div>
    </div>

@endsection
