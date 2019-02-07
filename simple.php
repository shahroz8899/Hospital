<?php include_once 'layouts/header.php'; ?>
	<form id="submit">
		<input type="text" name="name" id="name" placeholder="name">
		<button type="submit" name="submit">submit</button>
	</form>

<?php include_once 'layouts/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#submit").submit(function(event){

                var name          = $("#name").val().trim();
                
                if((name != '')){
                    var formData = new FormData(this);

                    $.ajax({
                        url: 'ajax_call/product_category/simple.php',
                        type: 'POST',
                        data: formData,
                        success: function (data) {
                            alert("Data : " + data);
                        },
                        cache: false,
                        contentType: false,
                        processData: false
                    });
                }
                else
                {
                    // error_sweatAlert("New Admin!!!", "Please select all");
                    alert("Please select all");
                }
                event.preventDefault();
            });
	});	
	</script>
	
