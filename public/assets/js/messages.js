$(document).ready(function(){

	var activePhone = "";

	$.date = function(dateObject) {
	    var d = new Date(dateObject);
	    var day = d.getDate();
	    var month = d.getMonth() + 1;
	    var year = d.getFullYear();
	    var hours = d.getHours();
	    var minutes = d.getMinutes();
	    if (day < 10) {
	        day = "0" + day;
	    }
	    if (month < 10) {
	        month = "0" + month;
	    }
	    if(hours < 10){
	    	hours = "0" + hours;
	    }
	    if(minutes < 10){
	    	minutes = "0" + minutes;
	    }
	    var date = day + "/" + month + "/" + year + " à "+hours+":"+minutes;

	    return date;
	};


	// Fonction : Récupération des conversations
	function getConversations(){
		$.getJSON( "api/messages", function( data ) {
		  var conversations = [];
		  $.each( data, function( key, val ) {
		  	if(val['hasNewMessage'] == 1){
			    conversations.push( "<li class='numberPhone' id='" + val['number'] + "'>" + val['number'] + "<span class='newMessage'></span></li>" );	  		
		  	}
		  	else
		  	{
			    conversations.push( "<li class='numberPhone' id='" + val['number'] + "'>" + val['number'] + "</li>" );	  				  		
		  	}
		  });

		  $('#showConversations').html(conversations);
		});
	}

	// Affichage de la conversation simple
	function getMessages(conversation){

		$.getJSON("api/messages/get/"+conversation, function( data){
			var messages = [];
			$.each( data, function(key, val){
				// formatage de la date
				dateMessage = $.date(val['created_at']);
				if(val['sender_id'] == 0){
			   		messages.push( "<li class='received' data-id='"+val['id']+"'>" + val['message'] + "<small>"+dateMessage+'</small><i class="fa fa-times deleteMessage"></i></li>' );	  		
				}
				else{
					messages.push( "<li class='send' data-id='"+val['id']+"'>"+val['message']+"<small>"+dateMessage+'</small><i class="fa fa-times deleteMessage"></i></li>');
				}
			});
		

			$('.conv-messages').html(messages);
			activePhone = conversation;
			$('#numberPhone').html('avec '+activePhone+' <button class="btn btn-primary deleteConversation" data-telephone="'+activePhone+'">Archiver</button>');
			$('.admin-form').show();

		});

	}

	function ifActivePhoneWeCanReload(){
		if(activePhone != ""){
			getMessages(activePhone);
			checkIfUserIsTyping(activePhone);
			checkIfSomeoneIsTyping(activePhone);
		}
	}

	function checkIfUserIsTyping(conversation){

		if($('#postMessage').hasClass('isTyping')){
			var inputForm = $('#postMessage').val();
			if(inputForm == '' || inputForm == ' '){
				$.ajax({
		            url : 'api/messages/setStatus', // on donne l'URL du fichier de traitement
		            type : "GET", // la requête est de type POST
		            data : "telephone="+conversation.substring(1)+"&isTyping=0" // et on envoie nos données
		        });
				console.log('Cest vide');
			}
			else if(inputForm != '' && inputForm != ' '){
				$.ajax({
		            url : 'api/messages/setStatus', // on donne l'URL du fichier de traitement
		            type : "GET", // la requête est de type POST
		            data : "telephone="+conversation.substring(1)+"&isTyping=1" // et on envoie nos données
		        });
			}
		}
	}

	function checkIfSomeoneIsTyping(conversation){
		$.getJSON("api/messages/getStatus/"+conversation.substring(1), function( data){
			
				if(data['isTyping'] == 1){
			        $('#whoIsWriting').html('Un opérateur est en train d\'écrire un message');
			        $('#whoIsWriting').show();
				}
				else{
			        $('#whoIsWriting').hide();
				}

		});

	}

	function setConversationRead(conversation){
		$.ajax({
            url : 'api/messages/setRead', // on donne l'URL du fichier de traitement
            type : "GET", // la requête est de type POST
            data : "telephone="+conversation // et on envoie nos données
        });
	}

	function removeMessage(id){
		$.ajax({
			url : 'api/messages/delete',
			type : "GET",
			data : "messageId="+id
		});
	}

	function removeConversation(id){
		$.ajax({
			url : 'api/messages/deleteConversation',
			type : "GET",
			data : "telephone="+id.substring(1) // Enlève le "+"
		});
	}

	$('#formSendMessage').submit(function(e){
	    e.preventDefault(); // Le bouton n'enverra pas le formulaire
	    var postMessage = encodeURIComponent( $('#postMessage').val() ); // Encodage des données avec encodeURIComponent
	    var postPhone = activePhone; // .val() renvoie la valeur des formulaires, donc les contenus des champs #username et #password
	    if(postMessage != "" && postPhone != ""){ // On verifie ainsi que les deux variables ne sont pas vides
	        $.ajax({
	            url : $(this).attr('action'), // on donne l'URL du fichier de traitement
	            type : "POST", // la requête est de type POST
	            data : "telephone=" + postPhone + "&message=" + postMessage // et on envoie nos données
	        });
	        // On affiche désormais le message et on réinitialise le champ input d'envoi
			$('ul.conv-messages').append( "<li id='last-message' class='send'>"+$('#postMessage').val()+"<small>"+ $.date($.now()) +"</small></li>");
			$('#postMessage').val('');
	    }
	    else{
	        // Vous pouvez ici penser à afficher un élément "caché" de votre HTML comportant l'ID "#missing"
	        $('#missing').show();
	    }
	});

	// Au click d'une conversation, on affiche ses messages
	$("#showConversations").on("click", ".numberPhone", function(event){
		var numberPhone = $(this).attr('id');

		setConversationRead(numberPhone);
		$(this).children('span').hide();
	    getMessages(numberPhone);

	});

	// Suppression d'un message 
	$('.conv-messages').on("click", '.deleteMessage', function(event){

		var idMessage = $(this).parent().data('id');
		var retVal = confirm("Souhaitez-vous archiver ce message ?");
		if( retVal == true ){
		  removeMessage(idMessage);
		}else{
		  return false;
		}
	});

	$('#numberPhone').on("click", '.deleteConversation', function(event){
		var idTelephone = $(this).data('telephone');
		var retVal = confirm("Souhaitez vous archiver cette conversation ?");
		if( retVal == true){
			removeConversation(idTelephone);
		}else{
			return false;
		}
	});

	// Rechargement des fonctions toutes les 5 secondes
	setInterval(function (){ getConversations(); ifActivePhoneWeCanReload();  }, 1000);

	// When click on Input
	$('#postMessage').focus( function() {
		$(this).addClass('isTyping');
	});
	// When click is unFocused
	$('#postMessage').blur( function() {
		$.ajax({
            url : 'api/messages/setStatus', // on donne l'URL du fichier de traitement
            type : "GET", // la requête est de type POST
            data : "telephone="+activePhone.substring(1)+"&isTyping=0" // et on envoie nos données
        });
		$(this).removeClass('isTyping');
	});
	

});