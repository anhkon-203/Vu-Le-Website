<?php
/* Template Name: Recruitment */
$banner_image = get_field('img_banner');
$title_large = get_field('title_large');
$title_form = get_field('title_form');
$desc_form = get_field('desc_form');
$embed_form = get_field('embed_form');
get_header(); ?>
    <main>
        <section class="section-banner"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= getimage($banner_image) ?>) center/cover no-repeat lightgray;">
            <div class="content">
                <div class="text">
                    <h1>Tuyển dụng</h1>
                    <div class="bot">
                        <a href="">
                            Trang chủ
                        </a>
                        <span>
                        /
                    </span>
                        <a href="javascript:void(0)">
                            Tuyển dụng
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-1-recruitment">
            <div class="container">
                <div class="title-large">
                    <h2>
                        <?= $title_large ?>
                    </h2>
                </div>
                <div class="wrapper row">
                    <div class="col-left col-lg-8 col-md-12">
                        <div class="search">
                            <form action="">
                                <div class="find-name">
                                    <i class="fas fa-search"></i>
                                    <input type="text" placeholder="Tìm kiếm bằng tên" name="work-name">
                                </div>
                                <div class="choose-location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <select name="work-location" id="work-location">
                                        <option value="" selected>Chọn địa điểm</option>
                                        <?php
                                        $terms = get_terms(array(
                                            'taxonomy' => 'work-location',
                                            'hide_empty' => false,
                                        ));
                                        foreach ($terms as $term) {
                                            echo '<option value="' . $term->slug . '">' . $term->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit">Tìm kiếm</button>
                            </form>
                        </div>
                        <div class="list-recruitment">
                            <?php
                            $arg = array(
                                'post_type' => 'recruitment',
                                'posts_per_page' => 3,
                                'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                                'orderby' => 'date',
                                'order' => 'DESC',
                                's' => isset($_GET['work-name']) ? $_GET['work-name'] : '',
                            );
                            if (isset($_GET['work-location']) && $_GET['work-location'] != '') {
                                $arg['tax_query'] = array(
                                    array(
                                        'taxonomy' => 'work-location',
                                        'field' => 'slug',
                                        'terms' => $_GET['work-location']
                                    ),
                                );
                            }
                            $the_query = new WP_Query($arg);
                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) : $the_query->the_post();

                                    $group_info = get_field('group_info', get_the_ID());
                                    if ($group_info) {
                                        $start_time = $group_info['start_time'];
                                        $end_time = $group_info['time_end'];
                                        $salary = $group_info['salary'];
                                        $quantity = $group_info['quantity'];
                                        $location = $group_info['location'];
                                    }
                                    ?>
                                    <div class="item">
                                        <div class="title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="text-top">
                                                <div class="left">
                                                    <span>Thời gian đăng tuyển</span>
                                                    <span>
                                            <?= $start_time ?>
                                        </span>
                                                </div>
                                                <div class="right">
                                                    <span>Hạn ứng tuyển:</span>
                                                    <span>
                                            <?= $end_time ?>
                                        </span>
                                                </div>
                                            </div>
                                            <div class="salary">
                                                <span>Mức lương:</span>
                                                <span>
                                        <?= $salary; ?>
                                    </span>
                                            </div>
                                            <div class="quantity">
                                                <span>Số lượng:</span>
                                                <span>
                                        <?= $quantity; ?>
                                    </span>
                                            </div>
                                            <div class="location">
                                                <span>Địa chỉ làm việc:</span>
                                                <span>
                                        <?= $location; ?>
                                    </span>
                                            </div>
                                        </div>
                                        <div class="apply">
                                            <a href="<?php the_permalink(); ?>">
                                                Ứng tuyển
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                            }
                            ?>
                            <?php if ($the_query->max_num_pages > 1) : ?>
                                <nav class="pagination">
                                    <ul>
                                        <?php
                                        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                                        for ($i = 1; $i <= $the_query->max_num_pages; $i++) :
                                            ?>
                                            <li class="<?= ($i == $paged || ($paged == 0 && $i == 1)) ? 'active' : '' ?>">
                                                <a href="<?= get_pagenum_link($i) ?>">
                                                    <?= $i ?>
                                                </a>
                                            </li>
                                        <?php endfor; ?>
                                        <?php if ($the_query->max_num_pages > 1) : ?>
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
                    <div class="col-right col-lg-4 col-md-12">
                        <div class="form-contact">
                            <div class="text">
                                <h3>
                                    <?= $title_form ?>
                                </h3>
                                <p>
                                    <?= $desc_form ?>
                                </p>
                            </div>
                            <?= do_shortcode($embed_form) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>
<script>
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    $(document).ready(function () {
        var nameWork = getParameterByName('work-name');
        var locationWork = getParameterByName('work-location');
        $('input[name="work-name"]').val(nameWork);
        $('#work-location').val(locationWork);
    });
</script>
