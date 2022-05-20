<div>
    <img src="{{ $news['image'] }}" alt="{{ $news['image'] }}" style="width: 300px;">
    <br>
    <h2>{{ $news['title'] }}</h2>
    <p>Категория: {{ $news['category'] }}</p>
    <p>
        <strong>Автор: </strong>{{ $news['author'] }}
    </p>
    <p>{{ $news['description'] }}</p>
    <p>Дата: {{ $news['created_at'] }}</p>
</div>
