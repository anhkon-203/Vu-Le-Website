<?php get_header(); ?>
<main>
    <section class="section-banner" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= get_template_directory_uri(); ?>/dist/images/banner-product.png) center/cover no-repeat lightgray;">
        <div class="content">
            <div class="text">
                <h1>Tin tức</h1>
                <div class="bot">
                    <a href="">
                        Trang chủ
                    </a>
                    <span>
                        /
                    </span>
                    <a href="javascript:void(0)">
                        Tin tức
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-1-list-news section-1-new-detail">
        <div class="container">
            <div class="wrapper row">
                <div class="col-left col-lg-8 col-md-6 col-sm-12 col-xs-12">
                    <div class="text">
                        <h2>
                            <?= get_the_title(); ?>
                        </h2>
                        <div class="bot">
                            <div class="calendar">
                                <img src="<?= get_template_directory_uri(); ?>/dist/images/calendar-post.svg" alt="">
                                <span>
                                    <?php the_time('d/m/Y'); ?>
                                </span>
                            </div>
                            <div class="share">
                                <p>Chia sẻ</p>
                                <div class="img">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()) ?>" target="_blank">
                                        <img src="<?= get_template_directory_uri(); ?>/dist/images/facebook.svg" alt="">
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text=<?= urlencode(get_the_title()) ?>&url=<?= urlencode(get_permalink()) ?>" target="_blank">
                                        <img src="<?= get_template_directory_uri(); ?>/dist/images/twitter.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <?= the_content(); ?>
                    </div>
                </div>
                <div class="col-right col-lg-4 col-md-6 col-sm-12 col-xs-12">
                    <div class="top">
                        <div class="title">
                            <h3>Danh mục bài viết</h3>
                        </div>
                        <ul class="list-category">
                            <li><a href="<?= home_url('/tin-tuc/') ?>">Tất cả</a></li>
                            <?php
                            $categories = get_categories();
                            $category_id = get_the_category()[0]->cat_ID;
                            foreach ($categories as $category) {
                                if ($category->slug == 'bai-viet-noi-bat') {
                                    continue;
                                }
                                ?>
                                <li class="<?= $category_id == $category->cat_ID ? 'active' : '' ?>">
                                    <a href="<?= get_category_link($category->cat_ID); ?>">
                                        <?= $category->name; ?>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="bot">
                        <div class="title-large">
                            <h3>Bài viết nổi bật</h3>
                        </div>
                        <div class="list-post">
                            <?php
                            $args = array(
                                'post_type' => 'post',
                                'posts_per_page' => 4,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => 'bai-viet-noi-bat'
                                    )
                                )
                            );
                            $query = new WP_Query($args);
                            ?>
                            <?php if ($query->have_posts()) : ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="item">
                                        <figure>
                                            <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                        </figure>
                                        <div class="text">
                                            <div class="calendar">
                                                <img src="<?= get_template_directory_uri(); ?>/dist/images/calendar-post.svg"
                                                     alt="">
                                                <?php the_time('d/m/Y'); ?>
                                            </div>
                                            <div class="title-post">
                                                <a href="<?= get_the_permalink(); ?>">
                                                    <?= get_the_title(); ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-2-new-detail">
        <div class="container">
            <div class="title-large">
                <h2>Tin tức mới nhất</h2>
            </div>
            <div class="slide-news swiper">
                <div class="swiper-wrapper">
                    <?php
                    $query_news = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'post_status' => 'publish',
                        'post__not_in' => array(get_the_ID())
                    ));
                    ?>
                    <?php if ($query_news->have_posts()) : ?>
                    <?php while ($query_news->have_posts()) : $query_news->the_post(); ?>
                    <div class="swiper-slide">
                        <div class="item">
                            <a href="<?= get_the_permalink(); ?>">
                                <figure>
                                    <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                </figure>
                            </a>
                            <div class="text">
                                <div class="calendar">
                                    <img src="<?= get_template_directory_uri(); ?>/dist/images/calendar-post.svg" alt="">
                                    <span>
                                        <?php the_time('d/m/Y'); ?>
                                    </span>
                                </div>
                                <div class="title">
                                    <a href="<?= get_the_permalink(); ?>">
                                        <?= get_the_title(); ?>
                                    </a>
                                </div>
                                <div class="see-more">
                                    <a href="<?= get_the_permalink(); ?>">
                                        Xem chi tiết
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
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function() {
        initializeSwipers();
    });
</script>