@extends('layout')

@section('header')
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<header id="banner" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <button type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
    <nav id="navbar" role="navigation" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#top" class="scrollable">Map</a></li>
        <li><a href="#portfolio" class="scrollable">New</a></li>
        <li><a href="#contact" class="scrollable">Share</a></li>
      </ul>
    </nav>
  </div>
</header>
<!-- end header--><a id="top" name="home"></a>

@stop


<!-- Adding Map -->
@section('map')

<style>
#map {
  height: 80%;
  width: 100%;
}
</style>
<div id="map"></div>
<script>
  function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 42.0308, lng: -93.6319},
      zoom: 3
    });

    var marker = new google.maps.Marker({
          position: {lat: 42.0308, lng: -93.6319},
          map: map,
          title: 'I visited!'
        });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoCNaVtm5v0u6cQ5FOxBBhkSIQ0LiZJXc&callback=initMap"
async defer></script>
@stop
