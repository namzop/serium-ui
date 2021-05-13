<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <!--
  Customize this policy to fit your own app's needs. For more guidance, see:
      https://github.com/apache/cordova-plugin-whitelist/blob/master/README.md#content-security-policy
  Some notes:
    * https://ssl.gstatic.com is required only on Android and is needed for TalkBack to function properly
    * Disables use of inline scripts in order to mitigate risk of XSS vulnerabilities. To change this:
      * Enable inline JS: add 'unsafe-inline' to default-src
  -->
  <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap: content:">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, viewport-fit=cover">

  <meta name="theme-color" content="#007aff">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="title" content = "Serium">
  <meta name="description" content="New Era of 3rd Party App Stores.">
  <meta name="image" content="https://serium.ml/img/icon.png">
  <meta name="og:title" content = "Serium">
  <meta name="og:description" content="New Era of 3rd Party App Stores.">
  <meta name="og:image" content="https://serium.ml/img/icon.png">
  <meta name="twitter:title" content = "Serium">
  <meta name="twitter:description" content="New Era of 3rd Party App Stores.">
  <meta name="twitter:image" content="https://serium.ml/img/icon.png">
  <title>Serium</title>
  
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <link rel="apple-touch-icon" href="assets/icons/apple-touch-icon.png">
  <link rel="icon" href="https://serium.ml/img/icon.png">
  <link rel="manifest" href="/manifest.json">
  
  <link rel="stylesheet" href="framework7/framework7-bundle.min.css">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/app.css">
</head>
<body>
  <div id="app" class="theme-dark">
    <!-- Left panel with cover effect-->
    
    
    <!-- Views/Tabs container -->
    <div class="views tabs safe-areas">
      <!-- Tabbar for switching views-tabs -->
      <div class="toolbar toolbar-bottom tabbar-labels">
        <div class="toolbar-inner">
          <a href="#view-home" class="tab-link tab-link-active">
            <i class="icon f7-icons if-not-md">house_fill</i>
            <i class="icon material-icons if-md">home</i>
            <span class="tabbar-label">Home</span>
          </a>
          <a href="#view-catalog" class="tab-link">
            <i class="icon f7-icons if-not-md">arrow_down_circle_fill</i>
            <i class="icon material-icons if-md">view_list</i>
            <span class="tabbar-label">Apps</span>
          </a>
          <!-- <a href="#view-settings" class="tab-link">
            <i class="icon f7-icons if-not-md">gear</i>
            <i class="icon material-icons if-md">settings</i>
            <span class="tabbar-label">Settings</span>
          </a> -->
        </div>
      </div>

      <!-- Your main view/tab, should have "view-main" class. It also has "tab-active" class -->
      <div id="view-home" class="view view-main view-init tab tab-active">
        <div class="page" data-name="home">
          <!-- Top Navbar -->
          <div class="navbar navbar-large">
            <div class="navbar-bg"></div>
            <div class="navbar-inner">
              <div class="title sliding">Serium</div>
              <div class="title-large">
                <div class="title-large-text" style="display:flex;justify-content:center;align-items:center;">Serium</div>
              </div>
            </div>
          </div>


          <!-- Scrollable page content-->
          <div class="page-content">
          <span class="progressbar-infinite color-multi"></span>

            <!-- <div class="block-title">Links</div> -->
            <div class="block block-strong">
              <div class="row">
                <div class="col-50">
                  <a href="https://twitter.com/seriumapp" class="button button-raised button-fill external" >Twitter</a>
                </div>
                <div class="col-50">
                  <a href="https://serium.ml/discord" class="button button-raised button-fill external">Discord</a>
                </div>
              </div>
            </div>

            <div class="block-title">Featured Apps</div>
            <div class="list media-list">
              <ul>
                <?php 
                  $get_featured = file_get_contents("json/featured.json");
                  $featured_json = json_decode($get_featured, true);
                  // echo $featured_json['1']['name']
                  foreach ($featured_json as $featured => $featured_apps) {
                    # code...
                ?>
                <li>
                  <div class="item-content">
                    <div class="item-media">
                      <img class="logos" src="https://cdn.serium.ml/<?php echo $featured_apps['img'] ?>" alt="<?php echo $featured_apps['name'] ?> logo">
                    </div>
                    <div class="item-inner">
                      <div class="item-title-row">
                        <div class="item-title"><?php echo $featured_apps['name'] ?></div>
                        <div class="item-after">
                          <a class="external" style="color:white;" href="https://cdn.serium.ml/plists/<?php echo $featured_apps['name'] ?>.plist">
                          <span class="badge color-blue" style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;margin-top:15px;">GET</span>
                          </a>
                        </div>
                      </div>
                      <div class="item-subtitle"> <?php echo $featured_apps['subtitle'] ?> </div>
                    </div>
                  </div>
                </li>
                <?php 
                  }
                ?>
              </ul>
          </div>

          </div>
        </div>
      </div>

      <!-- Catalog View -->
      <div id="view-catalog" class="view view-init tab">
        <div class="page" data-name="apps">
          <div class="page-content">
          <div class="searchbar-backdrop"></div>
          <form style="margin-top:20px;" class="searchbar searchbar-init" data-search-container=".app-list" data-search-in=".item-title">
            <div class="searchbar-inner">
              <div class="searchbar-input-wrap">
                <input type="search" placeholder="Search">
                <i class="searchbar-icon"></i>
                <span class="input-clear-button"></span>
              </div>
              <span class="searchbar-disable-button">Cancel</span>
            </div>
          </form>
          <div class="list media-list app-list">
              <ul>
                <?php 
                  $get_all = file_get_contents("json/apps.json");
                  $all_json = json_decode($get_all, true);
                  // echo $featured_json['1']['name']
                  foreach ($all_json as $everything => $all_apps) {
                    # code...
                ?>
                <li>
                  <div class="item-content">
                    <div class="item-media">
                      <img class="logos" src="https://cdn.serium.ml/<?php echo $all_apps['img'] ?>" alt="<?php echo $all_apps['name'] ?> logo">
                    </div>
                    <div class="item-inner">
                      <div class="item-title-row">
                        <div class="item-title"><?php echo $all_apps['name'] ?></div>
                        <div class="item-after">
                          <a class="external" style="color:white;" href="https://cdn.serium.ml/plists/<?php echo $all_apps['name'] ?>.plist">
                          <span class="badge color-blue" style="padding-top:10px;padding-bottom:10px;padding-left:10px;padding-right:10px;margin-top:15px;"> GET </span>
                          </a>
                        </div>
                      </div>
                      <div class="item-subtitle"> <?php echo $all_apps['subtitle'] ?> </div>
                    </div>
                  </div>
                </li>
                <?php 
                  }
                ?>
              </ul>
              <div class="block searchbar-not-found">
                <div class="block-inner" style="text-align:center;">Not Found</div>
              </div>
          </div>
          </div>
        </div>
      </div>

      <!-- Settings View -->
      <!-- <div id="view-settings" class="view view-init tab">
          <div class="page" data-name="settings">
            <div class="page-content">
            
            </div>
        </div>

      </div> -->
    </div>   
  </div>
  
  <!-- Framework7 library -->
  <script src="framework7/framework7-bundle.min.js"></script>
  
  
  <!-- App routes -->
  <script src="js/routes.js"></script>
  <!-- App store -->
  <script src="js/store.js"></script>
  <!-- App scripts -->
  <script src="js/app.js"></script>
</body>
</html>
