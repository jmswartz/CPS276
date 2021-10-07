<?
Class Student {
   public $firstName = "";
   public $lastName = "";
   private $age = 0;

   public function setAge($x) {
       if ($x >=0) {
        $this->age =$x;
       }
   }
}

 function getAge($x) {
    return $this->age;
}


//$s1 = new Student();
//$s1->firstName = 'Jaron';
//echo($s1->firstName);
//print_r($s1);
//echo('<br>');
//$s2 = new Student();
//print_r($s2);

$s1 = new Student();
$s1->setAge(44);
print_r($s1);
echo ('<br>');
$s2 = new Student();
$s2->setAge(11);
print_r($s2);