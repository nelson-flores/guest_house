<!----header----->
<div class="header_area" id="header_contents">
            <div class="top_bar style_one d-none d-lg-block">
               <div class="auto-container">
                  <div class="row align-items-center">
                     <div class="col-lg-12">
                        <div class="top_inner">
                           <div class="left_side common_css">
                              <div class="contntent address">
                                 <i class="icon-placeholder"></i>
                                 <div class="text">
                                    <small>Endereco</small>
                                    <span>Rua Felipe Samuel Magaia, Nampula</span>
                                 </div>
                              </div>
                              <div class="contntent email">
                                 <i class="icon-email"></i>
                                 <div class="text">
                                    <small>Email</small>
                                    <a href="mailto:cep.nampula@gmail.com">cep.nampula@gmail.com</a>
                                 </div>
                              </div>
                           </div>
                           <div class="right_side common_css">
                              <div class="contntent phone">
                                 <i class="icon-phone-call"></i>
                                 <div class="text">
                                    <small>Phone</small>
                                    <a href="tel:+258835442398">+258 835 442 398</a>
                                 </div>
                              </div>
                              <div class="contntent media">
                                 <i class="icon-share"></i>
                                 <div class="text">
                                    <a href="#" target="_blank" rel="nofollow">
                                       <small>Partilhar</small>
                                    </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <header class="header header_default style_one get_sticky_header">
               <div class="auto-container">
                  <div class="row align-items-center">
                     <div class="col-lg-2 col-md-9 col-sm-9 col-xs-9 logo_column">
                        <div class="header_logo_box">
                           <a href="{{ route('web.public.home') }}" class="logo navbar-brand">
                                <img src="assets/images/cta.png" alt="Creote Elementor" class="logo_default"
                                    style="height: 55px;width:auto">
                                <img src="assets/images/cta.png" alt="Creote Elementor" class="logo__sticky" 
                                    style="height: 55px;width:auto">
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-10 col-md-3 col-sm-3 col-xs-3 menu_column">
                        <div class="navbar_togglers hamburger_menu">
                           <span class="line"></span>
                           <span class="line"></span>
                           <span class="line"></span>
                        </div>
                        <div class="header_content_collapse">
                           <div class="header_menu_box">
                              <div class="navigation_menu">
                                @include('elements.public.nav')
                              </div>
                           </div>
                           <div class="header_right_content">
                              <ul>
                                 <li>
                                    <button type="button" class="search-toggler"><i class="icon-search"></i></button>
                                 </li>
                                 <li class="header-button">
                                    <a href="{{ route('web.public.contact') }}" rel="" class="theme-btn one"> Contacte-nos </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </header>
             
         </div>
<!----header end----->