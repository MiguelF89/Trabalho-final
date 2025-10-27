@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Lista de Instituições</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('instituicoes.create') }}" class="btn btn-primary mb-3">Adicionar Instituição</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>CNPJ</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instituicoes as $instituicao)
            <tr>
                <td>{{ $instituicao->id }}</td>
                <td>{{ $instituicao->nome }}</td>
                <td>{{ $instituicao->contato }}</td>
                <td>{{ $instituicao->cnpj }}</td>
                <td>
                    <a href="{{ route('instituicoes.edit', $instituicao->id) }}" class="btn btn-sm btn-warning">Editar</a>

                    <form action="{{ route('instituicoes.destroy', $instituicao->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Deseja excluir?')" class="btn btn-sm btn-danger">
                            Excluir
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
