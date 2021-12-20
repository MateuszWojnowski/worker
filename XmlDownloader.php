<?php declare(strict_types=1);


class XmlDownloader
{
    /**
     * @param string $link
     * @return false|string
     */
    public function downloadXml(string $link)
    {
        $xmlFileInString = file_get_contents($link);
        return $xmlFileInString;

    }
}