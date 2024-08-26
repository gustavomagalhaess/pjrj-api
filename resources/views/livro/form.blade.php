@extends('app')

@section('title', 'Listagem de Livros')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <form action="{{ $url }}" method="POST">
                @csrf
                @if(! empty($livro)) @method('PUT') @endif
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" maxlength="40"
                           value="@if(! empty($livro)){{ $livro->Titulo }}@endif"/>
                </div>
                <div class="mb-3">
                    <label for="editora" class="form-label">Editora</label>
                    <input type="text" class="form-control" id="editora" name="editora" maxlength="40"
                           value="@if(! empty($livro)){{ $livro->Editora }}@endif"/>
                </div>
                <div class="mb-3">
                    <label for="edicao" class="form-label">Edição</label>
                    <input type="number" class="form-control" id="edicao" name="edicao"
                           value="@if(! empty($livro)){{ $livro->Edicao }}@endif"/>
                </div>
                <div class="mb-3">
                    <label for="publicacao" class="form-label">Ano de publicação</label>
                    <input type="text" class="form-control" id="publicacao" name="publicacao" maxlength="4"
                           value="@if(! empty($livro)){{ $livro->AnoPublicacao }}@endif"/>
                </div>

                <button type="submit" class="btn btn-primary">{{ $submit }}</button>
            </form>
        </div>
    </div>
@endsection
