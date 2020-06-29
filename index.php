<?php
require_once 'spout-3.1.0/src/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;

$filePath = 'zhuokaexel500.xlsx';

$reader = ReaderEntityFactory::createReaderFromFile($filePath);

$reader->open($filePath);

$a4 = 0;

foreach ($reader->getSheetIterator() as $sheet) {

    foreach ($sheet->getRowIterator() as $row) {
        // do stuff with the row
        $cells = $row->getCells();

        for ($i = 0; $i < count($cells); $i++) {

            $arrayCells = (array)$cells[$i];

            $key = array_keys($arrayCells);

            if (!empty($arrayCells[$key[$a4]])) {

                $data[] = $arrayCells[$key[$a4]];
            }
        }

        print_r($data);
        unset($data);
    }
}

$reader->close();