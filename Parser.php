<?php declare(strict_types=1);


class Parser
{
    /**
     * @param string $xmlFileInString
     * @return false|string
     */
    public function parseStringToJson(string $xmlFileInString)
    {
        $xml = simplexml_load_string($xmlFileInString);
        $json = json_encode($xml);

        return $json;


    }
}