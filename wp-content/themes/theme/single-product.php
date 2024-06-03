<?php
$code_product = get_field('code_product');
$size = get_field('size');
$choose_img_product = get_field('choose_img_product');
//
$info_detail = get_field('info_detail');
if ($info_detail) {
    $info_detail_decs = $info_detail['desc'];
    $info_detail_gallery = $info_detail['gallery'];
    $info_detail_note = $info_detail['note_for_used'];
}
$product_tech = get_field('product_tech');
$product_feature = get_field('product_feature');
$attachments = get_field('attachments');
$embed_form = get_field('embed_form');
$banner_image = get_field('img_banner', 'option');

get_header();


?>
<main>
    <section class="section-banner"
             style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= getimage($banner_image) ?>) center/cover no-repeat lightgray;">
        <div class="content">
            <div class="text">
                <h1>Sản phẩm</h1>
                <div class="bot">
                    <a href="">
                        Trang chủ
                    </a>
                    <span>
                        /
                    </span>
                    <a href="javascript:void(0)">
                        Sản phẩm
                    </a>
                    <span>
                        /
                    </span>
                    <a href="javascript:void(0)">
                        Vòi chậu nóng lạnh
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-1-product-detail">
        <div class="container">
            <div class="title-section">
                <h2>
                    <?= the_title(); ?>
                </h2>
            </div>
            <div class="top row">
                <div class="left col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="gallery swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($choose_img_product as $img) : ?>
                                <div class="swiper-slide">
                                    <img src="<?= getimage($img) ?>" alt="">
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
                <div class="right col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="content">
                        <div class="code-product">
                            <h3>
                                <?= $code_product; ?>
                            </h3>
                        </div>
                        <div class="desc">
                            <?= the_content(); ?>
                            <div class="code">
                                <span>Mã sản phẩm:</span>
                                <span>
                                    <?= $code_product; ?>
                                </span>
                            </div>
                            <div class="size">
                                <span>Kích thước:</span>
                                <span>
                                    <?= $size; ?>
                                </span>
                            </div>
                        </div>
                        <button class="btn-contact">
                            Đặt liên hệ ngay
                        </button>
                    </div>
                </div>
            </div>
            <div class="bot">
                <div class="col-left">
                    <div class="tabs-control">
                        <ul>
                            <li class="active">
                                <a href="#1">
                                    Thông số chi tiết
                                </a>
                            </li>
                            <li>
                                <a href="#2">
                                    Công nghệ sản xuất
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tabs-content">
                        <div class="tab-item active" id="1">
                            <p>
                                <?= $info_detail_decs; ?>
                            </p>
                            <div class="images">
                               <?php foreach ($info_detail_gallery as $img) : ?>
                                    <img src="<?= getimage($img) ?>" alt="">
                                <?php endforeach; ?>

                            </div>
                            <div class="note-for-used">
                                <h3>Lưu ý khi sử dụng</h3>
                                <?= $info_detail_note; ?>
                            </div>
                        </div>
                        <div class="tab-item" id="2">
                           <?= $product_tech; ?>
                        </div>
                    </div>
                </div>
                <div class="col-right">
                    <div class="top">
                        <h3>Tính năng sản phẩm</h3>
                        <p>
                            <?= $product_feature; ?>
                        </p>
                    </div>
                    <?php if ($attachments) :?>
                    <div class="bottom">
                        <h3>Tài liệu đính kèm</h3>
                        <ul>
                            <?php foreach ($attachments as $file) : ?>
                                <li>
                                    <a href="<?= $file['choose_file']; ?>" target="_blank">
                                        <img src="<?= getimage($file['icon']); ?>" alt="">
                                        <span><?= $file['title']; ?></span>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="section-2-product-detail">
        <div class="container">
            <div class="tilte-section">
                <h2>Sản phẩm liên quan</h2>
            </div>
            <div class="list-product">
                <?php
                $terms = get_the_terms(get_the_ID(), 'product_categories');
                $term = array_shift($terms);
                $term_slug = $term->slug;

                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'post__not_in' => array(get_the_ID()),
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_categories',
                            'field' => 'slug',
                            'terms' => $term_slug
                        )
                    )

                );
                $query = new WP_Query($args);
                ?>
                <?php if ($query->have_posts()) : ?>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>
                        <div class="child">
                            <figure>
                                <img src="<?= getimage(get_post_thumbnail_id()); ?>" alt="">
                            </figure>
                            <div class="name">
                                <a href="<?= get_the_permalink(); ?>">
                                    <?= the_title(); ?>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <p>Không có sản phẩm nào</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <div class="popup-contact">
        <div class="content">
            <div class="close">
                <img src="<?= get_template_directory_uri(); ?>/dist/images/close.svg" alt="">
            </div>
            <div class="title-form">
                <h3>Liên hệ tư vấn</h3>
            </div>
            <?= do_shortcode('[contact-form-7 id="b7342eb" title="Form Chi tiết sản phẩm"]') ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
<script>
    initializeSwipers();
    $(document).ready(function () {
        // popup-contact
        var $popupContact = $('.popup-contact');
        var $overlay = $('.overlay');

        $('.btn-contact').on('click', function () {
            $popupContact.fadeIn();
            $overlay.slideDown();
        });

        $('.popup-contact .close, .overlay').on('click', function () {
            $popupContact.slideUp();
            $overlay.fadeOut();
        });
        // tab
        $('.tabs-control ul li').click(function (e) {
            e.preventDefault();
            var tab_id = $(this).find('a').attr('href');
            $('.tabs-control ul li').removeClass('active');
            $('.tab-item').removeClass('active');
            $(this).addClass('active');
            $(tab_id).addClass('active');
        });

        // lấy tên sản phẩm
        var productName = '<?= $code_product; ?>';
        $('.product-name .code').text(productName);
        $('.product-name input').val(productName);

    });
</script>