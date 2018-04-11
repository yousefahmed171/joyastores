<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Edit-Home';

       include 'init.php';
?>       



        <section class="head-page-edit-home">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Edit Main Slider</h2>
                        </header>
                    </div>
                </div>
            </article>
        </section>

        <section class="container">
            <article id="slider-edit">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>You can Add / Delete Main SLider Pictures</caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <form action="edithome.php?do=imgsliderinsert" method="post" enctype="multipart/form-data">
                                    <!-- الصور بتكون صورة للعربي وصورة للانجليزي وكل واحدة منهم فيه منها نسخة للموبايل بس بتدخل على لينك واجد -->
                                    <th class="form-group">
                                        <label for="imageInput">PC English Image :</label>
                                        <input class="form-control" id="imageInput" type="file" name="pimg_en" required>
                                    </th>
                                    <th class="form-group">
                                        <label for="imageInput">PC Arabic Image :</label>
                                        <input class="form-control" id="imageInput" type="file" name="pimg_ar" required>
                                    </th>
                                    <th class="form-group">
                                        <label for="imageInput">MOB English Image :</label>
                                        <input class="form-control" id="imageInput" type="file" name="mimg_en" required>
                                    </th>
                                    <th class="form-group">
                                        <label for="imageInput">Mob Arabic Image :</label>
                                        <input class="form-control" id="imageInput" type="file" name="mimg_ar" required>
                                    </th>
                                    <th>
                                        <label for="imgNameInput">Name :</label>
                                        <input class="form-control" id="imgNameInput" type="text" name="nameslider" placeholder="Image Name" required>
                                    </th>
                                    <th>
                                        <label for="urlNameInput">URL :</label>
                                        <input class="form-control" id="urlNameInput" type="url" placeholder="URL" name="linkslider" required>
                                    </th>
                                    <th><input class="btn btn-success btn-block" type="submit" value="Upload"></th>
                                </form>
                            </tr>
                        </thead>
                                <?php 
                                    $stmt = $con->prepare("SELECT * FROM `main-slider`");
                                    $stmt->execute();
                                    $getinfo = $stmt->fetchAll();
                                    foreach($getinfo as $info) {
                                ?>
                        <tbody>
                            <tr>
                                

                                <td> <?php  static $m = 0; $m++; echo $m; ?> </td> 
                                <?php 
                                echo '<td>'; 
                                if(empty($info['pimg_en'])) {
                                    //echo "No Images";
                                    echo "<img src='uploades/home-scren/logo.png' alt='No Images' />";
                                } else {
                                    echo "<img src='uploades/home-scren/"  . $info['pimg_en'] . "' alt='' width='100px' />"; 
                                }
                                echo '</td>';
                                echo '<td>'; 
                                if(empty($info['pimg_ar'])) {
                                    //echo "No Images";
                                    echo "<img src='uploades/home-scren/logo.png' alt='No Images' />";
                                } else {
                                    echo "<img src='uploades/home-scren/"  . $info['pimg_ar'] . "' alt='' width='100px' />"; 
                                }
                                echo '</td>'; 
                                echo '<td>'; 
                                if(empty($info['mimg_en'])) {
                                    //echo "No Images";
                                    echo "<img src='uploades/home-scren/logo.png' alt='No Images' />";
                                } else {
                                    echo "<img src='uploades/home-scren/"  . $info['mimg_en'] . "' alt='' width='100px' />"; 
                                }
                                echo '</td>'; 
                                echo '<td>'; 
                                if(empty($info['mimg_ar'])) {
                                    //echo "No Images";
                                    echo "<img src='uploades/home-scren/logo.png' alt='No Images' />";
                                } else {
                                    echo "<img src='uploades/home-scren/"  . $info['mimg_ar'] . "' alt='' width='100px' />"; 
                                }
                                echo '</td>';  
                                ?>
                                <td><?php echo $info['nameslider'] ?></td>
                                <td><?php echo $info['linkslider'] ?></td>
                                
                                <td>
                                    <a href="edithome.php?do=imgsliderdelete&id=<?php echo $info["id"] ?>" type="button" class="btn btn-danger btn-block"  data-target=".del-categoty"><i class="fa fa-trash-o"></i></a>
                                </td>
                                <?php }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>


        <section class="head-page-edit-home-stikers">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Edit Stikers</h2>
                        </header>
                    </div>
                </div>
            </article>
        </section>
        <section class="container">
            <article id="stiker-edit">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>You can Add / Delete Stiker Pictures</caption>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <form action="edithome.php?do=insertstiker" method="post" enctype="multipart/form-data">
                                    <th>
                                        <label for="imageStikerInput">English Image :</label>
                                        <input class="form-control" id="imageStikerInput" type="file" name="img_en" required>
                                    </th>
                                    <th>
                                        <label for="imageStikerInput">Arabic Image :</label>
                                        <input class="form-control" id="imageStikerInput" type="file" name="img_ar" required>
                                    </th>
                                    <th>
                                        <label for="stikerNameInput">Name :</label>
                                        <input class="form-control" id="stikerNameInput" type="text" name="name" placeholder="Image Name" required>
                                    </th>
                                    <th>
                                        <label for="urlStikerInput">URL :</label>
                                        <input class="form-control" id="urlStikerInput" type="url" placeholder="URL" name="link" required>
                                    </th>
                                    <th>Select :<select class="form-control" name="select" required>
                                                    <option value="1">- Stiker One</option>
                                                    <option value="2">- Stiker Two</option>
                                                    <option value="3">- Stiker Three</option>
                                                    <option value="4">- Stiker Four</option>
                                                </select>
                                    </th>
                                    <th><input type="submit" class="btn btn-success btn-block" value="add"></th>
                                </form>
                            </tr>
                        </thead>
                        <?php 
                                    $stmt = $con->prepare("SELECT * FROM `stikers`");
                                    $stmt->execute();
                                    $getstikers = $stmt->fetchAll();
                                    foreach($getstikers as $stikers) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?php static $sti = 1; echo $sti++;  ?></td>
                                
                                <?php 
                                echo '<td>'; 
                                if(empty($info['mimg_ar'])) {
                                    //echo "No Images";
                                    echo "<img src='uploades/home-scren/logo.png' alt='No Images' />";
                                } else {
                                    echo "<img src='uploades/home-scren/"  . $stikers['img_en'] . "' alt='' width='100px' />"; 
                                }
                                echo '</td>';
                                echo '<td>'; 
                                if(empty($info['mimg_ar'])) {
                                    //echo "No Images";
                                    echo "<img src='uploades/home-scren/logo.png' alt='No Images' />";
                                } else {
                                    echo "<img src='uploades/home-scren/"  . $stikers['img_ar'] . "' alt='' width='100px' />"; 
                                }
                                echo '</td>';
                                ?>
                                <td><?php echo $stikers['name'] ?></td>
                                <td><?php echo $stikers['link'] ?></td>
                                <td>
                                    <?php 
                                        if($stikers['type'] == 1){
                                            echo 'Stiker One ';
                                        } elseif($stikers['type'] == 2){
                                            echo 'Stiker Tow';
                                        }elseif($stikers['type'] == 3){
                                            echo 'Stiker Three';
                                        }elseif($stikers['type'] == 4){
                                            echo 'Stiker Four';
                                        }
                                    ?>
                                </td>
                                <td>
                                <a href="edithome.php?do=stikerdelete&idstiker=<?php echo $stikers["id"] ?>" type="button" class="btn btn-danger btn-block"  data-target=".del-categoty"><i class="fa fa-trash-o"></i></a>
                                </td>
                                    <?php  } ?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>

        <section class="head-page-edit-home-stikers">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Edit Main Info</h2>
                        </header>
                    </div>
                </div>
            </article>
        </section>
        <section class="container">
            <article id="stiker-edit">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>You can Add / Delete Socila Button</caption> 
         
                        <thead>
                            <tr>
                                <th>ID</th>
                                <form action="edithome.php?do=insertinfo" method="post" >
                                    <th>
                                        <label for="urlSocialInput">URL :</label>
                                        <input class="form-control" id="urlSocialInput" name="link" type="url" placeholder="URL" required>
                                    </th>
                                    <th>Select :<select class="form-control" name="web" required>
                                                    <option value="facebook">- Facebook</option>
                                                    <option value="twitter">- Twitter</option>
                                                    <option value="instagram">- Instagram</option>
                                                    <option value="youtube">- Youtube</option>
                                                </select>
                                    </th>
                                    <th><input type="submit" class="btn btn-success btn-block" value="add"></th>
                                </form>
                            </tr>
                        </thead>
                        <?php 
                                    $stmt = $con->prepare("SELECT * FROM `contact`");
                                    $stmt->execute();
                                    $getcontacts = $stmt->fetchAll();
                                    foreach($getcontacts as $contact) {
                        ?>
                        <tbody>
                            <tr>
                                <td><?php static $content = 1; echo $content++; ?></td>
                                <td><?php if(!empty($contact['link'])) { echo $contact['link']; } ?></td>
                                <td><?php if(!empty($contact['web']))  { echo $contact['web']; } ?></td>
                                <td>
                                <a href="edithome.php?do=deleteinfo&idcontact=<?php echo $contact["id_contact"] ?>" type="button" class="btn btn-danger btn-block"  data-target=".del-categoty"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                           <?php }?>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>You can Add / Delete Phone &amp; E-mail</caption>
                        <?php 
                                    $stmt = $con->prepare("SELECT * FROM `server`");
                                    $stmt->execute();
                                    $getserver = $stmt->fetch();
                                    
                        ?>
                        <tbody>
                            <tr>
                                <form action="edithome.php?do=updatephone" method="post">
                                    <td>
                                        <label for="phoneInput">Phone :</label>
                                        <input class="form-control" id="phoneInput" type="tel" placeholder="Phone Number" name="phone" value="<?php echo $getserver['phone']; ?>" required>
                                    </td>
                                    <td style="vertical-align:middle;"><?php echo $getserver['phone']; ?></td>
                                    <td>
                                         <input type="submit" class="btn btn-warning btn-block" value="Update" />
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <form action="edithome.php?do=updateemail" method="post">
                                    <td>
                                        <label for="emailInput">E-mail :</label>
                                        <input class="form-control" id="emailInput" type="mail" placeholder="E-mail" name="email" value="<?php echo $getserver['email_server']; ?>" required>
                                    </td>
                                    <td style="vertical-align:middle;"><?php echo $getserver['email_server']; ?></td>
                                    <td>
                                        <input type="submit" class="btn btn-warning btn-block" value="Update" />
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>


        <section class="head-page-edit-home-stikers">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Edit Home Page Thumbanils</h2>
                        </header>
                    </div>
                </div>
            </article>
        </section>
        <section class="container">
            <article id="stiker-edit">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Add / Remove Tabs</caption>
                        <thead>
                            <tr>
                                <form>
                                  <th>Select Species :<select class="form-control" required>
                                                          <option disabled>- None</option>
                                                          <option>- Men</option>
                                                          <option>- Women</option>
                                                          <option>- Kids</option>
                                                      </select>
                                  </th>
                                    <th>Select Category :<select class="form-control" required>
                                                            <option disabled>- None</option>
                                                            <option>- Jeans</option>
                                                            <option>- T-shirts</option>
                                                            <option>- Shirts</option>
                                                          </select>
                                    </th>
                                    <th><button class="btn btn-success btn-block">Add Tab</button></th>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Men</td>
                                <td>Jeans</td>
                                <td><button class="btn btn-danger btn-block" data-toggle="modal" data-target=".del-categoty">Remove Tab</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Add Products To Tabs</caption>
                        <thead>
                            <tr>
                                <form>
                                  <th>Select Species :<select class="form-control" required>
                                                          <option disabled>- None</option>
                                                          <option>- Men</option>
                                                          <option>- Women</option>
                                                          <option>- Kids</option>
                                                      </select>
                                  </th>
                                    <th>Select Category :<select class="form-control" required>
                                                            <option disabled>- None</option>
                                                            <option>- Jeans</option>
                                                            <option>- T-shirts</option>
                                                            <option>- Shirts</option>
                                                          </select>
                                    </th>
                                    <th><button class="btn btn-default btn-block">Search</button></th>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan='3'>
                              <form>
                                  <div class="form-group">
                                      <div class="input-group">
                                          <input type="search" class="form-control input-lg" placeholder="Search Products">
                                          <a class="btn btn-lg btn-default input-group-addon"><i class="material-icons">search</i></a>
                                      </div>
                                  </div>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <td>ID Number Here</td>
                            <td>Brand Name Here</td>
                            <td>Product Name Here</td>
                            <td><img src='img/product-1.jpg' width='100px'/></td>
                            <td><button class="btn btn-success btn-block">Add To Tab</button></td>
                          <tr>
                        </tbody>
                    </table>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Remove Products From Tabs</caption>
                        <tbody>
                          <tr>
                            <td colspan='3'>
                              <form>
                                  <div class="form-group">
                                      <div class="input-group">
                                          <input type="search" class="form-control input-lg" placeholder="Search Products">
                                          <a class="btn btn-lg btn-default input-group-addon"><i class="material-icons">search</i></a>
                                      </div>
                                  </div>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <td>ID Number Here</td>
                            <td>Brand Name Here</td>
                            <td>Product Name Here</td>
                            <td><img src='img/product-1.jpg' width='100px'/></td>
                            <td><button class="btn btn-danger btn-block" data-toggle="modal" data-target=".del-categoty">Remove From Tab</button></td>
                          <tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>


        <section class="head-page-edit-home-stikers">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-list-alt"></i>&nbsp;&nbsp;Edit Hot Deals Section</h2>
                        </header>
                    </div>
                </div>
            </article>
        </section>
        <section class="container">
            <article id="stiker-edit">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Add Products To Hot Deals</caption>
                        <thead>
                            <tr>
                                <form action="edit-home.php?action=search" method="post">
                                  <th colspan='4'>Select Species :
                                    <select class="form-control" required>
                                        <?php 
                                                $stmt = $con->prepare("SELECT * FROM species");
                                                $stmt->execute();
                                                $getspecies = $stmt->fetchAll();
                                                foreach ($getspecies as $specie) {
                                                    echo '<option name="specie" value="'.$specie['name_en'].'">'.$specie['name_en'].'</option>';
                                                }
                                    echo '</select>';
                                    ?>
                                  </th>
                                    <th colspan='4'><button name="submit" type="submit" class="btn btn-default btn-block">Search</button></th>
                                </form>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td colspan='8'>
                              <form method="post">
                                  <div class="form-group">
                                      <div class="input-group">
                                            <input type="search" name="search" class="form-control input-lg" placeholder="Search Users">
                                            <button name="submit" class="btn btn-lg btn-default "><i class="fa fa-search"></i></button>
                                      </div>
                                  </div>
                              </form>
                            </td>
                          </tr>
                        <?php 
                        if(isset($_POST['submit'])) {

                        $search     = $_POST['search'];

                        if(empty($search)){

                        echo '<button class="btn-block alert alert-warning"> Plase Search Here</button>';

                        } else {

                            $stmt = $con->prepare("SELECT * FROM  product WHERE pro_name LIKE '$search%' ");
                            $stmt->execute(array($search));
                            $allSearch = $stmt->fetchAll();
                            $row = $stmt->rowCount();
                            if($row > 1) {
                                echo '<caption>Search Result</caption>';
                                echo'<thead>
                                    <tr>
                                        <th>ID Number Here</th>
                                        <th>Product Name Here</th>
                                        <th>ID Product </th>
                                        <th>Discount Value : 10% </th>
                                        <th>Price Before : 100EGP</th>
                                        <th>Price After : 90 EGP</th>
                                        <th>images</th>
                                        <th>Add To Tab</th>
                                    </tr>
                                </thead>';
                                foreach($allSearch as $fatchsearch ) { 
                                    echo '<tbody>';
                                    echo '<tr>';
                                        echo '<td>'; static $s = 1 ;  echo $s++;  echo '</td>';
                                        echo '<td>'.$fatchsearch['pro_name'].'</td>';
                                        echo '<td>'.$fatchsearch['pro_id'].'</td>';
                                        echo '<td>'.$fatchsearch['pro_price'].'</td>';
                                        echo '<td>'.$fatchsearch['pro_after_sale'].'</td>';
                                        echo '<td>'.$fatchsearch['pro_sale'].'</td>';
                                        echo "<td><img src='uploades/img-product/"  . $fatchsearch['pro_img'] . "' alt='' width='100px' /></td>"; 
                                        echo '<td><button class="btn btn-success btn-block">Add To Tab</button></td>';


                                    echo '</tr>';
                                    echo '</tbody>';
                                }
                            } else {
                                    echo '<tr>';
                                        echo '<td colspan="5"><p>Sorry No users To least</p></td>';
                                    echo '</tr>';
                            }

                        }
                    }
                    ?>

                    </table>
                </div>
                <?php 
                    // if(isset($_POST['submit'])) {
   
                    // }
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Remove Products From Tabs</caption>
                        <tbody>
                          <tr>
                            <td colspan='5'>
                              <form>
                                  <div class="form-group">
                                      <div class="input-group">
                                          <input type="search" class="form-control input-lg" placeholder="Search Products">
                                          <a class="btn btn-lg btn-default input-group-addon"><i class="material-icons">search</i></a>
                                      </div>
                                  </div>
                              </form>
                            </td>
                          </tr>
                          <tr>
                            <td>ID Number Here</td>
                            <td>Brand Name Here</td>
                            <td>Product Name Here</td>
                            <td><img src='img/product-1.jpg' width='100px'/></td>
                            <td><button class="btn btn-danger btn-block" data-toggle="modal" data-target=".del-categoty">Remove From Tab</button></td>
                          <tr>
                        </tbody>
                    </table>
                </div>
            </article>
        </section>



        <div class="modal fade del-categoty" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>

                    <div class="modal-body">
                        <h5>Are you want delete this ?</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
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