@extends('layouts.main')

@section('title')Обратная связь @parent @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Обратная связь</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>
    </div>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif

    <form method="post" action="{{ route('feedback.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Ваше имя</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="Введите имя">
        </div>
        <div class="form-group">
            <label for="text">Текст сообщения</label>
            <textarea name="text" id="text" cols="30" rows="10" class="form-control" value="{{ old('text') }}" placeholder="Введите текст"></textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
@endsection