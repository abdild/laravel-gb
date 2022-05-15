@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
            </div>
        </div>
    </div>

    <form action="" method="">
        <label for="name">Название новости</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="long_description">Текст новости</label>
        <textarea type="text" name="long_description" id="long_description" rows="10">
        </textarea>
        <br>
        <label for="short_description">Краткое описание</label>
        <input type="text" name="short_description" id="short_description">
        <br>
        <button type="submit">Добавить новость</button>
    </form>
@endsection
