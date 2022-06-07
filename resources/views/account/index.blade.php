@extends('layouts.app')

@section('content')
    <div class="offset-4">
        <h2>Добро пожаловать, {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h2>
        <br>
        @if (Auth::user()->is_admin)
            <a href="{{ route('admin.index') }}">В админку</a>
        @endif
    </div>
@endsection
