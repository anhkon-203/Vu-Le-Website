<?php
$uri = get_template_directory_uri();
$logo_header = get_field('logo_header', 'option');
$logo_header_mob = get_field('logo_header_mob', 'option');
$icon_sdt = get_field('icon_sdt', 'option');
$sdt = get_field('sdt', 'option');
// menu
$menu_header = wp_get_nav_menu_items('Menu header');
$elMenu = $menu_header;
$menu1 = array();
$menu = array();
foreach ($elMenu as $value) {

    $menu1[] = (array)$value;
}
foreach ($menu1 as $element) {
    if (!array_search($element['ID'], array_column($menu1, 'menu_item_parent'))) {
        $element['dem'] = 0;
    } else {
        $element['dem'] = 1;
    }
    $menu[] = (array)$element;
}
$url_check = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$ke = strpos($url_check, 'page');
if (!empty($ke)) {
    $url_check = substr($url_check, 0, $ke);
}
$key = 0;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="author" content=""/>
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content=""/>
    <link rel="shortcut icon" href="#" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/lib/fancybox/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/lib/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/lib/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/lib/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/lib/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/assets/flickity.min.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/assets/aos.css">
    <link rel="stylesheet" type="text/css" href="<?= $uri ?>/dist/assets/custom.css">
</head>

<body>
<header>
    <div class="header-wrapper">
        <div class="header-desktop">
            <div class="container">
                <div class="header-inner">
                    <div class="logo">
                        <a href="<?= home_url() ?>">
                            <img src="<?= getimage($logo_header) ?>" alt="">
                        </a>
                    </div>
                    <div class="mega-menu">
                        <ul>
                            <?php foreach ($menu as $key => $value):
                                ?>
                            <?php if ($value['menu_item_parent'] == 0): ?>
                            <li class="child <?= ($value['url'] == $url_check) ? 'active' : '' ?> ">
                                    <a href="<?= $value['url'] ?>">
                                        <?= $value['title'] ?> <?= ($value['dem'] == 1) ? '<i class="fas fa-caret-down"></i>' : '' ?>
                                    </a>
                                    <?php if ($value['dem'] == 1): ?>
                                        <nav class="sub-menu">
                                            <ul>
                                                <?php foreach ($menu as $key1 => $value1):
                                                    if ($value1['menu_item_parent'] == $value['ID']): ?>
                                                        <li><a href="<?= $value1['url'] ?>"><?= $value1['title'] ?></a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                            </ul>
                                        </nav>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="right">
                        <div class="phone">
                            <img src="<?= getimage($icon_sdt) ?>" alt="">
                            <a href="tel:<?= $sdt ?>">
                                <?= $sdt ?>
                            </a>
                        </div>
                        <div class="search">
                            <img src="<?= $uri ?>/dist/images/icon-search.svg" alt="">
                            <input type="text" placeholder="Tìm kiếm">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>