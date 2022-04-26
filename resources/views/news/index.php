<?php foreach ($newsList as $news) : ?>
    <hr>
    <br>
    <div>
        <img src="<?= $news['image']; ?>" alt="<?= $news['image']; ?>" style="width: 300px;">
        <br>
        <h2>
            <a href="/news/<?= $news['id']; ?>"><?= $news['title']; ?></a>
        </h2>
        <br>
        <p>
            <strong>Автор: </strong><?= $news['author']; ?>
        </p>
        <p><?= $news['description']; ?></p>
        <p>Дата: <?= $news['created_at']; ?></p>
    </div>
    <br>

<?php endforeach; ?>