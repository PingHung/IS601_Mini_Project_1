<?php

/*$file = fopen("example.csv","r");
print_r(fgetcsv($file));
fclose($file);*/
main::start("example.csv");

class main {
    static public function start($filename){
        $records = csv::getRecords($filename);


    }
}

class csv {

    static public function getRecords($filename){
        $file = fopen($filename, "r");
        while(! feof($file))
        {
            $record = fgetcsv($file);
            $records[] = recordFactory::create($record);
        }
        fclose($file);
        return $records;
    }
}

class record {

    public function __construct(Array $record = null)
    {

        $this->createProperty();
        print_r($this);
    }

    public function createProperty($name = 'first', $value = 'kevik'){
        $this->{$name} = $value;
    }
}

class recordFactory {
    static public function create(Array $array = null) {
        $record = new record($array);

        return $record;
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