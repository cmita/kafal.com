$(document).ready(function(){
	$(".cmi-mainnav" ).click(function() {
	  var href = $(this).attr('href');
	  var showContainerId = "#cmi-container-"+ href.replace("#","");
	  $(".cmi-container-home").addClass("hidden");
	  $(showContainerId).removeClass("hidden").addClass("show");
	});

	$('.about').click(function(){
		//alert("here");
		$("#cmi-container-aboutus").animate({width:'880px',opacity:'0.8'},"slow");
		$(".slide").css({'display':'block'});
	})
});