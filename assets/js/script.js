$(function(){
	feedback_form=$('#feedback_form');
	feedback_form.on('submit',function(e){
		e.preventDefault();
		send_feedback = $('#send_feedback');
		send_feedback.button('loading');
		$.post(base_url+'feedback/add',feedback_form.serializeArray(),function(){
			feedback_form[0].reset();
			send_feedback.button('reset');
			var alert_cont=$('#alert-feedback').removeClass('hide');
			setTimeout(function(){alert_cont.addClass('hide')},10000);
		});
		return false;
	});
});