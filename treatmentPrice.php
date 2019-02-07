<?php
include_once 'Session.php';
if($session->check_login())
{
    include_once 'layouts/header.php';
    include_once 'layouts/content-header.php';
    include_once 'layouts/left-sidebar.php';

?>

	<div class="content-wrapper">
	    <?php 
          $page_title     = 'Treatment Prices';
          $page_subTitle  = '';
          include_once 'layouts/page-header.php'; 
        ?>

	    <!-- Main content -->
    	<section class="content">
            <?php include_once 'layouts/navbar.php'; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8" style="padding-left: 1pc;">
                            <div class="box">
                                <div class="box-header" style="text-align: center; border-bottom: 1px solid; border-color: #b8b6b6; margin-left: 3pc; margin-right: 3pc;" >
                                  <h3 class="box-title" style="font-weight: bold; font-size: 1.5pc;">Price List</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body" style="margin: 1pc;">
                                    <div id="price_list">
                                        <div class="table-responsive"> 
                                            <table id="treatment_prices" class="table table-bordered table-hover ">
                                                <thead>
                                                    <tr>
                                                      <th style="text-align: center;">ID</th>
                                                      <th>Title</th>
                                                      <th>Price</th>
                                                      <th>Top Treatment</th>
                                                      <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        require_once '../model/dbconfig.php';
                                                        $db   = new database();    
                                                        $sql = "SELECT * FROM treatmentprices";
                                                        $run = $db->config()->query($sql);
                                                        while($data = mysqli_fetch_assoc($run))
                                                        {
                                                            $id                 = $data['id'];
                                                            $price_title        = $data['title'];
                                                            $price              = $data['price'];
                                                            $top_treatment      = $data['top_treatment'];
                                                            $edit_url           = 'treatmentPrices-edit.php?price_id='.$id;
                                                    ?>
                                                    <tr>
                                                        <td style="text-align: center; vertical-align: middle;"><?= $id ?></td>
                                                        <td style="vertical-align: middle;" ><?= $price_title ?></td>
                                                        <td style="vertical-align: middle;" ><?= $price ?></td>
                                                        <td style="vertical-align: middle;  text-align: center;" ><?php if($top_treatment=="1"){ echo "Yes"; } else {echo "No";} ?></td>
                                                        <td style="text-align: center; margin: auto; vertical-align: middle;">
                                                          <a onclick="edit_treatment(<?= $id ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                          <a onclick="del_treatmentPrice(<?= $id ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4" style="padding: 0px;padding-right: 1pc;">
                            <div class="box box-info">
                                <div id="edit_price">
            			            <div class="box-header with-border" style="text-align: center;">
            			             	<h3 class="box-title">Add Treatment Price</h3>
            			            </div>
            			            <div class="box-body" style="padding: 0px;">
                                        <form id="add_price-form">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-top: 1pc;">
                				            	<div class="input-group" style="margin-top: 1pc;">
                				                	<span class="input-group-addon"><i class="fa fa-font"></i></span>
                				                	<input type="text" id="price_title" name="price_title" class="form-control" placeholder="Treatment name">
                				            	</div>
                                                <div class="input-group" style="margin-top: 1pc;">
                                                    <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                                    <input type="text" id="price_tag" name="price_tag" class="form-control" placeholder="Treatment Price">
                                                </div>
                                                <div class="input-group" style="margin-top: 1pc;">
                                                    <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                                    <input type="text" id="treatment_time" name="treatment_time" class="form-control" placeholder="08:00 PM - 10:00 PM">
                                                </div>
                                                <div class="input-group" style="margin-top: 1pc;">
                                                    <span class="input-group-addon"><i class="fa fa-font"></i></span>
                                                    <select id="top_treatment_select" name="top_treatment_select" class="form-control">
                                                        <option value="0">Select Top Treatment</option>
                                                        <option value="1">Yes</option>
                                                        <option value="2">No</option>
                                                    </select>
                                                </div>
                				            	<div class="input-group" style="margin-top: 1pc;">
                				                	<span class="input-group-addon"><i class="fa fa-info"></i></span>
                                                    <textarea name="treatment_detail" id="treatment_detail" class="form-control" placeholder="Some detail of category" style="height: 5pc;"></textarea>
                				            	</div>
                				            	<div style="margin-top: 1pc; text-align: center;">
                                                    <button type="submit" style="width: 15pc;" class="btn btn-primary"> Add <i class="fa fa-save"></i></button>
                                                </div>
                                                <br>
                                            </div>
                                        </form>        
            		                </div>
                                </div>
        		            </div>
        		        </div>
                    </div>
                </div>
            </div>
        </section>
	</div>


<?php
	include_once 'layouts/footer.php';
}
else
{
	header("Location: login.php");
}
?>
	<script type="text/javascript">
        $(function () {
            $('#treatment_prices').DataTable()
        })

        function refresh_priceList(){
            $.ajax({
                url: 'ajax_call/treatment_prices/price-list.php',
                type: 'POST',
                success: function (data_list) {
                    $("#price_list").html(data_list);
                },
                error: function(data){
                    error_sweatAlert("Price List", "Unable to refresh price list, Erroer: " + data );
                }
            });
        }
        function del_treatmentPrice(treatment_id) {
            $.ajax({
              url: 'ajax_call/treatment_prices/del_treatment-price.php',
              type: 'POST',
              data: {'treatment_id':treatment_id},
              success: function (data_del) {
                success_sweatAlert("Delete Treatment Price", "Treatment price has been deleted.");
                location.reload();
                // if(data_del == "del")
                // {
                    
                // }
                // else
                // {
                //     error_sweatAlert("Delete Treatment Price", "Something went wrong, please try again later!!! Error = " + data_del);
                // }
              },
              error: function(data){
                  error_sweatAlert("Delete Treatment Price", "Error: " + data);
              }
            });
        }
        function edit_treatment(treatment_id){
            $.ajax({
                url: 'ajax_call/treatment_prices/edit-price.php',
                type: 'POST',
                data: {'treatment_id':treatment_id},
                success: function (edit_data) {
                    $("#edit_price").html(edit_data);
                },
                error: function(data){
                    error_sweatAlert("update Price List", "Unable to load Edit price Module, Erroer: " + data );
                }
            });
        }
        $(document).ready(function(){
            $("#add_price-form").submit(function(event){

                if ($("#top_treatment_select")[0].selectedIndex <= 0) {
                    warning_sweatAlert("Treatment Type", "Please select treatment type.");
                }
                else
                {
                    var price_title              = $("#price_title").val().trim();
                    var price_tag                = $("#price_tag").val().trim();
                    var top_treatment_select     = $("#top_treatment_select").val().trim();
                    var treatment_time           = $("#treatment_time").val().trim();
                    var treatment_detail         = $("#treatment_detail").val().trim();
                   
                    if((price_title != '') && (price_tag != '') && (top_treatment_select != '') && (treatment_time != '') && (treatment_detail != '')){
                        var formData = new FormData(this);

                        $.ajax({
                            url: 'ajax_call/treatment_prices/submit-price.php',
                            type: 'POST',
                            data: formData,
                            success: function (data) {
                                if(data == 'exists')
                                {
                                    warning_sweatAlert("Treatment Price", "This treatment price already exists with same name.");
                                }
                                else if(data == 'added')
                                {
                                    success_sweatAlert("Treatment Price", "Treatment Price added successfully. Thank you!");
                                    $("#add_price-form")['0'].reset();
                                    refresh_priceList();
                                }
                                else
                                {
                                    error_sweatAlert("Treatment Price", "Something went wrong, please try again.Error : " + data);
                                }
                               
                            },
                            cache: false,
                            contentType: false,
                            processData: false
                        });
                    }
                    else
                    {
                        warning_sweatAlert("Treatment Price", "Please provide all credentials.");
                    }
                }
                event.preventDefault();
            });

            
        });
    </script>