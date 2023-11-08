<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
        <meta name="mit" content="2023-11-03T11:51:44-03:00+198612">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="base" href="<?= url(); ?>"/>
    <link rel="basetheme" href="<?= theme(''); ?>"/>
    <?= $head; ?>
    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>"/>
    <link rel="stylesheet" href="<?= url("/shared/styles/styles.css"); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/style.css"); ?>"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?= theme('/assets/css/bootstrap.min.css') ;?>">
    <link rel="stylesheet" href="<?= theme('/settings/fullcalendar/lib/main.min.css') ;?>">
    <script src="<?= url("/shared/scripts/jquery.min.js");?>"></script>
    <script src="<?= url("/shared/scripts/bootstrap.min.js")?>"></script>
    <script src="<?= theme("/settings/fullcalendar/lib/main.js"); ?>"></script>
    <style>
        :root {
            --bs-success-rgb: 71, 222, 152 !important;
        }

        html,
        body {
            height: 100%;
            width: 100%;
           
        }

        a{
            text-decoration: none !important;
        }

        .btn-info.text-light:hover,
        .btn-info.text-light:focus {
            background: #000;
        }
        table, tbody, td, tfoot, th, thead, tr {
            border-color: #ededed !important;
            border-style: solid;
            border-width: 1px !important;
        }
    </style>
</head>
<body>

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<div class="ajax_response"><?= flash(); ?></div>

<!--CONTENT-->
<main class="main_content">
    <?= $this->section("content"); ?>
</main>

<script>
    var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>

<script src="<?= theme("/assets/scripts.js"); ?>"></script>
<script src="<?= theme("/settings/calendar-config.js"); ?>"></script>
<?= $this->section("scripts"); ?>

</body>
</html>