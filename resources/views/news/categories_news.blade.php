<ul>
    @forelse ($categoryList as $categories)
    <li>
        <a href="{{ route('news.from.category', array_search($categories, $categoryList)) }}">{{ $categories }}</a>
    </li>
    @empty
    <h2>Категорий нет.</h2>
    @endforelse
</ul>