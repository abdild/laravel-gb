@extends('layouts.main')

@section('title')Новость @parent @stop

@section('content')
    <div>
        <div class="card shadow-sm">
            <img src="https://picsum.photos/id/{{ $news->id }}/300/200"
                alt="https://picsum.photos/id/{{ $news->id }}/300/200">
            <div class="card-body">
                <h2>
                    <a href="{{ route('news.show', ['id' => $news->id]) }}">{{ $news->title }}</a>
                </h2>
                <p>Категория: {{ $news->categories_id }}</p>
                <p>
                    <strong>Автор: </strong>{{ $news->author }}
                </p>
                <p class="card-text">{{ $news->description }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="{{ route('news.show', ['id' => $news->id]) }}"
                            class="btn btn-sm btn-outline-secondary">Подробнее</a>
                    </div>
                    <small class="text-muted">{{ $news->created_at }}</small>
                </div>
            </div>
        </div>
    </div>
@endsection
