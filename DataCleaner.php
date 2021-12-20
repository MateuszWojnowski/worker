<?php declare(strict_types=1);


class DataCleaner
{
    /**
     * @param $json
     * @return false|string
     */
    public function extractNeededData($json)
    {
        $array = json_decode($json, TRUE);

        $array = $array["lista"];
        $array = $array["ksiazka"];
        foreach ($array as &$book) {
            $book = [
                "ident" => $book["ident"],
                "tytul" => $book["tytul"][0],
                "liczbastron" => $book["liczbastron"],
                "datawydania" => $book["datawydania"],
            ];

        }
        unset($book);

        $json = json_encode($array);
        return $json;
    }

}