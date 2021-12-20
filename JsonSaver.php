<?php declare(strict_types=1);


class JsonSaver
{
    /**
     * @param $json
     */
    public function saveJson($json)
    {
        $fp = fopen("books.json", "w");
        fputs($fp, $json);
        fclose($fp);
    }

}