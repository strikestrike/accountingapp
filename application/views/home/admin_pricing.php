<?php include 'sidebar1.php';
?>
<div class="tab-content">
    <div class="tab-pane fade active show" id="list">
        <div class="tab-content project-list-group" id="ListViewTabLink">
            <div class="tab-pane fade" id="navpills-1">

                <div class="project-main2">
                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>
                    <div class="d-flex justify-content-between align-items-center">
                        income tab
                    </div>
                </div>

            </div>
            <div class="tab-pane fade active show" id="navpills-2">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="project-main2">
                            <span class="arrow-up-back"></span>
                            <span class="arrow-up"></span>

                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Rental</a>


                                <a class="btn addrentaltype btn-danger text-nowrap" href="javascript:void(0)"
                                    data-bs-toggle="modal" data-bs-target="#addrental">+ Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Nr Modules</th>
                                            <th>Price</th>
                                            <th>SKU</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1; 
                                                                       
                                                                foreach($rental as $list)
                                                                {    
                                                                   
                                                                         ?>
                                        <tr>
                                            <td> <?= $list['nr_modules']; ?></td>
                                            <td> <?= $list['price'];  ?> </td>
                                            <td> <?= $list['sku'];  ?> </td>

                                            <td class="color-primary">
                                                <div class="d-flex">
                                      <button class="btn addrentaltype btn-primary text-nowrap" onclick="abc(<?php echo $list['id'] ?>)" href="javascript:void(0)">Edit</button> 
                                                 <!--  <button class="btn btn-primary text-nowrap"  data-bs-target="#editrental" href="javascript:void(0)"> Edit</button> -->
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn adddevidentstype btn-primary text-nowrap" href="javascript:void(0)">
                                    Dividents</a>
                                <a class="btn btn-danger text-nowrap" href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#adddevidents">+ Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Nr Modules</th>
                                            <th>Price</th>
                                            <th>SKU</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $i = 1; 
                                                                       
                                                                foreach($dividents as $list)
                                                                {    
                                                                   
                                                                         ?>
                                        <tr>
                                            <td> <?= $list['nr_modules']; ?></td>
                                            <td> <?= $list['price'];  ?> </td>
                                            <td> <?= $list['sku'];  ?> </td>

                                            <td class="color-primary">
                                                <div class="d-flex">
                                                    <button class="btn adddevidentstype btn-primary text-nowrap"
                                                        onclick="abc(<?php echo $list['id'] ?>)"
                                                        href="javascript:void(0)">Edit</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }  ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <a class="btn btn-primary text-nowrap" href="javascript:void(0)"> Stock</a>
                                <a class="btn addincometype btn-danger text-nowrap" href="javascript:void(0)"
                                    data-bs-toggle="modal" data-bs-target="#addstock">+ Add</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Nr Modules</th>
                                            <th>Price</th>
                                            <th>SKU</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; 
                                                                foreach($stock as $list)
                                                                {    
                                                                   
                                                                         ?>
                                        <tr>
                                            <td> <?= $list['nr_modules']; ?></td>
                                            <td> <?= $list['price'];  ?> </td>
                                            <td> <?= $list['sku'];  ?> </td>
                                            <td class="color-primary">
                                                <div class="d-flex">
                                                    <button class="btn addincometype btn-primary text-nowrap"
                                                        href="javascript:void(0)"
                                                        onclick="abc(<?php echo $list['id'] ?>)">Edit</button>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php  } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="tab-pane fade" id="navpills-3">
                <div class="project-main2">
                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>
                    <div class="d-flex justify-content-between align-items-center">
                        information tab
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="navpills-4">
                <div class="project-main2">
                    <span class="arrow-up-back"></span>
                    <span class="arrow-up"></span>
                    <div class="d-flex justify-content-between align-items-center">
                        doc release tab
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>




<!-- Rental-->
<div class="modal fade" id="addrental">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Rental </h5>
                <button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">

                <form action="<?=base_url('home/admin_pricing')?>" method="POST">
                    <input type="hidden" name="type" value="rental">

                    <div class="form-group">
                        <label class="text-black font-w500">Nr Modules <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" id="nr_modules" name="nr_modules" class="form-control" required>
                        <span style="color:red; font-size: 12px"> <?php echo form_error('nr_modules'); ?></span>

                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Price <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" id="price" name="price" class="form-control" required>
                        <span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">SKU <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" id="sku" name="sku" class="form-control" required>
                        <span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>

                    </div>
                    <div class="form-group">
                        <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" name="addrentaltype" value="Submit" class="btn btn-primary">CREATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
$(function() {
    <?php 
        if(isset($_POST['addrentaltype'])){

        echo '$("#addrental").modal("show")';
        }
        ?>

});
</script>
 

<!-- Edit Rental-->
<div class="modal fade" id="editrental">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Rental</h5>
                <button type="submit" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form  action="rental_update" method="POST">
                <input type="hidden" name="editrentalid" id="editrentalid" />
                <input type="hidden" name="type" id="edittype" />

                <div class="form-group">
                    <label class="text-black font-w500">Nr Modules</label>
                    <input type="text" id="editnr_modules" name="nr_modules" class="form-control" required>
                    <span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
                </div>
                <div class="form-group">
                    <label class="text-black font-w500">Price</label>
                    <input type="text" name="price" id="editprice" class="form-control" required>
                    <span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
                </div>
                <div class="form-group">
                    <label class="text-black font-w500">SKU</label>
                    <input type="text" name="sku" id="editsku" class="form-control" required>
                    <span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
                </div>
                <div class="form-group">

                    <button type="submit" class="btn btn-primary">UPDATE</button>
                    <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
                </div>
              </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
function abc(id) {
   // alert(id)   
    //return false;
    $('#editrental').modal('show');
    $.ajax({
        url: '<?php echo base_url(); ?>Home/getIncomeTypeData',
        type: "post",
        data: {
            id: id
        },
        success: function(response) {
            var data = jQuery.parseJSON(response);
        
                $('#editnr_modules').val(data[0].nr_modules);
                $('#editprice').val(data[0].price);
                $('#editsku').val(data[0].sku);
                $('#editrentalid').val(data[0].id);
              $('#edittype').val(data[0].type);
        },
        error: function(jqXhr, textStatus, errorMessage) {
            $('p').append('Error' + errorMessage);
        }
    });
}

/*function updateDatafun(){
alert($('#editrentalid').val())
var updatedata={
nr_modules:$('#editnr_modules').val(),
price:$('#editprice').val(),
sku:$('#editsku').val(),
id:$('#editrentalid').val()
}
    console.log(updatedata)


}*/


</script>


<!-- Dividents -->
<div class="modal fade" id="adddevidents">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dividents</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('home/admin_pricing')?>" method="POST">
                    <input type="hidden" name="type" value="dividents">
                    <div class="form-group">
                        <label class="text-black font-w500">Nr Modules <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" name="nr_modules" class="form-control" required>

                        <span style="color:red; font-size: 12px"> <?php echo form_error('nr_modules'); ?></span>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Price <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" name="price" class="form-control" required>
                        <span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">SKU <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" name="sku" class="form-control" required>

                        <span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
                    </div>
                    <div class="form-group">
                         <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" name="adddevidentstype" value="Submit" class="btn btn-primary">CREATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
$(function() {
    <?php 
        if(isset($_POST['adddevidentstype'])){

        echo '$("#adddevidents").modal("show")';
        }
        ?>

});
</script>

<!-- Stock -->

<div class="modal fade" id="addstock">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="<?=base_url('home/admin_pricing')?>" method="POST">
                    <input type="hidden" name="type" value="stock" required>
                    <div class="form-group">
                        <label class="text-black font-w500">Nr Modules <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" name="nr_modules" class="form-control" required>
                        <span style="color:red; font-size: 12px"> <?php echo form_error('nr_modules'); ?></span>
                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">Price <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" name="price" class="form-control" required>
                        <span style="color:red; font-size: 12px"> <?php echo form_error('price'); ?></span>

                    </div>
                    <div class="form-group">
                        <label class="text-black font-w500">SKU <span style="color:red; font-size: 12px">
                                *</span></label>
                        <input type="text" name="sku" class="form-control" required>
                        <span style="color:red; font-size: 12px"> <?php echo form_error('sku'); ?></span>
                    </div>
                    <div class="form-group">
                        <button type="button" class=" btn btn-secondary pull-left" data-bs-dismiss="modal">CLOSE</button>
                        <button type="submit" name="addincometype" value="Submit" class="btn btn-primary">CREATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    <?php 
        if(isset($_POST['addincometype'])){

        echo '$("#addstock").modal("show")';
        }
        ?>

});
</script>