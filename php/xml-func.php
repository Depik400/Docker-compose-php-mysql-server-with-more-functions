<?php
    copy($_FILES['xml-file']['tmp_name'],getcwd().'/xml/' . basename($_FILES['xml-file']['name']));

    $xml = '';
    if (file_exists(getcwd().'/xml/'.basename($_FILES['xml-file']['name'])))
        $xml = getcwd().'/xml/'.basename($_FILES['xml-file']['name']);
    echo $xml;
    if (!empty($xml))
    {
        $db = new mysqli('db', 'root', 'root1234', 'lab12');
        $result = $db->query('load xml local infile \''.$xml.'\' into table examples;'); 
        $db->close();
        echo
        '<p>Данные из XML-файла были успешно импортированы в БД.</p>
        <p><a href="http://localhost:8000/index.php?content=xml">Назад</a><p>';
        echo($xml);
    }
    else
        echo
        '<p>Ошибка.</p>
        <p><a href="http://localhost:8000/index.php?content=xml">Назад</a><p>';
?>