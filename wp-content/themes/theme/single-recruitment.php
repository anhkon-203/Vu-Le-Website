<?php
$re_benefits = get_field('re_benefits', get_the_ID());
$group_info = get_field('group_info', get_the_ID());
if ($group_info) {
    $salary = $group_info['salary'];
    $quantity = $group_info['quantity'];
    $location = $group_info['location'];
    $formal = $group_info['formal'];
    $level = $group_info['level'];
    $exp = $group_info['exp'];
    $company = $group_info['company'];
    $require = $group_info['require'];
}
$embed_form = get_field('embed_form', get_the_ID());
$choose_file = get_field('choose_file', get_the_ID());
$banner_image = get_field('img_banner', 'option');

get_header(); ?>
<main>
    <section class="section-banner"
             style="background: linear-gradient(0deg, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0.40) 100%), url(<?= getimage($banner_image) ?>) center/cover no-repeat lightgray;">
        <div class="content">
            <div class="text">
                <h1>Tuyển dụng</h1>
                <div class="bot">
                    <a href="<?= home_url() ?>">
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
    <section class="section-1-recruitment section-1-recruitment-detail">
        <div class="container">
            <div class="title-large">
                <h2>
                    <?= get_the_title() ?>
                </h2>
            </div>
            <div class="wrapper row">
                <div class="col-left col-lg-8 col-md-12">
                    <div class="salary">
                        <span>Mức lương: </span>
                        <span><?= number_format($salary) ?> VNĐ/ tháng</span>
                    </div>
                    <div class="title-benefit">
                        <h3>Quyền lợi</h3>
                    </div>
                    <div class="list-benefit">
                        <?php foreach ($re_benefits as $benefit) : ?>
                            <div class="item">
                                <img src="<?= getimage($benefit['icon']) ?>" alt="">
                                <span><?= $benefit['name_benefit'] ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="apply" id="apply">
                        <button>Ứng tuyển</button>
                    </div>
                    <div class="infomation">
                        <h3>Thông tin</h3>
                        <div class="content">
                            <?php if ($quantity) : ?>
                                <div class="quantity">
                                    <span>Số lượng: </span>
                                    <span>
                                    <?= $quantity ?>
                                </span>
                                </div>
                            <?php endif; ?>
                            <?php if ($location) : ?>
                                <div class="location">
                                    <span>Địa điểm làm việc: </span>
                                    <span>
                                    <?= $location ?>
                                </span>
                                </div>
                            <?php endif; ?>
                            <?php if ($formal) : ?>
                                <div class="form">
                                    <span>Hình thức làm việc:</span>
                                    <span>
                                    <?= $formal ?>
                                </span>
                                </div>
                            <?php endif; ?>
                            <?php if ($level) : ?>
                                <div class="level">
                                    <span>Cấp bậc:</span>
                                    <span>
                                    <?= $level ?>
                                </span>
                                </div>
                            <?php endif; ?>
                            <?php if ($exp) : ?>
                                <div class="exp">
                                    <span>Kinh nghiệm:</span>
                                    <span>
                                    <?= $exp ?>
                                </span>
                                </div>
                            <?php endif; ?>
                            <?php if ($company) : ?>
                                <div class="company">
                                    <span>Công ty:</span>
                                    <span>
                                    <?= $company ?>
                                </span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="desc">
                        <h3>Mô tả công việc</h3>
                        <?= get_the_content() ?>
                    </div>
                    <div class="require">
                        <h3>Yêu cầu công việc</h3>
                        <?= $require ?>
                    </div>
                    <div class="share">
                        <p>Chia sẻ</p>
                        <div class="img">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink()) ?>"
                               target="_blank">
                                <img src="<?= get_template_directory_uri(); ?>/dist/images/facebook.svg" alt="">
                            </a>
                            <a href="https://twitter.com/intent/tweet?text=<?= urlencode(get_the_title()) ?>&url=<?= urlencode(get_permalink()) ?>"
                               target="_blank">
                                <img src="<?= get_template_directory_uri(); ?>/dist/images/twitter.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-right col-lg-4 col-md-12">
                    <div class="form-contact">
                        <div class="text">
                            <h3>Để lại lời nhắn</h3>
                            <p>Nếu bạn muốn được tư vấn thêm về công việc hoặc tìm hiểu vị trí khác, vui lòng gửi thông
                                tin dưới đây cho chúng tôi</p>
                        </div>
                        <?= do_shortcode('[contact-form-7 id="6cdc2f3" title="Form ứng tuyển"]') ?>
                    </div>
                </div>
            </div>
            <div class="pop-up-recruitment">
                <div class="content">
                    <div class="close">
                        <img src="<?= get_template_directory_uri() ?>/dist/images/close.svg" alt="">
                    </div>
                    <div class="text">
                        <h3>Hướng dẫn ứng tuyển</h3>
                        <p>
                            Ứng viên có nhu cầu ứng tuyển vào vị trí tuyển dụng vui lòng điền vào form ứng tuyển tương
                            ứng bên dưới. Sau đó tải lên file thông tin ứng tuyển theo mẫu sau, và bấm <strong>Hoàn
                                thành</strong> để gửi đơn ứng tuyển
                        </p>
                    </div>
                    <div class="title-form">
                        <h3>Ứng tuyển vị trí nhân viên Tư vấn sản phẩm</h3>
                    </div>
                    <!--                    <form action="">-->
                    <!--                        <div class="row-1">-->
                    <!--                            <input type="text" placeholder="Họ và tên">-->
                    <!--                            <input type="text" placeholder="Ngày sinh">-->
                    <!--                            <input type="text" placeholder="Giới tính">-->
                    <!--                        </div>-->
                    <!--                        <div class="row-2">-->
                    <!--                            <input type="text" placeholder="Số điện thoại">-->
                    <!--                            <input type="text" placeholder="Email">-->
                    <!--                            <input type="text" placeholder="Địa chỉ">-->
                    <!--                        </div>-->
                    <!--                        <div class="row-3">-->
                    <!--                            <input type="text" placeholder="Mức lương mong muốn">-->
                    <!--                            <input type="text" placeholder="Tỉnh, TP muốn làm việc">-->
                    <!--                        </div>-->
                    <!--                        <textarea name="" id="" placeholder="Giới thiệu về bản thân"></textarea>-->
                    <!--                        <div class="action">-->
                    <!--                            <div class="upload">-->
                    <!--                                <input type="file" id="file" style="display: none;">-->
                    <!--                                <label for="file" class="label-upload">-->
                    <!---->
                    <!--                                    Tải lên file thông tin ứng tuyển-->
                    <!--                                </label>-->
                    <!--                            </div>-->
                    <!--                            <span class="label">File ứng tuyển mẫu</span>-->
                    <!--                            <div class="download">-->
                    <!--                                <label class="label-download">-->
                    <!--                                    <a class="fileMau" href="">-->
                    <!--                                        Tải xuống-->
                    <!--                                    </a>-->
                    <!--                                    <figure>-->
                    <!--                                    </figure>-->
                    <!--                                </label>-->
                    <!--                            </div>-->
                    <!--                            <button type="submit">Hoàn thành</button>-->
                    <!--                        </div>-->
                    <!--                    </form>-->
                    <?= do_shortcode('[contact-form-7 id="6d9ef10" title="Form Ứng tuyển (Popup)"]') ?>
                </div>
            </div>
        </div>
    </section>

</main>
<?php get_footer() ?>
<script>
    $(document).ready(function () {
        var $popupContact = $('.pop-up-recruitment');
        var $overlay = $('.overlay');

        $('#apply').on('click', function () {
            $popupContact.fadeIn();
            $overlay.slideDown();
        });

        $('.pop-up-recruitment .close, .overlay').on('click', function () {
            $popupContact.slideUp();
            $overlay.fadeOut();
        });

        // upload file
        $('#file').hide();
        var fileMau = '<?= $choose_file ?>';
        $('.fileMau').attr('href', fileMau);
        var appendDownload = '<img src="<?= get_template_directory_uri() ?>/dist/images/download.svg" alt="">';
        var appendUpload = '<img src="<?= get_template_directory_uri() ?>/dist/images/upload.svg" alt="">';
        $('.label-download figure').append(appendDownload);
        $('.label-upload').append(appendUpload);
    });
</script>

