function fournisseur()
	   {
	 
	 
	   document.getElementById('fournisseur').style.display="block";

	   document.getElementById('client').style.display="none";
	    
	}
	function client()
	   {
	 
	 
	   document.getElementById('client').style.display="block";

	   document.getElementById('fournisseur').style.display="none";
	    
	}
console.log('coucou');
    function initialize() {
      if(document.getElementById('valid')){
        document.getElementById('valid').style.display="none";
      }
       if(document.getElementById('valid2')){
        document.getElementById('valid2').style.display="none";
      }
        
        var address = (document.getElementById('address'));
        var autocomplete = new google.maps.places.Autocomplete(address);
        autocomplete.setTypes(['geocode']);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
                return;
            }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
        }
      });
}
function verif() {
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results);
      
      var lat = results[0].geometry.location.lat();
      var longi = results[0].geometry.location.lng();
      document.getElementById("lat").value = lat;
      document.getElementById("long").value = longi;
      document.getElementById("valid").style.display="block";
      } 

      else {
        alert("L'adresse renseignée n'est pas connue");
        console.log(results);
      }
    });
  }
function verif2() {
    geocoder = new google.maps.Geocoder();
    var address = document.getElementById("address").value;
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results);
      
      var lat = results[0].geometry.location.lat();
      var longi = results[0].geometry.location.lng();
      document.getElementById("lat2").value = lat;
      document.getElementById("long2").value = longi;
      document.getElementById("valid2").style.display="inline-block";
      } 

      else {
        alert("L'adresse renseignée n'est pas connue");
        console.log(results);
      }
    });
  }
if(document.getElementById('valid')){
	google.maps.event.addDomListener(window, 'load', initialize);

}

//commentaire

// fonction swap 
 if(document.getElementById('besoin2')){
  $( "#besoin2" ).click(function() {
    $(this).addClass('selection_swap');
    $( "#achat2" ).removeClass('selection_swap');
    $( "#besoin ").addClass("hidden");
    $(" #vente ").removeClass("hidden");
  });
  $( "#achat2" ).click(function() {
    $(this).addClass('selection_swap');
    $( " #besoin2" ).removeClass('selection_swap');
    $(" #besoin ").removeClass("hidden");
    $(" #vente ").addClass("hidden");

});
}