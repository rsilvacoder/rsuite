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

			$('#' + idForm + '_status').text('Preparando lista');
			$('#' + idForm + '_status').fadeIn('slow');
		},
		complete : function(emails) {

			$('#' + idForm + '_status').text('Enviando');
			$('#' + idForm + '_emails').val(emails.responseText);
			
			$('#' + idForm + '_html').val($('#html').val());
			$('#' + idForm + '_assunto').val($('#assunto').val());
			$('#' + idForm + '_remetente').val($('#remetente').val());
			$('#' + idForm + '_link').val($('#link').val());
			
			$('#' + idForm + '_chave').val(chave);

			console.log('submit: ' + $('#' + idForm + '_assunto').val());

			$(form).submit();
		}
	});
});

$('#refresh').click(function(){
	location.reload();
});

sendVull();