<?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    $db = new mysqli('db', 'root', 'root1234', 'lab12');
    $result = $db->query('select * from users where login = \'' . $login . '\' && password = \'' . $password . '\';');
    $db->close();

    if ($result->num_rows !== 0)
    {
        SetCookie('login', $login);
        echo
        '<!DOCTYPE html>
        <html>
        <head>
            <title>Авторизация</title>
        </head>
        <body>';
        echo '  <p>Вы успешно авторизовались.</p>';
        echo '  <p><a href="http://localhost:8000">На главную</a></p>';
    }
    else
    {
        echo
        '<!DOCTYPE html>
        <html>
        <head>
            <title>Авторизация</title>
        </head>
        <body>';
        echo '  <p>Некорректная пара логин / пароль.</p>';
        echo '  <p><a href="http://localhost:8000">На главную</a></p>';
    }
?>
