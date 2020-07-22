<?php 

if(isset($_GET['edit_user'])){
    $the_user_id =  $_GET['edit_user'];


    $query = "SELECT * FROM users WHERE user_id = $the_user_id";

    $select_user_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_user_query)) {
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        // $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }






}
    if(isset($_POST['create_user'])){
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];


       /*  $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name']; */

        $user_email = $_POST['user_email'];
        $password = $_POST['password'];

        //$post_date = date('d-m-y');
     

        //move_uploaded_file($post_image_temp, "../images/$post_image");   
        $query = "SELECT randSalt FROM users";
        $select_randsalt_query = mysqli_query($connection,$query);
        if(!$select_randsalt_query){
            die("query failed " . mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randSalt'];
        $hashed_password = crypt($password, $salt);



        $query = "UPDATE users SET " ;
        $query .="username = '{$username}', ";
        $query .="user_firstname = '{$user_firstname}', ";
        $query .="user_lastname = '{$user_lastname}', ";
        $query .="user_role  = '{$user_role}', ";
        $query .="user_email = '{$user_email}', ";
        $query .="password = '{$hashed_password}' ";
        $query .="WHERE user_id = {$the_user_id} ";


        $update_user = mysqli_query($connection , $query);

        confirmQuery($update_user);

        echo "<p class='alert alert-success'>Updated Successfully " . "<a href='users.php' >View Users</a> </p> ";

        

    }
 
?>



<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Username</label>
    <input type="text" class="form-control" name="username" value="<?php  echo $username; ?> ">
</div>

<div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname" value=" <?php  echo $user_firstname; ?> ">
</div>

<div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname" value=" <?php  echo $user_lastname; ?> ">
</div>

<div class="form-group ">
<label for="title">Role</label>
<select name="user_role" id="user_role" class="form-control ">
    <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
    <?php 
    
    if($user_role == 'admin'){
        echo "<option value='subscriber'>subscriber</option>";
    }

    else {
        echo "<option value='admin'>sdmin</option>";

    }
    
    
    
    ?>
</select>
</div>



<div  class="file-path-wrapper">
    <label for="title">E-mail</label>
    <input type="email" class="form-control" name="user_email" value=" <?php  echo $user_email; ?> ">
</div> </br>

<div class="form-group">
    <label for="title">Password</label>
    <input type="password"  class="form-control" name="password"  value="<?php  echo $password; ?> ">
</div>



<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Update User">
</div>

</form>



</form>