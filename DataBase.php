<?php
/**
 * Created by JetBrains PhpStorm.
 * User: nomad
 * Date: 2012/11/04
 * Time: 6:16 PM
 * To change this template use File | Settings | File Templates.
 */
class DataBase
{

    private $dataArray = array();

    function __construct($host, $username, $password, $database, $table, $howmany)
    {
        $Db = new mysqli($host, $username, $password, $database);

        $result = $Db->query('SELECT * FROM '. $table .' LIMIT '.$howmany.';');

        $index = 0;
        while($row = mysqli_fetch_assoc($result))
        {
            $this->dataArray[$index] = $row;
            $index++;
        }

        mysqli_close($Db);
    }

    public function getArray()
    {
        return $this->dataArray;
    }

}
