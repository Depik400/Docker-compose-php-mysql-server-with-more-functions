<?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    echo
    '<!DOCTYPE html>
    <html>
    <head>
        <title>Регистрация</title>
    </head>
    <body>';

    if (empty($login))
    {
        echo '  <p>Вы не указали логин. Пожалуйста, вернитесь назад и введите его.</p>';
        echo '  <a href=index.php?content=reg>Назад</a>';
        echo
        '</body>
        </html>';
        return;
    }

    if (empty($password))
    {
        echo '  <p>Вы не указали пароль. Пожалуйста, вернитесь назад и введите его.</p>';
        echo '  <a href=index.php?content=reg>Назад</a>';
        echo
        '</body>
        </html>';
        return;
    }

    if (empty($email))
    {
        echo '  <p>Вы не указали e-mail. Пожалуйста, вернитесь назад и введите его.</p>';
        echo '  <a href=index.php?content=reg>Назад</a>';
        echo
        '</body>
        </html>';
        return;
    }

    $db = new mysqli('db', 'root', 'root1234', 'lab12');

    if (mysqli_connect_errno())
    {
        echo '    <p>Ошибка, не удаётся подключиться к базе данных.</p>';
        echo
        '</body>
        </html>';
        return;
    }

    $result = $db->query('select * from users where login = \'' . $login . '\';');

    if ($result->num_rows !== 0)
    {
        echo '  <p>Учётная запись с таким логином уже существует.</p>';
        echo
        '</body>
        </html>';
        return;
    }

    $result = $db->query('select * from users where email = \'' . $email . '\';');

    if ($result->num_rows !== 0)
    {
        echo '  <p>Учётная запись с такой электронной почтой уже существует.</p>';
        echo
        '</body>
        </html>';
        return;
    }

    $result = $db->query('insert into users (id, login, password, email) values (null, \'' . $login . '\', \'' . $password .
        '\', \'' . $email . '\');');

    if ($result)
    {
        SetCookie('login', $login);
        $query = 'insert into menu (login, menuItem, position, isVisible) values (\'' . $login . '\', ' . '\''
            . '<a href="index.php?content=page1">Основы программирования</a>' . '\', 1, 1);';
        $result = $db->query($query);
        $query = 'insert into menu (login, menuItem, position, isVisible) values (\'' . $login . '\', ' . '\''
            . '<a href="index.php?content=page2">Основы ООП</a>' . '\', 2, 1);';
        $result = $db->query($query);
        $query = 'insert into menu (login, menuItem, position, isVisible) values (\'' . $login . '\', ' . '\''
            . '<a href="index.php?content=page3">Основы функционального программирования</a>' . '\', 3, 1);';
        $result = $db->query($query);
        $query = 'insert into menu (login, menuItem, position, isVisible) values (\'' . $login . '\', ' . '\''
            . '<a href="index.php?content=examples&page=1">База примеров "Hello, world!" на разных ЯП</a>' . '\', 4, 1);';
        $result = $db->query($query);
        echo '  <p>Вы успешно зарегистрировались. Ваш логин: ' . htmlspecialchars($login) . '.</p>';
        echo '  <p><a href="http://localhost:8000">На главную</a></p>';
    }
    else
        echo '  <p>Ошибка, данные учётной записи не были добавлены в базу данных.</p>';

    $db->close();
    echo
    '</body>
    </html>';
?>