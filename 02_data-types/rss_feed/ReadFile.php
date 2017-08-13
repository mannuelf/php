<?php

class ReadFile
{
    private $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function returnRawXmlFeed()
    {
        //$file = 'codeascraft.xml';
        $fileHandle = fopen($this->filePath, 'r');

        // file_get_contents()
        // file_put_contents()

        if ($fileHandle) {
            $feed = fread($fileHandle, filesize($this->filePath));
            fclose($fileHandle);
        } else {
            echo 'error file could not be loaded.';
        }

        return $feed;
    }
}
