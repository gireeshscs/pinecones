<div id="header">
              <?php if($logo):?>
                  <div id="logo">
                      <h1><a name="top" href="/"><span>Third Eye Pinecones</span></a></h1>
                  </div><!-- /#logo -->
              <?php endif;?>

              <div class="navbar topNav">
                  <div class="navbar-inner">
                      <div class="container">
                          <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                          </a>
                          <h4>Navigation</h4>
                          <?php if ($user->uid): ?>
                          <div class="auth_user">
                             <div class="Wel_name">
                                  Welcome, <?php print $user->name; ?>
                                  <?php endif;?>
                              </div>

                              <div class="logoUt_btn">
                                  <!--If loggen in -->
                                  <?php if ($user->uid): ?>
                                  <?php print l(t('Logout'), 'user/logout'); ?>
                              </div>
                          </div>
                      <?php endif; ?>
                          <div class="nav-collapse collapse navbar-responsive-collapse">
                              <div id="cart_link">
                                  <?php if($page['cart_region']):?>
                                      <?php print render($page['cart_region']);?>
                                  <?php endif;?>
                              </div><!-- /#cart_link -->
                              <div id="search">
                                  <?php $block = module_invoke('search', 'block_view', 'form');
                                  print render($block['content']);
                                  ?>
                              </div><!-- /#search -->
                              <div id="social_links" class="clearfix">
                                  <ul>
                                      <li><a id="social_links_facebook" href="#"><span>Facebook</span></a></li>
                                      <li><a id="social_links_twitter" href="#"><span>Twitter</span></a></li>
                                      <li><a id="social_links_pin" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Ftepnew.nickandersonart.com&media=http%3A%2F%2Ftepnew.nickandersonart.com%2Fsites%2Fdefault%2Ffiles%2Fscreenshot.png" class="pin-it-button" count-layout="horizontal"></a>
                                  </ul>
                              </div><!-- /#social_links -->


                              <div id="main_menu">
                                  <?php if($page['topmenu']):?>
                                      <?php print render($page['topmenu']);?>
                                  <?php endif;?>
                              </div><!-- /#main_menu -->

                              <div id="sub_menu">
                                  <?php if($page['submenu']): ?>
                                      <?php print render($page['submenu'])?>
                                  <?php endif;?>
                              </div><!-- /#sub_menu -->

                          </div><!-- /.nav-collapse -->
                      </div>
                  </div><!-- /navbar-inner -->
              </div>

              <div id="email_signup">

                  <!--If anonim user-->
                  <?php if(!$user->uid):?>
                      <?php if ($page['singup']):?>
                          <?php print render($page['singup']);?>
                          <?php //print l(t('Login'), 'user/login'); ?>
                      <?php endif; ?>
                  <?php endif; ?>
                  <!--If logget in, print username--> 
            <?php if ($user->uid): ?>
            <div class="auth_user">
                Welcome, <?php print $user->name; ?>
            <?php endif;?>

            <!--If loggen in -->
            <?php if ($user->uid): ?>
                <?php print l(t('Logout'), 'user/logout'); ?>
            </div> 
            <?php endif; ?>
                   
          </div><!-- /#email_signup -->
          <?php 
                //$block = module_invoke('user', 'block_view', 'login');
                //print render($block['content']);
              ?>
          <div id="search">
             <?php $block = module_invoke('search', 'block_view', 'form');
                    print render($block['content']);
             ?> 
          </div><!-- /#search -->
        </div><!-- /#header -->
      </div><!-- /#header_row -->
      <?php if($page['hero']) : ?>
      <div id="hero">
        <?php print render($page['hero']); ?>
        <?php if($page['hero_blocks']) : ?>
        <div id="hero_blocks">
          <?php print render($page['hero_blocks']); ?>
        </div><!-- /#hero_blocks -->
        <?php endif; ?>
      </div><!-- /#hero -->
      <?php endif; ?>
      <?php if(!$is_front) : ?>
      <div id="content_row" class="floatcontainer">
        <?php if($page['sidebar']) : ?>
        <div id="sidebar">
          <?php print render($page['sidebar']); ?>
        </div><!-- /#sidebar -->
        <div id="content">
        <?php else : ?>
        <div id="content_full">
        <?php endif; ?>
        <?php if($title): ?>
          <h1><?php print $title; ?></h1>
        <?php endif; ?>
        <?php if ($show_messages && $messages): ?>
            <div id="lightboxAutoModal" rel="lightmodal[|height: 50px;]" style="display: none;" ><?php print $messages; ?></div>
        <?php endif; ?>
        <?php print render($page['content']); ?>
        </div><!-- /#content || /#content_full -->
      </div><!-- /#content_row -->
      <div id="back_to_top">
        <a href="#top"><span>Back to Top</span></a>
      </div><!-- /#back_to_top -->
      <?php endif; ?>
      <div id="footer_row">
        <div id="footer">
          <div id="footer_links">
            <ul id="ftr_wrp wrp">
              <?php if($page['bootom_menu_region']):?>
                <?php print render($page['bootom_menu_region'])?>
              <?php endif;?>  
            </ul>
          </div><!-- /#footer_links -->
          <p id="copyright">
            Copyright &copy; Third Eye Pinecones 2012. All Rights Reserved.
          </p><!-- /#copyright -->
        </div><!-- /#footer -->
      </div><!-- /#footer_row -->
    </div><!-- /#wrapper -->
                  