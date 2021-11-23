<?php
//* Database Connection Function
$db = null;

function getPDO($selectedDatabase) {
    global $db;
    if ($db != null) {
        return $db;
    }
    try {
        // This is the instructors connection string.
        // Substitute your own string to connect to your database.
        // (The mysql user name and password)
        $db = new PDO('mysql:host=localhost;port=3306;dbname=' . $selectedDatabase,'jmswartz','Ss3138512');
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false); 
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 
        return $db;
    }
    catch (Exception $e2) {
        echo('DB Connection Error - ' . $e2->getMessage());
        exit();
    }
}

function execute($sql,$bindingValues=null,$selectedDatabase = 'CPS276') {
// Uncomment the following when debugging your sql
//echo($sql . '<br>');    
//if ($bindingValues != null) {
//    var_dump($bindingValues);
//}
    $db = getPDO($selectedDatabase);
    try {
        $statement = $db->prepare($sql);
        if (!$statement) {
            echo('DB Prepare Error - ' . $sql);
            exit();
        }
        if ($statement===false) {
            echo('DB Prepare Error - ' . $sql);
            exit();
        }
        if ($bindingValues != null) {
            for ($counter=0; $counter < sizeof($bindingValues); $counter++) {
                $statement->bindParam($counter + 1, $bindingValues[$counter]);
            }
        }
        $statement->execute();
        $results = array();
        if (stripos($sql,'select') === 0) {
            $results = $statement->fetchAll();
        }
        $statement->closeCursor();
        return $results;
    }
    catch (Throwable $e2) {
        echo('DB Error - ' . $sql);
        echo('<br>' . $e2->getMessage());
        exit();
    }
}

