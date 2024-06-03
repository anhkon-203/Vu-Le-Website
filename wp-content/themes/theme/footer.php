<div class="overlay"></div>
<style>
    .loading {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    @keyframes loading {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .loading::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 50px;
        height: 50px;
        border: 5px solid #f3f3f3;
        border-top: 5px solid #3498db;
        border-radius: 50%;
        animation: loading 2s linear infinite;
        transform: translate(-50%, -50%);
    }

</style>
<?php
$logo_footer = get_field('logo_footer', 'option');
$introduce_footer = get_field('introduce', 'option');
$sdt_group = get_field('sdt_group', 'option');
$mail_group = get_field('mail_group', 'option');
$location_group = get_field('location', 'option');
$group_form_footer = get_field('group_form_footer', 'option');
$group_social = get_field('group_social', 'option');
$copyright = get_field('copyright', 'option');
if ($sdt_group) {
    $icon_sdt = $sdt_group['icon'];
    $title_sdt = $sdt_group['title'];
    $content_sdt = $sdt_group['content'];
}
if ($mail_group) {
    $icon_mail = $mail_group['icon'];
    $title_mail = $mail_group['title'];
    $content_mail = $mail_group['content'];
}
if ($location_group) {
    $icon_location = $location_group['icon'];
    $title_location = $location_group['title'];
    $content_location = $location_group['content'];
}
if ($group_form_footer) {
    $title_form = $group_form_footer['title'];
    $description_form = $group_form_footer['desc'];
    $form_footer = $group_form_footer['form_footer'];
}
if ($group_social) {
    $title_social = $group_social['title'];
    $description_social = $group_social['desc'];
    $list_social = $group_social['social'];
}
?>
<div class="loading"></div>
<div class="fixed-btn">
    <div class="content">
        <div class="phone">
            <a href="tel:0969 813 599">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/phone-fix.png" alt="">
            </a>
        </div>
        <div class="zalo">
            <a href="">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/zalo.png" alt="">
            </a>
        </div>
    </div>
</div>
<footer>
    <div class="content" style="background-image: url(<?= get_template_directory_uri(); ?>/dist/images/back-f.png);">
        <div class="wrapper">
            <div class="col-left">
                <div class="top">
                    <div class="logo">
                        <img src="<?= getimage($logo_footer) ?>" alt="">
                    </div>
                    <div class="intro">
                        <?= $introduce_footer ?>
                    </div>
                </div>
                <div class="bottom">
                    <div class="phone">
                        <div class="icon">
                            <img src="<?= getimage($icon_sdt) ?>" alt="">
                        </div>
                        <div class="text">
                            <span><?= $title_sdt ?></span>
                            <a href="tel:<?= $content_sdt ?>">
                                <?= $content_sdt ?>
                            </a>
                        </div>
                    </div>
                    <div class="mail">
                        <div class="icon">
                            <img src="<?= getimage($icon_mail) ?>" alt="">
                        </div>
                        <div class="text">
                            <span><?= $title_mail ?></span>
                            <a href="mailto:<?= $content_mail ?>">
                                <?= $content_mail ?>
                            </a>
                        </div>
                    </div>
                    <div class="location">
                        <div class="icon">
                            <img src="<?= getimage($icon_location) ?>" alt="">
                        </div>
                        <div class="text">
                            <span><?= $title_location ?></span>
                            <p>
                                <?= $content_location ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-right">
                <div class="form-contact">
                    <div class="title-form">
                        <h3><?= $title_form ?></h3>
                        <p>
                            <?= $description_form ?>
                        </p>
                    </div>
                    <?= do_shortcode('[contact-form-7 id="6023186" title="Form footer"]') ?>
                </div>
                <div class="social-network">
                    <div class="text">
                        <h3><?= $title_social ?></h3>
                        <?= $description_social ?>
                    </div>
                    <div class="list-social">
                      <?php if ($list_social) : ?>
                        <?php foreach ($list_social as $item) : ?>
                            <a href="<?= $item['url'] ?>">
                                <img src="<?= getimage($item['icon']) ?>" alt="">
                            </a>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bot">
        <div class="container">
            <div class="wrap">
                <div class="menu-f">
                    <?php
                        $elMenu = wp_get_nav_menu_items('Menu footer');
                    ?>
                    <ul>
                        <?php foreach ($elMenu as $item) :
                            $item->current = $item->url == get_permalink();
                            ?>
                            <li class="<?= $item->current ? 'active' : '' ?>">
                                <a href="<?= $item->url ?>"><?= $item->title ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="copyright">
                    <p> <?= $copyright ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
<?php wp_footer(); ?>
<script src="<?= get_template_directory_uri(); ?>/dist/lib/jquery/jquery.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/dist/lib/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/dist/lib/swiper/swiper-bundle.min.js"></script>
<script src="<?= get_template_directory_uri(); ?>/dist/js/all.js"></script>
<script src="<?= get_template_directory_uri(); ?>/dist/js/aos.js"></script>
<script src="<?= get_template_directory_uri(); ?>/dist/js/main.js"></script>
<script src="<?= get_template_directory_uri(); ?>/dist/js/jquery.lazyload.js"></script>

<script>
    // dropdown menu
    $(document).ready(function () {
        // window.onload = function() {
        //     gsap.from(".loading", {
        //         duration: 1,
        //         opacity: 1,
        //         display: "block",
        //         ease: "power2.inOut"
        //     });
        //     setTimeout(function() {
        //         gsap.to(".loading", {
        //             duration: 1,
        //             opacity: 0,
        //             display: "none",
        //             ease: "power2.inOut"
        //         });
        //     }, 1000);
        // }
        $('.mega-menu ul li:has(ul)').addClass('has-sub-menu');
        $('.mega-menu ul li').hover(function () {
            $(this).children('.sub-menu').stop(true, false, true).slideToggle(300);
        });
        // search
        $(".search img").click(function () {
            $(".search input").toggleClass("active");
            gsap.from(".search input", {
                duration: 0.5,
                width: 0,
                ease: "power2.inOut"
            });

        });
    });
</script>