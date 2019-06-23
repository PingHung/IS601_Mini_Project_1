<?php


main::start();

class main
{
    static public function start()
    {
        $records = csv::getrecords();
        $table = html::generateTable($records);
        system::printPage($table);
    }
}


class csv
{
    static public function getRecords() {}
}
class html
{
    static public function generateTable($records)
    {
        $table = 'test';
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