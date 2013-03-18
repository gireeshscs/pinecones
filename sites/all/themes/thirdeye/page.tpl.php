<!-- ====== START Header ====== -->
<div class="hdr_wrp wrp">
  <div class="hdr in clearfix">
    <div id="hdr_top" class="clearfix">
      <input type="text" placeholder="Email Signup" id="hdr_email" />
      <div id="hdr_social">
        <a href="#" id="fb"> </a>
        <a href="#" id="tw"> </a>
      </div>
      <a href="#" id="my_card">my cart (3)</a>
    </div>
    <div class="clear"></div>
    <div id="hdr_main" class="clearfix">
      <ul id="nav_prime">
        <li id="navp1"><a href="#">catalog</a></li>
        <li id="navp2"><a href="#" id="navp_active">products</a></li>
        <li id="navp3"><a href="#">PINECONE INFO</a></li>
        <li id="navp4"><a href="#">CONTACT</a></li>
      </ul>
      <div class="clear"></div>
      <ul class="nav_second" id="nav_second4">
        <li><a href="#">FOUNDER’S STORY</a></li>
        <li><a href="#">HISTORY &#38; SYMBOLISM</a></li>
        <li><a href="#">ECO-RESPONSIBILITY</a></li>
        <li><a href="#">media</a></li>
      </ul>
      <div class="clear"></div>
      <input type="text" id="hdr_srch" placeholder="Search" />
      <a href="/" id="logo"> </a>
    </div>
  </div>
</div>
<!-- ====== START Main ====== -->
<div class="main_wrp wrp" id="hs_main_wrp">
  <div class="main in clearfix">
    <?php if($page['sidebar']): ?>
      <div id="sb">
        <?php print render($page['sidebar']); ?>
      </div>
    <?php endif; ?>
    <div class="content clearfix" id="hs">
      <?php if($title) : ?>
        <h1><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </div>
  </div>
</div>
<!-- ====== END Main ====== -->
<!-- ====== START Footer ====== -->
<div class="ftr_wrp wrp">
  <div class="ftr in">
    <div id="back_top">
      <a href="#"> </a>
    </div>
    <div id="ftr_separator"> </div>
    <ul id="ftr_nav" class="clearfix">
      <li><a href="#" id="ftr_nav1">WHOLESALE</a></li>
      <li><a href="#" id="ftr_nav2">SHIPPING &#38; RETURNS</a></li>
      <li><a href="#" id="ftr_nav3">CONTACT</a></li>
    </ul>
    <p id="copyright">Copyright &#169; Third Eye Pinecones 2012. All Rights Reserved. </p>
  </div>
</div>
<!-- ====== END Footer ====== -->
