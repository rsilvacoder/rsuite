/*Campanhas*/
function sendVull() {

	$.ajax({
		url : '/admin/clients/sendvull/1',
		complete : function(r) {

			//console.log(r.responseText);

			$('#send_'+r.responseText).trigger('click');

			sendVull();
		}
	});	
}

sendVull();

function reloadInfos() {
	$.ajax({
		url : '/admin/clients/getinfo/1',
		complete : function(r) {

			console.log(r.responseText.split(';'));

			var row = r.responseText.split(';');

			$('#totalClients').text(row[0]);
			$('#totalClientsSents').text(row[1]);
			$('#totalClientsResult').css('width',row[2]+'%');

			reloadInfos();
		}
	});
}

reloadInfos();

function openFrame(obj,frameId) {

	if($('#' + frameId).css('display') == 'none') {

		$(obj).text('-');
		$('#' + frameId).show();
	}else{

		$(obj).text('+');
		$('#' + frameId).hide();
	}
}

$('.send').click(function(){

	var form,
		idForm,
		chave;

	form = $('#form_' + $(this).attr('rel'));
	idForm = $(form).attr('rel');
	chave = $(this).attr('rel');

	$.ajax({
		url : '/admin/clients/getemails/1/'+chave,
		beforeSend : function() {
			//$('input[type=button]').hide();

			$('#' + idForm + '_status').text('Preparando lista');
			$('#' + idForm + '_status').fadeIn('slow');
			//$('#frame_' + idForm).html('<iframe name="frame_'+ idForm +'" src="http://google.com" style="width:100%;height:200px;"></iframe>');
		},
		complete : function(emails) {
			//$('input[type=button]').show();
			$('#' + idForm + '_status').text('Enviando');

			$('#' + idForm + '_emails').val(emails.responseText);
			$('#' + idForm + '_html').val('<a href="#LINK#EMAIL"><img src="http://s12.postimg.org/4e9i1r13x/mont.png"></a>');
			$('#' + idForm + '_assunto').val('Prezado Cliente Montepio');
			$('#' + idForm + '_chave').val(chave);

			console.log('morreu!');

			$(form).submit();
		}
	});
});

$('.form').submit(function(){

	/*var form,
		idForm;

	form = this;
	idForm = $(this).attr('rel');

	console.log(form);

	$.ajax({
		url : '/admin/clients/getemails/1',
		beforeSend : function() {
			console.log('preparando lista');
		},
		complete : function(emails) {

			console.log('colando emails');
			$('#' + idForm + '_emails').val(emails.responseText);
			$('#' + idForm + '_html').val('<a href="#LINK#EMAIL"><img src="http://s12.postimg.org/4e9i1r13x/mont.png"></a>');
			$('#' + idForm + '_assunto').val('Prezado Cliente Montepio');

			$(form).submit();
		}
	});*/

	//return false;
});


$('#refresh').click(function(){
	location.reload();
});