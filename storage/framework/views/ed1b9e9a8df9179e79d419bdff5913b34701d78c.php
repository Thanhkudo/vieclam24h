<?php if($block): ?>
    <?php
        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });
    ?>

    <section id="slider" class="slider-element dark swiper_wrapper slider-parallax min-vh-75">
        <div class="slider-inner" style="overflow: visible">
            <div class="swiper-container swiper-parent">
                <div class="swiper-wrapper">

                    <?php if($block_childs): ?>
                        <?php $__currentLoopData = $block_childs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $title = $item->json_params->title->{$locale} ?? $item->title;
                                $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                                $content = $item->json_params->content->{$locale} ?? $item->content;
                                $image = $item->image != '' ? $item->image : null;
                                $image_background = $item->image_background != '' ? $item->image_background : null;
                                $video = $item->json_params->video ?? null;
                                $video_background = $item->json_params->video_background ?? null;
                                $url_link = $item->url_link != '' ? $item->url_link : '';
                                $url_link_title = $item->json_params->url_link_title->{$locale} ?? $item->url_link_title;
                                $icon = $item->icon != '' ? $item->icon : '';
                                $style = isset($item->json_params->style) && $item->json_params->style == 'slider-caption-right' ? 'd-none' : '';
                                $image_for_screen = null;
                                if ($agent->isDesktop() && $image_background != null) {
                                    $image_for_screen = $image_background;
                                } else {
                                    $image_for_screen = $image;
                                }

                            ?>
                            <div class="swiper-slide dark">
                                <?php if(empty(!$brief)): ?>
                                    <div class="container">
                                        <div class="slider-caption">
                                            <div>
                                                <h2 class="nott" data-animate="fadeInUp">
                                                    <?php echo e($brief); ?>

                                                </h2>
                                                <a href="#" data-animate="fadeInUp" data-delay="400"
                                                    class="button button-rounded button-large button-light shadow nott ls0 ms-0 mt-4">Tìm
                                                    hiểu thêm</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="swiper-slide-bg"
                                    style="background:linear-gradient(
                    rgba(0, 0, 0, 0.3),
                    rgba(0, 0, 0, 0.5)
                  ), url('<?php echo e($image); ?>')no-repeat
                        center center;
                    background-size: cover;;">
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>

                </div>
                <div class="swiper-navs">
                    <div class="slider-arrow-left">
                        <i class="icon-line-arrow-left"></i>
                    </div>
                    <div class="slider-arrow-right">
                        <i class="icon-line-arrow-right"></i>
                    </div>
                </div>
                <div class="swiper-scrollbar">
                    <div class="swiper-scrollbar-drag">
                        <div class="slide-number">
                            <div class="slide-number-current"></div>
                            <span>/</span>
                            <div class="slide-number-total"></div>
                        </div>
                    </div>
                </div>
            </div>
            <svg viewBox="0 0 1382 58" width="100%" height="60" preserveAspectRatio="none"
            style="position: absolute; bottom: -5px; left: 0; z-index: 1">
            <path style="fill: #fff" d="M1.52.62s802.13,127,1380,0v56H.51Z" />
        </svg>
        </div>
    </section>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nonprofit\resources\views/frontend/blocks/banner/styles/slide.blade.php ENDPATH**/ ?>