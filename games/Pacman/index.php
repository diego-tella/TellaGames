<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>HTML5 Pacman</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="screen" />

    <style type="text/css">
      @font-face {
	    font-family: 'BDCartoonShoutRegular';
        src: url('BD_Cartoon_Shout-webfont.ttf') format('truetype');
	    font-weight: normal;
	    font-style: normal;
      }
      #pacman {
        height:450px;
        width:342px;
        margin:20px auto;
      }
      #shim { 
        font-family: BDCartoonShoutRegular; 
        position:absolute;
        visibility:hidden
      }
      h1 { font-family: BDCartoonShoutRegular; text-align:center; }
      body { margin:0px auto; font-family:sans-serif; }
      a { text-decoration:none; }
    </style>

</head>

<body class="vh-100 gradient-custom">
<?php include "../../header.php"; ?>
  <div id="shim">shim for font face</div>

  <br><h1>Pacman</h1>

  <div id="pacman"></div>
  <script src="pacman.js"></script>
  <script src="modernizr-1.5.min.js"></script>

  <script>

    var el = document.getElementById("pacman");

    if (Modernizr.canvas && Modernizr.localstorage && 
        Modernizr.audio && (Modernizr.audio.ogg || Modernizr.audio.mp3)) {
      window.setTimeout(function () { PACMAN.init(el, "./"); }, 0);
    } else { 
      el.innerHTML = "Sorry, needs a decent browser<br /><small>" + 
        "(firefox 3.6+, Chrome 4+, Opera 10+ and Safari 4+)</small>";
    }
  </script>

</body>
</html>
