<?php declare(strict_types=1);
require_once("XmlDownloader.php");
require_once("Parser.php");
require_once("DataCleaner.php");
require_once("JsonSaver.php");


$xmlDownloader = new XmlDownloader();
$parser = new Parser();
$dataCleaner = new DataCleaner();
$jsonSaver = new JsonSaver();

if (@$xmlFileInString = $xmlDownloader->downloadXml("https://dlabystrzakow.pl/xml/produkty-dlabystrzakow.xml")) {
    $json = $parser->parseStringToJson($xmlFileInString);
    $json = $dataCleaner->extractNeededData($json);
    echo "Pobrano dane ze strony.<br /><br />";
    $jsonSaver->saveJson($json);
} else {
    try {
        @$json = fread(fopen("books.json", "r"), filesize("books.json"));
        echo "Pobrano dane z pliku lokalnego.<br /><br />";

    } catch (Throwable $throwable) {
        echo "Nie udalo sie pobrac danych ze strony.<br />Nie udalo sie pobrac danych z pliku lokalnego.<br /><br />";
    }
}