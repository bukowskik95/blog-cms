<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>id</th>
            <th>author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr> 

    </thead>   
    <tbody> 

            <?php
            $query = "SELECT * FROM comments";
            $select_posts = mysqli_query($connection, $query); 

            while($row = mysqli_fetch_assoc($select_posts))
            {

                $comment_id = $row['comment_id']; 
                $comment_post_id = $row['comment_post_id']; 
                $comment_author = $row['comment_author']; 
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email']; 
                $comment_status = $row['comment_status']; 
                $comment_date = $row['comment_date']; 

                echo"<tr>";
                echo "<td>$comment_id</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_content</td>";

//                                            $query = "select * FROM categories WHERE cat_id = $post_category_id ";
//                                                $select_cat = mysqli_query($connection, $query);   
//                            
//                                                    while($row = mysqli_fetch_assoc($select_cat))
//                                                        {
//                                                            $cat_id = $row['cat_id'];
//                                                            $cat_title = $row['cat_title'];             
//                                                            echo "<td>$cat_title</td>";
//                                                        }
                echo "<td>$comment_email</td>";
                echo "<td>$comment_status</td>";


                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                $select_post_id_q = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc($select_post_id_q)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];


                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

                }




                echo "<td>$comment_date</td>";

                echo "<td> <a href='comments.php?approve=$comment_id'> Approve </a></td>";
                echo "<td> <a href='comments.php?unapprove=$comment_id'> Unapprove </a></td>";
                echo "<td> <a href='comments.php?delete=$comment_id'> delete </a></td>";

            }

            ?>                                
</tbody>
</table>



<?php

   if(isset($_GET['approve'])){ 
    $comment_id = $_GET['approve'];
    
    $querry = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id ";
    
    $approve_querry = mysqli_query($connection, $querry);
    header("Location: comments.php");

   }

if(isset($_GET['unapprove'])){ 
    $comment_id = $_GET['unapprove'];
    
    $querry = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id ";
    
    $unapprove_querry = mysqli_query($connection, $querry);
    header("Location: comments.php");

   }


if(isset($_GET['delete'])){
    
    $comment_id = $_GET['delete'];
    
    $querry = "DELETE FROM comments WHERE comment_id = $comment_id ";
    
    $delete_querry = mysqli_query($connection, $querry);
    header("Location: comments.php");
}



?>
