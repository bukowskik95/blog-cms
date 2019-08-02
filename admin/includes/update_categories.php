                        <form action="" method = "post">
                            <div class="form-group">
                                <label for="cat-title">Edit category</label>
                                
                                    <?php
                                        if(isset($_GET['edit']))
                                            {
                                                $cat_id = $_GET['edit'];
                                                $query = "select * FROM categories WHERE cat_id = $cat_id ";
                                                $select_cat = mysqli_query($connection, $query);   
                            
                                                while($row = mysqli_fetch_assoc($select_cat))
                                                    {
                                                        $cat_id = $row['cat_id'];
                                                        $cat_title = $row['cat_title'];
                                                    
                                                        
                                    ?>
                                                        <input value = "<?php if(isset($cat_title)){echo $cat_title;}?>" class="form-control" type="text" name="cat_title">   
        
                                    <?php                      
                                                        
                                                    }
                                            }
                                            
                                        if(isset($_POST['update_cat']))
                                            {
                                                $the_cat_title = $_POST['cat_title'];
                                                $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id}";
                                                $update = mysqli_query($connection, $query) ;
                                                if(!$update){
                                                    die("QUERY FAILED" . mysqli_error($connection));
                                                    
                                                }
                                                header("Location: categories.php");
                                            
                                            }
                                    ?>  

                                
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_cat" value="Update Category">
                            </div>
                            
                        </form>