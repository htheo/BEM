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

//commentaire

// fonction swap 
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