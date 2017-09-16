
<?php

$file = 'logs.txt';
if ($handle = fopen($file, 'r')) {
    echo $content = fread($handle, filesize($file)); // each byte equals a character
    fclose($handle);
} else {
    echo 'The application was not able to write on the file';
}
