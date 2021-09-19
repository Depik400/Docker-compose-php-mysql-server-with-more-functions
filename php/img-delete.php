<?php
    $imgName = $_POST['imgRadio'];
    echo '<script> console.log(\''.$imgName.'\');</script>';
    $file_to_delete = getcwd().'/images/'.$imgName;
    
    if(unlink($file_to_delete)) 
    {
        //echo "file named $file has been deleted successfully";
    }
    else
    {
        //echo "file is not deleted";
    }
    header('Location: http://localhost:8000/index.php?content=photogallery');
?>