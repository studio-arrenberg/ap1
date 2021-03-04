<?php
# init wp files
require_once("../../../wp-load.php");

# redirect if maintenence mode is off and plugins are installed
if (class_exists('acf_pro') && class_exists('UM')) {
  if (get_field('maintenance', 'option') == false) {
    wp_redirect( get_site_url() );
  }
}
# redirect if plugins are installed and user can visit
if (class_exists('acf_pro') && class_exists('UM') && current_user_can('administrator')) {
  wp_redirect( get_site_url() );
}

?>

<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
      <?php 
        if (class_exists('acf_pro')) {
          if (get_field('quartiersplattform-name', 'option')) {
              echo get_field('quartiersplattform-name', 'option')." Update";
          }
          else {
              echo "Hier entsteht deine Quatiersplattform";
          }
        }
        else {
          echo "Hier entsteht deine Quatiersplattform";
        }
      ?>
    </title>

    <style>
      @font-face {
        font-family: "OfficinaSansITCStd-Book";
        src: url("assets/fonts/officina/3901E8_0_0.woff2") format("woff2"),
          url("assets/fonts/officina/3901E8_0_0.woff") format("woff");
        font-display: swap;
      }

      @font-face {
        font-family: "OfficinaSansITCStd-Bold";
        src: url("assets/fonts/officina/3901E8_1_0.woff2") format("woff2"),
          url("assets/fonts/officina/3901E8_1_0.woff") format("woff");
        font-display: swap;
      }

      * {
        padding: 0px;
        margin: 0px;
      }

      html {
        width: 100%;
        height: 100%;
        font-family: "OfficinaSansITCStd-Book", sans-serif;
        font-weight: 500;
        background: #f8f8f8;
      }

      h1,
      h2,
      h3,
      h4,
      h5 {
        font-family: "OfficinaSansITCStd-Bold", sans-serif;
        font-weight: 500;
      }

      h1 {
        color: #000;
        font-size:3.2rem;
        line-height: 3.2rem;
        letter-spacing: -2px;
        margin-bottom: 30px;
        margin-top: 0px;
      }

      h2 {
        font-size: 1.5rem;
        line-height: 1.8rem;
        margin-bottom: 15px;
      }


      h4 {
        font-size: 1.5rem;
        margin: 0px;
        color:#0091ff;
      }

      h5 {
        font-size: 1.3rem;
        margin: 0px;
        font-family: "OfficinaSansITCStd-Book", sans-serif;
      }
      
      #confetti{
        position: fixed;
        height: 100%;
        z-index: -1;

      }
      
      .pre-title {
        color: #0091ff;
      }

      .dark {
        color: #002642;
      }

      p {
        font-size: 1.2rem;
        margin-bottom: 4px;
      }

      p.big {
        font-size: 1.4rem;
        margin-bottom: 50px;
      }

      .center-desktop {
        margin: -83px auto 0px auto;
        text-align: center;
        max-width: 900px;
        min-height: 100vh  ;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column
      }

      .logo {
        position: fixed;
        left: 15px;
        bottom: 15px;
      }

      .bg-logo{
        position: absolute;
        z-index: -2;
        top: 15px;
        left: 15px;
        max-height: 100vh;
      }
      .top-bar{
        padding:15px;
        
      }

      .flex { 
        display: flex; 
        flex-wrap: wrap; 
        justify-content: center;
        width: calc(100% + 10px);
        margin: 10px -5px;
      }

      .card{
        border-radius:20px;
        border: 5px solid #fff;
        background: #fff;
        margin: 10px;
        flex: auto;
        background-position: center;
        background-size: cover !important;
      }

      .white .card-link{
        color: #fff;
      }

      .card-link{
        text-decoration: none;
        color: #000;
        display: block;
        padding: 40px 15px;

      }


      .shadow{
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07), 0 2px 4px rgba(0, 0, 0, 0.07),
      0 4px 8px rgba(0, 0, 0, 0.07), 0 8px 16px rgba(0, 0, 0, 0.07),
      0 16px 32px rgba(0, 0, 0, 0.07), 0 32px 64px rgba(0, 0, 0, 0.07);
      }

      
.shadow:hover {
  box-shadow: 0 1px 2px rgba(0, 0, 0, 0.07), 0 2px 8px rgba(0, 0, 0, 0.15),
    0 4px 8px rgba(0, 0, 0, 0.07), 0 8px 32px rgba(0, 0, 0, 0.15),
    0 16px 32px rgba(0, 0, 0, 0.07), 0 32px 126px rgba(0, 0, 0, 0.15);
}

      .bg_red {
        background: 
        linear-gradient(to top right, rgba(255, 0, 0, 1), rgba(197, 0, 0, 1))}

      .bg_red-dark {
        background: 
        linear-gradient(to top right, rgba(204, 0, 59, 1), rgba(143, 0, 32, 1))
      }

      .bg_orange-dark {
        background: 
        linear-gradient(to top right, rgba(255, 90, 0, 1), rgba(188, 72, 0, 1))
      }

      .bg_cyan{
        background: 
        linear-gradient(to top right, rgba(0, 231, 255, 1), rgba(0, 165, 196, 1))
      }

      .bg_blue-light {
        background: 
        linear-gradient( 45deg,rgba(12, 194, 171, 1),rgba(12, 165, 194, 1))
      }

      .bg_blue {
        background: 
        linear-gradient(to top right, rgba(0, 165, 255, 1), rgba(0, 138, 178, 1))
      }

      .bg_blue-dark {
        background: 
        linear-gradient(to top right, rgba(0, 76, 230, 1), rgba(0, 13, 174, 1))
      }

      .bg_yellow-light{
        background: 
        linear-gradient(to top right, rgba(255, 252, 0, 1), rgba(213, 204, 0, 1))
      }

      .bg_yellow{
        background: 
        linear-gradient(to top right, rgba(255, 230, 76, 1), rgba(248, 212, 37, 1))}


      .bg_orange-light {
        background: 
        linear-gradient(to top right, rgba(255, 203, 0, 1), rgba(255, 155, 0, 1))}

      .bg_orange {
        background: 
        linear-gradient(to top right, rgba(255, 114, 0, 1), rgba(255, 154, 0, 1))
      }

      .bg_brown {
        background: 
        linear-gradient(to top right, rgba(201, 84, 0, 1), rgba(169, 81, 0, 1))
      }

      .bg_pink {
        background: 
        linear-gradient(to top right, rgba(255, 0, 187, 1), rgba(199, 0, 89, 1))
      }
        
      .bg_violett{
        background: 
        linear-gradient(to top right, rgba(220, 0, 119, 1), rgba(174, 0, 78, 1))
      }

      .bg_green {
        background: 
        linear-gradient(to top right, rgba(69, 199, 112, 1), rgba(68, 144, 105, 1));
      }

      .bg_green-light {
        background: 
        linear-gradient(to top right, rgba(0, 255, 10, 1), rgba(35, 191, 0, 1))
      }

      .bg_green-dark {
        background: 
        linear-gradient(to top right, rgba(0, 169, 7, 1), rgba(0, 116, 2, 1))
      }

      .bg_grey{
        background: 
        linear-gradient(to top right, rgba(145, 145, 145, 1), rgba(89, 89, 89, 1))
      }
     

      @media (max-width: 650px) {
        h1 {
          font-size: 1.7rem;
          line-height: 2.1rem;
          letter-spacing: 0px;
          margin-bottom: 8px;
        }

        h2 {
          font-size: 1.2rem;
          line-height: 2rem;
          margin-bottom: 0px;
        }

        h3{
          font-size: 1.1rem;
        }

        h4{
          font-size: 1.1rem;
          margin-bottom: 0px;
        }

        h5{
          font-size: 1.1rem;
          margin-top: 0px;
        }

        p {
          font-size: 1rem;
          margin-bottom: 4px;
        }

        p.big {
          font-size: 1rem;
          margin-bottom: 20px
        }

        .top-bar-logo {
          max-width: 140px;
        }

        .center-desktop {
          text-align: left;
          padding: 0px 15px;
          align-items: start;
          flex-direction: column;
        }

        .card{
          margin: 5px;
          min-width: 100px;
        }

        .card-link{
          padding: 20px 15px;
        }

        .logo{
          margin-top: 25px;
          width: 100%;
          justify-self: flex-end;
        }     
      }

    </style>

    
  </head>
  <body>
    <canvas id="confetti"></canvas>
    <div class="top-bar">
      <img class="top-bar-logo" src="<?php echo get_template_directory_uri()?>/assets/sponsoren/quartiersplattform.svg" alt=""/>
    </div>
    <div class="bg-logo">
      <svg  width="50vw" viewBox="0 0 261 301" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
          <title>Shape Copy</title>
          <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Desktop-HD" transform="translate(-49.000000, -151.000000)" fill="#fff" fill-rule="nonzero">
                  <path d="M177.28623,411.611384 C106.309509,410.460605 49.1267956,352.565382 49.1267956,281.314421 C49.1267956,209.343754 107.470549,151 179.441217,151 C251.411885,151 309.755638,209.343754 309.755638,281.314421 C309.755638,316.275959 295.987845,348.021856 273.578227,371.426142 C275.1771,372.534081 276.777138,373.680718 278.378661,374.863186 L279.141766,375.428078 L280.626241,376.536324 C281.600115,377.267859 282.546136,377.98784 283.486489,378.714478 L285.146285,380.008752 L286.708768,381.248922 L288.306753,382.538737 L290.449036,384.299212 L292.471192,385.989317 L295.207119,388.310546 L297.916849,390.638516 L302.711939,394.80326 L308.262519,399.671426 C310.300898,401.459197 310.551113,404.527214 308.865338,406.61856 L308.723163,406.787361 L270.45202,450.289508 C268.615683,452.376841 265.435679,452.58231 263.345996,450.748648 L259.151142,447.067733 L254.951833,443.411525 L251.891494,440.773402 L249.431548,438.67951 L247.217729,436.825161 L245.584403,435.481401 L243.852798,434.084565 L242.740411,433.204111 L242.327019,432.880424 L241.300761,432.085098 L240.481591,431.458486 C239.661201,430.834476 238.834446,430.21602 237.976917,429.582872 C236.577391,428.549546 235.196863,427.567279 233.828076,426.634466 L232.803573,425.944104 L231.782793,425.272136 C216.835314,415.550764 202.869309,411.716099 180.224444,411.630318 L179.441217,411.628843 L177.28623,411.611384 Z M179.441217,219.01871 C145.036246,219.01871 117.145505,246.90945 117.145505,281.314421 C117.145505,315.719393 145.036246,343.610133 179.441217,343.610133 C213.846188,343.610133 241.736928,315.719393 241.736928,281.314421 C241.736928,246.90945 213.846188,219.01871 179.441217,219.01871 Z" id="Shape-Copy"></path>
              </g>
          </g>
      </svg>

      </svg>
    </div>



  
    <div class="center-desktop">

      <?php 
      /**
       * 
       * Inhalte
       *  - ACF felder
       *  - Errors (fehlende plugins)
       *  - Schritte ..? (felder eintragen, plugin einstellungen vornehmen, projekte posten, ...)
       *  - Quartiersplattform (projekt, dokumentation (github page), kontakt)
       * 
       */

      if (class_exists('acf_pro') && class_exists('UM')) {
      ?>

        <h2 class="pre-title">Gestalte dein Viertel</h2>
        <h1><?php //the_field('quartiersplattform-name', 'option'); ?>Hier entsteht <br>deine Quatiersplattform</h1>
        <?php //the_field('headline', 'option'); ?>
        <p class="big">
          <?php //the_field('text', 'option'); ?>
          Dein Viertel  bekommt ein Update. Bald findest du hier spannende Neuigkeiten aus Quartiersprojekten, kannst an Umfragen teilnehmen und eigene Projekte über die Plattform planen.
        </p>

        <h3>Die Quatiersplattform wird bereits in folgenden Viertel genutzt</h3>



        <div class="flex">

          <?php
            $latlong = "7.128,51.2485,";
            $location = get_field('map');
            $map_zoom = 15.48; 

            $width = 500;
            $height = 300;
          ?>

          <div class="card card-50 shadow" style="background: url('https://api.mapbox.com/styles/v1/studioarrenberg/ckl9rpmct17pi17mxw1zw46h0/static/<?php echo $latlong.$map_zoom."/".$width."x".$height; ?>@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ')">
            <a class="card-link" href="https://arrenberg.app">
              <h4>Arrenberg</h4>
              <h5>Wuppertal</h5>
            </a>
          </div>

          <?php
            $latlong = "7.244365,51.274734,";
            $location = get_field('map');
            $map_zoom = 13.48; 

            $width = 500;
            $height = 300;
          ?>

          <div class="card card-50 shadow" style="background: url('https://api.mapbox.com/styles/v1/studioarrenberg/ckl9rpmct17pi17mxw1zw46h0/static/<?php echo $latlong.$map_zoom."/".$width."x".$height; ?>@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ')">
            <a class="card-link" href="https://langerfeld.app">
              <h4>Langerfeld</h4>
              <h5>Wuppertal</h5>
            </a>
          </div>




        </div>
      <?php 
      }
      else {

      ?>
      
      <h2 class="pre-title">Erste Schritte</h2>
        <h1>Plugins installieren</h1>
        <p class="big">
          Dein Viertel  bekommt ein Update. Bald findest du hier spannende Neuigkeiten aus Quartiersprojekten, kannst an Umfragen teilnehmen und eigene Projekte über die Plattform planen.
        </p>

        <h3>Du musst noch folgende Schritte durchführen:</h3>
      <div class="card-container flex-row">
      
        <?php
          if (!class_exists('acf_pro')) {
          ?>

          <div class="card bg_red white">
            <a class="card-link" href="<?php echo get_site_url(); ?>/wp-admin/plugins.php">
              <h2>Bitte Advanced Custom fields installieren</h2>
              <p>
                Bitte installieren sie das Plugin ACF durch die Wordpress Plugin Seite. 
              </p>
            </a>
          </div>

      <?php
        }
        if (!class_exists('UM')) {
        ?>

      <div class="card bg_red white">
        <a class="card-link" href="<?php echo get_site_url(); ?>/wp-admin/plugins.php">
          <h2>Bitte Ultimate Member installieren</h2>
          <p>
            Bitte installieren sie das Plugin Ultimate Member durch die Wordpress Plugin Seite. Und stellen sie folgende einstellungen ein. (Auf Github erklären)
          </p>
        </a>
      </div>

        <?php
      }
      if (!function_exists( 'wp_mail_smtp' )) {
        ?>

      <div class="card bg_orange-light white">
        <a class="card-link" href="<?php echo get_site_url(); ?>/wp-admin/plugins.php">

          <h2>Bitte WP Mail SMTP installieren</h2>
          <p>
            Bitte installieren sie das Plugin WP Mail SMTP durch die Wordpress Plugin Seite. Und legen sie ihre email einstellungen an. (Auf Github erklären)
          </p>
      </a>

      </div>

        <?php
      }
    }
    ?>


    <div class="logo">
      <a href="https://www.arrenberg.studio">
        
        <svg
          width="90px"
          viewBox="0 0 82 36"
          version="1.1"
          xmlns="http://www.w3.org/2000/svg"
          xmlns:xlink="http://www.w3.org/1999/xlink"
        >
          <title>studioarrenberg</title>
          <g
            id="Development"
            stroke="none"
            stroke-width="1"
            fill="none"
            fill-rule="evenodd"
          >
            <g
              id="iPhone-X-Copy-5"
              transform="translate(-23.000000, -789.000000)"
              fill="#000000"
              fill-rule="nonzero"
            >
              <path
                d="M26.87,803.816 C27.338,803.816 27.812,803.771 28.292,803.681 C28.772,803.591 29.204,803.435 29.588,803.213 C29.972,802.991 30.287,802.697 30.533,802.331 C30.779,801.965 30.902,801.5 30.902,800.936 C30.902,800.384 30.791,799.943 30.569,799.613 C30.347,799.283 30.065,799.022 29.723,798.83 C29.381,798.638 29.015,798.497 28.625,798.407 C28.235,798.317 27.869,798.233 27.527,798.155 C27.185,798.077 26.903,797.987 26.681,797.885 C26.459,797.783 26.348,797.624 26.348,797.408 C26.348,797.144 26.456,796.958 26.672,796.85 C26.888,796.742 27.11,796.688 27.338,796.688 C27.986,796.688 28.508,796.934 28.904,797.426 L28.904,797.426 L30.56,795.788 C30.152,795.356 29.654,795.056 29.066,794.888 C28.478,794.72 27.896,794.636 27.32,794.636 C26.864,794.636 26.414,794.693 25.97,794.807 C25.526,794.921 25.133,795.098 24.791,795.338 C24.449,795.578 24.173,795.884 23.963,796.256 C23.753,796.628 23.648,797.072 23.648,797.588 C23.648,798.14 23.759,798.581 23.981,798.911 C24.203,799.241 24.485,799.496 24.827,799.676 C25.169,799.856 25.535,799.991 25.925,800.081 C26.315,800.171 26.681,800.255 27.023,800.333 C27.365,800.411 27.647,800.507 27.869,800.621 C28.091,800.735 28.202,800.906 28.202,801.134 C28.202,801.374 28.076,801.539 27.824,801.629 C27.572,801.719 27.29,801.764 26.978,801.764 C26.57,801.764 26.213,801.683 25.907,801.521 C25.601,801.359 25.322,801.122 25.07,800.81 L25.07,800.81 L23.432,802.628 C23.864,803.072 24.392,803.381 25.016,803.555 C25.64,803.729 26.258,803.816 26.87,803.816 Z M36.131,803.816 C36.443,803.816 36.761,803.798 37.085,803.762 C37.409,803.726 37.721,803.654 38.021,803.546 L38.021,803.546 L38.021,801.296 C37.901,801.404 37.724,801.473 37.49,801.503 C37.256,801.533 37.067,801.548 36.923,801.548 C36.635,801.548 36.404,801.509 36.23,801.431 C36.056,801.353 35.927,801.242 35.843,801.098 C35.759,800.954 35.705,800.783 35.681,800.585 C35.657,800.387 35.645,800.168 35.645,799.928 L35.645,799.928 L35.645,797.012 L38.021,797.012 L38.021,794.852 L35.645,794.852 L35.645,792.26 L32.945,792.26 L32.945,794.852 L31.217,794.852 L31.217,797.012 L32.945,797.012 L32.945,801.17 C32.945,801.65 33.026,802.058 33.188,802.394 C33.35,802.73 33.575,803.003 33.863,803.213 C34.151,803.423 34.487,803.576 34.871,803.672 C35.255,803.768 35.675,803.816 36.131,803.816 Z M42.404,803.816 C42.728,803.816 43.028,803.774 43.304,803.69 C43.58,803.606 43.826,803.498 44.042,803.366 C44.258,803.234 44.441,803.084 44.591,802.916 C44.741,802.748 44.864,802.58 44.96,802.412 L44.96,802.412 L44.996,802.412 L44.996,803.6 L47.588,803.6 L47.588,794.852 L44.888,794.852 L44.888,799.208 C44.888,799.496 44.87,799.772 44.834,800.036 C44.798,800.3 44.723,800.537 44.609,800.747 C44.495,800.957 44.33,801.125 44.114,801.251 C43.898,801.377 43.616,801.44 43.268,801.44 C42.92,801.44 42.653,801.368 42.467,801.224 C42.281,801.08 42.143,800.894 42.053,800.666 C41.963,800.438 41.909,800.189 41.891,799.919 C41.873,799.649 41.864,799.388 41.864,799.136 L41.864,799.136 L41.864,794.852 L39.164,794.852 L39.164,799.676 C39.164,800.264 39.203,800.81 39.281,801.314 C39.359,801.818 39.515,802.256 39.749,802.628 C39.983,803 40.313,803.291 40.739,803.501 C41.165,803.711 41.72,803.816 42.404,803.816 Z M53.249,803.816 C53.549,803.816 53.84,803.774 54.122,803.69 C54.404,803.606 54.662,803.498 54.896,803.366 C55.13,803.234 55.334,803.087 55.508,802.925 C55.682,802.763 55.823,802.604 55.931,802.448 L55.931,802.448 L55.967,802.448 L55.967,803.6 L58.451,803.6 L58.451,789.992 L55.751,789.992 L55.751,795.788 L55.715,795.788 C55.403,795.368 55.004,795.071 54.518,794.897 C54.032,794.723 53.507,794.636 52.943,794.636 C52.319,794.636 51.761,794.765 51.269,795.023 C50.777,795.281 50.36,795.626 50.018,796.058 C49.676,796.49 49.412,796.985 49.226,797.543 C49.04,798.101 48.947,798.686 48.947,799.298 C48.947,799.958 49.049,800.564 49.253,801.116 C49.457,801.668 49.748,802.145 50.126,802.547 C50.504,802.949 50.957,803.261 51.485,803.483 C52.013,803.705 52.601,803.816 53.249,803.816 Z M53.807,801.44 C53.123,801.44 52.592,801.236 52.214,800.828 C51.836,800.42 51.647,799.886 51.647,799.226 C51.647,798.566 51.836,798.032 52.214,797.624 C52.592,797.216 53.123,797.012 53.807,797.012 C54.491,797.012 55.022,797.216 55.4,797.624 C55.778,798.032 55.967,798.566 55.967,799.226 C55.967,799.886 55.778,800.42 55.4,800.828 C55.022,801.236 54.491,801.44 53.807,801.44 Z M61.772,793.664 C62.204,793.664 62.573,793.511 62.879,793.205 C63.185,792.899 63.338,792.53 63.338,792.098 C63.338,791.666 63.185,791.297 62.879,790.991 C62.573,790.685 62.204,790.532 61.772,790.532 C61.34,790.532 60.971,790.685 60.665,790.991 C60.359,791.297 60.206,791.666 60.206,792.098 C60.206,792.53 60.359,792.899 60.665,793.205 C60.971,793.511 61.34,793.664 61.772,793.664 Z M63.122,803.6 L63.122,794.852 L60.422,794.852 L60.422,803.6 L63.122,803.6 Z M69.377,803.816 C70.049,803.816 70.682,803.708 71.276,803.492 C71.87,803.276 72.386,802.967 72.824,802.565 C73.262,802.163 73.607,801.68 73.859,801.116 C74.111,800.552 74.237,799.922 74.237,799.226 C74.237,798.53 74.111,797.9 73.859,797.336 C73.607,796.772 73.262,796.289 72.824,795.887 C72.386,795.485 71.87,795.176 71.276,794.96 C70.682,794.744 70.049,794.636 69.377,794.636 C68.705,794.636 68.072,794.744 67.478,794.96 C66.884,795.176 66.368,795.485 65.93,795.887 C65.492,796.289 65.147,796.772 64.895,797.336 C64.643,797.9 64.517,798.53 64.517,799.226 C64.517,799.922 64.643,800.552 64.895,801.116 C65.147,801.68 65.492,802.163 65.93,802.565 C66.368,802.967 66.884,803.276 67.478,803.492 C68.072,803.708 68.705,803.816 69.377,803.816 Z M69.377,801.44 C68.693,801.44 68.162,801.236 67.784,800.828 C67.406,800.42 67.217,799.886 67.217,799.226 C67.217,798.566 67.406,798.032 67.784,797.624 C68.162,797.216 68.693,797.012 69.377,797.012 C70.061,797.012 70.592,797.216 70.97,797.624 C71.348,798.032 71.537,798.566 71.537,799.226 C71.537,799.886 71.348,800.42 70.97,800.828 C70.592,801.236 70.061,801.44 69.377,801.44 Z M26.636,820.816 C27.188,820.816 27.713,820.714 28.211,820.51 C28.709,820.306 29.108,819.97 29.408,819.502 L29.408,819.502 L29.444,819.502 L29.444,820.6 L31.928,820.6 L31.928,816.154 C31.928,815.422 31.868,814.777 31.748,814.219 C31.628,813.661 31.415,813.19 31.109,812.806 C30.803,812.422 30.395,812.131 29.885,811.933 C29.375,811.735 28.724,811.636 27.932,811.636 C27.212,811.636 26.516,811.753 25.844,811.987 C25.172,812.221 24.584,812.572 24.08,813.04 L24.08,813.04 L25.52,814.516 C25.808,814.192 26.135,813.937 26.501,813.751 C26.867,813.565 27.272,813.472 27.716,813.472 C28.184,813.472 28.589,813.613 28.931,813.895 C29.273,814.177 29.444,814.558 29.444,815.038 C29.072,815.038 28.667,815.044 28.229,815.056 C27.791,815.068 27.353,815.104 26.915,815.164 C26.477,815.224 26.054,815.317 25.646,815.443 C25.238,815.569 24.875,815.746 24.557,815.974 C24.239,816.202 23.987,816.49 23.801,816.838 C23.615,817.186 23.522,817.612 23.522,818.116 C23.522,818.56 23.606,818.95 23.774,819.286 C23.942,819.622 24.17,819.904 24.458,820.132 C24.746,820.36 25.079,820.531 25.457,820.645 C25.835,820.759 26.228,820.816 26.636,820.816 Z M27.392,818.98 C27.092,818.98 26.804,818.902 26.528,818.746 C26.252,818.59 26.114,818.35 26.114,818.026 C26.114,817.726 26.213,817.492 26.411,817.324 C26.609,817.156 26.849,817.03 27.131,816.946 C27.413,816.862 27.707,816.811 28.013,816.793 C28.319,816.775 28.574,816.766 28.778,816.766 L28.778,816.766 L29.444,816.766 L29.444,817.342 C29.444,817.618 29.387,817.858 29.273,818.062 C29.159,818.266 29.006,818.434 28.814,818.566 C28.622,818.698 28.403,818.8 28.157,818.872 C27.911,818.944 27.656,818.98 27.392,818.98 Z M36.095,820.6 L36.095,816.946 C36.095,816.514 36.119,816.118 36.167,815.758 C36.215,815.398 36.32,815.089 36.482,814.831 C36.644,814.573 36.875,814.372 37.175,814.228 C37.475,814.084 37.883,814.012 38.399,814.012 C38.603,814.012 38.798,814.027 38.984,814.057 C39.17,814.087 39.359,814.132 39.551,814.192 L39.551,814.192 L39.551,811.726 C39.419,811.69 39.275,811.666 39.119,811.654 C38.963,811.642 38.807,811.636 38.651,811.636 C38.051,811.636 37.553,811.771 37.157,812.041 C36.761,812.311 36.419,812.716 36.131,813.256 L36.131,813.256 L36.095,813.256 L36.095,811.852 L33.395,811.852 L33.395,820.6 L36.095,820.6 Z M43.196,820.6 L43.196,816.946 C43.196,816.514 43.22,816.118 43.268,815.758 C43.316,815.398 43.421,815.089 43.583,814.831 C43.745,814.573 43.976,814.372 44.276,814.228 C44.576,814.084 44.984,814.012 45.5,814.012 C45.704,814.012 45.899,814.027 46.085,814.057 C46.271,814.087 46.46,814.132 46.652,814.192 L46.652,814.192 L46.652,811.726 C46.52,811.69 46.376,811.666 46.22,811.654 C46.064,811.642 45.908,811.636 45.752,811.636 C45.152,811.636 44.654,811.771 44.258,812.041 C43.862,812.311 43.52,812.716 43.232,813.256 L43.232,813.256 L43.196,813.256 L43.196,811.852 L40.496,811.852 L40.496,820.6 L43.196,820.6 Z M51.863,820.816 C52.571,820.816 53.255,820.666 53.915,820.366 C54.575,820.066 55.121,819.64 55.553,819.088 L55.553,819.088 L53.663,817.702 C53.435,818.014 53.168,818.269 52.862,818.467 C52.556,818.665 52.181,818.764 51.737,818.764 C51.209,818.764 50.765,818.611 50.405,818.305 C50.045,817.999 49.811,817.588 49.703,817.072 L49.703,817.072 L55.967,817.072 L55.967,816.226 C55.967,815.53 55.871,814.9 55.679,814.336 C55.487,813.772 55.214,813.289 54.86,812.887 C54.506,812.485 54.074,812.176 53.564,811.96 C53.054,811.744 52.487,811.636 51.863,811.636 C51.191,811.636 50.558,811.744 49.964,811.96 C49.37,812.176 48.854,812.485 48.416,812.887 C47.978,813.289 47.633,813.772 47.381,814.336 C47.129,814.9 47.003,815.53 47.003,816.226 C47.003,816.922 47.129,817.552 47.381,818.116 C47.633,818.68 47.978,819.163 48.416,819.565 C48.854,819.967 49.37,820.276 49.964,820.492 C50.558,820.708 51.191,820.816 51.863,820.816 Z M53.267,815.236 L49.703,815.236 C49.715,815.02 49.766,814.813 49.856,814.615 C49.946,814.417 50.072,814.243 50.234,814.093 C50.396,813.943 50.591,813.82 50.819,813.724 C51.047,813.628 51.311,813.58 51.611,813.58 C52.103,813.58 52.505,813.742 52.817,814.066 C53.129,814.39 53.279,814.78 53.267,815.236 L53.267,815.236 Z M60.08,820.6 L60.08,816.244 C60.08,815.956 60.098,815.68 60.134,815.416 C60.17,815.152 60.245,814.915 60.359,814.705 C60.473,814.495 60.638,814.327 60.854,814.201 C61.07,814.075 61.352,814.012 61.7,814.012 C62.048,814.012 62.315,814.084 62.501,814.228 C62.687,814.372 62.825,814.558 62.915,814.786 C63.005,815.014 63.059,815.263 63.077,815.533 C63.095,815.803 63.104,816.064 63.104,816.316 L63.104,816.316 L63.104,820.6 L65.804,820.6 L65.804,815.776 C65.804,815.188 65.762,814.642 65.678,814.138 C65.594,813.634 65.435,813.196 65.201,812.824 C64.967,812.452 64.64,812.161 64.22,811.951 C63.8,811.741 63.248,811.636 62.564,811.636 C62.24,811.636 61.94,811.678 61.664,811.762 C61.388,811.846 61.142,811.954 60.926,812.086 C60.71,812.218 60.524,812.368 60.368,812.536 C60.212,812.704 60.092,812.872 60.008,813.04 L60.008,813.04 L59.972,813.04 L59.972,811.852 L57.38,811.852 L57.38,820.6 L60.08,820.6 Z M72.941,820.816 C73.589,820.816 74.177,820.705 74.705,820.483 C75.233,820.261 75.686,819.949 76.064,819.547 C76.442,819.145 76.733,818.668 76.937,818.116 C77.141,817.564 77.243,816.958 77.243,816.298 C77.243,815.686 77.15,815.101 76.964,814.543 C76.778,813.985 76.514,813.49 76.172,813.058 C75.83,812.626 75.413,812.281 74.921,812.023 C74.429,811.765 73.871,811.636 73.247,811.636 C72.683,811.636 72.158,811.723 71.672,811.897 C71.186,812.071 70.787,812.368 70.475,812.788 L70.475,812.788 L70.439,812.788 L70.439,806.992 L67.739,806.992 L67.739,820.6 L70.223,820.6 L70.223,819.448 L70.259,819.448 C70.367,819.604 70.508,819.763 70.682,819.925 C70.856,820.087 71.06,820.234 71.294,820.366 C71.528,820.498 71.783,820.606 72.059,820.69 C72.335,820.774 72.629,820.816 72.941,820.816 Z M72.383,818.44 C71.699,818.44 71.168,818.236 70.79,817.828 C70.412,817.42 70.223,816.886 70.223,816.226 C70.223,815.566 70.412,815.032 70.79,814.624 C71.168,814.216 71.699,814.012 72.383,814.012 C73.067,814.012 73.598,814.216 73.976,814.624 C74.354,815.032 74.543,815.566 74.543,816.226 C74.543,816.886 74.354,817.42 73.976,817.828 C73.598,818.236 73.067,818.44 72.383,818.44 Z M83.192,820.816 C83.9,820.816 84.584,820.666 85.244,820.366 C85.904,820.066 86.45,819.64 86.882,819.088 L86.882,819.088 L84.992,817.702 C84.764,818.014 84.497,818.269 84.191,818.467 C83.885,818.665 83.51,818.764 83.066,818.764 C82.538,818.764 82.094,818.611 81.734,818.305 C81.374,817.999 81.14,817.588 81.032,817.072 L81.032,817.072 L87.296,817.072 L87.296,816.226 C87.296,815.53 87.2,814.9 87.008,814.336 C86.816,813.772 86.543,813.289 86.189,812.887 C85.835,812.485 85.403,812.176 84.893,811.96 C84.383,811.744 83.816,811.636 83.192,811.636 C82.52,811.636 81.887,811.744 81.293,811.96 C80.699,812.176 80.183,812.485 79.745,812.887 C79.307,813.289 78.962,813.772 78.71,814.336 C78.458,814.9 78.332,815.53 78.332,816.226 C78.332,816.922 78.458,817.552 78.71,818.116 C78.962,818.68 79.307,819.163 79.745,819.565 C80.183,819.967 80.699,820.276 81.293,820.492 C81.887,820.708 82.52,820.816 83.192,820.816 Z M84.596,815.236 L81.032,815.236 C81.044,815.02 81.095,814.813 81.185,814.615 C81.275,814.417 81.401,814.243 81.563,814.093 C81.725,813.943 81.92,813.82 82.148,813.724 C82.376,813.628 82.64,813.58 82.94,813.58 C83.432,813.58 83.834,813.742 84.146,814.066 C84.458,814.39 84.608,814.78 84.596,815.236 L84.596,815.236 Z M91.409,820.6 L91.409,816.946 C91.409,816.514 91.433,816.118 91.481,815.758 C91.529,815.398 91.634,815.089 91.796,814.831 C91.958,814.573 92.189,814.372 92.489,814.228 C92.789,814.084 93.197,814.012 93.713,814.012 C93.917,814.012 94.112,814.027 94.298,814.057 C94.484,814.087 94.673,814.132 94.865,814.192 L94.865,814.192 L94.865,811.726 C94.733,811.69 94.589,811.666 94.433,811.654 C94.277,811.642 94.121,811.636 93.965,811.636 C93.365,811.636 92.867,811.771 92.471,812.041 C92.075,812.311 91.733,812.716 91.445,813.256 L91.445,813.256 L91.409,813.256 L91.409,811.852 L88.709,811.852 L88.709,820.6 L91.409,820.6 Z M99.608,824.92 C101.312,824.92 102.581,824.491 103.415,823.633 C104.249,822.775 104.666,821.518 104.666,819.862 L104.666,819.862 L104.666,811.852 L102.182,811.852 L102.182,813.004 L102.146,813.004 C102.038,812.848 101.894,812.689 101.714,812.527 C101.534,812.365 101.318,812.218 101.066,812.086 C100.814,811.954 100.529,811.846 100.211,811.762 C99.893,811.678 99.542,811.636 99.158,811.636 C98.534,811.636 97.976,811.765 97.484,812.023 C96.992,812.281 96.575,812.62 96.233,813.04 C95.891,813.46 95.627,813.946 95.441,814.498 C95.255,815.05 95.162,815.614 95.162,816.19 C95.162,816.85 95.264,817.456 95.468,818.008 C95.672,818.56 95.963,819.037 96.341,819.439 C96.719,819.841 97.172,820.153 97.7,820.375 C98.228,820.597 98.816,820.708 99.464,820.708 C99.872,820.708 100.307,820.621 100.769,820.447 C101.231,820.273 101.618,819.976 101.93,819.556 L101.93,819.556 L101.966,819.556 L101.966,820.402 C101.966,821.026 101.771,821.539 101.381,821.941 C100.991,822.343 100.382,822.544 99.554,822.544 C99.002,822.544 98.495,822.442 98.033,822.238 C97.571,822.034 97.13,821.758 96.71,821.41 L96.71,821.41 L95.216,823.642 C95.852,824.146 96.548,824.485 97.304,824.659 C98.06,824.833 98.828,824.92 99.608,824.92 Z M100.022,818.332 C99.71,818.332 99.425,818.272 99.167,818.152 C98.909,818.032 98.681,817.873 98.483,817.675 C98.285,817.477 98.132,817.249 98.024,816.991 C97.916,816.733 97.862,816.46 97.862,816.172 C97.862,815.884 97.916,815.611 98.024,815.353 C98.132,815.095 98.285,814.867 98.483,814.669 C98.681,814.471 98.909,814.312 99.167,814.192 C99.425,814.072 99.71,814.012 100.022,814.012 C100.322,814.012 100.604,814.072 100.868,814.192 C101.132,814.312 101.363,814.471 101.561,814.669 C101.759,814.867 101.912,815.095 102.02,815.353 C102.128,815.611 102.182,815.884 102.182,816.172 C102.182,816.46 102.128,816.733 102.02,816.991 C101.912,817.249 101.759,817.477 101.561,817.675 C101.363,817.873 101.132,818.032 100.868,818.152 C100.604,818.272 100.322,818.332 100.022,818.332 Z"
                id="studioarrenberg"
              ></path>
            </g>
          </g>
        </svg>
      </a>
  </div>
  </div>

  
    </body>

  <script>
    !(function (e, t) {
      "object" == typeof exports && "undefined" != typeof module
        ? (module.exports = t())
        : "function" == typeof define && define.amd
        ? define(t)
        : ((e = e || self).ConfettiGenerator = t());
    })(this, function () {
      "use strict";
      return function (e) {
        var a = {
          target: "confetti-holder",
          max: 80,
          size: 1,
          animate: !0,
          respawn: !0,
          props: ["circle", "square", "triangle", "line"],
          colors: [
            [165, 104, 246],
            [230, 61, 135],
            [0, 199, 228],
            [253, 214, 126],
          ],
          clock: 25,
          interval: null,
          rotate: !1,
          start_from_edge: !1,
          width: window.innerWidth,
          height: window.innerHeight,
        };
        if (
          (e &&
            (e.target && (a.target = e.target),
            e.max && (a.max = e.max),
            e.size && (a.size = e.size),
            null != e.animate && (a.animate = e.animate),
            null != e.respawn && (a.respawn = e.respawn),
            e.props && (a.props = e.props),
            e.colors && (a.colors = e.colors),
            e.clock && (a.clock = e.clock),
            null != e.start_from_edge &&
              (a.start_from_edge = e.start_from_edge),
            e.width && (a.width = e.width),
            e.height && (a.height = e.height),
            null != e.rotate && (a.rotate = e.rotate)),
          "object" != typeof a.target && "string" != typeof a.target)
        )
          throw new TypeError(
            "The target parameter should be a node or string"
          );
        if (
          ("object" == typeof a.target &&
            (null === a.target || !a.target instanceof HTMLCanvasElement)) ||
          ("string" == typeof a.target &&
            (null === document.getElementById(a.target) ||
              !document.getElementById(a.target) instanceof
                HTMLCanvasElement))
        )
          throw new ReferenceError(
            "The target element does not exist or is not a canvas element"
          );
        var t =
            "object" == typeof a.target
              ? a.target
              : document.getElementById(a.target),
          o = t.getContext("2d"),
          r = [];
        function n(e, t) {
          e = e || 1;
          var r = Math.random() * e;
          return t ? Math.floor(r) : r;
        }
        var i = a.props.reduce(function (e, t) {
          return e + (t.weight || 1);
        }, 0);
        function s() {
          var e =
            a.props[
              (function () {
                for (
                  var e = Math.random() * i, t = 0;
                  t < a.props.length;
                  ++t
                ) {
                  var r = a.props[t].weight || 1;
                  if (e < r) return t;
                  e -= r;
                }
              })()
            ];
          return {
            prop: e.type ? e.type : e,
            x: n(a.width),
            y: a.start_from_edge
              ? a.clock < 0
                ? parseFloat(a.height) + 10
                : -10
              : n(a.height),
            src: e.src,
            radius: n(4) + 1,
            size: e.size,
            rotate: a.rotate,
            line: Math.floor(n(65) - 30),
            angles: [
              n(10, !0) + 2,
              n(10, !0) + 2,
              n(10, !0) + 2,
              n(10, !0) + 2,
            ],
            color: a.colors[n(a.colors.length, !0)],
            rotation: (n(360, !0) * Math.PI) / 180,
            speed: n(a.clock / 7) + a.clock / 30,
          };
        }
        function l(e) {
          if (e)
            switch (
              ((o.fillStyle = o.strokeStyle =
                "rgba(" + e.color + ", " + (3 < e.radius ? 0.8 : 0.4) + ")"),
              o.beginPath(),
              e.prop)
            ) {
              case "circle":
                o.moveTo(e.x, e.y),
                  o.arc(e.x, e.y, e.radius * a.size, 0, 2 * Math.PI, !0),
                  o.fill();
                break;
              case "triangle":
                o.moveTo(e.x, e.y),
                  o.lineTo(
                    e.x + e.angles[0] * a.size,
                    e.y + e.angles[1] * a.size
                  ),
                  o.lineTo(
                    e.x + e.angles[2] * a.size,
                    e.y + e.angles[3] * a.size
                  ),
                  o.closePath(),
                  o.fill();
                break;
              case "line":
                o.moveTo(e.x, e.y),
                  o.lineTo(e.x + e.line * a.size, e.y + 5 * e.radius),
                  (o.lineWidth = 2 * a.size),
                  o.stroke();
                break;
              case "square":
                o.save(),
                  o.translate(e.x + 15, e.y + 5),
                  o.rotate(e.rotation),
                  o.fillRect(
                    -15 * a.size,
                    -5 * a.size,
                    15 * a.size,
                    5 * a.size
                  ),
                  o.restore();
                break;
              case "svg":
                o.save();
                var t = new window.Image();
                t.src = e.src;
                var r = e.size || 15;
                o.translate(e.x + r / 2, e.y + r / 2),
                  e.rotate && o.rotate(e.rotation),
                  o.drawImage(
                    t,
                    (-r / 2) * a.size,
                    (-r / 2) * a.size,
                    r * a.size,
                    r * a.size
                  ),
                  o.restore();
            }
        }
        function c() {
          (a.animate = !1),
            clearInterval(a.interval),
            requestAnimationFrame(function () {
              o.clearRect(0, 0, t.width, t.height);
              var e = t.width;
              (t.width = 1), (t.width = e);
            });
        }
        return {
          render: function () {
            (t.width = a.width), (t.height = a.height), (r = []);
            for (var e = 0; e < a.max; e++) r.push(s());
            return requestAnimationFrame(function e() {
              for (var t in (o.clearRect(0, 0, a.width, a.height), r))
                l(r[t]);
              !(function () {
                for (var e = 0; e < a.max; e++) {
                  var t = r[e];
                  t &&
                    (a.animate && (t.y += t.speed),
                    t.rotate && (t.rotation += t.speed / 35),
                    ((0 <= t.speed && a.height < t.y) ||
                      (t.speed < 0 && t.y < 0)) &&
                      (a.respawn
                        ? ((r[e] = t),
                          (r[e].x = n(a.width, !0)),
                          (r[e].y = t.speed < 0 ? parseFloat(a.height) : -10))
                        : (r[e] = void 0)));
                }
                r.every(function (e) {
                  return void 0 === e;
                }) && c();
              })(),
                a.animate && requestAnimationFrame(e);
            });
          },
          clear: c,
        };
      };
    });
  </script>


  <script>
    var confettiElement = document.getElementById("confetti");
    var confettiSettings = {
      target: "confetti",
      max: "95",
      size: "2",
      animate: true,
      props: ["circle"],
      colors: [
        [0, 145, 255],
        [240, 115, 150],
        [250, 185, 45],
        [90, 185, 140],
      ],
      clock: "0",
      rotate: false,
      width: "1792",
      height: "1040",
      start_from_edge: false,
      respawn: true,
    };
    var confetti = new ConfettiGenerator(confettiSettings);
    confetti.render();
  </script>
</html>
