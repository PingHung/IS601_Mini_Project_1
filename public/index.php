<?php

/*$file = fopen("example.csv","r");
print_r(fgetcsv($file));
fclose($file);*/
main::start("example.csv");

class main {
    static public function star($filename){

        $records = csv::getRecords($filename);
        print_r($records);
    }
}

class csv {
    static public function getRecords($filename){
        $file = fopen($filename, "r");
        while(! feof($file))
        {
            $record = fgetcsv($file);
            $records[] = $record;
        }

        fclose($file);
        return $records;
    }
}

/*
main::start();

class main
{
    static public function start()
    {
        $test = 'test';

        $records = csv::getrecords();
        $table = html::generateTable($records);
        system::printPage($table);
    }
}

class csv
{
    static public function getRecords()
    {
        $records[] = $test;

        return $records;
    }
}
class html
{
    static public function generateTable($records)
    {
        $table = $records;
        return $table;
    }
}
class system
{
    static public function printPage($page)
    {
        echo $page;
    }
}
*/
?>