$(document).ready(function(){
	$(".cmi-mainnav" ).click(function() {
	  var href = $(this).attr('href');
	  var showContainerId = "#cmi-container-"+ href.replace("#","");
	  $(".cmi-container-home").addClass("hidden");
	  $(showContainerId).removeClass("hidden").addClass("show");
	});
});