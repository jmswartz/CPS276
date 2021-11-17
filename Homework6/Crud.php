<?php

require_once "Pdo_methods.php";

class Crud extends PdoMethods{

   public function getFiles(){
      
       /* CREATE AN INSTANCE OF THE PDOMETHODS CLASS*/
       $pdo = new PdoMethods();

       /* CREATE THE SQL */
       $sql = "SELECT DISTINCT entered_file_name, file_path FROM files ORDER BY entered_file_name";

       $records = $pdo->selectNotBinded($sql);

       /* IF THERE WAS AN ERROR DISPLAY MESSAGE */
       if($records == 'error'){
           return 'There has been and error processing your request';
       }
       else {
           if(count($records) != 0){
               return $this->displayLinks($records);
           }
           else {
               return "No files were found.";
           }
       }
   } // getFiles()

  
   public function addFile(){
  
       $pdo = new PdoMethods();

       /* HERE I CREATE THE SQL STATEMENT and I AM BINDING THE PARAMETERS */
       $sql = "INSERT INTO files (file_name, file_path, entered_file_name) VALUES (:fname, :fpath, :enteredname)";
  
   /* THESE BINDINGS ARE LATER INJECTED INTO THE SQL STATEMENT THIS PREVENTS AGAIN SQL INJECTIONS */
   $bindings = [
           [':fname',$_FILES["selectedFile"]["name"],'str'],
           [':fpath',"files/".$_FILES["selectedFile"]["name"],'str'],
           [':enteredname',$_POST['enteredFileName'],'str']
       ];

       /* I AM CALLING THE OTHERBINDED METHOD FROM MY PDO CLASS */
       $result = $pdo->otherBinded($sql, $bindings);

       /* HERE I AM USING AN OBJECT TO RETURN WHETHER SUCCESSFUL FOR ERROR */
       if($result === 'error'){
           return 'There was an error adding the name';
       }
       else {
           return "The file has been added successfully.";
       }
   } // addFile()


   /*THIS FUNCTION TAKES THE DATA FROM THE DATABASE AND RETURN AN UNORDERED LIST OF THE DATA
   and it is called by getFiles() above */
  
   private function displayLinks($records){
       $list = '<ul>';
       foreach ($records as $row){
           $list .= "<li><a target='_blank' href={$row['file_path']}>{$row['entered_file_name']}</li>";
       }
       $list .= '</ul>';
       return $list;
}

} // class Crud extends PdoMethods

?>