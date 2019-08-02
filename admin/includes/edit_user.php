<?php
if(isset($_GET['edit_user'])){
    $the_user_id = $_GET['edit_user'];
 
 
    $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
    $select_users = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_users))
    {

        $user_id = $row['user_id']; 
        $username = $row['username'];
        $user_password =$row['user_password'];
        $user_firstname =$row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];   

    }

}
    
    
if(isset($_POST['edit_user'])){

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];


   $query = "UPDATE users SET 
        user_firstname = '{$user_firstname}',
        user_lastname = '{$user_lastname}', 
        user_role = '{$user_role}', 
        username = '{$username}',
        user_email='{$user_email}', 
        user_password ='{$user_password}'
        WHERE user_id = $the_user_id" ;
        
    $edit_user_query = mysqli_query($connection, $query);
   confirm($edit_user_query);
}
?>
<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="title">First Name</label>
        <input value="<?php echo $user_firstname ;?>" type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="title">Last name</label>
        <input value="<?php echo $user_lastname;?>" type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <select name="user_role" id="">
        <option value="subscriber"><?php echo $user_role; ?> </option>    
            <?php   
            if($user_role == 'admin'){
                
                echo "<option value='subscriber'>Subscriber</option>";
                
            }else{
                
               echo" <option value='admin'>admin</option> ";
            }

            ?>

        </select>
        
    </div>
    
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input value="<?php echo $username;?>" type="text" class="form-control" name="username">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input value="<?php echo $user_email;?>" type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <label for="post_tags">Password</label>
        <input value="<?php echo $user_password;?>" type="text" class="form-control" name="user_password">
    </div>

    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
    </div>
</form>
