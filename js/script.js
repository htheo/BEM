if (navigator.geolocation)
{
  navigator.geolocation.getCurrentPosition(function(position)
  {
    alert("Latitude : " + position.coords.latitude + ", longitude : " + position.coords.longitude);
  });
}
else
{
  alert("Votre navigateur ne prend pas en compte la géolocalisation HTML5");
}