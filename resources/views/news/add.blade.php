<!-- // Добавить в проект несколько контроллеров для вывода следующих страниц:
// Страница добавления новости. Страница должна содержать следующее элементы формы:
// 1. Поле для указания название новости
// 2. Поле для подробного описания новости
// 3. Поле для краткого описания новости -->

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