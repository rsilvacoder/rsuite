$( '#start' ).click(function(){
	$('#dorks').attr('disabled','disabled');
});

function sendVull() {

	$.ajax({
		url : '/admin/clients/sendvull',
		complete : function(r) {

			//console.log(r.responseText);

			$('#send_'+r.responseText).trigger('click');

			sendVull();
		}
	});	
}

function reloadInfos() {
	$.ajax({
		url : '/admin/clients/getinfo',
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
		url : '/admin/scan/getdorks/'+chave,
		beforeSend : function() {

			$('#' + idForm + '_status').text('Preparando dorks');
			$('#' + idForm + '_status').fadeIn('slow');
		},
		complete : function(emails) {

			$('#' + idForm + '_status').text('Scaneando');
			
			$('#' + idForm + '_dorks').val($('#dorks').val());
			$('#' + idForm + '_chave').val(chave);

			console.log('submit: ' + $('#' + idForm + '_assunto').val());

			$(form).submit();
		}
	});
});

$('#refresh').click(function(){
	location.reload();
});