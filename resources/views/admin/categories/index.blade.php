@extends('layouts.admin')

@section('title') @parent Категории @stop

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                    категорию</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">

        @include('inc.messages')

        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#id</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Описание</th>
                    <th scope="col">Дата добавления</th>
                    <th scope="col">Дата изменения</th>
                    <th scope="col">Управление</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }} ({{ $category->news_count }})</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>{{ $category->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.232 5.23202L18.768 8.76802M16.732 3.73202C17.2009 3.26312 17.8369 2.99969 18.5 2.99969C19.1631 2.99969 19.7991 3.26312 20.268 3.73202C20.7369 4.20093 21.0003 4.8369 21.0003 5.50002C21.0003 6.16315 20.7369 6.79912 20.268 7.26802L6.5 21.036H3V17.464L16.732 3.73202Z"
                                        stroke="#EAB308" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                            <a href="javascript:;">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 11V17M14 11V17M4 7H20M19 7L18.133 19.142C18.0971 19.6466 17.8713 20.1188 17.5011 20.4636C17.1309 20.8083 16.6439 21 16.138 21H7.862C7.35614 21 6.86907 20.8083 6.49889 20.4636C6.1287 20.1188 5.90292 19.6466 5.867 19.142L5 7H19ZM15 7V4C15 3.73478 14.8946 3.48043 14.7071 3.29289C14.5196 3.10536 14.2652 3 14 3H10C9.73478 3 9.48043 3.10536 9.29289 3.29289C9.10536 3.48043 9 3.73478 9 4V7H15Z"
                                        stroke="#EF4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="5">Записей нет</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $categories->links() }}

    </div>
@endsection
