<?php
  
class service_queryhelper extends \Framework\Initialization{

    private $connection;
    public $numrows;
    protected $data = array();
  
    public function __construct(){
    
    
      //publish that this service is running
      array_push(parent::$loaded, "QueryHelper Core Service Loaded");
      $dbconfigurations = require(parent::$paths["configurations"] . "db.php");
      
      $host = $dbconfigurations["host"];
      $dbname = $dbconfigurations["name"];
      $username =$dbconfigurations["username"];
      $password = $dbconfigurations["password"];
  
      try {
          mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
          $db = new mysqli($host, $username, $password, $dbname);
          $this->connection = $db;
          mysqli_set_charset($this->connection,"utf8");
      }catch (Exception  $ex){
        array_push(parent::$errors, $ex);
      }
    }
  
  
    public function query($query,$bind_params,$fetch){

      try{
        
        $request = $this->connection->prepare($query);
          
        if($bind_params != null){
          
          $string_bind_params = null;
          
          for($i=0; $i < count($bind_params);$i++){

            //protect agaisn't xss 
            $bind_params[$i] = mysqli_real_escape_string($this->connection,$bind_params[$i]);

            //check if is a float
            if(is_numeric( $bind_params[$i] ) && floor( $bind_params[$i] ) != $bind_params[$i]){
              $string_bind_params = $string_bind_params . "d";
            //check if is numeric
            }else if(is_numeric( $bind_params[$i] )){
              $string_bind_params = $string_bind_params . "i";
            // its a string
            }else{
              $string_bind_params = $string_bind_params . "s";
            }
          }

          //insert the string bind params in the first index of the array
          array_unshift($bind_params, $string_bind_params);

          call_user_func_array(array($request, 'bind_param'), $this->refValues($bind_params));
        }
          
        $request->execute();
        $result = $request->get_result();

        
        if($fetch){
          $this->data($result);
        }

      }catch(Exception $ex){
        array_push(parent::$errors, $ex);
      }
    }
  
    public function numrows(){
      return $this->numrows;
    }
  
    public function getdata(){
      return $this->data;
    }
  
    public function displaydata(){
      echo "<pre>";
      print_r($this->data);
      echo "</pre>";
    }
  
    public function last_id(){
      return $this->connection->insert_id;
    }
  
    public function close(){
      mysqli_close($this->connection);
    }
  
    private function data($result){
         $i = 0;
         $this->data = null;
         while($myrow = $result->fetch_assoc()){
           foreach($myrow as $row => $value){
             $this->data[$i][$row] = $value;
           }
           $i++;
         }
         $this->numrows = mysqli_num_rows($result);
    }
  
    private function refValues($arr){
  
      if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
      {
          $refs = array();
          foreach($arr as $key => $value)
              $refs[$key] = &$arr[$key];
          return $refs;
      }
      return $arr;
  }
  

}


//add the service to the load provider ( allows to call respective functions on the pages )
array_push(self::$servs, array("queryhelper" =>  new service_queryhelper()) );
