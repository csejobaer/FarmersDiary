<?php 
	include_once __dir__."/database.php";
	class User{
		public $fname;
		public $lname;
		public $gender;
		public $nid;
		public $address;
		public $country;
		public $district;
		public $police;
		public $phone;
		protected $password;
		public $trade_license;

		/*-------------------------------------------------------
		// +++++++++++++++++$user = phone numbser, $pws = password
		---------------------------------------------------------*/
		function __construct(){
			$db = new DatabaseConnection;
		}
		public
		function dataValidation($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}
		public
		function getValue(){
			//if ($_SERVER["REQUEST_METHOD"] == "POST"){
				$this->fname = dataValidation($_POST['fname']);
				$this->lname = dataValidation($_POST['lname']);
				$this->gender = dataValidation($_POST['gender']);
				$this->nid = dataValidation($_POST['nid']);
				$this->address = dataValidation($_POST['address']);
				$this->country = dataValidation($_POST['country']);
				$this->district = dataValidation($_POST['district']);
				$this->police = dataValidation($_POST['police']);
				$this->password = dataValidation($_POST['password']);
				$this->trade_license = dataValidation($_POST['tread']);
			//}

		}
		/*-------------------------------------------------------
		// +++++++++++++++++Invalid Text Checker
		---------------------------------------------------------*/
		function textValidation($text, $name){
			if (!preg_match ("/^[a-zA-z]*$/", $text) ) {  
			    $ErrMsg = $name." is invalid input";  
			    return $ErrMsg;  
			} 
		}

		/*-------------------------------------------------------
		// +++++++++++++++++Buyer Database Data Insert
		---------------------------------------------------------*/

		function login($userphone, $userPassword, $userType){
			$loginObject = new DatabaseConnection();
			
			if($userType == "farmers"){
				//01312889144
				$loginQuery = "SELECT * FROM farmersprofile WHERE phone = $userphone";
				$loginExecute = $loginObject->query_execute($loginQuery);


				if($loginExecute->num_rows>0){
					while($data = $loginExecute->fetch_assoc()){
						$pws = $data['passwords'];						
						if(md5($userPassword) == $pws ){
							session_start();
							$_SESSION['login'] = true;  
							$_SESSION['id'] = $data['id'];
							header("Location: login-success.php");
							return true;
						}else{
							echo '<script>';
							echo 'alert("Wrong passowrd inserted")';
							echo '</script>';
						}
					}
				}else{
					echo '<script>';
					echo 'alert("This phone numner does not registered")';
					echo '</script>';
				}

			}
			
		}


		public function session() {  
			if (isset($_SESSION['login'])) {  
				return $_SESSION['login'];  
			}  
		}  
		public function logout() {  
			$_SESSION['login'] = false;  
			session_destroy();  
		}   
		

	}



class Farmers extends User{
		/*-------------------------------------------------------
		// +++++++++++++++++Register now
		---------------------------------------------------------*/
		//$fname, $lname, $gender, $nid, $address, $police, $district, $country, $password
		public function requiredData($fname, $lname, $gender, $nid, $phone, $password, $address, $thana, $district, $country, $type){
				$error = array();
				$dataObject = new DatabaseConnection();
		
				//First name
				if(empty($fname)){
					array_push($error, "First name is required");
				}else{
					if(!empty($this -> textValidation($fname, "First name "))){
						array_push($error, $this -> textValidation($fname, "First name "));
					}
				}
				//Last name
				if(empty($lname)){
					array_push($error, "Last name is required");
				}else{
					if(!empty($this -> textValidation($lname, "Last name "))){
						array_push($error,$this -> textValidation($lname, "Last name "));
					}
				}
				//Gender name
				if($gender != 'male' && $gender != 'female'){
					array_push($error, "Gender is required");
				}else{
					if(!empty($this -> textValidation($gender, "Gender "))){
						array_push($error,$this -> textValidation($gender, "Gender "));
					}
				}
				//Phone
				if(empty($phone)){
					array_push($error, "First name is required");
				}else if($type == 'farmer'){
					$slqQuery = "SELECT phone FROM farmersprofile WHERE phone = '$phone'";
					$executerQuery = $dataObject->query_execute($slqQuery);
					if($executerQuery->num_rows >= 1){
						array_push($error, "Phone number already exists");
					}
				}
				
				//nid 
				if(empty($nid)){
					array_push($error, "NID is required");
				}else{
					if(strlen($nid) != 10){
						array_push($error,$this -> textValidation($nid, "NID "));
					}
				}
				// Address
				if(empty($address)){
					array_push($error, "Address is required");
				}
				// else{
				// 	if(!empty($this -> textValidation($address, "Gender "))){
				// 		array_push($error,$this -> textValidation($address, "Address "));
				// 	}
				// }
				// Police
				if(empty($thana) || $thana == "default"){
					array_push($error, "Upazilla is required");
				}else{
					if(!empty($this -> textValidation($thana, "Upazilla "))){
						array_push($error,$this -> textValidation($police, "Upazilla "));
					}
				}
				// District
				if(empty($district) || $district == "default"){
					array_push($error, "District is required");
				}else{
					if(!empty($this -> textValidation($district, "District "))){
						array_push($error,$this -> textValidation($district, "District "));
					}
				}
				// District
				if(empty($country) || $country == "default"){
					array_push($error, "Country is required");
				}else{
					if(!empty($this -> textValidation($country, "Country "))){
						array_push($error,$this -> textValidation($country, "Country "));
					}
				}
				// Password
				if(empty($password)){
					array_push($error, "Password is required");
				}else if(strlen($password) <6){
					array_push($error, "Password use greater then 6 length");
				}
				
			
			if (sizeof($error) > 0) {
					for($i = 0; $i<count($error); $i++){
				
						echo '<script type="text/javascript">';
						echo ' alert("'.$error[$i].'")';  //not showing an alert box.
						echo '</script>';
						;
						return False;
					}
				
		
			
			}else{
				$count = 0;
				try{
					$id = 100000000;
					$getId = "SELECT * FROM farmersprofile ORDER BY id DESC LIMIT 1";
					$userLastID = $dataObject->query_execute($getId);
				
				
					if ($userLastID->num_rows > 0) {
						// output data of each row
						while($row = $userLastID->fetch_assoc()) {
							$lastUserId = $row["id"]+1;
						}
					} else {
						$lastUserId = $id;
					}
					
					
				}catch(Exceptoin $e){
					echo $e;
				}

				// Address ID
				$aid = 1000000000;
				try{

					
				
					$getIdAdrs = "SELECT * FROM address ORDER BY address_id DESC LIMIT 1";
									
					$adLastIdResult = $dataObject->query_execute($getIdAdrs);
					//echo $adLastId->address_id;
				
				
					if ($adLastIdResult->num_rows > 0) {
						// output data of each row
						while($rows = $adLastIdResult->fetch_assoc()) {
							$address_id = $rows["address_id"]+1;
						}
					} else {
						$address_id = $aid;
					}
					
					
				}catch(Exceptoin $e){
					echo $e;
				}

				$sql2 =  "INSERT INTO address(address_id, address_line, thana, district, country, user_type) VALUES($address_id,'$address', '$thana', '$district', '$country', '$type')";
				$passwords = md5($password);
				$sql = "INSERT INTO farmersprofile(id, fname, lname, gender, nid, phone, passwords, address_id) VALUES($lastUserId, '$fname', '$lname', '$gender', $nid, $phone, '$passwords', $address_id)";
			
				if ($dataObject -> query_execute($sql2) ==TRUE) {
					header("Location: success-page.php");
				} else {
					echo "Error: " . $sql2 . "<br>" ;//. $dataObject->connect_error;
				}
				if ( $dataObject -> query_execute($sql)) {
					echo "Profile record inserted successfully";
				} else {
					echo "Error: " . $sql . "<br>" ;//. $dataObject->connect_error;
				}
			}
		}



		public function getFarmersData($id){
			$fname = $lname = "";
			$objectFarmers =new DatabaseConnection(); 
			$getQuery = "SELECT * FROM farmersprofile WHERE id  = '$id'";

			
			$querydata = $objectFarmers->query_execute($getQuery);
			if($querydata->num_rows > 0){
				while($dataRows= $querydata->fetch_assoc()){
					$this -> fname =  $dataRows['fname'];
					$this -> lname =  $dataRows['lname'];
					$this -> phone =  $dataRows['phone'];
					$this -> address =  $dataRows['address_id'];
					

				}
			}
			$adid = $this -> address;
			$addressQuery = "SELECT * FROM address WHERE address_id  = '$adid'";
			$addressQ = $objectFarmers->query_execute($addressQuery);
			if($addressQ->num_rows > 0){
				while($addressInfo= $addressQ->fetch_assoc()){
					$this -> address =  $addressInfo['address_line'];
					$this -> thana =  $addressInfo['thana'];
					$this -> district =  $addressInfo['district'];
					$this -> country =  $addressInfo['country'];
					

				}
			}
			
		}
		
		
		

}
class Mediator extends User{
		/*-------------------------------------------------------
		// +++++++++++++++++Mediator Database Data Insert
		---------------------------------------------------------*/
		function userMediator(){
			$dataObject = new DatabaseConnection();
			$sql = "INSERT INTO mediator(fname, lname, gender, nid, address_id, phone, password, trade_license), VALUES('$fname', '$lanme', '$gender', '$nid', '$address', '$password', '$trade_license')";
			$dataObject.query_execute($sql);

		}


}
class Buyer extends User{

	public
	function userBuyer(){
		$dataObject = new DatabaseConnection();
		$sql = "INSERT INTO buyer(fname, lname, gender, nid, address_id, phone, password), VALUES('$fname', '$lanme', '$gender', '$nid', '$address', '$password')";
		$dataObject.query_execute($sql);

	}
}
class Product extends User{
	private $product_id;
	private $product_name;
	private $prodcut_datails;



}




 ?>