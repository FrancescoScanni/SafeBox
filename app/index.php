<?php
    include_once("components/header.php");
    include_once("components/intro.php");
    include_once("components/logo.php");
    include_once("components/grid.php");
    include_once("components/glow.php");
    include_once("components/footer.php");
    include_once("components/features.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>LockGuard — Your secure digital vault</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700;800&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
  
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            display: ['Manrope', 'sans-serif'],
            body: ['Inter', 'sans-serif'],
          },
          colors: {
            navy: {
              950: '#060d19',
              900: '#0b1f3a',
            },
            teal: {
              950: '#052e2b',
            }
          },
          animation: {
            'float-slow': 'float 6s ease-in-out infinite',
            'float-reverse': 'floatReverse 7s ease-in-out infinite',
            'pulse-glow': 'pulseGlow 4s ease-in-out infinite',
          },
          keyframes: {
            float: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(-14px)' },
            },
            floatReverse: {
              '0%, 100%': { transform: 'translateY(0px)' },
              '50%': { transform: 'translateY(12px)' },
            },
            pulseGlow: {
              '0%, 100%': { opacity: '0.6', transform: 'scale(1)' },
              '50%': { opacity: '0.9', transform: 'scale(1.08)' },
            }
          }
        }
      }
    }
  </script>

  <style>
    /* Custom light and glow effects */
    .glow-cyan {
      filter: drop-shadow(0 0 25px rgba(45, 212, 191, 0.45));
    }
    .glow-blue {
      filter: drop-shadow(0 0 35px rgba(59, 130, 246, 0.4));
    }
  </style>
</head>

<!--MAIN-->
<body class="font-body bg-navy-950 text-white antialiased selection:bg-teal-400 selection:text-navy-950">


  <!-- ============ HEADER ============ -->
  <?php 
  echo $header;
    /*if($_SESSION["logged_in"]){
      echo $headerLogged;
    }else{
      echo $header;
    }*/
  ?>

  <!-- ============ HERO ============ -->
  <section class="relative overflow-hidden pt-12 pb-24 lg:pt-20 lg:pb-32">
    <!-- GLOWING EFFECT -->
    <?php echo $glow; ?>

    <!-- BG GRID -->
    <?php echo $grid; ?>

    <div class="relative max-w-7xl mx-auto px-6 lg:px-10 grid lg:grid-cols-2 gap-16 items-center z-10">

      <!--INTRO -->
      <?php echo $intro; ?>

      <!-- LOGO -->
      <?php echo $logo; ?> 
    </div>
  
     <!--FEATURES-->
    <?php echo $features; ?>
  </section>

 

  <!-- ============ FOOTER ============ -->
  <?php echo $footer; ?>

</body>
</html>