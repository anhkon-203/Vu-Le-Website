<?php
/* Template Name: Contact */
$uri = get_template_directory_uri();
$banner_image = get_field('img_banner');
$group_contact_form = get_field('group_contact_form');
if ($group_contact_form) {
    $title = $group_contact_form['title'];
    $description = $group_contact_form['desc'];
    $embed_form = $group_contact_form['embed_form'];
}
$group_info = get_field('group_info');
if ($group_info) {
    $name_company = $group_info['name_company'];
    $title_info = $group_info['title_info'];
    $phone = $group_info['phone'];
    if ($phone) {
        $icon_phone = $phone['icon'];
        $phone_number = $phone['sdt_text'];
    }
    $email = $group_info['email'];
    if ($email) {
        $icon_email = $email['icon'];
        $email_text = $email['email_text'];
    }
    $location = $group_info['location'];
    if ($location) {
        $icon_location = $location['icon'];
        $location_text = $location['location_text'];
    }
    $re_social = $group_info['re_social'];
}
$embed_map = get_field('embed_map');
get_header(); ?>
    <main>
        <section class="section-banner"
                 style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= getimage($banner_image) ?>) center/cover no-repeat lightgray;">
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
                            <?= get_the_title() ?>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-1-contact">
            <div class="container">
                <div class="text">
                    <h2><?= $title ?></h2>
                    <?= $description ?>
                </div>
                <div class="wrapper">
                    <div class="col-left">
                        <?= do_shortcode('[contact-form-7 id="00b7402" title="Form liên hệ"]') ?>
                    </div>

                    <div class="col-right">
                        <div class="title">
                            <h2><?= $title_info ?></h2>
                        </div>
                        <div class="name-company">
                            <h2><?= $name_company ?></h2>
                        </div>
                        <div class="list-contact">
                            <div class="phone">
                                <a href="tel:<?= $phone_number ?>">
                                    <img src="<?= getimage($icon_phone) ?>" alt="">
                                    <span>
                                    <?= $phone_number ?>
                                </span>
                                </a>
                            </div>
                            <div class="mail">
                                <a href="mailto:<?= $email_text ?>">
                                    <img src="<?= getimage($icon_email) ?>" alt="">
                                    <span>
                                    <?= $email_text ?>
                                </span>
                                </a>
                            </div>
                            <div class="location">
                                <a href="javascript:void(0)">
                                    <img src="<?= getimage($icon_location) ?>" alt="">
                                    <span>
                                    <?= $location_text ?>
                                </span>
                                </a>
                            </div>
                        </div>
                        <div class="list-social">
                            <?php if ($re_social) {
                                foreach ($re_social as $item) { ?>
                                    <a href="<?= $item['url'] ?>">
                                        <img src="<?= getimage($item['icon']) ?>" alt="">
                                    </a>
                                <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="section-2-contact">
            <div class="content">
                <?= $embed_map ?>
            </div>
        </div>
    </main>
<?php get_footer(); ?>