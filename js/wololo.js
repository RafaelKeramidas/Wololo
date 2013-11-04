/***
 * Wololo - Main JavaScript
 * 
 * @Author		Rafael Keramidas <rafael@keramid.as>
 * @Version     1.0
 * @Date        4th November 2013
 * @License     MIT <Look at licence.txt>
 ***/
	 
$(function(){

	$('.status').tooltip();
	
	$('.wake').click(function(){
		var id = $(this).attr('name');
		$("#loading-" + id).removeClass('hidden');
			
		$.get('ajax/wake.ajax.php', { id: id }).done(function(data) {
			$("#loading-" + id).addClass('hidden');
			alert(data);
		});
	});
	
	$('.status').click(function() {
		var id = $(this).attr('name');
		isOnline(id);
	});
	
});

function isOnline(id) {
	$("#status-" + id).removeClass('btn-success btn-danger').addClass('btn-warning');
	$("#status-" + id).html('Checking');
	$("#loading-" + id).removeClass('hidden');
	
	$.get('ajax/check.ajax.php', { id: id }).done(function(data) {
		if(data == 'ok') {
			$("#status-" + id).removeClass('btn-warning').addClass('btn-success');
			$("#status-" + id).html('Online');
		}
		else {
			$("#status-" + id).removeClass('btn-warning').addClass('btn-danger');
			$("#status-" + id).html('Offline');			
		}
		$("#loading-" + id).addClass('hidden');
	});
}

