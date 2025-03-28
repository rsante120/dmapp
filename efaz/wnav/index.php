<?php 
require("../../config/conf_sesion.php"); 
require("../../config/conf.php"); 
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
<head>

  <script language="javascript">
    var url_base = "<?php echo $app_site_url; ?>";
  </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $app_site_url; ?>assets/img/favicons/mstile-150x150.png">

    <title><?php echo $app_site_nme; ?></title>

    <link href="<?php echo $app_site_url; ?>assets/img/favicons/apple-touch-icon.png" rel="apple-touch-icon" sizes="180x180">
    <link href="<?php echo $app_site_url; ?>assets/img/favicons/favicon-32x32.png" rel="icon" type="image/png" sizes="32x32" >
    <link href="<?php echo $app_site_url; ?>assets/img/favicons/favicon-16x16.png" rel="icon" type="image/png" sizes="16x16" >
    <link href="<?php echo $app_site_url; ?>assets/img/favicons/favicon.ico" rel="shortcut icon" type="image/x-icon" >
    <!--<link href="<?php echo $app_site_url; ?>assets/img/favicons/manifest.json" rel="manifest" >-->

    <script src="<?php echo $app_site_url; ?>assets/js/appbase_func-1.1.js"></script>
    <script src="<?php echo $app_site_url; ?>assets/js/appbase_main-1.1.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/jquery/jquery-3.7.1.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/simplebar/simplebar.min.js"></script>
    <script src="<?php echo $app_site_url; ?>assets/js/config.js"></script>

    <link href="https://fonts.googleapis.com/" rel="preconnect">
    <link href="https://fonts.gstatic.com/" rel="preconnect"crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://unicons.iconscout.com/release/v4.0.8/css/line.css" rel="stylesheet">
    <link href="<?php echo $app_site_url; ?>vendors/simplebar/simplebar.min.css" rel="stylesheet">
    
    <link href="<?php echo $app_site_url; ?>assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="<?php echo $app_site_url; ?>assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="<?php echo $app_site_url; ?>assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="<?php echo $app_site_url; ?>assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>

    <link href="<?php echo $app_site_url; ?>vendors/leaflet/leaflet.css" rel="stylesheet">
    <link href="<?php echo $app_site_url; ?>vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="<?php echo $app_site_url; ?>vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">

    <!-- JavaScripts ==================================================-->
    <script src="<?php echo $app_site_url; ?>vendors/popper/popper.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/anchorjs/anchor.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/is/is.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/fontawesome/all.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/lodash/lodash.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/list.js/list.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/feather-icons/feather.min.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/dayjs/dayjs.min.js"></script>
    <script src="<?php echo $app_site_url; ?>assets/js/phoenix.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/leaflet/leaflet.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="<?php echo $app_site_url; ?>vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
  </head>
  <body>
    <main class="main" id="main_principal">

      <!-- Main Menu ==================================================-->
      <?php require("_menu.php"); ?>
      <!-- Main Content ===============================================-->
      <div id="dv_lugar_principal" class="content"></div>
      <?php
        if($_REQUEST["mod"]<>"" && $_REQUEST["app"]<>"" && $_REQUEST["sec"]<>"" && $_REQUEST["pag"]<>""){
          $extra_params = $_REQUEST;
          unset($extra_params["mod"], $extra_params["app"], $extra_params["sec"], $extra_params["pag"], $extra_params["mdl"]);

          $pagina = "".$_REQUEST["mod"]."/".$_REQUEST["app"]."/".$_REQUEST["sec"]."/".$_REQUEST["pag"].".php";
          $extra = http_build_query($extra_params);
          if (!file_exists("../../".$pagina)) {
            $pagina = "xmods/app/error/404.php";
            $extra = "";
          }
        }else{
          $pagina = "xmods/app/home/inicio.php";
          $extra = "";
        }
        ?>
        <script>
          $(document).ready(function() { 
            var dv = document.getElementById("dv_lugar_principal");
            AJAXPOST(url_base+"<? echo $pagina;?>","<?php echo $extra; ?>",dv); 
          });
        </script>
      <?php require("_modal.php"); ?>
    </main>
  </body>
</html>