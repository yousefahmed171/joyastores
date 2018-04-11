<?php
   
    ob_start();
        
    session_start();

if(isset($_SESSION['username'])) {

    $title = 'Joya - Add-Category';

    include 'init.php';

    $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

    // If The Page Is Main Page 
    if ($do == 'manage') {  //form + code 
        
        echo "<div class='container' >" ;

        $theMsg = ' <br><div class="alert alert-danger"> can\'t such manage here </div>';

        redirectHome($theMsg,'',0.50);

        echo "</div>";
        
    } elseif ($do == 'add') { //form
        
        echo "<div class='container' >" ;

        $theMsg = ' <br><div class="alert alert-danger"> can\'t such add here </div>';

        redirectHome($theMsg,'',0.50);

        echo "</div>";
        
    } elseif ($do == 'insert') { //code
        
        $stmt2 = $con->prepare("SELECT COUNT('id_cat')  FROM category");

        $stmt2->execute();

        $row = $stmt2->fetchColumn();

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $naen      = $_POST['name_en'];
        $naar      = $_POST['name_ar'];
        $desc      = $_POST['description'];
        $species   = $_POST['species'];
        
            
        if($row <= 50 ){
            $stmt = $con->prepare("INSERT INTO category(`name_en`,`name_ar`, `description`, `idspecies`, `dataed`)
                                            VALUES(:znan, :znar, :zdesc, :zspecies, now() )");           

            $stmt->execute(array(
            'znan'        => $naen,
            'znar'        => $naar,
            'zdesc'       => $desc,
            'zspecies'    => $species
            ));
            
            echo '<div class="container">';
            $theMsg = "<div class='alert alert-success'>  success insert species  </div>";
            redirectPage($theMsg,'category.php' , 1 );
            echo '</div>';
            
            } else {
            
                echo '<div class="container">';
                $theMsg = "<div class='alert alert-danger'>  You Shold delete or edit Species  </div>";
                redirecthome($theMsg,'category.php' , 1 );
                echo '</div>';
            
            }  
            
        }
    } elseif ($do == 'edit'){ //form 
        
        //Check If Get Request userid Is Numeric & Get The Integer Value of It 
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET["id"]) : 0;
            
        //Select All Data Depend On This ID
        $stmt = $con->prepare("SELECT * FROM category WHERE `id_cat` = ?  ");  
            
        // Execute Query 
        $stmt->execute(array($id));
            
        //Fatch The data 
        $row = $stmt->fetch();
        
        //The row Count 
        $count = $stmt->rowCount();  
        
        // If There is such id show the form  
        if($count > 0 ) { // Page EDIT Member

    ?>
        
        <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> Edit Category</h2>
                        </header>    
                    </div>
                </div>
                </br>
            </article>
        </section>

        <div class="container">
            <thead>
                <tr>
                    <form action="?do=updeat" method="post">
                    <input name="id"  type="hidden" value="<?php echo $id ?>" >
                    <th>English Name : <input name="name_en" class="form-control" type="text" placeholder="English Name" value="<?php echo $row['name_en'] ?>" required></th>
                    <th>Arabic Name : <input name="name_ar" class="form-control" type="text" placeholder="Arabic Name" value="<?php echo $row['name_ar'] ?>" required></th>
                    <th>Details : <input name="description" class="form-control" type="text" placeholder="Details" value="<?php echo $row['description'] ?>"  required></th>
                    <th>Select :
                        <select name="species" class="form-control"  required>
                            <option value="0"> species </option>
                                <?php
                                $stmt = $con->prepare("SELECT * FROM category");
                                $stmt->execute();
                                $catid = $stmt->fetchAll();
                
                                $stmt = $con->prepare("SELECT * FROM species");
                                $stmt->execute();
                                $sections = $stmt->fetchAll();
                                foreach($sections as $section){
                                echo '<option value=" '.$section['id_species'] . ' "  '; 
                                if ($catid['id_cat'] == $section['id_species'] ) { echo 'selected'; }  
                                echo ' >' . $section['name_en'] .'</option>';
                                }
                                ?>
                        </select> 
                    </th>  
                    <th><input type="submit" name="add" class="btn btn-success btn-block" value="add"></th>
                    </form>
                </tr>
            </thead>
        </div>
    <?php 
        // If Ther is No such Id Else show Error Message
        } else {
            
            echo "<div class='container' >" ;
        
            $theMsg = ' <br><div class="alert alert-danger"> THeres No Such ID </div>';
        
            redirectHome($theMsg);
        
            echo "</div>";

        }
    
    } elseif ($do == 'updeat'){ //code
        
        echo'<section class="head-page-users">
                <article class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <header>
                                <h2><i class="fa fa-add"></i> Updeat Category</h2>
                        </header>    
                        </div>
                    </div>
                    </br>
                </article>
            </section>';
    
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id           = $_POST['id'];
            $naen         = $_POST['name_en'];
            $naar         = $_POST['name_ar'];
            $description  = $_POST['description'];
            $species       = $_POST['species'];
            
            $stmt = $con->prepare("UPDATE category SET `name_en` = ?, `name_ar` = ?, `description` = ?, `idspecies` = ?, `dataed` = now()  WHERE `id_cat` = ? "); 
            
            $stmt->execute(array($naen, $naar, $description, $species,  $id));                                    

            echo '<div class="container">';

            $theMsg = "<div class='alert alert-success'>  success insert category  </div>";
            redirectPage($theMsg,'category.php' , 1 );
            echo '</div>';
            
        }
        
    } elseif ($do == 'delete') { //code 
        
            echo'<section class="head-page-users">
                <article class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <header>
                                <h2><i class="fa fa-add"></i> DELETE Species</h2>
                        </header>    
                        </div>
                        
                    </div>
                    </br>
                </article>
            </section>';
        
            //Check If Get Request catid Is Numeric & Get The Integer Value of It 

            $catid = isset($_GET['catid']) && is_numeric($_GET['catid']) ? intval($_GET["catid"]) : 0;

            $stmt = $con->prepare("DELETE FROM `category` WHERE `id_cat` = :zuser ");

            $stmt->bindParam("zuser" , $catid); 

            $stmt->execute();

            echo '<div class="container">';

            $theMsg = "<div class='alert alert-danger'>  success Delete " .  $stmt->rowCount() . " species  </div>";

            redirectPage($theMsg,'category.php' , 1 );
            
            echo '</div>';
        
    } else {
        
            echo '<div class="container">';
                
            $theMsg = "<div class='alert alert-danger'>Error There Is No Page With This Name  </div>"  ;

            redirecthome($theMsg);
        
            echo '</div>';
    }
            include $tpl . 'footer.php';
} else { 
    header ('Location: index.php');
    exit();
}
    ob_end_flush();
?>