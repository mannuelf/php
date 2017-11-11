tinymce.init({
	selector: 'textarea'
});

console.log('scripts initiated.');

$(document).ready(function(){

	$('.jqSelectAllBoxes').click(function(e) {
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

});
