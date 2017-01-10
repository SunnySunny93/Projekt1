<?php
require_once('globals.php');
function db_query($query){
        global $GLOBALS;
        $connectionid = mysql_connect($GLOBALS["SQL"]["Server"], $GLOBALS["SQL"]["User"], $GLOBALS["SQL"]["Pass"]);
        mysql_set_charset($GLOBALS["defaultCharset"], $connectionid);
        if (!mysql_select_db ($GLOBALS["SQL"]["DbName"], $connectionid)) {
            die("Keine Verbindung zur Datenbank");
        }
        if (strpos($query,'SELECT') !== false) {
            $sql_operation = "SELECT";
        }elseif (strpos($query,'INSERT') !== false) {
            $sql_operation = "INSERT";
        }elseif (strpos($query,'UPDATE') !== false) {
            $sql_operation = "UPDATE";
        }
        $result = mysql_query($query, $connectionid);
        if ($result == false){
            return false;
        }elseif($sql_operation != "SELECT" && $result == true){
            return true;
        }elseif($sql_operation == "SELECT"){
            if (mysql_num_rows($result) > 0) {
                return true;
            }else{
                return false;
            }
        }
        mysql_close($connectionid);
    }
    function db_assoc($query){
        global $GLOBALS;
        $connectionid = mysql_connect ($GLOBALS["SQL"]["Server"], $GLOBALS["SQL"]["User"], $GLOBALS["SQL"]["Pass"]);
        mysql_set_charset($GLOBALS["defaultCharset"], $connectionid);
        if (!mysql_select_db ($GLOBALS["SQL"]["DbName"], $connectionid)) {
            die ("Keine Verbindung zur Datenbank");
        }
        $result = mysql_query($query, $connectionid);
        if ($result == false){
            return false;
        }else{
            if (mysql_num_rows($result) > 1) {
                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    $data["ID"][] = $row['ID'];   // Warning: Just IDs written in Array
                    //ToDO: Get all Table Values
                }
                return $data;
            }elseif(mysql_num_rows($result) > 0){
                $data = mysql_fetch_assoc($result);
                return $data;
            }else{
                return false;
            }
        }
        mysql_close($connectionid);
    }
