@extends('layouts.main')

@section('title')Список новостей @parent @stop

@section('content')
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        {{-- <pre>
            {{ $newsList }}
        </pre> --}}

        @forelse ($newsList as $news)
            <div class="col">
                <div class="card shadow-sm">
                    {{-- <img src="https://picsum.photos/id/{{ $news->id }}/100/50" alt="https://picsum.photos/id/{{ $news->id }}/100/50"> --}}
                    @if ($news->image)
                        <img src="{{ Storage::disk('upload')->url($news['image']) }}" style="width:200px;">
                    @endif
                    <div class="card-body">
                        <h2>
                            {{-- <a href="{{ route('news.show', ['id' => $news->id]) }}">{{ $news->title }}</a> --}}
                            <a href="{{ route('news.show', ['slug' => $news['slug']]) }}">{{ $news['title'] }}</a>
                        </h2>
                        <p>Категория: {{ $news->categories_id }}</p>
                        <p>
                            <strong>Автор: </strong>{{ $news->author }}
                        </p>
                        <p class="card-text">{!! $news->description !!}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                {{-- <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a> --}}
                                <a href="{{ route('news.show', ['slug' => $news['slug']]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                            </div>
                            <small class="text-muted">
                                @if ($news->created_at)
                                    {{ $news->created_at }}
                                @else
                                    нет даты
                                @endif
                            </small>
                        </div>
                    </div>
                </div>
            </div>

            @if ($loop->last)
                <h3>Последний элемент</h3>
                <h4>Всего новостей: {{ $loop->count }}</h4>
            @endif

        @empty
            <h2>Новостей нет.</h2>
        @endforelse
    </div>
@endsection

{{-- @forelse ($newsList as $news)
    <hr>
    <br>
    <div>
        <img src="{{ $news['image'] }}" alt="{{ $news['image'] }}" style="width: 300px;">
        <br>
        <h2>
            <a href="{{ route('news.show', ['id' => $news['id']]) }}">{{ $news['title'] }}</a>
        </h2>
        <p>Категория: {{ $news['category'] }}</p>
        <p>
            <strong>Автор: </strong>{{ $news['author'] }}
        </p>
        <p>{{ $news['description'] }}</p>
        <p>Дата: {{ $news['created_at'] }}</p>
    </div>
    @if ($loop->last)
        <h3>Последний элемент</h3>
        <h4>Всего новостей: {{ $loop->count }}</h4>
    @endif
    <br>
@empty
    <h2>Новостей нет.</h2>
@endforelse --}}
