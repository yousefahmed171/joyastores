<?php
   
    ob_start();
 
    session_start();

    if(isset($_SESSION['username'])) {

    $title = 'Joya - Dashbord';

    include 'init.php';

?>  

        <!-- Start Accessability ################################################ -->
        <section class="head-page-edit-pro">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-pencil"></i>&nbsp;&nbsp;Accessability</h2>
                        </header>
                    </div>
                </div>
            </article>
        </section>

        <section class="container">
            <article class="search-result">
                <section class="search-res">

                    <button class="btn btn-danger" data-toggle="modal" data-target=".site-close" value="Close">Close</button>
                    <button class="btn btn-success" data-toggle="modal" data-target=".open-site" value="Open">Open</button>

                </section>
            </article>
        </section>
        <!-- End Accessability ################################################ -->

        <!-- Start Permissions ################################################ -->
        <section class="head-page-edit-pro">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-pencil"></i>&nbsp;&nbsp;Admin Permissions</h2>
                        </header>
                    </div>
                </div>
            </article>
        </section>
        <section class="container">
            <article class="search-result">
                <section class="search-pro">
                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" name="search" class="form-control input-lg" placeholder="Search Users">
                                <button name="submit" class="btn btn-lg btn-default "><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </section>
                <section class="search-res">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            

                <?php
                    if(isset($_POST['submit'])) {

                        $search     = $_POST['search'];

                        if(empty($search)){

                        echo '<button class="btn-block alert alert-warning"> Plase Search Here</button>';

                        } else {

                            $stmt = $con->prepare("SELECT * FROM  users WHERE username LIKE '%$search%' ");
                            $stmt->execute(array($search));
                            $allSearch = $stmt->fetchAll();
                            $row = $stmt->rowCount();
                            if($row > 1) {
                                echo '<caption>Search Result</caption>';
                                echo'<thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>User Name</th>
                                        <th>E-Mail</th>
                                        <th>Make Admin</th>
                                    </tr>
                                </thead>';
                                foreach($allSearch as $fatchsearch ) { 
                                    echo '<tbody>';
                                    echo '<tr>';
                                        echo '<td>'; static $s = 1 ;  echo $s++;  echo '</td>';
                                        echo '<td>'.$fatchsearch['username'].'</td>';
                                        echo '<td>'.$fatchsearch['email'].'</td>';

                                        if($fatchsearch['groupid'] == 1 ) {
                                            echo '<td><button  class="btn btn-success disabled btn-block"> Admin</button></td>';
                                        } else {
                                            echo '<form action="settings.php?action=make" method="post">';
                                            
                                            echo '<input type="hidden" name="admin" class="btn btn-info btn-block" value="'.$fatchsearch['userid'].'" >';    
                                            echo '<td><input type="submit" name="submit" class="btn btn-info btn-block" value="Make Admin" ></td>';    
                                            echo '</form>';
                                        }
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

                        if(isset($_GET['action']) == 'make') {

                            $admin  = $_POST['admin'];

                            $stmt = $con->prepare("UPDATE users SET `groupid` = 1 WHERE userid = ?");

                            $stmt->execute(array($admin));

                            echo  "<div class='alert alert-success'>" .  $stmt->rowCount() . 'Record Update </div>'  ;
                            header('Location: ' . $_SERVER["HTTP_REFERER"] );
                            
    
                        }

                ?>

                        </table>
                    </div>
                </section>
                
                <section class="search-res">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <caption>Current Admins</caption>
                            <thead>
                                <tr>
                                    <th>Namber</th>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>E-Mail</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                                <?php

                                    $stmt = $con->prepare("SELECT * FROM  users WHERE groupid = 1 ");
                                    $stmt->execute();
                                    $getadmin = $stmt->fetchAll();

                                    if(false !== $getadmin) {
                                        foreach($getadmin as $admin ) { 
                                            echo '<tbody>';
                                            echo '<tr>';
                                                echo '<td>'; static $s = 1 ;  echo $s++;  echo '</td>';
                                                echo '<td>'.$admin['userid'].'</td>';
                                                echo '<td>'.$admin['username'].'</td>';
                                                echo '<td>'.$admin['email'].'</td>';
                                                echo '<form action="settings.php?action=delete" method="post">';
                                                    echo '<input type="hidden" name="delete"  value="'.$admin['userid'].'" >';    
                                                    echo '<td><input type="submit" name="submit" class="btn btn-danger btn-block" value="Delete" ></td>';    
                                                echo '</form>';

                                            echo '</tr>';
                                            echo '</tbody>';
                                        }
                                    } else {
                                        echo '<tr>';
                                            echo '<td colspan="5"><p>Sorry No users To least</p></td>';
                                        echo '</tr>';
                                    }

                                    if(isset($_GET['action']) == 'delete') {
                                        $delete  = $_POST['delete'];
                                        $stmt = $con->prepare("UPDATE users SET `groupid` = 0 WHERE userid = ?");
                                        $stmt->execute(array($delete));
                                        header('Location: ' . $_SERVER["HTTP_REFERER"]  );
                                    }

                                ?>
                        </table>
                    </div>
                </section>
            </article>
        </section>
        <!-- End Permissions ######################################################################## -->

        <!-- Start Show Products #################################################################### -->
        <section class="head-page-edit-pro">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-pencil"></i>&nbsp;&nbsp;Show Products</h2>
                        </header>
                    </div>
                </div>
            </article>
        </section>
        <section class="container">
            <article class="search-result">
                <div class="form-group">
                <label for="BrandSel">Brand :</label>
                <select class="form-control" id="BrandSel">
                    <option disabled selected>- Select Brand</option>
                    <option>- Alerro</option>
                    <option>- Valmosa</option>
                    <option>- Monte-Blue</option>
                </select>
                </div>
                <div class="form-group">
                <label for="SpeciesSel">Select Species :</label>
                <select class="form-control" id="SpeciesSel">
                    <option disabled selected>- Select Species</option>
                    <option>- Men</option>
                    <option>- Women</option>
                    <option>- Kids</option>
                </select>
                </div>
                <div class="form-group">
                <label for="SelCategory">Select Category :</label>
                <select class="form-control" id="SelCategory">
                    <option disabled selected>- Select Category</option>
                    <option>- T-shirts</option>
                    <option>- Pajamas</option>
                    <option>- Shirts</option>
                </select>
                </div>
                <button class="btn btn-success center-block">Search</button>
                <section class="search-res">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <caption>Search Result</caption>
                            <thead>
                                <tr>
                                    <th>Select</th>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>1</td>
                                    <td>874</td>
                                    <td>T-Shirt For Girls</td>
                                    <td>Yellow</td>
                                    <td>150 EGP</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>2</td>
                                    <td>975</td>
                                    <td>T-SHirt For Boys</td>
                                    <td>Green</td>
                                    <td>100 EGP</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>3</td>
                                    <td>855</td>
                                    <td>T-SHirt For Men</td>
                                    <td>Black</td>
                                    <td>180 EGP</td>
                                </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-info">Select All</button>
                        <button class="btn btn-success btn-default">Show</button>
                    </div>
                </section>
            </article>
        </section>
        <!-- Start Show Products #################################################################### -->




        <!-- Start Close Site ####################################################################### -->
        <div class="modal fade site-close" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Close Site</h4>
                    </div>

                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="HTMLCode">HTML Code :</label>
                                <textarea type="text" class="form-control" id="HTMLCode" placeholder="HTML Code" required></textarea>
                            </div>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal"><i class="fa fa-check-circle-o"></i> Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade open-site" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>

                    <div class="modal-body">
                        <h5>Are you want Open the Website ?</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Close Site ################################################ -->

        <!-- Start Add / Delete Admin ################################################ -->
        <div class="modal fade add-admin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>

                    <div class="modal-body">
                        <h5>Are you want to make him Admin ?</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade del-admin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>

                    <div class="modal-body">
                        <h5>Are you want to delete this admin ?</h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Add / Delete Admin ################################################ -->

       
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