<?php
$choose_img_project = get_field('choose_img_project');
$choose_product = get_field('choose_product');
$banner_image = get_field('img_banner', 'option');

get_header();
?>
<main>
    <section class="section-banner"
             style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%),url(<?= getimage($banner_image) ?>) center/cover no-repeat lightgray;">
        <div class="content">
            <div class="text">
                <h1>Dự án đã thực hiện</h1>
                <div class="bot">
                    <a href="<?= home_url(); ?>">
                        Trang chủ
                    </a>
                    <span>
                        /
                    </span>
                    <a href="javascript:void(0)">
                        Dự án đã thực hiện
                    </a>
                </div>
            </div>
        </div>
    </section>
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li>
                    <a href="javascript:void(0)">
                        Trang chủ
                    </a>
                </li>
                <span>
                    /
                </span>

                <li>
                    <a href="javascript:void(0)">
                        Tin tức
                    </a>
                </li>
                <span>
                    /
                </span>
                <li class="blue">
                    <a href="javascript:void(0)">
                        <?php the_title(); ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <section class="section-1-project-detail">
        <div class="container">
            <div class="wrapper row">
                <div class="col-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="name">
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                    </div>
                    <div class="desc">
                        <?= get_the_content(); ?>
                    </div>
                </div>
                <div class="col-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="gallery-project swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($choose_img_project as $img) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= getimage($img); ?>" alt="">
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="swiper-button-next">
                            <img src="<?= get_template_directory_uri(); ?>/dist/images/product-right.svg" alt="">
                        </div>
                        <div class="swiper-button-prev">
                            <img src="<?= get_template_directory_uri(); ?>/dist/images/product-left.svg" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-2-product-detail section-2-project-detail">
        <div class="container">
            <div class="tilte-section">
                <h2>Sản phẩm</h2>
            </div>
            <div class="list-product">
                <?php foreach ($choose_product as $key => $item) :
                    $id_product = $item->ID;
                    $thumbnail_product = get_post_thumbnail_id($id_product);
                    $code_product = get_field('code_product', $id_product);
                    $link_product = get_permalink($id_product);
                    ?>
                    <div class="child">
                        <figure>
                            <img src="<?= getimage($thumbnail_product); ?>" alt="">
                        </figure>
                        <div class="name">
                            <a href="<?= $link_product; ?>">
                                <?= get_the_title($id_product); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="list-project">
                <div class="title">
                    <h3>Dự án khác</h3>
                </div>
                <div class="slide-project swiper">
                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => 'project',
                            'posts_per_page' => 6,
                            'post__not_in' => array(get_the_ID())
                        );
                        $query = new WP_Query($args);
                        ?>
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="swiper-slide">
                                    <div class="child">
                                        <div class="test">
                                            <figure>
                                                <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                            </figure>
                                            <div class="name">
                                                <a href="<?= get_the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="swiper-button-next-custom">
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/project-right.svg" alt="">
                </div>
                <div class="swiper-button-prev-custom">
                    <img src="<?= get_template_directory_uri(); ?>/dist/images/project-left.svg" alt="">
                </div>
            </div>
        </div>
        <div class="background">
            <img src="<?= get_template_directory_uri(); ?>/dist/images/back-proj-detail.png" alt="">
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function () {
        initializeSwipers();
    });
</script>