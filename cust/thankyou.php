<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Thank You</title>
</head>
<body>
<script type='text/javascript'>
        function loadCSS(e,t,o){"use strict";var s=window.document.createElement("link"),a=t||window.document.getElementsByTagName("script")[0];s.rel="stylesheet",s.href=e,s.media="only x",a.parentNode.insertBefore(s,a),setTimeout(function(){s.media=o||"all"})}loadCSS("https://fonts.googleapis.com/css?family=Roboto:400,400italic,700"),loadCSS("https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"),"undefined"==typeof jQuery&&document.write('<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"><\/script>');
    </script>
        
        <div id='infoPelajarjo' class='animated'>
        
        <div class="infoPelajarwrap-pelajar">
         <h2>Notifications</h2>
         </div>
        <p class="pesan-singkat">Kami Ucapkan Terima kasih atas kepercayaan Anda berbelanja di toko kami. <a class="pelajar-aktif" href="https://jalanpelajar.com/">Mohon siapkan uang pas!</a></p>
         <a class="back-to-home" href="home.php" title="Donasi Pengembang">Continue Shopping</a>
        </div>
        
         <div class="gelap">

         <style>
            a.back-to-home {
    background: #E91E63;
    margin-left: 5px;
    margin-top: 25px;
    display: inline-block;
    padding: 8px 15px;
    border-radius: 4px;
    float: right;
    color:#FFF;
    font-weight: 500;
}
#infoPelajarjo {
width: 100%;
    height: auto;
    overflow: hidden;
    background: #fff;
    position: fixed;
    padding: 25px;
    top: 15%;
    transition: all .3s ease-in-out;
    max-width: 450px;
    left: 35%;
    z-index: 99;
    transform:translate(0,-300px);
    border-radius: 5px;
    box-shadow: 0 9px 46px 8px rgba(0,0,0,.14), 0 11px 15px -7px rgba(0,0,0,.12), 0 24px 38px 3px rgba(0,0,0,.2);
}

#infoPelajarjo a {
text-decoration:none;
}
a.pelajar-aktif {
    color: #e91e63;
    font-weight: 600;
}
#infoPelajarjo span {
display: block;
padding: 15px 15px;
pointer-events: none;
text-align: left;
float: left;
}
#infoPelajarjo span h2 {
font-size: 12px; /* Ukuran text */
line-height: 21px;
color: #222;
font-weight: normal;
letter-spacing: 0px;
}

.animated {
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
}
@media (prefers-reduced-motion) {
  .animated {
    -webkit-animation: unset !important;
    animation: unset !important;
    -webkit-transition: none !important;
    transition: none !important;
  }
}

@-webkit-keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

@keyframes fadeInDown {
  from {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }

  to {
    opacity: 1;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
  }
}

.fadeInDown {
  -webkit-animation-name: fadeInDown;
  animation-name: fadeInDown;
}

@-webkit-keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

@keyframes fadeOutUp {
  from {
    opacity: 1;
  }

  to {
    opacity: 0;
    -webkit-transform: translate3d(0, -100%, 0);
    transform: translate3d(0, -100%, 0);
  }
}

.fadeOutUp {
  -webkit-animation-name: fadeOutUp;
  animation-name: fadeOutUp;
}
p.pesan-singkat {
    overflow: hidden;
    position: relative;
    top: 11px;
    font-family:roboto;
}
.infoPelajarwrap-pelajar h2{
    position: absolute;
    top: 9px;
    margin: auto;
    padding: 2px;
    font-size: 18px;
    font-family: roboto;
    background: #fff;
}
@media screen and (max-width: 768px){
div#infoPelajarjo {
    left: 0;
  }
}
.gelap {
  position:fixed;
  top:0;
  left:0;
  bottom:0;
  right:0;
  opacity:0;
  transition:.5s;
  background:rgba(0,0,0,0.5);
  z-index:-999;
}
.gelap.active{
  opacity:1;
  background:rgba(0,0,0,0.5);
  z-index:98;
}

         </style>

<script>
   document.getElementById('infoPelajarjo').classList.add('fadeInDown')
        document.getElementsByClassName('gelap')[0].classList.add('active')

        setTimeout(function(){
        document.getElementById('infoPelajarjo').classList.add('fadeOutU')
        document.getElementById('infoPelajarjo').classList.remove('fadeInDown')
        document.getElementsByClassName('gelap')[0].classList.remove('active')
},8000)
</script>
</body>
</html>