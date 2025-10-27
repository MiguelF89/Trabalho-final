@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Adicionar Instituição</h4>
        </div>
        <div class="card-body">

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('instituicoes.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Contato</label>
                    <input type="text" name="contato" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('instituicoes.index') }}" class="btn btn-secondary">Voltar</a>
            </form>
        </div>
    </div>
</div>
@endsection
