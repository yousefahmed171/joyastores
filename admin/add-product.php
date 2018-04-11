<?php
   
    ob_start();
 
    session_start();

    if(isset($_SESSION['username'])) {

        $title = 'Joya - Dashbord';

        include 'init.php';
?>  
   
    <section class="head-page-add-pro">
        <article class="container">
            <div class="row">
                <div class="col-xs-12">
                    <header>
                        <h2><i class="fa fa-product-hunt"></i>&nbsp;&nbsp;Add Product</h2>
                    </header>    
                </div>
            </div>
        </article>
    </section>

        <div class="row">
            <div class="col-xs-12">
                <div class="upload-pro-form">
                    <form class="form-horizontal" action="product.php?do=insert" method="post" enctype="multipart/form-data">
                        <section class="container">
                            <article id="pro-add">
                                <div class="row">
                                        <div class="fallback">
                                            <div class="col-xs-4">
                                                <input name="pro_img" type="file" multiple />
                                            </div>
                                            <div class="col-xs-4">
                                                <input name="pro_img2" type="file" multiple />
                                            </div>
                                            <div class="col-xs-4">
                                                <input name="pro_img3" type="file" multiple />
                                            </div>
                                            <div class="col-xs-4">
                                                <input name="pro_img4" type="file" multiple />
                                            </div>
                                            <div class="col-xs-4">
                                                <input name="pro_img5" type="file" multiple />
                                            </div>
                                            <div class="col-xs-4">
                                                <p class="help-block">Note : Up to 5 images per product.</p>
                                            </div>
                                        </div>
                            <div class="form-group">
                            <label for="selSpecies" class="col-sm-2 control-label">Select Species</label>
                            <div class="col-sm-10">
                                <select name="species" class="form-control" id="selSpecies">
                                    <option value="0" disabled selected>- Select Species</option>
                                        <?php
                                        $getspecies =  getAllFrom("*", "species", "", "", "id_species");
                                        foreach($getspecies as $species) {
                                            echo '<option value="'.$species['id_species'].'">'.$species['name_en'].'</option>';
                                        }
                                        ?>
                                        
                                </select>
                            </div>
                        </div><!-- /.Form-Group -->

                        <!-- This Form Changeble Upon Main Category Selected  -->
                        <div class="form-group">
                            <label for="selSubCategory" class="col-sm-2 control-label">Select Sub Category</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-control" id="selSubCategory">
                                    <option value="0" disabled selected>- Select Sub Category</option>
                                        <?php
                                        $getcats =  getAllFrom("*", "category", "", "", "id_cat");
                                        foreach($getcats as $cat) {
                                            echo '<option value="'.$cat['id_cat'].'">'.$cat['name_en'].'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div><!-- /.Form-Group -->
                                        <!-- This Form Changeble Upon Main Category Selected  -->
                        <div class="form-group">
                            <label for="selSubCategory" class="col-sm-2 control-label">Select Sub Category</label>
                            <div class="col-sm-10">
                                <select name="brand" class="form-control" id="selSubCategory">
                                    <option value="0" disabled selected>- Select Brand</option>
                                        <?php
                                        $getbrands =  getAllFrom("*", "brands", "", "", "id_brand");
                                        foreach($getbrands as $brand) {
                                            echo '<option value="'.$brand['id_brand'].'">'.$brand['name_en'].'</option>';
                                        }
                                        ?>
                                </select>
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="selSize" class="col-sm-2 control-label">Select Sizes</label>
                            <div class="col-sm-10">
                                <select name="pro_size" class="selectpicker form-control" multiple id="selSize">
                                    <optgroup label="Women, Men & Teens Sizing">
                                        <option>X-small</option>
                                        <option>Small</option>
                                        <option>Medium</option>
                                        <option>Large</option>
                                        <option>X-large</option>
                                        <option>XX-large</option>
                                        <option>XXX-Large</option>
                                    </optgroup>
                                    <optgroup label="Kids Boys & Kids Girls ">
                                        <option>3 y</option>
                                        <option>4 Y</option>
                                        <option>5 Y</option>
                                        <option>6 Y</option>
                                        <option>7 Y</option>
                                        <option>8 Y</option>
                                    </optgroup>
                                    <optgroup label="Baby Boys & baby Girls ">
                                        <option>0-3 M</option>
                                        <option>4-6 M</option>
                                        <option>7-12 M</option>
                                        <option>13-18 M</option>
                                        <option>19-24 M</option>
                                    </optgroup>
                                </select>
                            </div><!-- /.Col -->
                        </div><!-- /.Form-Group -->

                        <div class="form-group">
                            <div class="row">
                            <label class="col-sm-2 control-label">Product Size</label>
                                <div class="col-xs-12 col-sm-1 col-md-offset-1">
                                    <input type="number" class="form-control" placeholder="XS"  name="xs">
                                </div>
                                <div class="col-xs-12 col-sm-1 ">
                                    <input type="number" class="form-control" placeholder="S"   name="s">
                                </div>
                                <div class="col-xs-12 col-sm-1 ">
                                    <input type="number" class="form-control" placeholder="M"   name="m">
                                </div>
                                <div class="col-xs-12 col-sm-1 ">
                                    <input type="number" class="form-control" placeholder="L"   name="l">
                                </div>
                                <div class="col-xs-12 col-sm-1 ">
                                    <input type="number" class="form-control" placeholder="XL"  name="xl">
                                </div>
                                <div class="col-xs-12 col-sm-1 ">
                                    <input type="number" class="form-control" placeholder="2XL"  name="2xl">
                                </div>
                                <div class="col-xs-12 col-sm-1 ">
                                    <input type="number" class="form-control" placeholder="3XL"  name="3xl">
                                </div>
                                <div class="col-xs-12 col-sm-1 ">
                                    <input type="number" class="form-control" placeholder="4XL"  name="4xl">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="proId" class="col-sm-2 control-label">Product ID</label>
                            <div class="col-sm-10">
                                <input name="pro_id" type="text" class="form-control" id="proId" placeholder="Product ID">
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proName" class="col-sm-2 control-label">Product Name</label>
                            <div class="col-sm-10">
                                <input name="pro_name" type="text" class="form-control" id="proName" placeholder="Product Name">
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proPrice" class="col-sm-2 control-label">Product Price</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input  name="pro_price" type="number" min="1" class="form-control" id="proPrice" placeholder="Product Price">
                                    <div class="input-group-addon">EGP</div>
                                </div>
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <!-- اكتب السعر بعد الخصم ويحسب نسبة الخصم ويقربها -->
                            <label for="salePrice" class="col-sm-2 control-label">Price After Sale</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input name="pro_after_sale" type="number" min="1" class="form-control" id="salePrice" placeholder="Product Price">
                                    <div class="input-group-addon">EGP</div>
                                </div>
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proSale" class="col-sm-2 control-label">Product Sale</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input name="pro_sale" type="number" min="1" class="form-control" id="proSale" placeholder="Product Sale">
                                    <div class="input-group-addon">%</div>
                                </div>
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proSeller" class="col-sm-2 control-label">Product Seller</label>
                            <div class="col-sm-10">
                                <input name="pro_seller" type="text" class="form-control" id="proSeller" placeholder="Product Seller">
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proAva" class="col-sm-2 control-label">Product Availability</label>
                            <div class="col-sm-10">
                                <select name="availability" class="form-control" id="proAva">
                                    <option disabled selected>Select Availability Status</option>
                                    <option value="0">Yes</option>
                                    <option value="1">No</option>
                                </select>
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proVis" class="col-sm-2 control-label">Product Visiblity</label>
                            <div class="col-sm-10">
                                <select name="visiblity" class="form-control" id="proVis">
                                    <option disabled selected>Select Visibility Status</option>
                                    <option value="0">Hideen</option>
                                    <option value="1">Shown</option>
                                </select>
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proENFeat" class="col-sm-2 control-label">English Product Feature</label>
                            <div class="col-sm-10">
                                <textarea name="pro_feature_en" class="form-control" id="proENFeat" placeholder="English Product Feature" rows="3"></textarea>
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proARFeat" class="col-sm-2 control-label">Arabic Product Feature</label>
                            <div class="col-sm-10">
                                <textarea name="pro_feature_ar" class="form-control" id="proARFeat" placeholder="Arabic Product Feature" rows="3"></textarea>
                            </div>
                        </div><!-- /.Form-Group -->

                        <div class="form-group">
                            <label for="proENFeat" class="col-sm-2 control-label">English Additional Information</label>
                            <div class="col-sm-10">
                                <textarea name="pro_additional_en" class="form-control" id="proENFeat" placeholder="English Additional Information" rows="3"></textarea>
                            </div>
                        </div><!-- /.Form-Group -->
                        
                        <div class="form-group">
                            <label for="proARFeat" class="col-sm-2 control-label">Arabic Additional Information</label>
                            <div class="col-sm-10">
                                <textarea name="pro_additional_ar" class="form-control" id="proARFeat" placeholder="Arabic Additional Information" rows="3"></textarea>
                            </div>
                        </div><!-- /.Form-Group -->

                        <input type="submit" class="btn btn-success btn-lg btn-block" value="Upload" />        
                    </form>
                </div><!-- /.Upload-Pro-Form -->
            </div><!-- /.Col -->
        </div><!-- /.Row -->
            </article><!-- /#Pro-Add -->
        </section><!-- /.Container -->
        
        <section class="head-page-edit-pro">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit Product</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
        
        <section class="container">
            <article class="search-result">
                <section class="search-pro">
                    <form>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" class="form-control input-lg" placeholder="Search Prodcuts">
                                <a class="btn btn-lg btn-default input-group-addon"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                    </form>
                </section>
                
                <div class="form-group">
                    <label for="proAva" class="col-sm-2 control-label">Search By Brand</label>
                    <div class="col-sm-10">
                        <select class="selectpicker form-control" id="proAva" multiple>
                            <option disabled selected>Select Brands</option>
                            <option>Brand 1</option>
                            <option>Brand 2</option>
                        </select>
                    </div>
                </div><!-- /.Form-Group -->

                <section class="search-res">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <caption>Search Result</caption>
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <th>Price</th>
                                    <th>Sale</th>
                                    <th>Availability</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>0</td>
                                    <td>374</td>
                                    <td>New T-shirt</td>
                                    <td>Men</td>
                                    <td>T-shirt</td>
                                    <td>100 EGP</td>
                                    <td>0 %</td>
                                    <td>Yes</td>
                                    <td><button class="btn btn-info btn-block"><i class="fa fa-pencil"></i></button></td>
                                    <td><button class="btn btn-danger btn-block" data-toggle="modal" data-target=".del-product"><i class="fa fa-trash-o"></i></button></td>
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
            </article>
        </section>
        
        <div class="modal fade del-product" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you want delete this product ? </h5>
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
    
    } else {
        header ('Location: index.php');
        exit();
    }

    ob_end_flush();
?>