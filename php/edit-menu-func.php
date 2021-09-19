<?php
    for ($i = 1; $i < 5; $i++)
        if (empty($_POST['position' . $i]) || empty($_POST['position' . $i]))
        {
            echo '<p>Пожалуйста, вернитесь назад и заполните все поля.</p>';
            echo '<a href="index.php?content=edit-menu">Назад</a>';
            return;
        }
    
    db = new mysqli('db', 'root', '12345678', 'lab12');// подключаемся к бд
    $q1 = 'update menu set position = ' . $_POST['position1'] . ', isVisible = ' . ($_POST['isVisible1'] == 'true' ? 1 : 0)
        . ' where login = \'' . $_COOKIE['login'] . '\' && menuItem = \'' . '<a href="index.php?content=page1">Основы программирования</a>' . '\';';
    $q2 = 'update menu set position = ' . $_POST['position2'] . ', isVisible = ' . ($_POST['isVisible2'] == 'true' ? 1 : 0)
        . ' where login = \'' . $_COOKIE['login'] . '\' && menuItem = \'' . '<a href="index.php?content=page2">Основы ООП</a>' . '\';';
    $q3 = 'update menu set position = ' . $_POST['position3'] . ', isVisible = ' . ($_POST['isVisible3'] == 'true' ? 1 : 0)
        . ' where login = \'' . $_COOKIE['login'] . '\' && menuItem = \'' . '<a href="index.php?content=page3">Основы функционального программирования</a>' . '\';';
    $q4 = 'update menu set position = ' . $_POST['position4'] . ', isVisible = ' . ($_POST['isVisible4'] == 'true' ? 1 : 0)
        . ' where login = \'' . $_COOKIE['login'] . '\' && menuItem = \'' . '<a href="index.php?content=examples&page=1">База примеров "Hello, world!" на разных ЯП</a>' . '\';';
    $item1 = db->query($q1);
    $item2 = db->query($q2);
    $item3 = db->query($q3);
    $item4 = db->query($q4);
    db->close();
    header('Location: http://localhost:8000');
?>