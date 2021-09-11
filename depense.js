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
	
   $('#but').click(function(){
   $('#examp').css('display','block');
   $('#pak').css('display','block');
   var email = "default@gmail.com";
   $('#email').val(email);
 });
 
 $('#im').click(function(){
 $('#data').css('display','block');
 });
 
 $('.sup').click(function(){
	$('#pak').css('display','none');
    $('.reini').css('display','none');	
	 
 });
 

 $('#pak').click(function(){
	$('#examp').css('display','none');
   $('#pak').css('display','none');
   $('.reini').css('display','none');
   $('.annuler').css('display','none');
   $('.annu').css('display','none');
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
  $('#contens'+id).slideToggle();
  	
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

// afficher les données des dépenses
  // afficher les données des encaissements
  function loads(page) {
				var action="fetchs";
				$.ajax({
					url: "depenses_view_datas.php",
					method: "POST",
					data:{action:action,page:page},
					success: function(data) {
						$('#resul_depense').html(data);
					}
				});
			}

			loads();


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

	// ajouter des champs formualire pour les dépenses
	var cont = 0;
$(document).on('click','#dir', function(){
  var html = '';
 cont = cont +1;
 html += '<tr class="dir" id ="row_id_'+cont+'">';
 html += '<td><input type="date" class="date" id="ti" name="ti[]" required></td>';
 html +='<td><input type="text" class="designation" id="designation" name="designation[]" placeholder="Désignation" required></td>';
 html +='<td><input type="text" class="fournisseur" id="fournisseur" name="fournisseur[]" placeholder="fournisseur"/></td>';
 html +='<td><select name="des[]" id="des"><option value="1">dépense effectué</option><option value="2">crédit fournisseur</option></select></td>';
 html +='<td><input type="number" class="montant" id="montant'+cont+'" name="montant[]" placeholder="Montant" required></td>';
 html +='<td><button class="remove" name="remove" id="'+cont+'"><i class="material-icons" style="font-size:25px">highlight_off</i></button></td>';
 html +='</tr>';
$('#affiche').append(html);
$('#add').html('<button type="submit" class="clic">Enregistrer</button>');
});

   $(document).on('click','.remov', function(){
   $(this).closest('tr').remove();
   cot=cot-1;
   calcules();
  });
    
	
	// suprimer une ligne pour les dépenses.
   $(document).on('click','.remove', function(){
   var id = $(this).attr("id");

  
   var idt=$('#idt').val();
  $('#row_id_' +id).remove();
  cont =cont -1;
  calcul();
  });

  // fonction
  function calcul() {

 var totale = 0;
 var total_items=0;
 for(j=1; j<500; j++) {
 var mont = 0;
  mont = $('#montant'+j).val();
 if(mont > 0) {

 totale = parseFloat(totale)+ parseFloat(mont);

  }
 }

  $('#idt').val(totale);
 $('#idy').val(totale);
}

 function calcul() {

 var totale = 0;
 var total_items=0;
 for(j=1; j<500; j++) {
 var mont = 0;
  mont = $('#montant'+j).val();
 if(mont > 0) {

totale = parseFloat(totale)+ parseFloat(mont);

  }
 }

$('#idt').val(totale);
$('#idy').val(totale);
}

 // blur sur le montant pour le total
 $(document).on('blur','.montant',function() {
calcul();
 });
   // afficher la div pour réinitailiser les chiffres
	$(document).on('click','.butt',function(){
    $('.reini').css('display','block');
    $('#pak').css('display','block');
    });



	 $(document).on('click','#add_local', function() {
	// on traite le fichier recherche apres le retour
	  $('#form1').submit();

	});


    // delete home--
 $(document).on('click','.modifier', function(){
	 // recupere la variable
	 var id = $(this).data('id3');
	 var action = "modifier";
	
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_view_datas.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_modifier').html(data);
	 $('#pak').css('display','block');
	}
	});
 });
 
 
 
	
   // formulaire d'envoi et enregsitrement des dépenses
   $('#form_depense').on('submit', function(event) {
	  var action ="insert";
	  var fact =$('#fact').val();
    event.preventDefault();
    var regex = /^[a-zA-Z0-9éçàùèàè!:;]{0,150}$/;	
	var rege =  /^[a-zA-Z0-9-]{0,15}$/;
	var reg =   /^[0-9]{0,15}$/;
   var form_data =$(this).serialize();
  
  if(fact.length > 10) {
	  $('#erros').html('le numéro de la facture ne peut pas dépasser 10 caractères');  
  }
  
  if(!rege.test($('#fact').val())) {
	 $('#erros').html('le numéro de la facture doit comporter un chiffre,nombre ou un tiret'); 
  }
  
   $('.designation').each(function() {
	 
	 if($(this).val().length >150){
		$('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le champ désignation pas plus de 150 caractères');
	 }
	 
	else if (!regex.test($(this).val())){
      $('#erros').html('erreur de syntaxe pour la désignation');
    }
	
	else{
		
		$('#erros').html('');
	}
	 
   });
   
   $('.fournisseur').each(function() {
	
     if($(this).val().length >100){
		$('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le champ fournisseur pas plus de 100 caractères');
	 }
	 
	 else if (!regex.test($(this).val())){
      $('#erros').html('erreur de syntaxe pour la désignation');
    }
	
	else {
		$('#erros').html('');
	}
	 
   });
   
   
  $('.montant').each(function() {
	 if($(this).val().length > 10){
    $('#erros').html('<i class="material-icons" style="font-size:22px;color:red;padding-left:-2%;font-weight:bold;">help_outline</i> le montant doit etre moins 10 caractère');
   }
   else{
	  $('#erros').html(''); 
   }
   
  });
  
  var erreur=$('#erros').text();
  
    if(erreur=="") {

	$.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_validate_datas.php',// on traite par la fichier
	data:form_data,
	success:function(data) { // on traite le fichier recherche apres le retour
      $('#result_depense').html('<div class="enre"><div><i class="fas fa-check-circle" style="color:green"></i>Dépenses enregsitrées</button>');
	  $('#pak').css('display','none');
	  $('#examp').css('display','none');
	  load();
	  $('#affiche').find("tr:gt(0)").remove();
	 
      }
    });
	
	setInterval(function(){
		 $('#result_depense').html('');
		 location.reload(true);
	 },4000);
	 
	}
    	
  });


  //
  
  // delete home--
 $(document).on('click','.annul', function(){
	 // recupere la variable
	 var id = $(this).data('id4');
	 var action = "annuler";
    // affiche les differentes
	$('.annuler').css('display','block');
	$('#id_fact').text(id);
    $('#pak').css('display','block');
	$('#ids').val(id);
	
	$(document).on('click','.annuls', function(){
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_view_datas.php',// on traite par la fichier
	data:{id:id,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_annuler').html('<div class="enre"><div><i class="fas fa-check-circle" style="color:green"></i>dépense annulée</div>');
     $('.annuler').css('display','none');
     $('#pak').css('display','none');
	 load();
	 loads();
	}
		
	});
	
	setInterval(function(){
		 $('#data_annuler').html('');
	 },4000);

 });
 });
 
 
 // delete home--
 $(document).on('click','.mettre', function(){
	 // recupere la variable
	 var id = $(this).data('id5');
	 var action = "mettre";
	 
    // affiche les differentes
	$('.annu').css('display','block');
    $('#pak').css('display','block');
	$('#idc').val(id);
	
	$(document).on('click','.put', function(){
	var mont=$('#mont').val();
	$.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_view_datas.php',// on traite par la fichier
	data:{id:id,mont:mont,action:action},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_annuler').html('<div class="enre"><div><i class="fas fa-check-circle" style="color:green"></i>montant payé</div>');
     $('.annu').css('display','none');
     $('#pak').css('display','none');
	 load();
	 loads();
	}
		
	});
	
	setInterval(function(){
		 $('#data_annuler').html('');
	 },4000);

 });
 });

    
   $(document).on('click','#modif', function(){
	 var action ="modi";
	 var md = $('#md').val();
	 var date = $('#date').val();
	 var fournisseu =$('#fournisseu').val();
	 var designatio =$('#designatio').val();
	 var status =$('#status').val();
	 var monts = $('#monts').val();
	 var facts = $('#facts').val();
	 
	 if(date.length!="" && status!=""){
	 if(designatio.length!="" && designatio.length < 150){	 
	if(fournisseu.length < 150) {
	if(monts.length < 10){
	 $.ajax({
	type:'POST', // on envoi les donnes
	url:'depenses_view_datas.php',// on traite par la fichier
	data:{md:md,monts:monts,action:action,facts:facts,date:date,fournisseu:fournisseu,status:status,designatio:designatio},
	success:function(data) { // on traite le fichier recherche apres le retour
     $('#data_modifier').html(data);
     $('#pak').css('display','none');
     loads();
	 load();
	}
		
	});
	
	setInterval(function(){
		 $('.enre').html('');
	 },4000);
	
	 }
	 
	 else{
		$('.error6').html('* le montant est obligatoire et moins de 10 chiffres');		
		 
	 }
	 
	}
	 
	 else{
		$('.error3').html('* le fournisseur  est moins de 150 caractères');		
		 
	 }
	 
	 }
	 
	 else{
		$('.error4').html('* la désignation est obligatoire et moins de 150 caractères');		
		 
	 }
	 
	 }
	   
  });

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
	url:'depenses_view_datas.php',// on traite par la fichier
	data:{checkbox_value:checkbox_value,action:action},
	success:function() {
	 loads();
	 var nombre = checkbox.length;
	 if(nombre==1){
	   var nbrs ="supression d'une dépense"; 
	 }
	 
	 else{
		 var nbrs = 'vous avez suprimez <span class="drt">'+nombre+'</span>factures'; 
	 }
	 
	 $('#result').html('<div class="enre"><span class="d" style="color:#AB040E;"><i class="fas fa-exclamation-circle" style="font-size:16px;color:#AB040E;"></i>'+nbrs+'</div>');
	 }
   });
   }
 
 else {
	$('#result').html('<div class="enre"><span class="d" style="color:#AB040E;"><i class="fas fa-exclamation-circle" style="font-size:16px;color:#AB040E;"></i> aucune dépense selectionnée</span></div>');
	 
 }
 
 });
 
 $(document).on('change','#liste',function(){
	 function recher(page) {
				var action="fetch";
				var id= $('#liste').val();
				$.ajax({
					url: "recher_depenses_home.php",
					method: "POST",
					data:{id:id,action:action,page:page},
					beforeSend: function() {
                   $('#pak').fadeIn(50);
				   $('#pak').fadeOut(3000);
                   },
					success: function(data) {
						$('#resul_depense').css('display','none');
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
 
 

});