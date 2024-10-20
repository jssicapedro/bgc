@extends('layout.layoutLogin')

@section('title', 'BGCInformatica')


@push('links')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endpush


@push('scripts')
@endpush

@section('main')
<div class="div-logotipo">
    <img src="{{ asset('storage/nav/logotipo2.png') }}" alt="Logotipo">
</div>
<div class="div-form">
    <form method="POST" action="{{ route('tecnico.login.submit') }}">
        @csrf
        <!-- Mensagem de erro da sessão -->
        @if(Session::has('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
        @endif

        <!-- Mensagens de erro de validação -->
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="div-label">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="div-label">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>
</div>

@endsection