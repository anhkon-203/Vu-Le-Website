<?php
$categories = get_the_category();
$category_id = $categories[0]->cat_ID;
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 8,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
    'post_status' => 'publish',
    'cat' => $category_id
);
$query = new WP_Query($args);
get_header(); ?>
    <main>
        <section class="section-banner"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= get_template_directory_uri(); ?>/dist/images/banner-product.png) center/cover no-repeat lightgray;">
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
        <section class="section-1-list-news">
            <div class="container">
                <div class="wrapper row">
                    <div class="col-left col-lg-8 col-md-6 col-sm-12 col-xs-12">
                        <div class="list-new gsap">
                            <?php if ($query->have_posts()) : ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="item">
                                        <a href="<?= get_the_permalink(); ?>">
                                            <figure>
                                                <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                            </figure>
                                        </a>
                                        <div class="text">
                                            <div class="calendar">
                                                <img src="<?= get_template_directory_uri(); ?>/dist/images/calendar-post.svg"
                                                     alt="">
                                                <?php the_time('d/m/Y'); ?>
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
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                        <?php if ($query->max_num_pages > 1) : ?>
                            <nav class="pagination">
                                <ul>
                                    <?php
                                    $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                                    for ($i = 1; $i <= $query->max_num_pages; $i++) :
                                        ?>
                                        <li class="<?= ($i == $paged || ($paged == 0 && $i == 1)) ? 'active' : '' ?>">
                                            <a href="<?= get_pagenum_link($i) ?>">
                                                <?= $i ?>
                                            </a>
                                        </li>
                                    <?php endfor; ?>
                                    <?php if ($query->max_num_pages > 1) : ?>
                                        <li class="right">
                                            <a href="<?= get_pagenum_link($paged + 1) ?>">
                                                <i class="fas fa-chevron-right"></i>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        <?php endif; ?>

                    </div>
                    <div class="col-right col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="top">
                            <div class="title">
                                <h3>Danh mục bài viết</h3>
                            </div>
                            <ul>
                                <li>
                                    <a href="<?= home_url('/tin-tuc/'); ?>">
                                        Tất cả
                                    </a>
                                </li>
                                <?php
                                $categories = get_categories();
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
    </main>
<?php get_footer(); ?>