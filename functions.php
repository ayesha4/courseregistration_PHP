<?php 
//1.setup a connection
//2.specify the db name 
//3. create an object of PDO
//4. ->prepare has the desired query
//5. ->execute executes it 

//function pdo_connect to establish the connection (1-6)
//function template_header for page headers
//function temlate_footer for page footers

    
    
function pdo_connect(){
    
    try{
    $host="localhost";
    $password="";
    $username="root";
    $database="registercourse";
    $db_name="mysql:host=localhost;dbname=registercourse";
      $conn=new PDO ($db_name,$username,$password); 
        return $conn;
       
// $sql=$conn->prepare("SELECT * FROM courses");
// $sql->execute();
// $result = $sql->FetchAll(PDO::FETCH_ASSOC);
// echo "<pre>";
// print_r($result);
// echo "</pre>";
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

pdo_connect();
function test_input($data) {
    //The trim() function removes whitespace and other predefined characters from both sides of a string.
    $data = trim($data);
    //The stripslashes() function removes backslashes added by the addslashes() function which gets aded bymd5
    $data = stripslashes($data);
    //The htmlspecialchars() function converts some predefined characters to HTML entities.
    $data = htmlspecialchars($data);
    return $data;
  }
function template_footer(){
    echo '
    </body>
    </html>';
    
    
}


?>