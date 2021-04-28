<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accountselsa";

$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        
        // $sql = "SELECT * FROM `users` WHERE `EmailAddress` = '".$emailAddress."' AND `Password`= '".$passWord."'";
       function crud($choice, $values){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "accountselsa"; 
        $conn = new mysqli($servername, $username, $password, $dbname);
           $sql="";
           if($choice==1){
                $sql="insert into useraccounts(name, username, password) values('".$values['name']."','".$values['username']."','".password_hash($values['password'],PASSWORD_DEFAULT)."')";
                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
           }else if ($choice==2){
                $sql="update from usersaccount where id='".$values['id']."'
                 set name='".$values['name']."', username='".$values['username']."', password='".password_hash($values['password'], PASSWORD_DEFAULT)."'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record updated successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
           }else if ($choice==3){
                $sql="select * from useraccounts";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    ?>
                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Password</th>
                    <?php
                    while($row = $result->fetch_assoc()){
                        echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['username']."</td><td>".$row['password']."</td></tr>";
                    }
                }else{
                    echo "Record does not exist.";
                }
           }else if($choice ==4){
                $sql= "delete from table where id='".$values['id']."'";
                if ($conn->query($sql) === TRUE) {
                    echo "Record deleted successfully";
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

           }else{
               echo "Choices out of bounds. Select from 1 to 4.";
           }
         
       } 
       
    
    crud(1,array("name"=>"Eleasar","username"=>"elsa", "password"=>"elsa123"));
    
    $conn->close();
   
?>