
<?php

echo "<h1>Homework 9</h1>";



$hostname = "sql2.njit.edu";
	$username = "rjc43";
	$password = "pxNGdj5c";


class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
} 



class User {



			var $hostname = "sql2.njit.edu";
			var $username = "rjc43";
			var $password = "pxNGdj5c";
	
		function displayAll()
		{
			echo "<table style='border: solid 1px black;'>";
			echo "<tr><th>Id</th><th>Email</th><th>Firstname</th><th>Lastname</th><th>Phone</th><th>Birthday</th><th>Gender</th><th>Password</th></tr>";

			$conn = new PDO("mysql:host=$this->hostname;dbname=rjc43", $this->username, $this->password);
		    $stmt = $conn->prepare("SELECT id, email, fname, lname, phone, birthday, gender, password FROM accounts");

		    $stmt->execute();



		    // set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
		    	$count++;
		        echo $v;
		    }
		    
		    echo "</table></br>";

		}

		function deleteUser($userID)
		{
		     
			$conn = new PDO("mysql:host=$this->hostname;dbname=rjc43", $this->username, $this->password);

			 $sql = "DELETE FROM accounts WHERE id=$userID";

		    $conn->exec($sql);

		    $displayDelete = new User;

			$displayDelete->displayAll();

		}

		function insertUser($newUserID, $newUserEmail, $newUserFname, $newUserLname, $newUserPhone, $newUserBirthday, $newUserGender, $newUserPassword)
		{
		     $conn = new PDO("mysql:host=$this->hostname;dbname=rjc43", $this->username, $this->password);


			$sql = "INSERT INTO accounts (id, email, fname, lname, phone, birthday, gender, password) VALUES ($newUserID, '$newUserEmail', '$newUserFname', '$newUserLname', '$newUserPhone', '$newUserBirthday', '$newUserGender', '$newUserPassword')";
			//$sql = "INSERT INTO accounts (id, email, fname, lname, phone, birthday, gender, password) VALUES (1,'mjlee@njit.edu', 'Mike', 'Lee', '974-555-5555', '2000-05-05', 'male', '1234')";

			    $conn->exec($sql);

		    $displayInsert = new User;

			$displayInsert->displayAll();
		}

		function updatePassword($userID, $newpass)
		{
		      $conn = new PDO("mysql:host=$this->hostname;dbname=rjc43", $this->username, $this->password);

		      $sql = "UPDATE accounts SET password='$newpass' WHERE id=$userID";

			    // Prepare statement
			    $stmt = $conn->prepare($sql);

			    // execute the query
			    $stmt->execute();

			$displayPass = new User;

			$displayPass->displayAll();
		}




}



	try {
	    $conn = new PDO("mysql:host=$hostname;dbname=rjc43", $username, $password);
	    

$display1 = new User;

$display1->updatePassword(2, "1234");
$display1->deleteUser(1);
$display1->insertUser(1,'mjlee@njit.edu', 'Mike', 'Lee', '974-555-5555', '2000-05-05', 'male', '1234');
$display1->updatePassword(2, "newPassword");






























	    }
	catch(PDOException $e)
	    {
	    	echo "Connection failed: " . $e->getMessage() + "</br>";
	    }





// $hostname = "sql2.njit.edu";
// $username = "rjc43";
// $password = "pxNGdj5c";
// try {
// 	    $conn = new PDO("mysql:host=$hostname;dbname=rjc43", $username, $password);
// 	    echo "Connected successfully </br>"; 




// 	    $result1 = $conn->prepare("SELECT count(*) id, fname, lname FROM accounts WHERE id<6"); 
// 		$result1->bindParam(':p', $q, PDO::PARAM_INT);
// 		$result1->execute();
// 		$rowCount = $result1->fetchColumn(0);
// 		echo $rowCount . "</br>";











		
//         $stmt = $conn->prepare("SELECT id, fname, lname FROM accounts WHERE id<6");

// 	    $stmt->execute();



// 	    // set the resulting array to associative
// 	    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
// 	    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
// 	    	$count++;
// 	        echo $v;
// 	    }

//     }
// catch(PDOException $e)
//     {
//     	echo "Connection failed: " . $e->getMessage() + "</br>";
//     }




// echo "</table>";

$conn = null;
?>