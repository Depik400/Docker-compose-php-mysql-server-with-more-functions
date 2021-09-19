<div class="reg-form">
<?php
    $directory = getcwd().'/images/';
    $allowed_types = array('jpg', 'jpeg', 'png');
    $file_parts = array();
    //echo $directory;
    $ext = '';
    $title = '';
    $i = 0;
    $dir_handle = @opendir($directory) or die('Ошибка при открытии папки.');
  
        while ($file = readdir($dir_handle))
    {
        if($file == '.' || $file == '..') continue;

        $file_parts = explode('.', $file);
        $ext = strtolower(array_pop($file_parts));

        if(in_array($ext, $allowed_types))
        {
            echo
            '<div>
                <a href="images/' . $file. '"><img src="http://localhost:8000/images/' . $file. '" title="' . $file . '" width="750px" height="500px"/></a>
            </div>';
            $i++;
        }
    }

    
    echo
    '<br />
    <form action="../img-func.php" method="post" enctype="multipart/form-data"> 
        <input type="file" name="img-file">
        <input type="submit" value="Загрузить изображение">
    </form>
    <form action="../img-delete.php" method="post" enctype="multipart/form-data">';
    $files1 = scandir($directory);

    foreach ($files1 as $key => $value) {
        if ('.' !== $value && '..' !== $value){
               echo
            '<input type="radio" name="imgRadio" value="'.$value.'">'.$value.'';
        }
    }
    
    echo'<input type="submit" value="Удалить">
    </form>';
    closedir($dir_handle);
?>
</div>