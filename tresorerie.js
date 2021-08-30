$(document).ready(function(){
   $('#sms').click(function(){
	$('.drop').slideToggle();
	});
	
	 $('#news_data').click(function(){
	$('.drops').slideToggle();
	$('.drop').css('display','none');
	 });
  
   $('#but').click(function(){
   $('#examp').css('display','block');
   $('#pak').css('display','block');
   var email = "default@gmail.com";
   $('#email').val(email);
 });
 
 $('#im').click(function(){
 $('#data').css('display','block');
 });

 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('.reini').css('display','none');
   $('.annuler').css('display','none');
   $('.detail').css('display','none');
   $('.datas').css('display','none');
   $('.result').css('display','none');
 });
 
 $(document).on('click','.action',function(){
	var id = $(this).data('id2');
  // afficher 
  $('#content'+id).slideToggle();
  if(id ===3){
 $('.datas').css('height','120px');	
  }
});

$(document).on('click','.actions',function(){
	var id = $(this).data('id7');
  // afficher 
  $('#contents'+id).slideToggle();
  if(id ===3){
 $('.datas').css('height','120px');	
  }
});


  // afficher les données des dépenses
  // afficher les données des encaissements
	function affich() {
				$.ajax({
					url: "datas_send.php",
					method: "POST",
					success: function(data) {
						$('#indicateur').html(data);
				   }
				});
			}

			affich();
			
	// compter les nouveaux message
	function view() {
				var action="news";
				$.ajax({
					url: "messanger_datas.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#sms').html(data);
					}
				});
			}

			view();
			
	// afficher les données des dépenses
   // afficher les données des dépenses
  // afficher les données des encaissements
  function loads(page) {
				var action="fetchs";
				$.ajax({
					url: "depenses_view_tresorerie.php",
					method: "POST",
					data:{action:action,page:page},
					success: function(data) {
						$('#resul_depense').html(data);
					}
				});
			}

			loads();
			
	// afficher les données des dépenses
  	


    // pagintion
  $(document).on('click','.bout',function(){
	  var page =$(this).attr("id");
	  loads(page);
   });

  // afficher les données des encaissements
  function load() {
				var action="fetch";
				$.ajax({
					url: "affichage_donnees.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultats').html(data);
					}
				});
			}

			load();

	

	// envoi du formulaire pour reinitalisation des montants

	 $('#form_reini').on('submit', function(event) {
	event.preventDefault();

	var action="dat";
	var date=$('#reini').val();
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'affichage_donnees.php',// on traite par la fichier
	data:{action:action,date:date},
	success:function(data) { // on traite le fichier recherche apres le retour
      $('#pak').css('display','none');
	  $('#result_reini').html(data);
	  $('.reini').css('display','none');
	  load();

	}
    });

	setInterval(function(){
		 $('#result_reini').html('');
	 },6000);


  });
  
  // click sur les news message
	
	$(document).on('click','#sms',function(){
		  var action ="click_messsage";
		  $.ajax({
            type: 'POST',
            url:'messanger_datas.php',
            data:{action:action},
            async:true,
            success: function(data){
            $('#message_datas').html(data);
	
		    }
          });
		  
	  });
  
  $(document).on('click','.delete',function(){
 var checkbox = $('.form-check-input:checked');
 var action="delete_check";
 if(checkbox.length > 0) {
	var checkbox_value = [];
 $(checkbox).each(function() {
	checkbox_value.push($(this).val());
 });
 
 $.ajax({
	type:'POST', // on envoi les donnes
	async: false,
	url:'affichage_donnees.php',// on traite par la fichier
	data:{checkbox_value:checkbox_value,action:action},
	success:function() {
	 loads();
	 var nombre = checkbox.length;
	 if(nombre==1){
	   var nbrs ="supression d'une entrée"; 
	 }
	 
	 else{
		 var nbrs = 'vous avez suprimez  <span class="drt">'+nombre+'</span> entrées'; 
	 }
	 
	 $('#result').html('<div class="enre"><span class="d"><i class="fas fa-exclamation-circle" style="font-size:16px;color:green;"></i>'+nbrs+'</div>');
	 }
	 
   });
   setInterval(function(){
		 $('#result').html('');
	 },5000);
   
   }
 
 else {
	$('#result').html('<div class="enre"><span class="d"><i class="fas fa-exclamation-circle" style="font-size:16px;color:green;"></i> aucune facture selectionnée</span></div>');
	 
 }
 
 });
 
 // afficher le pannier
  function panier() {
				var action="panier";
				$.ajax({
					url: "session_panier.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#panier').html(data);
					}
				});
			}

			panier();		

    });	
