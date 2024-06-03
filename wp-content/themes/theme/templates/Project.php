<?php
/*
    Template Name: Project
*/
$banner_image = get_field('img_banner');
get_header(); ?>
<main>
    <section class="section-banner" style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= getimage($banner_image) ?>) center/cover no-repeat lightgray;">
        <div class="content">
            <div class="text">
                <h1>Dự án đã thực hiện</h1>
                <div class="bot">
                    <a href="">
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
    <section class="section-1-project">
        <div class="container">
            <div class="list-project gsap">
                <?php
                    $args = array(
                        'post_type' => 'project',
                        'posts_per_page' => 15,
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                        'post_status' => 'publish'
                    );
                    $query = new WP_Query($args);
                ?>
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="child">
                            <a href="<?= get_the_permalink(); ?>">
                                <figure>
                                    <img src="<?= getimage(get_post_thumbnail_id()) ?>" alt="">
                                </figure>
                            </a>
                            <div class="text">
                                <a href="<?= get_the_permalink(); ?>">
                                    <h3><?php the_title(); ?></h3>
                                </a>
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
    </section>
</main>
<?php get_footer(); ?>