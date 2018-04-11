<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Dashbord';

       include 'init.php';
    
  
    
   
       
       
       
       
?>


        
        <section class="head-page-edit-pro">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-pencil"></i>&nbsp;&nbsp;Sale</h2>
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
                            <caption>Add / Edit Sale</caption>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    
                                    <form>
                                    <!-- الصور بتكون صورة للعربي وصورة للانجليزي وكل واحدة منهم فيه منها نسخة للموبايل بس بتدخل على لينك واجد -->
                                    <th>
                                        <label for="BrandSel">Brand :</label>
                                        <select class="form-control" id="BrandSel">
                                            <option disabled selected>- Select Brand</option>
                                            <option>- Alerro</option>
                                            <option>- Valmosa</option>
                                            <option>- Monte-Blue</option>
                                        </select>
                                    </th>
                                    <th>
                                        <label for="SpeciesSel">Select Species :</label>
                                        <select class="form-control" id="SpeciesSel">
                                            <option disabled selected>- Select Species</option>
                                            <option>- Men</option>
                                            <option>- Women</option>
                                            <option>- Kids</option>
                                        </select>
                                    </th>
                                    <th>
                                        <label for="SelCategory">Select Category :</label>
                                        <select class="form-control" id="SelCategory">
                                            <option disabled selected>- Select Category</option>
                                            <option>- T-shirts</option>
                                            <option>- Pajamas</option>
                                            <option>- Shirts</option>
                                        </select>
                                    </th>
                                    <th>
                                        <label for="proSale">Product Sale :</label>
                                        <input id="proSale" type="number" class="form-control">
                                        
                                    </th>
                                        
                                    <th><input class="btn btn-success btn-block" type="submit" value="Add"></th>
                                </form>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!-- يعمل خصم على البيجامات الحريمي بتاعت Valmosa -->
                                    <td>0</td>
                                    <td>Valmosa</td>
                                    <td>Women</td>
                                    <td>Pajamas</td>
                                    <td>15%</td>
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target=".edit-sale"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".del-sale"><i class="fa fa-trash-o"></i></button></td>
                                </tr>
                                <tr>
                                    <!-- كده يعمل خصم على كل البيجامات الحريمي -->
                                    <td>1</td>
                                    <td>Non-selected</td>
                                    <td>Women</td>
                                    <td>Pajamas</td>
                                    <td>20%</td>
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target=".edit-sale"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".del-sale"><i class="fa fa-trash-o"></i></button></td>
                                </tr>
                                <tr>
                                    <!-- كده يعمل خصم على الموقع كلو -->
                                    <td>2</td>
                                    <td>Non-selected</td>
                                    <td>Non-selected</td>
                                    <td>Non-selected</td>
                                    <td>30%</td>
                                    <td><button class="btn btn-warning" data-toggle="modal" data-target=".edit-sale"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal" data-target=".del-sale"><i class="fa fa-trash-o"></i></button></td>
                                </tr>
                                <!-- اي خصم يكون فوق خصم تاني يلغي اللي قبليه -->
                                <!-- ممكن في الخصم اختار براند بس اعمل عليه خصم او قسم معين بس او جزء من قسم معين او احدد كل حاجة  -->
                </section>
            </article>
        </section>
        
        
            
        <div class="modal fade edit-sale" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Sale</h4>
                    </div>
                    
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label>Select Brand</label>
                                <select class="form-control" required>
                                    <option disabled selected>- Select Brand</option>
                                    <option>- None</option>
                                    <option>- Alerro</option>
                                    <option>- Valmosa</option>
                                    <option>- Monte-Blue</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Spicies</label>
                                <select class="form-control" required>
                                    <option disabled selected>- Select Spicies</option>
                                    <option>- None</option>
                                    <option>- Men</option>
                                    <option>- Women</option>
                                    <option>- Kids</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="form-control" required>
                                    <option disabled selected>- Select Category</option>
                                    <option>- None</option>
                                    <option>- T-shirts</option>
                                    <option>- Pajamas</option>
                                    <option>- Shirts</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sale">Sale</label>
                                <input type="text" class="form-control" id="sale" placeholder="Sale" required>
                            </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-block" data-dismiss="modal"><i class="fa fa-check-circle-o"></i> Update</button>
                    </div>
                </div>
            </div>
        </div>
                
        <div class="modal fade del-sale" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you want delete this Sale ?</h5>
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
