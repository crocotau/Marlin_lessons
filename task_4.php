<?php
$arr =
[
    [
        "flag_mt"=>true,
        "flag_mb"=>false,
        "tag_mt"=>"d-flex mt-2",
        "title"=>"My Tasks",
        "span_title"=>"130 / 500",
        "mb"=>"mb-3",
        "progress_tag"=>"bg-fusion-400",
        "progress_width"=>"65",
        "valuenow"=>"65",
        "valuemin"=>"0",
        "valuemax"=>"100",
    ],

    [
        "flag_mt"=>false,
        "flag_mb"=>false,
        "tag"=>"d-flex",
        "title"=>"Transfered",
        "span_title"=>"440 TB",
        "mb"=>"mb-3",
        "progress_tag"=>"bg-success-500",
        "progress_width"=>"34",
        "valuenow"=>"34",
        "valuemin"=>"0",
        "valuemax"=>"100",
    ],

    [
        "flag_mt"=>false,
        "flag_mb"=>false,
        "tag"=>"d-flex",
        "title"=>"Bugs Squashed",
        "span_title"=>"77%",
        "mb"=>"mb-3",
        "progress_tag"=>"bg-info-400",
        "progress_width"=>"77",
        "valuenow"=>"77",
        "valuemin"=>"0",
        "valuemax"=>"100",
    ],

    [
        "flag_mt"=>false,
        "flag_mb"=>true,
        "tag"=>"d-flex",
        "title"=>"User Testing",
        "span_title"=>"7 days",
        "mbg"=>"mb-g",
        "progress_tag"=>"bg-primary-300",
        "progress_width"=>"84",
        "valuenow"=>"84",
        "valuemin"=>"0",
        "valuemax"=>"100",
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            <?php foreach ($arr as $item):?>

                                <?php if (($item["flag_mt"]==true)&&($item["flag_mb"]==false)):?>
                                    <div class="<?= $item["tag_mt"]?>">
                                        <?= $item["title"]?>
                                        <span class="d-inline-block ml-auto"><?= $item["span_title"]?></span>
                                    </div>

                                    <div class="progress progress-sm <?= $item["mb"]?>">
                                        <div class="progress-bar <?= $item["progress_tag"]?>" role="progressbar" style="width:<?= $item["progress_width"]?>%;"aria-valuenow="<?= $item["valuenow"]?>" aria-valuemin="<?= $item["valuemin"]?>"aria-valuemax="<?= $item["valuemax"]?>"></div>
                                    </div>

                                <?php elseif (($item["flag_mt"]==false)&&($item["flag_mb"]==false)):?>
                                    <div class="<?= $item["tag"]?>">
                                        <?= $item["title"]?>
                                        <span class="d-inline-block ml-auto"><?= $item["span_title"]?></span>
                                    </div>
                                    <div class="progress progress-sm <?= $item["mb"]?>">
                                        <div class="progress-bar <?= $item["progress_tag"]?>" role="progressbar" style="width:<?= $item["progress_width"]?>%;"aria-valuenow="<?= $item["valuenow"]?>" aria-valuemin="<?= $item["valuemin"]?>"aria-valuemax="<?= $item["valuemax"]?>"></div>
                                    </div>

                                <?php elseif (($item["flag_mt"]==false)&&($item["flag_mb"]==true)):?>
                                    <div class="<?= $item["tag"]?>">
                                        <?= $item["title"]?>
                                        <span class="d-inline-block ml-auto"><?= $item["span_title"]?></span>
                                    </div>
                                    <div class="progress progress-sm <?= $item["mbg"]?>">
                                        <div class="progress-bar <?= $item["progress_tag"]?>" role="progressbar" style="width:<?= $item["progress_width"]?>%;"aria-valuenow="<?= $item["valuenow"]?>" aria-valuemin="<?= $item["valuemin"]?>"aria-valuemax="<?= $item["valuemax"]?>"></div>
                                    </div>

                                <?php endif;?>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
