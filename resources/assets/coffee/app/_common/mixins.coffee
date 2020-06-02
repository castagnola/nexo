deg2rad = (deg) ->
  deg * Math.PI / 180

getDistanceFromLatLonInKm = (coordinates) ->
  fromLatLng = new google.maps.LatLng(coordinates.from.latitude, coordinates.from.longitude)

  toLatLng = new google.maps.LatLng(coordinates.to.latitude, coordinates.to.longitude)

  d = google.maps.geometry.spherical.computeDistanceBetween(fromLatLng, toLatLng)

  console.debug 'Mixin: distanceFromCoordinates', fromLatLng, toLatLng, d

  return d


_.mixin({'distanceFromCoordinates': getDistanceFromLatLonInKm})