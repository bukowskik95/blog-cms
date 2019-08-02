 
    <?php
if(isset($_POST['create_user'])){

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $user_name = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];


   $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password ) "
           . "VALUES ('{$user_firstname}','{$user_lastname}','{$user_role}','{$user_name}','{$user_email}', '{$user_password}') ";         
    
   $create_user = mysqli_query($connection, $query);
   
    confirm($create_user);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="title">Last name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
            <option value="subscriber">Select Option</option>
            <option value="subscriber">Subscriber</option>
            <option value="admin">Admin</option>    
            
        </select>
        
    </div>
    
    
<!--    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>-->
    
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_tags">Password</label>
        <input type="text" class="form-control" name="user_password">
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
</form>
