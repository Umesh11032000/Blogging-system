


<?php 
    if(isset($_POST['create_user'])){
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];


       /*  $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name']; */

        $user_email = $_POST['user_email'];
        $password = $_POST['password'];

        $password = password_hash($password , PASSWORD_BCRYPT, array('cost' => 12    ) );
        //$post_date = date('d-m-y');
     

        //move_uploaded_file($post_image_temp, "../images/$post_image");   

        

        $query = "INSERT INTO users(username, user_firstname, user_lastname, user_role, user_email,password) VALUE('{$username}','{$user_firstname}','{$user_lastname}','{$user_role}','{$user_email}','{$password}')";
        $create_user_query = mysqli_query($connection, $query);

        confirmQuery($create_user_query);

        echo "<p class='alert alert-success'>Successfully Added User " . "<a href='users.php' >View User</a></p>";
        

    }
 
?>



<form action="" method="POST" enctype="multipart/form-data">

<div class="form-group">
    <label for="title">Username</label>
    <input type="text"  class="form-control" name="username">
</div>

<div class="form-group">
    <label for="title">First Name</label>
    <input type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
    <label for="title">Last Name</label>
    <input type="text" class="form-control" name="user_lastname">
</div>

<div class="form-group ">
<label for="title">Role</label>
<select name="user_role" id="user_role" class="form-control ">
    <option value="subscriber">Select Role</option>
    <option value="admin">Admin</option>
    <option value="subscriber">Subscriber</option>
</select>
</div>



<div  class="file-path-wrapper">
    <label for="title">E-mail</label>
    <input type="email" class="form-control" name="user_email">
</div> </br>

<div class="form-group">
    <label for="title">Password</label>
    <input type="password"  class="form-control" name="password">
</div>



<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
</div>

</form>



</form>

<script>
     ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
</script>