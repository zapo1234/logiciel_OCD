$(document).ready(function(){
     
	  $('#sidebarToggleTop').click(function(){
		$('#accordionSidebar').css('display','block');
	 });
	 
	  $('#sms').click(function(){
	$('.drop').slideToggle();
	});
	
	 $('#news_data').click(function(){
	$('.drops').slideToggle();
	$('.drop').css('display','none');
	 });
	 
	 // afficher les données des encaissements
    // compter les nouveaux message
	function views() {
				var action="fetchs";
				$.ajax({
					url: "news_messages.php",
					method: "POST",
					data:{action:action},
					success: function(data) {
						$('#resultats_messages').html(data);
					}
				});
			}

			views();

 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('.reini').css('display','none');
   $('.annuler').css('display','none');
   $('.detail').css('display','none');
   $('.envoyer').css('display','none');
   $('#results_s').css('display','none');
 });
 
 $('#im').click(function(){
	$('#data').css('display','block');
});
 
 // action sur l'onglet gére
 
 $(document).on('click','.action',function(){
	var id = $(this).data('id2');
  // affich
  $('#content'+id).slideToggle();
  if(id ===3){
 $('.datas').css('height','120px');	
  }
});

 // 
 
 // delete home--
 $(document).on('click','.annul', function(){
	 // recupere la variable
	 var id = $(this).data('id5');
	 var action = "deleted";
    // affiche les differentes
	$('.annuler').css('display','block');
	$('#id_fact').text(id);
    $('#pak').css('display','block');
	$('#ids').val(id);
	
	$(document).on('click','.annuls', function(){
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'result_facture_home.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_annuler').html(data);
     $('.annuler').css('display','none');
     $('#pak').css('display','none');
	 $('.modif').css('display','none');
	 loads();
	 load();
	 $('#result_recher').css('display','none');
	}
		
	});
	
	setInterval(function(){
		 $('#data_annuler').html('');
		 location.reload(true);
	 },4000);

 });
 });
 
 // delete home--
 $(document).on('click','.annulc', function(){
	 // recupere la variable
	 var id = $(this).data('id5');
	 var action = "deleted";
    // affiche les differentes
	$('.annuler').css('display','block');
	$('#id_fact').text(id);
    $('#pak').css('display','block');
	$('#ids').val(id);
	
	$(document).on('click','.annuls', function(){
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'result_facture_home.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_annuler').html(data);
     $('.annuler').css('display','none');
     $('#pak').css('display','none');
	 $('.modif').css('display','none');
	 loads();
	 load();
	 $('#result_recher').css('display','none');
	}
		
	});
	
	setInterval(function(){
		 $('#data_annuler').html('');
		 location.reload(true);
	 },4000);

 });
 });
 
 // delete home--
 $(document).on('click','.envoi', function(){
	 // recupere la variable
	 var id = $(this).data('id3');
	 var action = "mail";
    // affiche les differentes
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'result_facture_home.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_annuler').html(data);
     $('#pak').css('display','block');
	}

 });
 });
 
 $(document).on('click','.details', function(){
	 // recupere la variable
	 var id = $(this).data('id2');
	 var action = "details";
	 $.ajax({
			      url: "result_facture_home.php",
					method: "POST",
					data:{id:id,action:action},
					success: function(data) {
						$('#details').html(data);
						$('#pak').css('display','block');
					}
				});
    
 });
 
 // click sur les news message
	
	$(document).on('click','#sms',function(){
		  var action ="click";
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
  
  
  function loads(page) {
				var action="fetch";
				$.ajax({
					url: "result_facture_home.php",
					method: "POST",
					data:{action:action,page:page},
					success: function(data) {
						$('#results').html(data);
					}
				});
			}

			loads();
			
  // pagintion
  $(document).on('click','.bout',function(){
	  var page =$(this).attr("id");
	  loads(page);
   });
  
	// pagintion
  $(document).on('click','.bouts',function(){
	  var page =$(this).attr("id");
	  loads(page);
   });		
  
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
			
	$(document).on('click','.pdf',function(){
	var id = $(this).data('id4');
	var action = "generate";
	               $.ajax({
					url: "generate_data_pdf.php",
					method: "POST",
					data:{id:id,action:action},
					success: function(data) {
						$('#pak').css('display','block');
						$('#resultats').html(data);
					}
				});
          });
	
	// afficher la div pour réinitailiser les chiffres	
	$(document).on('click','.butt',function(){
    $('.reini').css('display','block');
    $('#pak').css('display','block');
    });
	
   // envoi du formulaire
	 
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
	 },4000);
	  
	  
  });
  
  // envoi du formulaire
	 
	$(document).on('submit','#formc', function(event) {
	event.preventDefault();
	var form_data =$(this).serialize();
	var action ="delete_check";
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'test.php',// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres retour
       $('#result').html(data);
	   $('#result_recher').css('display','none');
	  loads();
	  }
    });
	
	setInterval(function(){
		 $('#result').html('');
		 location.reload(true);
	 },4000);
	  
	
	});
	
	$(document).on('submit','#formd', function(event) {
	event.preventDefault();
	var form_data =$(this).serialize();
	var action ="delete_check";
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'test.php',// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres retour
       $('#result').html(data);
	   $('#result_recher').css('display','none');
	  loads();
	  }
    });
	
	setInterval(function(){
		 $('#result').html('');
		 location.reload(true);
	 },4000);
	  
	
	});
	
	// effectuer des recherche
	
	$(document).on('change','#list',function(){
	 function recher(page) {
				var action="list";
				var id=$('#list').val();
				$.ajax({
					url: "recher_facture_home.php",
					method: "POST",
					data:{id:id,action:action,page:page},
					success: function(data) {
						$('#results').css('display','none');
						$('#resu').html(data);
						
					}
				});
			}

			recher();
		
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
  
 
 $(document).on('click','.details',function(){
	   	var id = $(this).data('id2');	
      // on affiche la div
       $('#id'+id).slideToggle();
       
	   for(id-1; id <5000; id++){
        $('#id'+id).css('display','none');
        }

        for(5000; id > 0; id--){
        $('#id'+id).css('display','none');
        }	
		 			
		 	
	 });
	 
	 
   
   });