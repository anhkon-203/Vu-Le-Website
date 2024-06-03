<?php
/* Template Name: Home */
$uri = get_template_directory_uri();
$group_banner = get_field('group_banner');
if($group_banner)
{
    $banner_image = $group_banner['img'];
    $banner_title = $group_banner['title'];
    $banner_desc = $group_banner['desc'];
    $banner_button = $group_banner['btn_text'];
    $banner_button_link = $group_banner['url'];
}
// section 1
$re_section_1 = get_field('re_section_1');
// section 2
$title_large_s2 = get_field('title_large');
$re_cate_product = get_field('re_cate_product');
// section 3
$group_outstanding = get_field('group_outstanding');
if($group_outstanding)
{
    $title_s3 = $group_outstanding['title'];
    $desc_s3 = $group_outstanding['desc'];
    $choose_product = $group_outstanding['choose_product'];
    $button_s3 = $group_outstanding['btn_text'];
    $button_link_s3 = $group_outstanding['url'];
}
// section 4
$group_why_choose = get_field('group_why_choose');
if($group_why_choose)
{
    $title_s4 = $group_why_choose['title'];
    $desc_s4 = $group_why_choose['desc'];
    $list_why_choose = $group_why_choose['re_why_choose'];
    $background_s4 = $group_why_choose['background'];
}
// section 5
$group_project = get_field('group_project');
if($group_project)
{
    $title_s5 = $group_project['title'];
    $desc_s5 = $group_project['desc'];
    $choose_project = $group_project['choose_project'];
}
$group_news = get_field('group_news');
if($group_news)
{
    $title_s6 = $group_news['title'];
    $desc_s6 = $group_news['desc'];
    $choose_post = $group_news['choose_post'];
    $button_s6 = $group_news['btn_text'];
    $button_link_s6 = $group_news['url'];
}
get_header();
?>
<main>
    <section class="section-banner-home">
        <div class="content">
            <figure>
                <img src="<?= getimage($banner_image) ?>" alt="">
            </figure>
            <div class="text">
                <div class="title">
                    <h2 id="text">
                        <?= $banner_title ?>
                    </h2>
                </div>
                <div class="desc">
                    <?= $banner_desc ?>
                </div>
                <div class="button">
                    <a href="<?= $banner_button_link ?>">
                        <?= $banner_button ?>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-1-homepage">
        <div class="container">
            <div class="list-item row">
                <div class="col-left col-lg-6 col-md-6 col-sm-12">
                    <?php foreach($re_section_1 as $key => $item):
                        if($key == 1) break;
                    ?>

                        <div class="item">
                            <figure>
                                <img src="<?= getimage($item['img']) ?>" alt="">
                            </figure>
                            <div class="text">
                                <h3><?= $item['title'] ?></h3>
                                <p><?= $item['desc'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-right col-lg-6 col-md-6 col-sm-12">
                    <?php foreach($re_section_1 as $key => $item):
                        if($key == 0) continue;
                    ?>
                    <div class="item">
                        <figure>
                            <img src="<?= getimage($item['img']) ?>" alt="">
                        </figure>
                        <div class="text">
                            <h3><?= $item['title'] ?></h3>
                            <p><?= $item['desc'] ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-2-homepage">
        <div class="container">
            <div class="title-section">
                <h2><?= $title_large_s2 ?></h2>
            </div>
            <div class="list-product row">
                <?php foreach($re_cate_product as $item): ?>
                    <div class="product col-lg-4 col-md-6 col-sm-12">
                        <div class="item">
                            <div class="image">
                                <img src="<?= getimage($item['img']) ?>" alt="">
                            </div>
                            <div class="name-product">
                                <a href="<?= $item['url'] ?>">
                                    <?= $item['name'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section class="section-3-homepage">
        <div class="container">
            <div class="title-section">
                <h2><?= $title_s3 ?></h2>
                <p><?= $desc_s3 ?></p>
            </div>
            <div class="list-product row">
                <?php foreach($choose_product as $item):
                    $id = $item->ID;
                    $img = get_post_thumbnail_id($id);
                    $title = get_the_title($id);
                    $desc = get_the_excerpt($id);

                ?>
                <div class="product col-lg-4 col-md-6 col-sm-12">
                    <div class="item">
                        <div class="image">
                            <a href="<?= get_the_permalink($id) ?>">
                                <img src="<?= getimage($img) ?>" alt="">
                            </a>
                        </div>
                        <div class="text">
                            <a href="<?= get_the_permalink($id) ?>">
                                <?= $title ?>
                            </a>
                            <p>
                                <?= $desc ?>
                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="see-more">
                <a href="<?= $button_link_s3 ?>">
                    <?= $button_s3 ?>
                </a>
            </div>
        </div>
    </section>
    <section class="section-4-homepage" style="background-image: url(<?= getimage($background_s4)?>);">
        <div class="content">
            <div class="title-section">
                <h2><?= $title_s4 ?></h2>
              <?= $desc_s4 ?>
            </div>
            <div class="wrap">
                <div class="list-why-choose">
                    <?php foreach($list_why_choose as $item): ?>
                        <div class="item">
                            <div class="icon">
                                <img src="<?= getimage($item['icon']) ?>" alt="">
                            </div>
                            <div class="text">
                                <p><?= $item['value'] ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-5-homepage">
        <div class="container-fluid">
            <div class="title-section">
                <h2><?= $title_s5 ?></h2>
                    <?= $desc_s5 ?>
            </div>
            <div class="list-project swiper">
                <div class="swiper-wrapper">
                    <?php foreach($choose_project as $item):
                        $id = $item->ID;
                        $img = get_post_thumbnail_id($id);
                        $title = get_the_title($id);
                        $desc = get_the_excerpt($id);
                    ?>
                    <div class="swiper-slide">
                        <div class="content" style="background-image: url('<?= getimage($img) ?>');">
                            <div class="text">
                                <h3>
                                    <?= $title ?>
                                </h3>
                                <div class="desc">
                                    <p>
                                        <?= $desc ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination-custom"></div>
            </div>
        </div>
    </section>
    <section class="section-6-homepage">
        <div class="container">
            <div class="title-section">
                <h2><?= $title_s6 ?></h2>
                <?= $desc_s6 ?>
            </div>
            <div class="list-news">
                <div class="top">
                    <?php foreach($choose_post as $key => $item):
                        $id = $item->ID;
                        $img = get_post_thumbnail_id($id);
                        $title = get_the_title($id);
                        $desc = get_the_excerpt($id);
                        $date = get_the_date('d/m/Y', $id);
                        if($key == 1) break;
                    ?>
                    <div class="left" style="background-image: url(<?= getimage($img) ?>);">
                        <div class="text">
                            <div class="calendar">
                                <img src="<?= get_template_directory_uri(); ?>/dist/images/calendar.svg" alt="">
                                <span><?= $date ?></span>
                            </div>
                            <div class="title">
                                <a href="<?= get_the_permalink($id) ?>">
                                    <h3>
                                        <?= $title ?>
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php foreach($choose_post as $key => $item):
                    $id = $item->ID;
                    $img = get_post_thumbnail_id($id);
                    $title = get_the_title($id);
                    $desc = get_the_excerpt($id);
                    $date = get_the_date('d/m/Y', $id);
                    if($key == 0) continue;
                    if($key == 2) break;
                    ?>
                    <div class="right">
                        <div class="item">
                            <figure>
                                <img src="<?= getimage($img) ?>" alt="">
                            </figure>
                            <div class="text">
                                <div class="calendar">
                                    <img src="<?= get_template_directory_uri(); ?>/dist/images/calendar-blue.svg" alt="">
                                    <span><?= $date ?></span>
                                </div>
                                <div class="title">
                                    <a href="<?= get_the_permalink($id) ?>">
                                        <?= $title ?>
                                    </a>
                                </div>
                                <div class="desc">
                                    <?= $desc ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="bottom">
                    <?php foreach($choose_post as $key => $item):
                        $id = $item->ID;
                        $img = get_post_thumbnail_id($id);
                        $title = get_the_title($id);
                        $desc = get_the_excerpt($id);
                        $date = get_the_date('d/m/Y', $id);
                        if($key == 0 || $key == 1) continue;
                    ?>
                    <div class="item">
                        <figure>
                            <img src="<?= getimage($img) ?>" alt="">
                        </figure>
                        <div class="text">
                            <div class="calendar">
                                <img src="<?= get_template_directory_uri(); ?>/dist/images/calendar-blue.svg" alt="">
                                <span><?= $date ?></span>
                            </div>
                            <div class="title">
                                <a href="<?= get_the_permalink($id) ?>">
                                    <?= $title ?>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="see-more">
                <a href="<?= $button_link_s6 ?>">
                    <?= $button_s6 ?>
                </a>
            </div>
    </section>
</main>

<?php get_footer(); ?>
<script>
    $(document).ready(function() {
        initializeSwipers();
    });
</script>

<script>
    $(document).ready(function() {
        var tl = gsap.timeline();

        tl.from("#text", {
                duration: 1,
                y: -200,
                opacity: 0
            })
            .from(".section-banner-home .desc", {
                duration: 1,
                x: -200,
                opacity: 0
            })
            .from(".section-banner-home .button", {
                duration: 1,
                x: -200,
                opacity: 0
            });
    });
    // hover

    $(".item").hover(
        function() {
            gsap.to($(this).find("img"), {
                duration: 0.5,
                scale: 1.1
            });
            // gsap.to($(this).find(".text"), {
            //     duration: 0.5,
            //     y: -10
            // });
        },
        function() {
            gsap.to($(this).find("img"), {
                duration: 0.5,
                scale: 1
            });
            // gsap.to($(this).find(".text"), {
            //     duration: 0.5,
            //     y: 0
            // });
        }
    );
    // typing animation
    $('.title-section h2').each(function() {
        let $this = $(this);
        let text = $this.text();
        let words = text.split(' ');

        $this.text('');

        words.forEach((word, i) => {
            let $span = $('<span></span>').text(word).css({
                'display': 'inline-block',
                'opacity': '0'
            });

            $this.append($span);

            if (i < words.length - 1) {
                $this.append(' ');
            }
        });

        let observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    $this.find('span').each(function(index) {
                        gsap.to(this, {
                            opacity: 1,
                            delay: index * 0.2,
                            ease: 'power2.out',
                        });
                    });
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        observer.observe(this);
    });
    // 
    $(".see-more a").hover(
        function() {
            gsap.to(this, {
                duration: 0.5,
                scale: 1.1,
                backgroundColor: '#01438d'
            });
        },
        function() {
            gsap.to(this, {
                duration: 0.5,
                scale: 1,
                backgroundColor: '#01438d'
            });
        }
    );
</script>