<?php
    if (empty($_COOKIE['login']))
        echo 
        '<span class="main-menu">
            <a href="index.php?content=page1">Основы программирования</a>
            |
            <a href="index.php?content=page2">Основы ООП</a>
            |
            <a href="index.php?content=page3">Основы функционального программирования</a>
            |
            <a href="index.php?content=examples&page=1">База примеров "Hello, world!" на разных ЯП</a>
        </span>
        <hr />';
    else
    {
        echo '<span class="main-menu">';
        $db = new mysqli('db', 'root', 'root1234', 'lab12');

        for ($i = 1; $i < 5; $i++)
        {
            $menu = $db->query('select * from menu where login = \'' . $_COOKIE['login'] . '\' && position = '
                . $i . ' && isVisible = 1;');
            echo $menu->fetch_assoc()['menuItem'];
        }

        echo
        '</span>
        <p id = "spec-p"><a href="index.php?content=edit-menu">Редактировать меню</a></p>
        <hr />';
        $db->close();
    }
?>