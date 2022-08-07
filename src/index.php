<?php

class Person
{
    public $firstName;
    public $lastName;
    public $age;
    public array $history;

    function __construct(string $jsonString = null)
    {
        //able to create a new class without jsonString
        if ($jsonString != null) {
            $jsonString = json_decode($jsonString);
            foreach ($jsonString as $key => $val) {
                if (property_exists(__CLASS__, $key)) {
                    //set value from json in the local value
                    $this->$key =  $val;
                } else {
                    //the json input is not of this class and return a Exception
                    throw new Exception("the Json string isn't of class '" . get_class($this) . "'");
                }
            }
        }
    }
}

//the json string gonna parse it
$jsonString = '{"firstName":"Jan","lastName":"Walker","age":20,"history":["Pay okey","Pay Nokey","Pay okey"]}';

//the class Person parsed with 'jsonString'
$obj = new Person($jsonString);
//$obj->firstName;
//$obj->age;

print_r($obj) . "<br>";
