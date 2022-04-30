<ul>

<?php foreach ($categoryList as $categories): ?>
    <li><a href="<?=route('news.from.category', array_search($categories, $categoryList)); ?>"><?= $categories;; ?></a></li>    
<?php endforeach; ?>

</ul>