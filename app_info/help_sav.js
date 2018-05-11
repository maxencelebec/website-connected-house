
document.getElementById("device").addEventListener("click", choosedisplay);
$('#device').change(function(){

	$('#msg').placeholder($("#device option:selected").text());
	    
	});

