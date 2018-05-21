
<!doctype html>
<html lang="en">
<head>
<title>Add Student</title>
</head>
<body>
<?php
 
if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['username'])){
 
        // Adds name to array
        $data_missing[] = 'Username';
 
    } else {
 
        // Trim white space from the name and store the name
        $u_name = trim($_POST['username']);
 
    }
 
    if(empty($_POST['password'])){
 
        // Adds name to array
        $data_missing[] = 'Password';
 
    } else{
 
        // Trim white space from the name and store the name
        $p_word = trim($_POST['password']);
 
    }
    
    if(empty($data_missing)){
        
        require_once('../mysqli_connect.php');
        
        $query = "INSERT INTO user (username, password) VALUES (?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "ss", $u_name, $p_word);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'User Entered';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error();
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}
 
?>
 

<form action="http://localhost:1234/blogCMS/useradded.php" method="post">
 
	<b>Sign Up</b>
 
	<p>Username:
	<input type="text" name="Username" size="30" value="" />
	</p>
 
	<p>Password:
	<input type="text" name="Password" size="30" value="" />
	</p>
 
	<p>
	<input type="submit" name="submit" value="Send" />
	</p>
 
</form>
</body>
</html>