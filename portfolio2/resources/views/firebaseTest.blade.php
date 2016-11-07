@extends('layout')

@section('firebase')
</br></br>
<input type="file" value="upload" id="fileButton"/></br>
<img id="imageTest">

<script src="https://www.gstatic.com/firebasejs/3.5.3/firebase.js"></script>
<script>
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

  fileButton.addEventListener('change',function(e){
    var file = e.target.files[0];
    var storageRef = firebase.storage().ref('test/' + file.name);
    storageRef.put(file);
    storageRef.getDownloadURL().then(function(url) {
      var imageUrl = url;
      console.log(imageUrl);
    //   var uploadedImage = document.getElementById('imageTest');
    //   uploadedImage.src = imageUrl;
    });
  })
</script>
@stop
