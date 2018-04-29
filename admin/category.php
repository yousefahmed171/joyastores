<?php
   
   ob_start();
    
   session_start();

  

   if(isset($_SESSION['username'])){

       $title = 'Joya - Add-Category';

       include 'init.php';
       
 /*      $stmt = $con->prepare("SELECT * FROM categories  ");

         // execute the stamtent

       $stmt->execute();

       // assign to variable 

       $rows = $stmt->fetchALL(); */

   
?>
 
        <!-- Add Spices Start ########################################################################################## -->
        
        
        <section class="head-page">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Add Species</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
        
        <section class="container">
            <article id="cate-add">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>You can Add / Delete Species  </caption>
                        <thead>
                            <tr>
                                <form action="add-species.php?do=insert" method="post">
                                <th>ID</th>
                                <th>English Name :<input name="name_en" class="form-control inp-dis" type="text" placeholder="English Name" required></th>
                                <th>Arabic Name : <input name="name_ar" class="form-control" type="text" placeholder="Arabic Name" required></th>
                                <th colspan="2"><input class="btn btn-success btn-block"type="submit" value="Add"/></th>
                                </form>
             
                            </tr>
                        </thead>
                        <?php
                        $allRows = getAllFrom("*", "species", "", "", "id_species", "ASC");
                        foreach($allRows as $row){
                         echo '<tbody>';
                           echo '<tr>'; ?>
                            <td>  <?php static $s = 1 ; echo $s++;  ?>  </td>
 <?php                       
                              echo'  <td> ' . $row['name_en'] . '</td>';
                              echo'  <td> ' . $row['name_ar'] . '</td>';
                            ?>
                               <td><a href="add-species.php?do=edit&id=<?php echo $row["id_species"]; ?>"     class="btn btn-warning"  ><i class="fa fa-pencil"></i></a></td>
                               <td><a href="add-species.php?do=delete&id=<?php echo $row["id_species"]; ?>"   class="btn btn-danger" ><i class="fa fa-trash-o"></i></a></td>
                             
                       <?php }?>
                             
                                   
                                </td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </article>
        </section>
        
                <!-- Add Spices End -->

        
        <!-- Add Category Start -->
        <section class="head-page">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Add Category</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
        
        <section class="container">
            <article id="cate-add">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>You can Add / Delete Categories  </caption>
                        <thead>
                            <tr>
                                <form action="add-category.php?do=insert" method="post">
                                <th>ID</th>
                                <th>English Name : <input name="name_en" class="form-control" type="text" placeholder="English Name" required></th>
                                <th>Arabic Name : <input name="name_ar" class="form-control" type="text" placeholder="Arabic Name" required></th>
                                <th>Details : <input name="description" class="form-control" type="text" placeholder="Details" required></th>
                                <th>Select :<select name="species" class="form-control" required>
                                                <option value="0"> select species </option>
                                                 <?php
                                                   $allSection = getAllFrom("*", " species", "" ,"", "id_species");

                                                   foreach($allSection as $section){
                                                   echo '<option value=" '.$section['id_species'] . '">' . $section['name_en'] .'</option>';
                                                   }
                                                   
                                                  ?>
                                          
                                            </select> 
                                </th>  
                                <th><input type="submit" name="add" class="btn btn-success btn-block" value="add"></th>
                                </form>
                            </tr>
                        </thead>
                        
                            
                                <?php
                                 $stmt = $con->prepare("SELECT `category`.*,`species`.`name_en` AS name_cat
                                                        FROM `category` 
                                                        INNER JOIN `species` 
                                                        ON `species`.`id_species` = `category`.`idspecies` ");
                                 $stmt->execute();
                                 $cats = $stmt->fetchAll();
                                foreach($cats as $cat){
                                    echo "<tbody>";
                                    echo "<tr>";
                                    echo "<td>"; static $c = 1 ; echo $c++;  echo "</td>";
                                    echo "<td>".$cat['name_en']."</td>";
                                    echo "<td>".$cat['name_ar']."</td>";
                                    echo "<td>".$cat['description']."</td>"; 
                                    echo "<td>".$cat['name_cat']."</td>";
                                      //$childCats = getAllFrom("*", "categories", "WHERE parent = {$cat['id_cat']}", "", "id_cat");
//                                      foreach($childCats as $child){ var_dump($child['name_en']); }
//                                      echo "<td>"; 
//                                           echo $cat['parent'] ;  
//                                      echo "</td>"; 
                                      
                                    echo " <td>
                                    <!--<a href='add-category.php?do=edit&id=" . $cat['id_cat'] ." ' class='btn btn-warning'><i class='i-btn fa fa-pencil'></i> </a>-->
                                    <a href='add-category.php?do=delete&catid=" . $cat['id_cat'] ." ' class='btn btn-danger'><i class='i-btn fa fa-trash-o'></i> </a>
                                    </td> ";
                                    echo "</tr>";
                                    echo "</tbody>";
                                }?>
                    </table>
                </div>
            </article>
        </section>
        
        <!-- Add Category End ############################################################################################ -->

              <!--<button type="button" class="btn btn-warning" data-toggle="modal" data-target=".edit-categoty"><i class="fa fa-pencil"></i></button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".del-categoty"><i class="fa fa-trash-o"></i></button>-->
        <!-- Add Brand Start #############################################################################################-->
        <!-- تم اضافة عمودين لل information لكل براند عربي وانجليزي ودي مكان ال information اللي موجودة في ال add product -->
        <div id="add-brand"></div>
        <section class="head-page">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Add Brand</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
        
        <section class="container">
            <article id="cate-add">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover img-size">
                        <caption>You can Add / Delete Brands  </caption>
                        <thead>
                            <tr>
                             <form action="add-brand.php?do=insert" method="post" enctype="multipart/form-data">
                                <th>ID</th>
                                <th>English Name : <input name="name_en" class="form-control" type="text" placeholder="English Name" required></th>
                                <th>Arabic Name : <input  name="name_ar" class="form-control" type="text" placeholder="Arabic Name" required></th>
                                <th>English Information : <textarea name="info_en" class="form-control" type="text" placeholder="English Information" required></textarea></th>
                                <th>Arabic Information : <textarea  name="info_ar" class="form-control" type="text" placeholder="Arabic Information" required></textarea></th>
                                <th>Logo Pic : <input  name="logo_img" class="form-control" type="file" placeholder="Details" required ></th>
                                <th>Guide Pic : <input name="guide_img" class="form-control" type="file" placeholder="Details" required ></th>
                                <th><input class="btn btn-success btn-block " type="submit" Value="Add"></th>
                              </form>
                            </tr>
                        </thead>
                     
                               <?php 
                               $allBrands =  getAllFrom("*", "brands", "" , "", "id_brand");
                                foreach($allBrands as $brand) {
                                    echo '<tbody>';  
                                    echo '<tr>';     
                                    echo '<td>'; static $b = 1; echo $b++; echo'</td>';
                                    echo '<td>'.$brand['name_en'].'</td>';
                                    echo '<td>'.$brand['name_ar'].'</td>';
                                    echo '<td>'.$brand['info_en'].'</td>';
                                    echo '<td>'.$brand['info_ar'].'</td>';
                                    echo '<td>';
                                                if(empty($brand['logo_img'])){
                                                   echo "<img src='uploades/img/1.png' alt='No Images' />";
                                                } else {
                                                   echo "<img src='uploades/img/" . $brand['logo_img'] . "' alt='".$brand['name_en']."' />"; 
                                                }
                                    echo '</td>';
                                    echo '<td>';
                                                if(empty($brand['guide_img'])){
                                                   echo '<img src="uploades/img/1.png" alt="No Images" />' ;
                                                } else {
                                                    echo "<img src='uploades/img/" . $brand['guide_img'] . "' alt='".$brand['guide_img']."' />"; 
                                                }
                                    echo '</td>';
                                  
                                   echo " <td>
                                    <a href='add-brand.php?do=edit&id_brand=" . $brand['id_brand'] ." ' class='btn btn-warning'><i class='i-btn fa fa-pencil'></i> </a>
                                    <a href='add-brand.php?do=delete&id_brand=" . $brand['id_brand'] ." ' class='btn btn-danger confirm'><i class='i-btn fa fa-trash-o'></i> </a>
                                    </td> ";
                                ?>
                 <!--               <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".edit-brand">
                                        
                                        <a href="category.php?id_brand=<?php /*echo $brand['id_brand']*/?> "><i class="fa fa-pencil"></i></a> 
                                    </button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".del-brand">
                                        <i class="fa fa-trash-o"></i>
                                        <a href='items.php?do=delete&itemid=" . $item['itemid'] ." ' class=' confirm '> </a>
                                    </button>
                                </td>-->
                            </tr>
                         </tbody> 
                       <?php  }?>
                    </table>
                </div>
            </article>
        </section>
        
        <!-- Add Brand End ########################################################################################### -->

        <!-- Start Modals ############################################################################################ -->
        
        <!-- Species Edit Start ###################################################################################### -->
        <div class="modal fade edit-species" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Species</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="enName">English Name</label>
                                <input class="form-control" type="text" id="enName" placeholder="English Name" required>
                            </div>
                            <div class="form-group">
                                <label for="arName">Arabic Name</label>
                                <input type="text" class="form-control" id="arName" placeholder="Arabic Name" required>
                            </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal"><i class="fa fa-check-circle-o"></i> Update</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade del-spieces" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you want delete this Species ?</h5>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit spieces End ######################################################################################## -->
        
        <!-- Edit Category Start ##################################################################################### -->
        
        <div class="modal fade edit-categoty" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Category</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="enName">English Name</label>
                                <input type="text" class="form-control" id="enName" placeholder="English Name" required>
                            </div>
                            <div class="form-group">
                                <label for="arName">Arabic Name</label>
                                <input type="text" class="form-control" id="arName" placeholder="Arabic Name" required>
                            </div>
                            <div class="form-group">
                                <label for="cateDetails">Details</label>
                                <input type="text" class="form-control" id="cateDetails" placeholder="Details" required>
                            </div>
                            <div class="form-group">
                                <label>Select Main Category</label>
                                <select class="form-control" required>
                                    <option>- Men</option>
                                    <option>- Women</option>
                                    <option>- Teens Boys (9-16)</option>
                                    <option>- Kids Boys (3-8)</option>
                                    <option>- Baby Boys (0-2)</option>
                                    <option>- Teens Girls (9-16)</option>
                                    <option>- Kids Girls (3-8)</option>
                                    <option>- Baby Girls (0-2)</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal"><i class="fa fa-check-circle-o"></i> Update</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade del-categoty" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you want delete this category ?</h5>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Category End -->
        
        
        <!-- Edit Brands Start  -->
        
      <div class="modal fade edit-brand" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Brand</h4>
                    </div>
                    <?php 
                       $id = $_GET['id'];
                       
                       //$id_brand = isset($_GET['id_brand']) && is_numeric($_GET['id_brand']) ? intval($_GET["id_brand"]) : 0;
       
                        $stmt = $con->prepare("SELECT * FROM brands WHERE id_brand = ? LIMIT 1 ");  
         
                         // Execute Query 
                        $stmt->execute(array($id));
 
                         //Fatch The data 
                        $row = $stmt->fetch();
                        
                        //The row Count 
                      // $count = $stmt->rowCount();
                    //if ($count > 1 ) { 
                    ?>

                    <div class="modal-body">
                        <form action="add-brand.php?do=update" method="post" enctype="multipart/form-data"> 
                             heding input 
                            <input type="text" name="id_brand" value="<?php echo $id_brand ?>" />
                            <div class="form-group">
                                English Name : <input name="name_en"class="form-control" type="text" placeholder="English Name" value="<?php echo $row['name_en']?>" required>
                            </div>
                            <div class="form-group">
                                Arabic Name : <input name="name_ar" class="form-control" type="text" placeholder="Arabic Name" value="<?php echo $row['name_ar'] ?>" /> required>
                            </div>
                            <div class="form-group">
                                English Information : <textarea name="info_en"class="form-control" type="text" placeholder="English Information" required value="<?php echo $brand['info_en']; ?>" ></textarea>
                            </div>
                            <div class="form-group">
                                Arabic Information : <textarea  name="info_ar"class="form-control" type="text" placeholder="Arabic Information" required value="<?php echo $brand['info_ar'] ?>" ></textarea>
                            </div>
                            <div class="form-group">
                                Logo Pic : <input name="logo_img" class="form-control" type="file" placeholder="Logo Pic" required>
                            </div>
                            <div class="form-group">
                                Guide Pic : <input name="guide_img" class="form-control" type="file" placeholder="Guide Pic" required>
                            </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-warning btn-block" data-dismiss="modal" value="Update" /><i class="fa fa-check-circle-o"></i> 
                    </div>
                </div>
            </div>
        </div>

        <?php //} else {

                   // } ?>
        <div class="modal fade del-brand" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you want delete this Brand ?</h5>
                    </div>
<?php
       include $tpl . 'footer.php';
        
       
    }
    else
    {
         header ('Location: index.php');
        
        exit();
    }

  ob_end_flush();
?>
            
            
            