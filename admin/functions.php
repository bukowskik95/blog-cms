<?php


function confirm($result){
    
    global $connection;
    if(!$result){
       
       die("querry failed". mysqli_error($connection));
   }
}

function insert_categories() {
    
    global $connection;
    
    if(isset($_POST['submit']))
        {
        $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title))
        {

            echo"this field should not be empty";

        }
        else 
            {
                $query = "INSERT INTO categories (cat_title) VALUE ('{$cat_title}')";
                $create_new_cat = mysqli_query($connection, $query);

                if(!$create_new_cat){
                    die('QUERY FAILED'. mysqli_errno($connection));
                }
            }
        }   
}

function find_All_cat(){
    
        global $connection;
        
        
$query = "select * FROM categories";
$select_cat = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_cat))
    {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
                                                    
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'> Delete </a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'> Edit </a></td>";
        echo "</tr>";
    } 
    
    
}
function delete_cat(){
    global $connection;
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = {$id}";
        $delete = mysqli_query($connection, $query) ;
        header("Location: categories.php");
    }
                                         
    
}


