$(document).ready(function(){
	$(".cmi-mainnav" ).click(function() {
	  var href = $(this).attr('href');
	  var showContainerId = "#cmi-container-"+ href.replace("#","");
	  $(".cmi-container-home").addClass("hidden");
	  $(showContainerId).removeClass("hidden").addClass("show");
	});

	$('.about').click(function(){
		$("#cmi-container-aboutus").slideDown(6000);
	})
	
	$(".fancybox").fancybox();
});
 function initialize() {
    var mapCanvas = document.getElementById('map');
    var mapOptions = {
      center: new google.maps.LatLng(44.5403, -78.5463),
      zoom: 8,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions)
  }
  google.maps.event.addDomListener(window, 'load', initialize);

