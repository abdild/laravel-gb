@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>
    </div>

    @include('inc.messages')

    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}" enctype="multipart/form-data">
        @csrf

        @method('put')

        <div class="form-group">
            <label for="title">Наименование</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $news->title }}">
            @error('title')
                <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" id="author" name="author" class="form-control" value="{{ $news->author }}">
            @error('author')
                <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="categories_id">Категория</label>
            <select class="form-control" name="categories_id" id="categories_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id === $news->categories_id) selected @endif>
                        {{ $category->title }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- <div class="form-group">
            <label for="slug">Slug</label>
            <select class="form-control" name="slug" id="slug">
                <option @if ($news->slug === 1) selected @endif>1</option>
                <option @if ($news->slug === 2) selected @endif>2</option>
                <option @if ($news->slug === 3) selected @endif>3</option>
            </select>
        </div> --}}
        <div class="form-group">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if ($news->status === 'DRAFT') selected @endif>DRAFT</option>
                <option @if ($news->status === 'ACTIVE') selected @endif>ACTIVE</option>
                <option @if ($news->status === 'BLOCKED') selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            @if ($news->image)
                <img src="{{ Storage::url($news->image) }}" style="width: 250px;">
            @endif
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
