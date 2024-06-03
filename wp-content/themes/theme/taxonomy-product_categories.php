<?php

$uri = get_template_directory_uri();
$slug = get_queried_object()->slug;
$banner_image = get_field('img_banner', 'option');

get_header();

?>
<main>
    <section class="section-banner"
             style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= getimage($banner_image) ?>) center/cover no-repeat lightgray;">
        <div class="content">
            <div class="text">
                <h1><?= single_term_title() ?></h1>
                <div class="bot">
                    <a href="<?= home_url() ?>">
                        Trang chủ
                    </a>
                    <span>
                        /
                    </span>
                    <a href="<?= home_url('san-pham') ?>">
                        Sản phẩm
                    </a>
                    <span>
                        /
                    </span>
                    <a href="javascript:void(0)" class="rename">
                        <?= single_term_title() ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-list-product">
        <div class="container">
            <div class="title-section">
                <h2>
                    <?= single_term_title() ?>
                </h2>
            </div>
            <div class="wrapper">
                <div class="col-left">
                    <div class="title">
                        <h3>
                            Sản phẩm
                        </h3>
                    </div>
                    <div class="list-category">
                        <nav>
                            <?php
                            $categories = get_terms(array(
                                'taxonomy' => 'product_categories',
                                'hide_empty' => false,
                                'parent' => 0
                            ));
                            ?>
                            <ul>
                                <?php foreach ($categories as $key => $value) :
                                    $taxonomy = $value->taxonomy;
                                    $url = get_term_link($value->term_id, $taxonomy);
                                    ?>
                                    <li>
                                        <?php $subcategories = get_terms(array(
                                            'taxonomy' => 'product_categories',
                                            'hide_empty' => false,
                                            'parent' => $value->term_id
                                        )); ?>
                                        <div class="top <?= $value->slug == $slug ? 'active' : '' ?>">
                                            <a href="<?= $url ?>">
                                                <img src="<?= $uri ?>/dist/images/icon-arrow-right.svg" alt="">
                                                <?= $value->name ?>
                                            </a>
                                            <?php if ($subcategories) : ?>
                                                <span class="open">
                                            <i class="fas fa-chevron-down"></i>
                                        </span>
                                            <?php endif; ?>
                                        </div>
                                        <?php if ($subcategories) : ?>
                                            <div class="bottom">
                                                <ul>
                                                    <?php foreach ($subcategories as $subKey => $subValue) :
                                                        $subUrl = get_term_link($subValue->term_id, $subValue->taxonomy);
                                                        ?>
                                                        <li class="<?= $subValue->slug == $slug ? 'active' : '' ?>">
                                                            <a href="<?= $subUrl ?>">
                                                                <?= $subValue->name ?>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-right">
                    <div class="list-product gsap">
                        <?php
                        $args = array(
                            'post_type' => 'product',
                            'posts_per_page' => 15,
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_categories',
                                    'field' => 'slug',
                                    'terms' => $slug
                                )
                            )
                        );
                        $query = new WP_Query($args);
                        ?>
                        <?php if ($query->have_posts()) : ?>
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="child">
                                    <a href="<?= get_the_permalink() ?>">
                                        <figure>
                                            <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
                                        </figure>
                                    </a>
                                    <div class="name">
                                        <a href="<?= get_the_permalink() ?>">
                                            <?= get_the_title() ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p class="noti-no-post">Không có sản phẩm nào</p>
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
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>
<script>
    $(document).ready(function () {
        $('.list-category .bottom').hide();
        $(document).on('click', '.list-category .open', function () {
            $(this).parent().next().slideToggle();
            $(this).parent().toggleClass('active');
        })
    });
</script>
