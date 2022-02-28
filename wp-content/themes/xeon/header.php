<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Xeon | OnePage Responsive Theme</title>
<!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
<!--    <link href="css/font-awesome.min.css" rel="stylesheet">-->
<!--    <link href="css/prettyPhoto.css" rel="stylesheet">-->
<!--    <link href="css/main.css" rel="stylesheet">-->
<!--    [if lt IE 9]>-->
<!--    <script src="js/html5shiv.js"></script>-->
<!--    <script src="js/respond.min.js"></script>-->
<!--    <![endif]-->
<!--    <link rel="shortcut icon" href="images/ico/favicon.ico">-->
<!--    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">-->
<!--    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">-->
<!--    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">-->
<!--    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">-->

<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<!-- Add the slick-theme.css if you want default styling -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <?php wp_head() ?>
    

</head><!--/head-->

<body data-spy="scroll" data-target="#navbar" data-offset="0"><div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><div  style="display:none;"><a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#108;&#105;&#110;&#105;&#121;&#97;&#111;&#107;&#111;&#110;&#46;&#114;&#117;">&#1086;&#1082;&#1085;&#1072;</a> <!-- div --><!-- div end --> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#112;&#114;&#101;&#109;&#105;&#117;&#109;&#107;&#97;&#100;&#114;&#46;&#114;&#117;">&#1092;&#1086;&#1090;&#1086;&#1075;&#1088;&#1072;&#1092;</a> <!-- div --><!-- div end --> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#117;&#110;&#105;&#115;&#104;&#97;&#98;&#108;&#111;&#110;.&#99;&#111;&#109;">html php</a> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#114;&#105;&#116;&#117;&#97;&#108;&#103;&#97;&#114;&#97;&#110;&#116;&#46;&#114;&#117;">&#1087;&#1072;&#1084;&#1103;&#1090;&#1085;&#1080;&#1082;&#1080;</a> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#116;&#117;&#116;&#108;&#111;&#118;&#101;&#46;&#114;&#117;">&#1079;&#1085;&#1072;&#1082;&#1086;&#1084;&#1089;&#1090;&#1074;&#1072;</a></div><div class="padding valign-image-left"></div><div class="padding  valign-image-right"></div><div class="padding valign-image-center"></div><header id="header" role="banner">
    <div class="container">
        <div id="navbar" class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php home_url()?>"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                <?php if( have_rows('menu_button', 'option') ): ?>
                    <li class="active"><a href="#main-slider">
                        <?php $icon_home = get_field('home_button_style', 'option'); 
                            echo $icon_home;
                        ?>
                       <!-- <i class="icon-home"></i> -->
                    </a></li>
                    <?php while( have_rows('menu_button', 'option') ): the_row(); ?>
                            <?php
                                $href = get_sub_field('menu_button_select');
                                switch ($href) {
                                    case "секция сервисов":
                                        $href = "#services";
                                        break;
                                    case "секция портфолио":
                                        $href = "#portfolio";
                                        break;
                                    case "секция цен":
                                        $href = "#pricing";
                                        break;
                                    case "секция о нас":
                                        $href = "#about-us";
                                        break;
                                    case "секция контактов":
                                        $href = "#contact";
                                        break;
                                    }; 
                            ?> 
                            <li><a href="<?php echo $href?>"><?php echo get_sub_field('menu_button_text');?></a></li>
                        <?php endwhile; ?>
                    <?php endif; ?>
            </div>
        </div>
        
    </div>

</header><!--/#header-->