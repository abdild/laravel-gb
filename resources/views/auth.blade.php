<!-- // Урок 1.
// Задание 2.
// Добавить в проект несколько контроллеров для вывода следующих страниц:
// Страница авторизации. Страница должна содержать форму, в которой используются
// следующие элементы:
// 1. Поле ввода логина
// 2. Поле для ввода пароля
// 3. Чекбокс для указания, что следует “Запомнить меня”
// 4. Кнопка -->
<form action="" method="">
    <label for="login">Логин</label>
    <input type="text" id="login" name="login" placeholder="Введите логин">
    <br>
    <label for="password">Пароль</label>
    <input type="password" id="password" name="password" placeholder="Введите пароль">
    <br>
    <div>
        <input type="checkbox" id="remember" name="remember">
        <label for="remember">Запомнить меня</label>
    </div>
    <br>
    <button type="submit">Войти</button>
</form>