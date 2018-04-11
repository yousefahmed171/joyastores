<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Dashbord';

       include 'init.php';
    
      // getAllFrom($field, $table, $where = NULL , $and = NULL, $orderfield, $ordering = 'DESC')
?>
        <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12">
                        <header>
                            <h2><i class="fa fa-users"></i>&nbsp;&nbsp;Brand Name (400)</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>

                
        
        <section class="container">
            <section class="search-result">
                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="search" class="form-control input-lg" placeholder="Search Product">
                            <a class="btn btn-lg btn-default input-group-addon"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Search Result</caption>
                        <thead>
                            <tr>
                                <th>Select</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Picture</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type='checkbox' /></td>
                                <td>374</td>
                                <td>Polo Shirts</td>
                                <td><img src='img/product-1.jpg' width='150px'/></td>
                            </tr>
                            <tr>
                                <td><input type='checkbox' /></td>
                                <td>374</td>
                                <td>Polo Shirts</td>
                                <td><img src='img/product-1.jpg' width='150px'/></td>
                            </tr>
                            <tr>
                                <td><input type='checkbox' /></td>
                                <td>374</td>
                                <td>Polo Shirts</td>
                                <td><img src='img/product-1.jpg' width='150px'/></td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <button class="btn btn-primary btn-block">Sold Out</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <nav aria-label="Page navigation" class="text-center page-nav-user">
                    <ul class="pagination">
                        <li>
                        <a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                        </li>
                        
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        
                        <li>
                        <a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                        </li>
                    </ul>
                </nav>
            </section>    
        </section>
        
       
       
       
       
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
