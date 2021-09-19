<?php
    include('forget_pass.php');

    $db = new mysqli('db', 'root', '12345678', 'lab12');
    $result = $db->query('select * from users where login = \'' . $_POST['login'] . '\';');

    if ($result->num_rows === 0)
    {
        echo '<p id=spec-p>Учётной записи с таким логином не существует.</p>';
    }
    else
    {
        $headers = 'From: lab12@ikit.ru';

        function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
        {
            $str = '';
            $max = mb_strlen($keyspace, '8bit') - 1;

            if ($max < 1)
                throw new Exception('$keyspace must be at least two characters long');

            for ($i = 0; $i < $length; $i++)
                $str .= $keyspace[random_int(0, $max)];

            return $str;
        }

        $newPass = random_str(15);

        $result2 = $db->query('update users set password = \'' . $newPass . '\' where login = \'' . $_POST['login'] . '\';');

        if ($result2)
        {
            mail($result->fetch_assoc()['email'], 'Новый пароль', $newPass, $headers);
            echo '<p id=spec-p>Новый пароль был выслан на указанную Вами при регистрации почту.</p>';
        }
        else
            echo '<p id=spec-p>Не удалось обновить пароль.</p>';
    }

    $db->close();
?>