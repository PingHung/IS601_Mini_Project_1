<?php
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
?>