<?php
/* Template Name: About */

get_header();
$group_banner = get_field('group_banner');
if ($group_banner) {
    $banner_slogan = $group_banner['slogan'];
    $banner_image = $group_banner['img'];
    $re_value_banner = $group_banner['re_value'];
}
$group_letter = get_field('group_letter');
$title_letter = $group_letter['title'];
$content_letter = $group_letter['content'];
$signature = $group_letter['signature'];

$group_intro = get_field('group_intro');
if ($group_intro) {
    $img_large_intro = $group_intro['img_large'];
    $img_small_intro = $group_intro['img_small'];
    $name_company = $group_intro['name_company'];
    $desc_intro = $group_intro['desc_intro'];
    $re_info = $group_intro['re_info'];
}
$group_system = get_field('group_system');
if ($group_system) {
    $title_system = $group_system['title'];
    $img_1 = $group_system['img_1'];
    $img_2 = $group_system['img_2'];
    $re_product = $group_system['re_product'];
}
$group_view = get_field('group_view');
if ($group_view) {
    $title_view = $group_view['title'];
    $desc_view = $group_view['desc'];
    $img_view = $group_view['img'];
    $re_value = $group_view['re_value'];
}
$group_different = get_field('group_dif');
if ($group_different) {
    $title_dif = $group_different['title'];

    $re_dif = $group_different['re_dif'];
}
$group_certificate = get_field('group_certificate');
if ($group_certificate) {
    $title_certificate = $group_certificate['title'];
    $choose_certificate = $group_certificate['choose_certificate'];
}
?>
    <main>
        <section class="section-banner-about"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= getimage($banner_image) ?>) lightgray 50% / cover no-repeat;">
            <div class="content">
                <div class="text">
                    <h1><?= $banner_slogan ?></h1>
                    <div class="bot">
                        <a href="<?= home_url() ?>">
                            Trang chủ
                        </a>
                        <span>
                        /
                    </span>
                        <a href="javascript:void(0)">
                            Giới thiệu
                        </a>
                    </div>
                </div>
                <div class="list-item">
                    <?php foreach ($re_value_banner as $item) : ?>
                        <div class="item">
                            <div class="icon">
                                <img src="<?= getimage($item['icon']) ?>" alt="">
                            </div>
                            <span><?= $item['value'] ?></span>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </section>
        <section class="section-1-about"
                 style="background: url(<?= get_template_directory_uri() ?>/dist/images/back-ab-2.png) lightgray 50% / cover no-repeat;">
            <div class="content">
                <div class="letter">
                    <div class="title">
                        <h2><?= $title_letter ?></h2>
                    </div>
                    <div class="text">
                        <p><?= $content_letter ?></p>
                    </div>
                    <div class="company-name">
                    <span>
                        <?= $signature ?>
                    </span>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-2-about">
            <div class="container">
                <div class="col-left">
                    <div class="img-large">
                        <img src="<?= getimage($img_large_intro) ?>" alt="">
                    </div>
                    <div class="img-small">
                        <img src="<?= getimage($img_small_intro) ?>" alt="">
                    </div>
                </div>
                <div class="col-right">
                    <div class="text">
                        <h2><?= $name_company ?></h2>
                        <?= $desc_intro ?>
                    </div>
                    <div class="list-intro">
                        <?php foreach ($re_info as $item) : ?>
                            <div class="item">
                                <img src="<?= get_template_directory_uri() ?>/dist/images/tick.svg" alt="">
                                <div class="text-intro">
                                    <strong><?= $item['title'] ?>: </strong>
                                    <p>
                                        <?= $item['content'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-3-about">
            <div class="content">
                <div class="col-left">
                    <img src="<?= getimage($img_1) ?>" alt="">
                </div>
                <div class="middle"
                     style="background: rgba(211, 211, 211, 0.1) url(<?= get_template_directory_uri() ?>/dist/images/back-s3-ab.png) 50% / cover no-repeat;">
                    <div class="wrap">
                        <div class="title-large">
                            <h2><?= $title_system ?></h2>
                        </div>
                        <?php foreach ($re_product as $item) : ?>
                            <div class="device">
                                <h3><?= $item['name'] ?></h3>
                                <?= $item['desc'] ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-right">
                    <img src="<?= getimage($img_2) ?>" alt="">
                </div>
            </div>
        </section>
        <section class="section-4-about">
            <div class="container">
                <div class="col-left">
                    <div class="title-large">
                        <h2><?= $title_view ?></h2>
                        <?= $desc_view ?>
                    </div>
                    <div class="list-item">
                        <?php foreach ($re_value as $key => $item) :
                            if ($key == 2) break;
                            ?>
                            <div class="item">
                                <div class="title">
                                    <img src="<?= getimage($item['icon']) ?>" alt="">
                                    <span><?= $item['title'] ?></span>
                                </div>
                                <div class="desc">
                                    <p>
                                        <?= $item['desc'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-right">
                    <div class="top">
                        <img src="<?= getimage($img_view) ?>" alt="">
                    </div>
                    <?php foreach ($re_value as $key => $item) :
                        if ($key > 1) {
                            ?>
                            <div class="item">
                                <div class="title">
                                    <img src="<?= getimage($item['icon']) ?>" alt="">
                                    <span><?= $item['title'] ?></span>
                                </div>
                                <div class="desc">
                                    <p>
                                        <?= $item['desc'] ?>
                                    </p>
                                </div>
                            </div>
                        <?php }
                    endforeach; ?>

                </div>
            </div>
        </section>
        <section class="section-5-about">
            <div class="container">
                <div class="title-section">
                    <h2><?= $title_dif ?></h2>
                </div>
                <div class="list-item row">
                    <?php foreach ($re_dif as $item) : ?>
                        <div class="item col-lg-3 col-md-6 col-12">
                            <div class="icon">
                                <img src="<?= getimage($item['icon']) ?>" alt="">
                            </div>
                            <div class="text">
                                <h3><?= $item['title'] ?></h3>
                                <p><?= $item['desc'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section class="section-6-about">
            <div class="container">
                <div class="title-section">
                    <h2><?= $title_certificate ?></h2>
                </div>
                <div class="list-certification">
                    <div class="row-1 row">
                        <?php foreach ($choose_certificate as $key => $item) :
                            if ($key == 4) break;
                            ?>
                            <div class="child col-lg-3 col-md-6 col-sm-6 col-12">
                                <img src="<?= getimage($item) ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row-2 row">
                        <?php foreach ($choose_certificate as $key => $item) :
                            if ($key > 3 && $key < 6) {
                                ?>
                                <div class="child col-lg-6 col-md-6 col-sm-6 col-12">
                                    <img src="<?= getimage($item) ?>" alt="">
                                </div>
                            <?php }
                        endforeach; ?>
                    </div>
                    <div class="row-3 row">
                        <?php foreach ($choose_certificate as $key => $item) :
                            if ($key > 5 && $key < 11) {
                                ?>
                                <div class="child col-lg-3 col-md-6 col-sm-6 col-12">
                                    <img src="<?= getimage($item) ?>" alt="">
                                </div>
                            <?php }
                        endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>