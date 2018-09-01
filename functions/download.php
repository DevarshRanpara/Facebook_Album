<?php

    session_start();

    $zip=new ZipArchive;
    $zip_name=$_SESSION['userData']['name'].' Facebook Albums.zip';

    if($zip->open($zip_name,ZipArchive::CREATE) === TRUE )
    {
        $cnt=0;
        foreach($_SESSION['userData']['albums'] as $album_name)
        {
            $dir=$album_name['name'];
            $zip->addEmptyDir($dir);
            foreach($album_name['photos'] as $img )
            {
                // $zip->addFile($img['source'],$dir.'/'.$img['source']);
                // $zip->addFile($img['source'],$cnt);
                echo $img['source'].'<br>';
                // sleep(1);
                $cnt++;
            }
        }
        $zip->close();
        header('content-type:application/octet-stream');
        header('content-disposition:attechment; filename='.$zip_name);
        readfile($zip_name);
        unlink($zip_name);
    }

?>