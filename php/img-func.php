<?php
    //echo basename($_FILES['img-file']["name"]);
    $stamp = imagecreatefrompng(getcwd().'/content/watermark.png') or die('error die');
   // echo $stamp;
    //echo 'here';
    $img = null;
    $path = getcwd().'/images/';
    //echo $path;
    $imgName = basename($_FILES['img-file']['name']);
    //echo 'here';
    $temp_name = $_FILES['img-file']['tmp_name'];
    //echo 'here';

    move_uploaded_file($temp_name, $path.$imgName);
    $parts = explode('.',$imgName);
    $ext = strtolower(array_pop($parts));
    //echo $ext;
        switch ($ext) 
    {   
        case 'jpg':
            $img = imagecreatefromjpeg($path.$imgName);
            break;
        case 'jpeg':
            $img = imagecreatefromjpeg($path.$imgName);
            break;
        case 'png':
            $img = imagecreatefrompng($path.$imgName);
            break;
    }
    //echo $img;
    $marge_right = 10; 
    $marge_bottom = 10;
    $sx = imagesx($stamp);
    $sy = imagesy($stamp);

    imagecopy($img, $stamp, imagesx($img) - $sx - $marge_right, imagesy($img) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

    switch ($ext)
    {   
        case 'jpg':
        case 'jpeg':
            imagejpeg($img, $path . $imgName);
            break;
        case 'png':
            imagepng($img, $path . $imgName);
            break;
    }

    imagedestroy($img);
    header('Location: http://localhost:8000/index.php?content=photogallery');
?>