<?php
    $db = new mysqli('db', 'root', 'root1234', 'lab12');
    $quantity = 3;
    $limit = 3;

    if (!is_numeric($_GET['page']) || $_GET['page'] < 1) $_GET['page'] = 1; 

    $query2 = 'select * from examples';

    if (!empty($_GET['text-author']) && !empty($_GET['text-language']))
        $query2 .= ' where Author = \'' . $_GET['text-author'] . '\' && Language = \'' . $_GET['text-language'] . '\'';
    else if (!empty($_GET['text-author']))
        $query2 .= ' where Author = \'' . $_GET['text-author'] . '\'';
    else if (!empty($_GET['text-language']))
        $query2 .= ' where Language = \'' . $_GET['text-language'] . '\'';

    if (isset($_GET['date']) || isset($_GET['author']) || isset($_GET['language']))
    {
        $query2 .= ' order by' . (isset($_GET['date']) ? ' Date,' : '') . (isset($_GET['author']) ? ' Author,' : '')
            . (isset($_GET['language']) ? ' Language,' : '');
        $query2 = mb_substr($query2, 0, -1);
    }

    $query2 .= ';'; //формирование списка со странцами
    $result = $db->query($query2);
    $num = $result->num_rows;
    $pages = ceil($num / $quantity);
    $pages++;
    $page = $_GET['page'];

    if ($page > $pages) $page = 1;


    echo '<div class="reg-form">';
    echo
    '<strong style="color: #df0000">Страница № ' . $page . 
    '</strong><br /><br />';

    if (!isset($list)) $list = 0;

    $list = --$page * $quantity;
    $query = 'select * from examples';

    if (!empty($_GET['text-author']) && !empty($_GET['text-language']))
        $query .= ' where Author = \'' . $_GET['text-author'] . '\' && Language = \'' . $_GET['text-language'] . '\'';
    else if (!empty($_GET['text-author']))
        $query .= ' where Author = \'' . $_GET['text-author'] . '\'';
    else if (!empty($_GET['text-language']))
        $query .= ' where Language = \'' . $_GET['text-language'] . '\'';

    if (isset($_GET['date']) || isset($_GET['author']) || isset($_GET['language']))
    {
        $query .= ' order by' . (isset($_GET['date']) ? ' Date,' : '') . (isset($_GET['author']) ? ' Author,' : '')
            . (isset($_GET['language']) ? ' Language,' : '');
        $query = mb_substr($query, 0, -1);
    }

    $query .= ' limit ' . $quantity . ' offset ' . $list . ';';
    $result2 = $db->query($query);
    $num_result = $result2->num_rows;

    for ($i = 0; $i < $num_result; $i++)
    {
        $row = $result2->fetch_assoc(); // вставляем ссылки 
        echo
        '<div>
        <strong>' . $row['Date'] . ' ' . $row['Author'] . ' ' . $row['Language'] . '</strong> 
        <br />' .
        '<a href="' . $row['Code'] . '" target="blank">Посмотреть пример</a>' .
        '</div>
        <br />';
    }

    preg_match('/\?content=examples&page=[0-9]+/m', $_SERVER['REQUEST_URI'], $matches);
    echo 'Страницы: ';

    if ($page >= 1) 
    {
        /*echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?content=examples&page=1"><<</a> &nbsp; ';
        echo '<a href="' . $_SERVER['SCRIPT_NAME'] . '?content=examples&page=' . $page . 
        '">< </a> &nbsp; ';*/
        echo '<a href="' . str_replace($matches[0], '?content=examples&page=1', $_SERVER['REQUEST_URI']) . '"><<</a> &nbsp; ';
        echo '<a href="' . str_replace($matches[0], '?content=examples&page=' . $page, $_SERVER['REQUEST_URI']) . 
        '">< </a> &nbsp; ';
    }

    $thisP = $page + 1;
    $start = $thisP - $limit;    
    $end = $thisP + $limit;

    for ($j = 1; $j < $pages; $j++) 
    {
        if ($j >= $start && $j <= $end) 
        {
            if ($j == ($page + 1))
                /*echo 
                '<a href="' . $_SERVER['SCRIPT_NAME'] . 
                '?content=examples&page=' . $j . '"><strong style="color: #df0000">' . $j . 
                '</strong></a> &nbsp; ';*/
                echo 
                '<a href="' . str_replace($matches[0], '?content=examples&page=' . $j, $_SERVER['REQUEST_URI'])
                 . '"><strong style="color: #df0000">' . $j . 
                '</strong></a> &nbsp; ';
            else
                echo 
                '<a href="' . str_replace($matches[0], '?content=examples&page=' . $j, $_SERVER['REQUEST_URI']) . '">' 
                . $j . '</a> &nbsp; ';
        }
    }

    if ($j > $page && ($page + 2) < $j) 
    {
        /*echo
        '<a href="' . $_SERVER['SCRIPT_NAME'] . '?content=examples&page=' . ($page + 2) . 
        '"> ></a> &nbsp; ';
        echo
        '<a href="' . $_SERVER['SCRIPT_NAME'] . '?content=examples&page=' . ($j - 1) . 
        '">>></a> &nbsp; ';*/
        echo
        '<a href="' . str_replace($matches[0], '?content=examples&page=' . ($page + 2), $_SERVER['REQUEST_URI']) . 
        '"> ></a> &nbsp; ';
        echo
        '<a href="' . str_replace($matches[0], '?content=examples&page=' . ($j - 1), $_SERVER['REQUEST_URI']) . 
        '">>></a> &nbsp; ';
    }

    echo
    '<p>Сортировать по:</p>
    <form action="index.php" method="get">
        <input type="hidden" name="content" value="examples">
        <input type="hidden" name="page" value="1">
        <input type="checkbox" name="date" val="true">Дате
        <input type="checkbox" name="author" val="true">Автору
        <input type="checkbox" name="language" val="true">ЯП
        <p>Поиск по:</p>
        <label>Автору</label>
        <input type="text" name="text-author">
        <label>ЯП</label>
        <input type="text" name="text-language">
        <input type="Submit" value="Вперёд">
    </form>';
    echo '</div>';
?>