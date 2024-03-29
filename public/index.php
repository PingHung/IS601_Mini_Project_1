<?php

main::start("example.csv");

class main {
    static public function start($filename)
    {
        $records = csv::getRecords($filename);
        $page = html::generatePage($records);

        system::printPage($page);
    }
}


class html {
    static public function generatePage($records){

        $page = "
<html>
<head>
    <title>IS601 Mini Project 1</title>
    <meta charset=\"utf-8\"/>
    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\">
</head>
<body>
<h1>
    Ping Hung Ho IS601 Mini Project 1
</h1>
";

        $page .= html::generateTable($records);

        $page .= "        
</body>
</html>";

        return $page;
    }

    static public function generateTable($records)
    {
        $page .= "<div class=\"container\">
<table class=\"table table-bordered\">
<thead>
";

        $count = 0;
        foreach ($records as $record) {

            if($count == 0){

                $array = $record->returnArray();
                $fields = array_keys($array);
                $values = array_values($array);

                $page .= html::generateHeading($fields);
                $page .= "</thead>
<tbody>
";
                $page .= html::generateValues($values);


            }
            else{
                $array = $record->returnArray();
                $values = array_values($array);

                $page .= html::generateValues($values);

            }

            $count++;
        }

        $page .= "</tbody>
</table>
</div>";
        return $page;
    }

    static public function generateHeading($fields){
        $page .= "<tr>
";
        foreach ($fields as $field) {
            $page .= "<th>" . $field . "</th>
";
        }
        $page .= "</tr>
";
        return $page;
    }

    static public function generateValues($values){
        $page .= "<tr>
";
        foreach ($values as $value) {
            $page .= "<td>" . $value . "</td>
";
        }
        $page .= "</tr>
";
        return $page;
    }

}

class csv {
    static public function getRecords($filename){
        $file = fopen($filename, "r");
        $fieldNames = array();
        $count = 0;
        while(! feof($file))
        {
            $record = fgetcsv($file);
            if($count == 0) {
                $fieldNames = $record;
            }
            else {
                $records[] = recordFactory::create($fieldNames, $record);
            }
            $count++;
        }
        fclose($file);
        return $records;
    }
}

class record {
    public function __construct(Array $fieldNames = null, $values = null)
    {
        $record = array_combine($fieldNames, $values);
        foreach ($record as $property => $value){
            $this->createProperty($property, $value);
        }
    }
    public function returnArray(){
        $array = (array) $this;
        return $array;
    }
    public function createProperty($name = null, $value = null){
        $this->{$name} = $value;
    }
}

class recordFactory {
    static public function create(Array $fieldNames = null, Array $values = null) {
        $record = new record($fieldNames, $values);
        return $record;
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