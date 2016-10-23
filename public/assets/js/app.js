(function(){
			
	var form = $('form');

	function displayResult(result) {

		form[0].reset();

		var template = '<div class="page-header"><h1 class="text-center text-primary">' 
		+ result.sum + '<br><small>for your ' + result.customerType 
		+ ' Account</small></h1></div>';

		$('#result').html(template);
	}

	function displayError(result) {
		
		var errorMsg =  (JSON.parse(result.responseText)).error
	
		var template = '<div class="page-header">' + 
		'<h3 class="text-center text-danger">' + errorMsg + '</h3></div>';

		$('#result').html(template);
	}

	form.on('submit', function (e) {
		e.preventDefault();

		var data = $( this ).serialize();

		$.ajax({
		  type: form.attr("method"),
		  url: form.attr("action"),
		  data: data,
		  dataType: 'json'
		}).success(displayResult).error(displayError);

	});
	
})();