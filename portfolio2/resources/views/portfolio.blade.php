@extends('layout')

@section('header')
<li><a href="#top" class="scrollable">Map</a></li>
<li><a href="#portfolio" class="scrollable">New</a></li>
<li><a href="#contact" class="scrollable">Share</a></li>
<!-- end header-->
@stop


<!-- Adding Map -->
@section('map')

<style>
#map {
  height:90%;
  width: 100%;
}
</style>
<div id="map"></div>
<script>
function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 40.4168, lng: -3.7038},
    zoom: 2,
    scrollwheel: false
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

@section('new')
<section id="portfolio">
  <h2>New Location</h2>
  <ul class="grid">
    <?php foreach ($database as $data): ?>
      <li><img src="{{ $data->imageUrl }}"><font color="#666"> {{$data->imageStory}} </font></li>
    <?php endforeach; ?>
  </ul>
</section>
@stop

@section('share')
<section id="contact"  style="background-color:#1e1e1e;">
    <br/>
    <h2 style="color:#fff">Share Your Travel Experience</h2>
    <hr class="style-white"/>
    <div>
      <form id="contactForm" novalidate="">
        <div class="form-item">
          <label for="“name”">Username</label>
          <input id="name" type="text" placeholder="Username" style ="color:#d2d2d2" required/>
        </div>
        <div class="form-item">
          <label for="“password”">Password</label>
          <input id="password" type="password" placeholder="Password" style ="color:#d2d2d2" required/>
        </div>
        <div class="form-item">
          <label for="“image”">Image</label>
          <input id="image" placeholder="Image will be submitted here" style ="color:#d2d2d2" required/>
        </div>
        <div class="form-item">
          <label for="“message”">Your Travel Story</label>
          <textarea id="message" rows="5" placeholder="Your Travel Story" style ="color:#d2d2d2" required/></textarea>
        </div><br/>
        <button type="submit">Send</button>
      </form>
      <div id="form_text">
      </div>
    </div>
  </br>
  </section>
@stop

@section('footer')
<!-- Footer-->
<footer>
  <div id="footer-above">
    <div>
      <h3>About this page</h3>
      <p style="color:#1e1e1e"> Made by Brad Stiff & Keisuke Sato</p>
    </div>
    <div>
      <h3>Around the Web</h3>
      <div class="social"><ul>
        <li><a target="_blank" href="https://www.linkedin.com/in/keisuke-sato-15a601a0?trk=nav_responsive_tab_profile_pic" class="button social"><i class="fa fa-fw fa-linkedin"></i></a></li>
        <li><a target="_blank" href="https://github.com/ksato0607" class="button social"><i class="fa fa-fw fa-github"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/trip_go_trip" class="button social"><i class="fa fa-fw fa-twitter"></i></a></li>
      </ul>
          </div>
    </div>
  </div>
</footer>
@stop