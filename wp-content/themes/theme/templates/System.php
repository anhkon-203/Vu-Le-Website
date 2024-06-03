<?php 
/* Template Name: System */
$uri = get_template_directory_uri();
$img_banner = get_field('img_banner');
$title_large = get_field('title_large');
$re_system = get_field('re_system');
get_header();
?>
<main>
    <section class="section-banner" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= getimage($img_banner) ?>) center/cover no-repeat lightgray;">
        <div class="content">
            <div class="text">
                <h1><?= get_the_title() ?></h1>
                <div class="bot">
                    <a href="<?= home_url() ?>">
                        Trang chủ
                    </a>
                    <span>
                        /
                    </span>
                    <a href="javascript:void(0)">
                        Hệ thống phân phối
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-1-system">
        <div class="container">
            <div class="title-large">
                <h2><?= $title_large ?></h2>
            </div>
            <div class="slide-system wrapper">
                <div class="swiper-wrapper">
                    <?php foreach ($re_system as $key => $value) : ?>
                    <div class="swiper-slide">
                        <div class="item">
                            <figure>
                                <img src="<?= getimage($value['img']) ?>" alt="">
                            </figure>
                            <div class="text">
                                <div class="name-store">
                                    <h2><?= $value['title'] ?></h2>
                                </div>
                                <div class="location">
                                    <span>Địa chỉ: </span>
                                    <span><?= $value['location'] ?></span>
                                </div>
                                <div class="phone">
                                    <a href="tel:<?= $value['sdt'] ?>">
                                        <span>Điện thoại:</span>
                                        <span><?= $value['sdt'] ?></span>
                                    </a>
                                </div>
                                <div class="list-store">
                                    <?php foreach ($value['re_store'] as $store) : ?>
                                    <div class="child">
                                        <span><?= $store['title'] ?></span>
                                        <span><?= $store['content'] ?></span>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="swiper-button-next-custom">
                <img src="<?= $uri?>/dist/images/project-right.svg" alt="">
            </div>
            <div class="swiper-button-prev-custom">
                <img src="<?= $uri?>/dist/images/project-left.svg" alt="">
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function() {
        initializeSwipers();
    });
</script>