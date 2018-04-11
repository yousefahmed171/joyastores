<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Dashbord';

       include 'init.php';
    
  
    
   
       
       
       
       
       
?>


        <!-- Start Add Offer ################################################ -->
        <section class="head-page-edit-pro">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-pencil"></i>&nbsp;&nbsp;Offers</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
        
        <section class="container">
            <article class="search-result">
                
                
                <section class="search-res">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <caption>Add / Edit Offers</caption>
                            <!-- صفحةال offer تكون صفحة زي صفحة ابوت اس يعني هيدر وفوتر ونافبار والهيدينج يكون فيه اسم العرض والجزء ال اتش تي ام ال اللي هنضيفو يكون في البودي -->
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    
                                    <form>
                                    <th>
                                        <label for="NameInput">Name :</label>
                                        <input class="form-control" id="NameInput" type="text" name="text" placeholder="Image Name" required>
                                    </th>
                                    <th>
                                        <label for="urlInput">URL :</label>
                                        <input class="form-control" id="urlInput" type="url" placeholder="URL" required>
                                    </th>
                                    <th>
                                        <label for="HTMLInput">HTML Code :</label>
                                        <textarea class="form-control" id="HTMLInput" type="text" placeholder="HTML Code" required ></textarea>
                                    </th>
                                    <th><input class="btn btn-success btn-block" type="submit" value="Add"></th>
                                </form>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>Offer1</td>
                                    <td>https://www.joyastores.com</td>
                                    <td>HTML Code Here</td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".edit-offer"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".del-offer"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Offer1</td>
                                    <td>https://www.joyastores.com</td>
                                    <td>HTML Code Here</td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".edit-offer"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".del-offer"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Offer1</td>
                                    <td>https://www.joyastores.com</td>
                                    <td>HTML Code Here</td>
                                    <td>
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".edit-offer"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger" data-toggle="modal" data-target=".del-offer"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                </section>
            </article>
        </section>
        <!-- End Add Offer ################################################ -->
        
        <!-- Start Edit Offer ################################################ -->    
        <div class="modal fade edit-offer" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Offer</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="Name"> Name :</label>
                                <input class="form-control" type="text" id="Name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="url">URL :</label>
                                <input type="text" class="form-control" id="url" placeholder="URL" required>
                            </div>
                            <div class="form-group">
                                <label for="HTMLCode">HTML Code :</label>
                                <textarea type="text" class="form-control" id="HTMLCode" placeholder="HTML Code" required></textarea>
                            </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal"><i class="fa fa-check-circle-o"></i> Update</button>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="modal fade del-offer" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you want delete this Offer ?</h5>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Edit Offer ################################################ -->
                
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
