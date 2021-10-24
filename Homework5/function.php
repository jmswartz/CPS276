<?php


class MakeFile{
    

public function MakeFileFunc(){

    $rootDir = "/var/www/html/CPS276/directories";
$contents = scandir($rootDir);
$Exists = FALSE;
$Success = FALSE;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $dirName = $_POST['dir_name'];
        $data = $_POST['data'];

        if (empty($dirName)) {
            echo "<label class=\"errLabel\">Folder Name is empty</label><br><br>";
        } else if (empty($data)) {
            echo "<label class=\"errLabel\">Data is empty</label><br><br>";
        } else {

            foreach ($contents as $entry) {
                if (is_dir($rootDir . $entry) and $entry === $dirName) {
                    $Exists = TRUE;
                    break;
                }
            }

            if ($Exists) {
                echo "<label>A directory already exists with that name.</label>";
            } else {
                $newDir = $rootDir . $dirName . "/";
                $Success = mkdir($newDir, 0777, true);

                if ($Success) {
                    file_put_contents($newDir . "readme.txt", $data);
                    echo "<label>File and Directory where created</label>";
                    echo "<label class=\"successLabel\"><a href=\"/directories/" . $dirName;
                    echo "/readme.txt\" >Path were file located</a> </label>";
                } else {
                    echo "<label>File Operation Failed.</label>";
                }
            }
        }
    } else {
        echo "<br><br>";
    }
}
}

    ?>