    <!DOCTYPE HTML>
    <html lang="en">
    <head>
    <!-- Begin Maps-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyAqhJ6sg9DMHKhLvWrzUs96NDMemaDXriw&sensor
    =false"></script>
    <style>
      #map {
      width: auto;
      height: 600px;
      }
    </style>
    <script type="text/javascript">
        //<![CDATA[
        function load() { //meload map
          var map = new google.maps.Map(document.getElementById("map"), {
            center: new google.maps.LatLng(-6.913785, 107.407542),
            zoom: 12, //tingkat zoom map, sesuaikan kebutuhan
            mapTypeId: 'roadmap'
          });
          var infoWindow = new google.maps.InfoWindow;

          // download XML dokumen
          downloadUrl("tampilmarker.php", function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName("marker");
            for (var i = 0; i < markers.length; i++) {
              var name = markers[i].getAttribute("name");
              var address = markers[i].getAttribute("address");
              var point = new google.maps.LatLng(
                  parseFloat(markers[i].getAttribute("lat")),
                  parseFloat(markers[i].getAttribute("lng")));
              var html = "<b>" + name + "</b> <br/>" + address+ "</b>";
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                icon: 'img/universitas.png' //ganti icon
              });
              bindInfoWindow(marker, map, infoWindow, html);
            }
          });
        }

        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }

        function downloadUrl(url, callback) {
          var request = window.ActiveXObject ?
              new ActiveXObject('Microsoft.XMLHTTP') :
              new XMLHttpRequest;

          request.onreadystatechange = function() {
            if (request.readyState == 4) {
              request.onreadystatechange = doNothing;
              callback(request, request.status);
            }
          };
          request.open('GET', url, true);
          request.send(null);
        }
        function doNothing() {}
        //]]>
      </script>
    <!-- End Maps-->
    <meta charset="utf-8">
    <title>GIS - Potensi Usaha KBB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel='stylesheet' id='prettyphoto-css'  href="css/prettyPhoto.css" type='text/css' media='all'>
    <link href="css/fontello.css" type="text/css" rel="stylesheet">
    <!--[if lt IE 7]>
            <link href="css/fontello-ie7.css" type="text/css" rel="stylesheet">  
        <![endif]-->
    <!-- Google Web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
    body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
    }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/KBB_logo.ico">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Load ScrollTo -->
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <!-- Load LocalScroll -->
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <!-- prettyPhoto Initialization -->
    <script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();
          });
        </script>
    </head>
    <body onLoad="load()">
    <!--******************** NAVBAR ********************-->
    <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
            <h1 class="brand">
            	<a href="#top">
            		<img src="img/KBB_logo.png" width="40" height="40">
            		<i>GIS</i> Potensi Usaha Bandung Barat
            	</a>
            </h1>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <nav class="pull-right nav-collapse collapse">
              <ul id="menu-main" class="nav">
                <li><a title="peta" href="#peta">Peta</a></li>
                <li><a title="daftar" href="#daftar">Daftar</a></li>
                <li><a title="news" href="#news">Info</a></li>
                <li><a title="team" href="#team">Tim</a></li>
                <li><a title="contact" href="#contact">Kontak</a></li>
                <li><a title="login" href="#login">Login</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </div>
    <!-- /.navbar-wrapper -->
    <div id="top"></div>
    <!-- ******************** HeaderWrap ********************-->
    <div id="headerwrap">
      <header class="clearfix">
        <h1><span>Selamat Datang</span></h1>
        <h2>Segera Daftarkan Usaha Anda Disini </h2>
        <div class="container">
          
          <div class="row">
            <div class="span12">
              <ul class="icon">
                <li><a href="#" ><i class="icon-pinterest-circled"></i></a></li>
                <li><a href="#" ><i class="icon-facebook-circled"></i></a></li>
                <li><a href="#" ><i class="icon-twitter-circled"></i></a></li>
                <li><a href="#" ><i class="icon-gplus-circled"></i></a></li>
                <li><a href="#" ><i class="icon-skype-circled"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
      </header>
    </div>
    <!--******************** Feature ********************-->
    <div class="scrollblock">
      <section id="feature">
        <div class="container">
          <div class="row">
            <div class="span12">
              <article>
                <p>Geographics Information System (GIS) Potensi Usaha KBB
                merupakan website yg menyediakan informasi mengenai data usaha yang ada di bandung barat</p>
                <p>Data yang ditampilkan merupakan data yang terdaftar pada database kami.</p>
              </article>
            </div>
            <!-- ./span12 -->
          </div>
          <!-- .row -->
        </div>
        <!-- ./container -->
      </section>
    </div>
    <hr>
    <!--******************** Maps Section ********************-->
    <section id="peta" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-map"></i></div>
        <h1 id="folio-headline">Peta Usaha</h1>
        <div class="row">
          <div >
            <div id="map"></div>
          </div> <!-- /.span10 -->
        </div>
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** Daftar Section ********************-->
    <section id="daftar" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-plus-circled"></i></div>
        <h1>Punya Usaha? Daftarkan diri anda.</h1>
        <!-- Form Daftar Usaha -->
        <div class="row">
          <div class="span12">
            <div class="cform" id="theme-form">
              <form action="pengusaha_daftar_proses.php" method="post" class="cform-form">
                <div class="row">
                    <div class="span5"> <span class="nama">
                    <input type="text" name="nama" class="cform-text" placeholder="Nama Lengkap" title="Username"></input>
                    </span> </div>
                </div>
                <div class="row">
                	<div class="span5"> <span class="noktp">
                    <input type="text" name="noktp" class="cform-text" placeholder="Nomor KTP" title="Nomor KTP"></input>
                    </span> </div>
                </div>
                <div class="row">
                	<div class="span5"> <span class="alamatTinggal">
                    <input type="text" name="alamatTinggal" class="cform-text" placeholder="Alamat Tinggal" title="Alamat Tinggal"></input>
                    </span> </div>
                </div>
                <div class="row">
                	<div class="span5"> <span class="tempatLahir">
                    <input type="text" name="tempatLahir" class="cform-text" placeholder="Tempat Lahir" title="Tempat Lahir"></input>
                    </span> </div>
                </div>
                <div class="row">
                	<div class="span5"> <span class="tanggalLahir" >
	                <label>Format dd-mm-yyyy Contoh : 12-07-1989</label>
	                    <input type="text" name="tanggalLahir" class="cform-text" placeholder="Tanggal Lahir" title="Tanggal Lahir"></input>
	                    </span>

                    </div>
                     
                    
                </div>
                <div class="row">
                	<div class="span5"> <span class="tanggalLahir">
                    <label>File KTP</label> 
                    <input type="file" name="foto_ktp">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                        <p class="help-block">Telusuri...</p>
                    </span> </div>	
                </div>
                <div class="row">
                	<div class="span5"> <span class="email">
                    <input type="text" name="no_telp" class="cform-text" placeholder="Nomor Telepon" title="Nomor Telepon"></input>
                    </span> </div>
                </div>
                <div class="row">
                	<div class="span5"> <span class="email">
                    <input type="text" name="email" class="cform-text" placeholder="Email" title="Email"></input>
                    </span> </div>
                </div>
                <div class="row">
                	<div class="span5"> <span class="kataSandi">
                    <input type="text" name="kataSandi" class="cform-text" placeholder="Kata Sandi" title="Kata Sandi"></input>
                    </span> </div>
                </div>
                <div class="row">
                	<div class="span5"> <span class="ulangSandi">
                    <input type="text" name="ulangSandi" class="cform-text" placeholder="Ulangi Kata Sandi" title="Ulangi Kata Sandi"></input>
                    </span> </div>
                </div>

                <div>
                  <input type="submit" value="Daftar" class="cform-submit pull-left">
                  
                </div>
                <div class="cform-response-output"></div>
              </form>
            </div>
          </div>
          <!-- ./span12 -->
        </div>
        
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** Testimonials Section ********************-->
    <section id="testimonials" class="single-page hidden-phone">
      <div class="container">
        <div class="row">
          <div class="blockquote-wrapper">
            <blockquote class="mega">
              <div class="span4">
                <p class="cite">John Doe &amp; Sons:</p>
              </div>
              <div class="span8">
                <p class="alignright">"We highly appreciate the enthusiasm and creative talent of the people at Legend!"</p>
              </div>
            </blockquote>
          </div>
          <!-- /.blockquote-wrapper -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** Login Section ********************-->
    <section id="login" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-group-circled"></i></div>
        <h1>Sudah Punya Akun? Login disini.</h1>
        <div class="row">
          <div class="span12">
            <div class="cform" id="theme-form">
              <form action="#" method="post" class="cform-form">
                <div class="row">
                    <div class="span5"> <span class="username">
                    <input type="text" name="username" class="cform-text" placeholder="Username" title="Username"></input>
                    </span> </div>
                </div>
                <div class="row">
                	<div class="span5"> <span class="username">
                    <input type="text" name="password" class="cform-text" placeholder="Password" title="Password"></input>
                    </span> </div>
                </div>
                <div>
                  <input type="submit" value="Login" class="cform-submit pull-left">
                </div>

                <div class="cform-response-output"></div>
              </form>
            </div>
          </div>
          <!-- ./span12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** News Section ********************-->
    <section id="news" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-pencil-circled"></i></div>
        <h1>Our Blog</h1>
        <!-- Three columns -->
        <div class="row">
          <article class="span4 post"> <img class="img-news" src="img/blog_img-01.jpg" alt="">
            <div class="inside">
              <p class="post-date"><i class="icon-calendar"></i> March 17, 2013</p>
              <h2>A girl running on a road</h2>
              <div class="entry-content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. &hellip;</p>
                <a href="#" class="more-link">read more</a> </div>
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span4 -->
          <article class="span4 post"> <img class="img-news" src="img/blog_img-02.jpg" alt="">
            <div class="inside">
              <p class="post-date">February 28, 2013</p>
              <h2>A bear sleeping on a tree</h2>
              <div class="entry-content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. &hellip;</p>
                <a href="#" class="more-link">read more</a> </div>
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span4 -->
          <article class="span4 post"> <img class="img-news" src="img/blog_img-03.jpg" alt="">
            <div class="inside">
              <p class="post-date">February 06, 2013</p>
              <h2>A Panda playing with his baby</h2>
              <div class="entry-content">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. &hellip;</p>
                <a href="#" class="more-link">read more</a> </div>
            </div>
            <!-- /.inside -->
          </article>
          <!-- /.span4 -->
        </div>
        <!-- /.row -->
        <a href="#" class="btn btn-large">Go to our blog</a> </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** Team Section ********************-->
    <section id="team" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-group-circled"></i></div>
        <h1>Meet the team</h1>
        <!-- Five columns -->
        <div class="row">
          <div class="span2 offset1">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-1.jpg" alt=""> </div>
            <h3>Andrew</h3>
            <div class="job-position">web designer</div>
          </div>
          <!-- ./span2 -->
          <div class="span2">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-2.jpg" alt=""> </div>
            <h3>Stephen</h3>
            <div class="job-position">web developer</div>
          </div>
          <!-- ./span2 -->
          <div class="span2">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-3.jpg" alt=""> </div>
            <h3>Maria</h3>
            <div class="job-position">graphic designer</div>
          </div>
          <!-- ./span2 -->
          <div class="span2">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-4.jpg" alt=""> </div>
            <h3>John</h3>
            <div class="job-position">project manager</div>
          </div>
          <!-- ./span2 -->
          <div class="span2">
            <div class="teamalign"> <img class="team-thumb img-circle" src="img/portrait-2.jpg" alt=""> </div>
            <h3>Ashton</h3>
            <div class="job-position">real owner</div>
          </div>
          <!-- ./span2 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="span10 offset1">
            <hr class="featurette-divider">
            <div class="featurette">
              <h2 class="featurette-heading">Want to know more? <span class="muted">| a little about us</span></h2>
              <p>Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores.</p>
              <p>At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues.</p>
              <p>A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.</p>
            </div>
            <!-- /.featurette -->
            <hr class="featurette-divider">
          </div>
          <!-- .span10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!--******************** Contact Section ********************-->
    <section id="contact" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-mail-2"></i></div>
        <h1>Contact us now!</h1>
        <div class="row">
          <div class="span12">
            <div class="cform" id="theme-form">
              <form action="#" method="post" class="cform-form">
                <div class="row">
                  <div class="span6"> <span class="your-name">
                    <input type="text" name="your-name" placeholder="Your Name" class="cform-text" size="40" title="your name">
                    </span> </div>
                  <div class="span6"> <span class="your-email">
                    <input type="text" name="your-email" placeholder="Your Email" class="cform-text" size="40" title="your email">
                    </span> </div>
                </div>
                <div class="row">
                  <div class="span6"> <span class="company">
                    <input type="text" name="company" placeholder="Your Company" class="cform-text" size="40" title="company">
                    </span> </div>
                  <div class="span6"> <span class="website">
                    <input type="text" name="website" placeholder="Your Website" class="cform-text" size="40" title="website">
                    </span> </div>
                </div>
                <div class="row">
                  <div class="span12"> <span class="message">
                    <textarea name="message" class="cform-textarea" cols="40" rows="10" title="drop us a line."></textarea>
                    </span> </div>
                </div>
                <div>
                  <input type="submit" value="Send message" class="cform-submit pull-left">
                </div>
                <div class="cform-response-output"></div>
              </form>
            </div>
          </div>
          <!-- ./span12 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <hr>
    <div class="footer-wrapper">
      <div class="container">
        <footer>
          <small>&copy; 2013 Inbetwin Network. All rights reserved.</small>
        </footer>
      </div>
      <!-- ./container -->
    </div>
    <!-- Loading the javaScript at the end of the page -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>

    <!-- Date Picker -->
    <script type="text/javascript">
            $(function () {
                $('#datepicker').datepicker({
                  format: 'yyyy-mm-dd'
                });
            });
    </script>
    
    <!--ANALYTICS CODE-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29231762-1']);
	  _gaq.push(['_setDomainName', 'dzyngiri.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
    </body>
    </html>
