
<?php  session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Программирование - легче, чем тебе кажется</title>
    <style>
        body {
            margin: 0;
            background-color: #4682B4;
        }

        .authorization-form {
            text-align: center;
        }

        .authorization-form a {
            text-decoration: none;
        }

        .main-menu {
            width: 100%;
            display: flex;
            justify-content: space-around;
            font-size: 20px;
        }

        .main-menu a {
            color: black;
            text-decoration: none;
        }

        footer {
            position: relative;
            bottom: 0;
            text-align: center;
            width: 100%;
            font-size: 15px;
        }

        #spec-hr {
            margin-top: 0;
        }

        .reg-form {
            width: 100%;
            height: 100%;
            text-align: center;
            display: block;
        }

        #spec-p {
            width: 100%;
            text-align: center;
            margin: 0;
        }

        .css-kostyl {
            width: 300px;
        }

        .wrapper {
            min-height: 415px;
        }
    </style>
</head>
<body>
<?php
    include('header.php');
    if (empty($_COOKIE['login']))
        echo '<hr id=spec-hr />
            <form action=authorization.php method=post class=authorization-form>
			<label>Логин:</label>
			<input name=login type=text size=20>
			<label>Пароль:</label>
			<input name=password type=password size=20>
			<input type=submit name=submit value=Войти>
			<a href=index.php?content=reg>Зарегистрироваться</a> 
			<a href=index.php?content=forget_pass>Забыли пароль?</a> 
            </form>
            <hr />';
    else  
        echo
        '<hr id=spec-hr />
        <p id=spec-p>Добро пожаловать, <b>' . $_COOKIE['login'] . '</b>&nbsp;&nbsp;
        <a href=index.php?content=photogallery>Фотогалерея</a></b>&nbsp;&nbsp;
        <a href=index.php?content=xml>Импорт данных в БД из XML</a></b>&nbsp;&nbsp;
        <a href=exit.php>Выйти</a></p>
        <hr />';
    
    include('menu.php');
    echo '<div class="wrapper">';
    if (!empty($_GET['content']))
        include('content/' . $_GET['content'] . '.php');
        //echo 'content/'.$_GET['content'];

    echo '</div>';
    include('footer.php');
?>
</body>
</html>