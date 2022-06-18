@extends('layouts.main')

@section('title')Новость @parent @stop

@section('content')
            {{-- <img src="https://picsum.photos/id/{{ $news->id }}/100/50" alt="https://picsum.photos/id/{{ $news->id }}/100/50"> --}}
            @if ($news->image)
                <img src="{{ Storage::disk('upload')->url($news['image']) }}" style="width:200px;">
            @endif
            <div class="card-body">
                <h2>
                    {{ $news['title'] }}
                </h2>
                <p>Категория: {{ $news->categories_id }}</p>
                <p>
                    <strong>Автор: </strong>{{ $news->author }}
                </p>
                <p class="card-text">{!! $news->description !!}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        @if ($news->created_at)
                            {{ $news->created_at }}
                        @else
                            нет даты
                        @endif
                    </small>
                </div>
            </div>
@endsection
