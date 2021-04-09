<?php
$arr =
[
    [
    "status"=>"",
    "img"=>"img/demo/authors/sunny.png",
    "alt"=>"Sunny A.",
    "title_name"=>"Sunny A. (UI/UX Expert)",
    "title_role"=>"Lead Author",
    "link_tw"=>"@myplaneticket",
    "link_wrap"=>"https://wrapbootstrap.com/user/myorange",
    "contact"=>"Contact Sunny",
    ],
    [
    "status"=>"",
    "img"=>"img/demo/authors/josh.png",
    "alt"=>"Jos K.",
    "title_name"=>"Jos K. (ASP.NET Developer)",
    "title_role"=>"Partner &amp; Contributor",
    "link_tw"=>"@atlantez",
    "link_wrap"=>"https://wrapbootstrap.com/user/Walapa",
    "contact"=>"Contact Jos",
    ],
    [
    "status"=>"banned",
    "img"=>"img/demo/authors/jovanni.png",
    "alt"=>"Jovanni Lo",
    "title_name"=>"Jovanni L. (PHP Developer)",
    "title_role"=>"Partner &amp; Contributor",
    "link_tw"=>"@lodev09",
    "link_wrap"=>"https://wrapbootstrap.com/user/lodev09",
    "contact"=>"Contact Jovanni",
    ],
    [
    "status"=>"banned",
    "img"=>"img/demo/authors/roberto.png",
    "alt"=>"Roberto R",
    "title_name"=>"Roberto R. (Rails Developer)",
    "title_role"=>"Partner &amp; Contributor",
    "link_tw"=>"@sildur",
    "link_wrap"=>"https://wrapbootstrap.com/user/sildur",
    "contact"=>"Contact Roberto",
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
                    <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">
                        <?php foreach ($arr as $item):?>

                            <div class="<?php if ($item["status"]=="banned") {echo $item["status"];} else echo $item["status"];?> rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">
                                <img src="<?=$item["img"]?>" alt="<?=$item["alt"]?>" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">
                                <div class="ml-2 mr-3">
                                    <h5 class="m-0">
                                        <?=$item["title_name"]?>
                                        <small class="m-0 fw-300">
                                            <?=$item["title_role"]?>
                                        </small>
                                    </h5>
                                    <a href="https://twitter.com/<?=$item["link_tw"]?>" class="text-info fs-sm" target="_blank"><?=$item["link_tw"]?></a> -
                                    <a href="<?=$item["link_wrap"]?>" class="text-info fs-sm" target="_blank" title="<?=$item["contact"]?>"><i class="fal fa-envelope"></i></a>
                                </div>
                            </div>
                    <?php endforeach;?>
                </div>
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
