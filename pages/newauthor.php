    <?php
    session_start();
    $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
    require_once($DOCUMENT_ROOT.'/ics/head.php');

    /*
      firstname
      surname
      email
      site
      bio
    */
    
    ?>
    <div class="container">
    <h2><?php echo _('New Author'); ?></h2>
      <form name="newauthor" action="/dist/php/insert_author"  onsubmit="return val_form()" method="post">
        <div class="row">
          <div class="col-25"><label for="firstname"><?php echo _('Author\'s Name');?>:</label></div>
          <div class="col-45"><input type="text" id="firstname" name="firstname" placeholder="<?php echo _('Author\'s Name'); ?>""></div>
          <div class="col-30"><span class="form_error">* <?php $isbn_error; ?></span></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="surname"><?php echo _('Author\'s Surname');?>:</label></div>
          <div class="col-45"><input type="text" id="surname" name="surname" placeholder="<?php echo _('Author\'s Surname');?>"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="email"><?php echo _('Author\'s Email');?>:</label></div>
          <div class="col-45"><input type="email" id="email" name="email" placeholder="<?php echo _('Author\'s Email');?>"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="site"><?php echo _('Author\'s Site');?>:</label></div>
          <div class="col-45"><input type="url" id="site" name="site" placeholder="<?php echo _('Author\'s Site');?>"></div>
        </div>
        <div class="row">
          <div class="col-25"><label for="bio"><?php echo _('Author\'s Resume');?>:</label></div>
          <div class="col-45"><textarea  rows="5" cols="50" id="bio" name="bio" placeholder="<?php echo _('Author\'s resume');?>"></textarea></div>
        </div>
        <div class="row">
          <input type="submit">
        </div>
      </form>
    </div>
    <!-- <?php require_once '../ics/footer.php'; ?> -->
    <!-- Script section -->
    <script src="/dist/menu.js"></script>
    <script src="/dist/functions.js"></script>
    <script src="/dist/functions.js"></script>
  </body>
</html>