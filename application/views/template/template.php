<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Programme Supérieur de Spécialisation en Finances Publiques</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- jQuery et jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Google Analytics 4 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VOTRE_ID_GA4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-VOTRE_ID_GA4');
    </script>

    <link rel="shortcut icon" type="image/png" href="<?php echo base_url(); ?>/favicon.png" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>resources/css/style.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
        * {
            font-family: "Open Sans", sans-serif;
        }
    </style>

    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker();
        });
    </script>
</head>
<style>

        .logo {
            font-size: 2rem;
            font-weight: 700;
            background: var(--gradient-main);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav {
            position: sta;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--gray-200);
            transition: all 0.3s ease;
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }

        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--gradient-main);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }


        .nav-btn {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            backdrop-filter: blur(15px);
            transition: all 0.3s ease;
            pointer-events: all;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .nav-btn:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.4);
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .nav-cta .btn-ghost{
                display: none;
            }

            .btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }

            .nav-btn {
                width: 50px;
                height: 50px;
                font-size: 1rem;
            }
        }
    </style>
<body>
<!-- Navbar -->
<nav class="nav" id="nav">
    <div class="nav-container">
        <div class="logo" style="width:20%"><a href="<?php echo base_url(); ?>index.php"><img
                        src="<?= base_url() ?>resources/assets/images/logo.png" style="width:23%" alt=""></a></div>
        <div class="nav-cta">
            <a href="<?= base_url('index.php/welcome/index') ?>" class="btn btn-ghost">En savoir Plus</a>
            <a href="<?php echo base_url(); ?>index.php/candidature/add" class="btn btn-primary">Candidater</a>
        </div>
    </div>
</nav>

<div class="">

    <?php echo $content; ?>

    <!-- Twitter Widget (si nécessaire) -->
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
</body>
</html>