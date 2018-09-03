<?php

    session_start();

    ini_set('max_execution_time', 300); //300 seconds = 5 minutes
    define('SITE_ROOT',dirname(__FILE__));

    $zip=new ZipArchive;
    $zip_name=$_SESSION['userData']['name'].' Facebook Albums.zip';

    if($zip->open($zip_name,ZipArchive::CREATE) === TRUE )
    {
        mkdir('temp');
        $cnt=1;
        foreach($_SESSION['userData']['albums'] as $album_name)
        {
            $dir=$album_name['name'];
            $zip->addEmptyDir($dir);
            foreach($album_name['photos'] as $img )
            {
                $url=$img['source'];

                $filename=SITE_ROOT.'\temp\\'.$cnt.'.jpg';

                file_put_contents($filename,file_get_contents($url));
                
                $zip->addFile($filename,$dir.'/'.$cnt.'.jpg');

                $cnt++;
            }
        }

        $zip->close();
        header('content-type:application/octet-stream');
        header('content-disposition:attechment; filename='.$zip_name);
        readfile($zip_name);
        unlink($zip_name);
        delete_directory('temp');
    }

    function delete_directory($dirname) {
        if (is_dir($dirname))
          $dir_handle = opendir($dirname);
    if (!$dir_handle)
         return false;
    while($file = readdir($dir_handle)) {
          if ($file != "." && $file != "..") {
               if (!is_dir($dirname."/".$file))
                    unlink($dirname."/".$file);
               else
                    delete_directory($dirname.'/'.$file);
          }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}

?>