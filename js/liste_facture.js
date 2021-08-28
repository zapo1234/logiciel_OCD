$(document).ready(function(){
     
	   function lists(page) {
		var id = <?php echo $_GET['data_id'];?>;
		$.ajax({
		url: "recher_facture_site.php",
		method: "POST",
		data:{id:id,page:page},
		success: function(data) {
		$('#resu').html(data);
				  }
				});
			}

			lists();
   
   });