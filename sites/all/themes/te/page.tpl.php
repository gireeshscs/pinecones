    <div id="wrapper">
      <div id="header_row">
        <div id="header">
          <div id="logo">
            <h1><a name="top" href="/"><span>Third Eye Pinecones</span></a></h1>
          </div><!-- /#logo -->
          <div id="main_menu">
            <ul>
              <li><a href="/catalog">Catalog</a></li>
              <li><a href="#">Products</a></li>
              <li><a href="/pineconeinfo">Pinecone Info</a></li>
              <li><a href="/contact">Contact</a></li>
            </ul>
          </div><!-- /#main_menu -->
          <div id="sub_menu">
            <ul>
              <li><a href="/foundersstory">Founder's Story</a></li>
              <li><a href="/historysymbolism">History &amp; Symbolism</a></li>
              <li><a href="/ecoresponsibility">Eco-Responsibility</a></li>
              <li><a href="/media">Media</a></li>
            </ul>
          </div><!-- /#sub_menu -->
          <div id="cart_link">
            <a href="#">My Cart</a>
          </div><!-- /#cart_link -->
          <div id="social_links">
            <ul>
              <li><a id="social_links_facebook" href="#"><span>Facebook</span></a></li>
              <li><a id="social_links_twitter" href="#"><span>Twitter</span></a></li>
            </ul>
          </div><!-- /#social_links -->
          <div id="email_signup">
            <form action="#" method="post">
              <input type="text" name="email" value="Email Signup"/>
            </form>
          </div><!-- /#email_signup -->
          <div id="search">
            <form action="#" method="post">
              <input type="text" name="search" value="Search"/>
            </form>
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
            <ul>
              <li><a href="/wholesale">Wholesale</a></li>
              <li><a href="/shippingreturns">Shipping &amp; Returns</a></li>
              <li><a href="/contact">Contact</a></li>
            </ul>
          </div><!-- /#footer_links -->
          <div id="copyright">
            Copyright &copy; Third Eye Pinecones 2012. All Rights Reserved.
          </div><!-- /#copyright -->
        </div><!-- /#footer -->
      </div><!-- /#footer_row -->
    </div><!-- /#wrapper -->