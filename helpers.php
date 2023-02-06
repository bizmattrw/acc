
<?php
/**
 * **The DB Location Constant**
 * @var string path to the database connection
 */
define("DB_LOCATION", 'conn.php');

function fetchNow($field, $table, $conditions, $print_sql = false) {
    include DB_LOCATION;
    
    // if (is_string($field)) {
        $sql = "SELECT $field FROM $table WHERE $conditions";
        if ($print_sql) echo $sql;
        // echo $sql;
        $result = $connect->query($sql);

        $answer = "";
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $answer = $row[$field];
        } else {
            echo $connect->error;
        }

        return $answer;
    // }
}

/**
 * Get Rows
 * 
 * @param string $table The **name** of the *table*
 * @param string|string[] $columns The **column(s)** to return
 * @param string $whereCondition The **condition(s)** to put in the *WHERE* block
 * @param string $orderByCondition The **condition(s)** to put in the *ORDER BY* block
 * @param string $groupByCondition The **condition(s)** to put in the *GROUP BY* block
 * @param int $limitNumber The **number** to put in the *LIMIT* block
 * 
 * @return (int|array|bool|string)[] An array that contains the length of returned rows, the rows themselves, an error bool and a message
 */
function getItems($table,  $columns = ["*"], $whereCondition = "", $orderByCondition = "", $groupByCondition = "", $limitNumber = 0) {
    include DB_LOCATION;

    $sql_columns = "";

    if (is_array($columns)) {
        foreach ($columns as $key => $value) {
            $value = ($value == "*") ? $value : "`$value`";
            $sql_columns .= ($key == 0) ? "$value" : ", $value";
        }
    }
    
    $sql = "SELECT $sql_columns FROM $table";

    if (strlen($whereCondition) > 0) {
        $sql .= " WHERE $whereCondition";
    }

    if (strlen($orderByCondition) > 0) {
        $sql .= " ORDER BY $orderByCondition";
    }

    if (strlen($groupByCondition) > 0) {
        $sql .= " GROUP BY $groupByCondition";
    }

    if ($limitNumber > 0) {
        $sql .= " LIMIT $limitNumber";
    }

    // echo $sql;

    $result = $connect->query($sql);

    $rows = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            array_push($rows, $row);
        }
        return ["length" => $result->num_rows, "rows" => $rows, "error" => FALSE, "msg" => "Retrieved successfully.", "sql" => $sql];
    } else {
        return ["length" => $result->num_rows, "rows" => $rows, "error" => ($connect->error) ? TRUE : FALSE, "msg" => $connect->error, "sql" => $sql];
    }
}

/**
 * Get Row By Primary Key
 * 
 * @param string $primaryKey The **Primary Key** to put in the *WHERE* block
 * @param string $table The **name** of the *table*
 * @param string|string[] $columns The **column(s)** to return
 * @param string $primaryKeyColumn The **column** that holds the *primary key*
 * 
 * @return array An array that contains the length of returned rows, the row, an error bool and a message
 */

function getItemByPrimaryKey($primaryKey, $table, $columns = ["*"], $primaryKeyColumn = "id") {
    $result = getItems($table, $columns, "$primaryKeyColumn = '$primaryKey'", "", "", 1);

    if ($result["length"] > 0) {
        $row = $result["rows"][0];
        return ["length" => $result["length"], "row" => $row, "error" => $result["error"], "msg" => $result["msg"]];
    } else {
        return ["length" => $result["length"], "row" => [], "error" => $result["error"], "msg" => $result["msg"]];
    }
}

/**
 * Get Column By Primary Key
 * 
 * @param string $primaryKey The **Primary Key** to put in the *WHERE* block
 * @param string $table The **name** of the *table*
 * @param string $columns The **column** to return
 * @param string $primaryKeyColumn The **column** that holds the *primary key*
 * 
 * @return array An array that contains the length of returned rows, the column value, an error bool and a message
 */
function getItemColumnByPrimaryKey($primaryKey, $table, $column = "id", $primaryKeyColumn = "id") {
    $result = getItemByPrimaryKey($primaryKey, $table, [$column], $primaryKeyColumn);

    if ($result["length"] > 0) {
        $row = $result["row"];
        return ["length" => $result["length"], "data" => $row[$column], "error" => false, "msg" => $result["msg"]];
    } else {
        return ["length" => $result["length"], "data" => "", "error" => $result["error"], "msg" => $result["msg"]];
    }
}

/**
 * Get Last Inserted Row
 * 
 * @param string $table The **name** of the *table*
 * @param string|string[] $columns The **column(s)** to return
 * @param string $whereCondition The **condition(s)** to put in the *WHERE* block
 * @param string $orderByColumn A *string* of **comma-separated** **column names** to put in the *ORDER BY* block
 * 
 * @return array An array that contains the length of returned rows, the row, an error bool and a message
 */
function getLastInsertedItem($table, $columns = ["*"], $whereCondition = "", $orderByColumn = "id") {
    $result = getItems($table, $columns, $whereCondition, "$orderByColumn DESC", "", "1");

    if ($result["length"] > 0) {
        $row = $result["rows"][0];
        return ["length" => $result["length"], "row" => $row, "error" => $result["error"], "msg" => $result["msg"]];
    } else {
        return ["length" => $result["length"], "row" => [], "error" => $result["error"], "msg" => $result["msg"]];
    }
}

/**
 * Get Last Inserted Column
 * 
 * @param string $table The **name** of the *table*
 * @param string $column The **column** to return
 * @param string $whereCondition The **condition(s)** to put in the *WHERE* block
 * @param string $orderByColumn A *string* of **comma-separated** **column names** to put in the *ORDER BY* block
 * 
 * @return array An array that contains the length of returned rows, the column value, an error bool and a message
 */
function getLastInsertedItemColumn($table, $column, $whereCondition = "", $orderByColumn = "id") {
    $result = getLastInsertedItem($table, [$column], $whereCondition, $orderByColumn);

    if ($result["length"] > 0) {
        $row = $result["row"];
        return ["length" => $result["length"], "data" => $row[$column], "error" => false];
    } else {
        return ["length" => $result["length"], "data" => "", "error" => $result["error"], "msg" => $result["msg"]];
    }
}

function getOrInsert($field, $table, $conditions, $insert_query = "") {
    include DB_LOCATION;

    if ($connect->connect_error) {
        echo $connect->connect_error;
        die();
    }

    $selectQuery = "SELECT $field FROM $table WHERE $conditions";
    $selectQueryResult = $connect->query($selectQuery);

    $return = "Empty Response";

    if ($selectQueryResult->num_rows > 0) {
        $selectQueryRow = $selectQueryResult->fetch_assoc();
        $return = $selectQueryRow[$field];
    } else {
        echo $connect->error;
        if (strlen($insert_query) != 0) {
            if ($connect->query($insert_query) === TRUE){
                $return = $connect->insert_id;
            } else {
                echo $connect->error;
                die();
            }
        }
    }

    return $return;
}

function doesArraysMatchLength($arr1, $arr2) {
    return count($arr1) == count($arr2);
}

/**
 * Insert on row
 * 
 * @param string $table The **name** of the *table*
 * @param string|string[] $columns The **column(s)** to use
 * @param string|string[] $values The **VALUES** to *insert* into the given *$columns*
 */

function insertItem($table, $columns, $values) {
    include DB_LOCATION;

    if (!doesArraysMatchLength($columns, $values)) {
        return ["msg" => "Columns count doesn't match values count", "error" => TRUE];
    }

    $cols = $vals = "";

    if (is_array($columns)) {
        if (!is_array($values)) {
            return ["msg" => "Values is not type of array while columns is of type array", "error" => TRUE];
        } else {
            foreach ($columns as $key => $value) {
                $cols .= ($key == 0) ? "`$value`": ", `$value`";
            }

            foreach ($values as $key => $value) {
                $vals .= ($key == 0) ? "'$value'": ", '$value'";
            }
        }
    } else if (is_string($columns)) {
        $cols = "`$columns`";
        if (!is_string($values)) {
            return ["msg" => "Values is not type of string while columns is of type string", "error" => TRUE];
        } else {
            $vals = "'$values'";
        }
    }

    return insertOne($table, $cols, $vals);
}

/**
 * Insert one row in the DB
 * 
 * @param string $table The **name** of the *table*
 * @param string $columns The **column(s)** to use
 * @param string $values The **VALUES** to *insert* into the given *$columns*
 */
function insertOne($table, $columns, $values) {
    include DB_LOCATION;

    $sql = "INSERT INTO $table ($columns) VALUES ($values)";

    if ($connect->query($sql) === TRUE) {
        return ["error" => FALSE, "msg" => "Inserted", "inserted_id" => $connect->insert_id];
    } else {
        return ["msg" => ($connect->error) ? $connect->error: "Unknow error prevented insertion.", "error" => ($connect->error) ? TRUE : FALSE];
    }
}

function startsWith ($string, $startString) {
    $len = strlen($startString); 
    return (substr($string, 0, $len) === $startString); 
}

function createZeros($number) {
    $string = "";
    $i = $number;
    while ($i > 0) {
        $string .= "0";
        $i--;
    }

    return $string;
}

function getNextCode($number, $answer) {
    $len = strlen($answer);
    return createZeros(($number > $len) ? $number - $len : 0)."$answer";
}

function getOrZero($field, $table, $conditions, $print_sql = false) {
    include DB_LOCATION;
    $sql = "SELECT $field FROM $table WHERE $conditions";
    if ($print_sql) echo $sql;
    $result = $connect->query($sql);

    $answer = "";
        
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $answer = $row[$field];
    } else {
        echo $connect->error;
        $answer = 0;
    }

    return $answer;
}

function unique_multidim_array($array, $key) {
    $temp_array = array();
    $i = 0;
    $key_array = array();
   
    foreach($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        }
        $i++;
    }
    return $temp_array;
}
?>