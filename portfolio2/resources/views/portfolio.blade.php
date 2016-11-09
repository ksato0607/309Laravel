@extends('layout')

@section('header')
<li><a href="#top" class="scrollable">Map</a></li>
<li><a href="#portfolio" class="scrollable">New</a></li>
<li><a href="#contact" class="scrollable">Share</a></li>
<!-- end header-->
@stop

<!-- Adding Map -->
@section('map')
<div id="floating-panel"></div>
<div id="map"></div>
<script>

function initMap() {
  var map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 40.4168, lng: -3.7038},
    zoom: 2,
    scrollwheel: false
  });
  var geocoder = new google.maps.Geocoder();
  var countTravellers = 0;
  @foreach ($database as $data)
    geocodeAddress(geocoder, map, "{{$data->imageLocation}}");
    countTravellers++;
  @endforeach
  document.getElementById("floating-panel").innerHTML = countTravellers + " Travellers! ";
}

 function geocodeAddress(geocoder, resultsMap, address) {
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === 'OK') {
      var marker = new google.maps.Marker({
        map: resultsMap,
        position: results[0].geometry.location,
        title: address
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoCNaVtm5v0u6cQ5FOxBBhkSIQ0LiZJXc&callback=initMap"
async defer></script>
<script type="text/javascript">

</script>
@stop

@section('new')
<section id="portfolio">
  <h2>New Location</h2>
  <ul class="grid">
    @foreach ($database as $data)
      <li><img src="{{ $data->imageUrl }}" alt="image not available"><font color="#666"> {{$data->imageStory}} </font></li>
  @endforeach
  </ul>
</section>
@stop

@section('share')
<section id="contact"  style="background-color:#1e1e1e;">
    <br/>
    <h2 style="color:#fff">Share Your Travel Experience</h2>
    <hr class="style-white"/>
      <div class="container">
      <div class="panel panel-primary">
      <div class="panel-body">

        <div class="alert alert-danger" id="validationFail">
          <strong>Whoops!</strong> There were some problems with your input.
        </div>

        <div class="alert alert-success alert-block" id="validationSuccess">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Image Uploaded successfully.</strong>
        </div>

      <form id="contactForm" novalidate="" action="{{ url('/#contact') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-item">
          <label for="“name”">Username</label>
          <input id="name" type="text" placeholder="Username" style ="color:#d2d2d2" required/>
        </div>
        <div class="form-item">
          <input id="password" type="password" placeholder="Password" style ="color:#d2d2d2" required/>
        </div>
        <div class="form-item">
          <input id="location" rows="5" placeholder="Location" style ="color:#d2d2d2" required/></input>
        </div>
        <div class="form-item">
          <textarea id="message" rows="5" placeholder="Your Travel Story" style ="color:#d2d2d2" required/></textarea>
        </div>
        <input type="file" value="upload" id="fileButton"/></br>
        </br>
        <input type="button" value="Share" id="shareButton"/></br>
      </br>
        <img id="imageTest" width="200">
      </form>
      <div id="form_text"></div>
    </div>
  </div>
</div>
  </br>
  </section>
  <script src="https://www.gstatic.com/firebasejs/3.5.3/firebase.js"></script>
  <script>
  if(localStorage.validationSuccess=="TRUE"){
    document.getElementById('validationSuccess').style.display = "block";
    localStorage.setItem("validationSuccess", "FALSE");
  }
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDOwreQX85mVM0k6M4bdK21SLZ-NY-J484",
    authDomain: "laravel-659e1.firebaseapp.com",
    databaseURL: "https://laravel-659e1.firebaseio.com",
    storageBucket: "laravel-659e1.appspot.com",
    messagingSenderId: "787528647984"
  };
  firebase.initializeApp(config);

  var fileButton = document.getElementById('fileButton');
  var shareButton = document.getElementById('shareButton');

  fileButton.addEventListener('change',function(e){
    shareButton.addEventListener('click',function(){
      if(imageValidate()){
      var file = e.target.files[0];
      var storageRef = firebase.storage().ref(file.name);
      var message = document.getElementById('message').value;
      var imageLocation = document.getElementById('location').value;
      storageRef.put(file);
      storageRef.getDownloadURL().then(function(url) {
        var imageUrl = url;
        $.get("/test?url=" + imageUrl + '&message='+message + '&location=' + imageLocation);
        localStorage.setItem("validationSuccess", "TRUE");
        location.reload(); //To update database on our web
      });
    }
    });
  });

      function imageValidate(){
        var image = document.getElementById('fileButton');
        var imageUploadPath = image.value;

        //To check if user upload any file
        if (imageUploadPath != '') {
          var extension = imageUploadPath.substring(
            imageUploadPath.lastIndexOf('.') + 1).toLowerCase();

            //The file uploaded is an image
            if (extension == "gif" || extension == "png" || extension == "bmp"
            || extension == "jpeg" || extension == "jpg") {
              document.getElementById('validationSuccess').style.display = "block";
              document.getElementById('validationFail').style.display = "none";
              return true;
            }
            //The file upload is NOT an image
            else {
              document.getElementById('validationFail').style.display = "block";
              document.getElementById('validationSuccess').style.display = "none";
              return false;
            }
          }
        }
</SCRIPT>
      }
  </script>
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
        <li><a target="_blank" href="https://github.com/ksato0607/309Laravel" class="button social"><i class="fa fa-fw fa-github"></i></a></li>
        <li><a target="_blank" href="https://twitter.com/trip_go_trip" class="button social"><i class="fa fa-fw fa-twitter"></i></a></li>
      </ul>
          </div>
    </div>
  </div>
</footer>
@stop
