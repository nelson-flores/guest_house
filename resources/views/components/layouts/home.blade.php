<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Guest House MTN</title>
   <link href="assets/css/kingho.css" rel="stylesheet">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link
      href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
      rel="stylesheet">
   <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
   <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
</head>

<body>
   <div class="kingho_body_wrapper">
      <div id="preloader" class="preloader">
         <div class="animation-preloader">
            <div class="spinner"> </div>
         </div>
         <div class="loader">
            <div class="row">
               <div class="col-3 loader-section section-left">
                  <div class="bg"></div>
               </div>
               <div class="col-3 loader-section section-left">
                  <div class="bg"></div>
               </div>
               <div class="col-3 loader-section section-right">
                  <div class="bg"></div>
               </div>
               <div class="col-3 loader-section section-right">
                  <div class="bg"></div>
               </div>
            </div>
         </div>
      </div>

      <div class="grid_line"> <span class="line_one"></span> <span class="line_two"></span> <span
            class="line_three"></span> <span class="line_four"></span> </div>
  


       <header class="kingho_header header-alt_s1">
         <div class="kingho_header_top">
            <div class="theme__container">
               <div class="wrapper_box box-alt_s1">
                  <div class="left_column">
                     <ul class="cinfo box-alt_s2">
                        <li><a href="mailto:info@webmail.com">info@mtn.co.mz</a></li>
                        <li>|</li>
                        <li><a href="tel:09806764956">+258 820 010 010</a></li>
                     </ul>
                  </div>
                  <div class="right_column box-alt_s2">
                     <div class="login"><a href="#">Login</a></div>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="theme__container">
            <div class="text-center">
               <div class="logo_area kingho_default_logo">
                  <div class="logo"><a href="{{ route('web.public.home') }}"><img src="assets/images/logo.png" alt="" width="100px"></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="kingho_header_middle">
            <div class="theme__container">
               <div class="inner-container">
                  <div class="nav-outer">
                     <div class="mobile-nav-toggler"><img src="assets/images/icons/icon-bar.png" alt=""></div>
                 
                     @include('elements.public.nav')

                  </div>
                  <div class="right_column">
                     <div class="kingho_search_button"><i class="far fa-search"></i></div>
                     <div class="menu-bar kingho_side_menu_button"><img src="assets/images/icons/icon-bar3.png" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="kingho_hamberger_menu">
            <div class="kingho_overlay_layer"></div>
            <div class="close-btn"><i class="icon far fa-times"></i></div>
            <nav class="menu-box">
               <div class="nav-logo"><a href="{{ route('web.public.home') }}"><img src="assets/images/logo-light.png" alt="" title=""></a>
               </div>
               <div class="menu-outer"></div>
            </nav>
         </div>
         <div class="nav-overlay"></div>
      </header>
      
      @include('elements.public.sidebar')
      
      <div id="kingho_main_search_box" class="kingho_main_search_box">
         <div class="close-search theme-btn"><i class="far fa-times"></i></div>
         <div class="popup-inner">
            <div class="overlay-layer"></div>
            <div class="search-form">
               <form method="post" action="{{ route('web.public.home') }}">
                  <div class="form-group">
                     <fieldset> <input type="search" class="form-control" name="search-input" value=""
                           placeholder="Pesquise aqui..." required> </fieldset>
                  </div>
               </form>
            </div>
         </div>
      </div>


            {{ $slot }}




      <footer class="kingho_footer">
                     @include('elements.public.footer')
      
      </footer>




   </div>
   <div class="back-to-top scroll-to-target" data-target="html"><span class="fas fa-angle-up"></span></div>
   <script src="assets/js/kingho.js"></script>
</body>

</html>