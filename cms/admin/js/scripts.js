tinymce.init({
	selector: 'textarea'
});

console.log('scripts initiated...');

$(document).ready(function() {

	$('.jqSelectAllBoxes').click(function() {
		if(this.checked) {
			$('.jqCheckBoxes').each(function() {
				console.log('checkIt');
				this.checked = true;

			});
		} else {
			$('.jqCheckBoxes').each(function() {
				console.log('UncheckIt');
				this.checked = false;
			})
		}
	});

	var div_box = "<div id='load-screen'><div id='loading'></div></div>";
	$('body').prepend(div_box);

	$('#load-screen').delay(700).fadeOut(600, function() {
		$(this).remove();
	});

});
