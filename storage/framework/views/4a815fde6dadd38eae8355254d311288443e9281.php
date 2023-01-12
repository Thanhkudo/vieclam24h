<?php if($block): ?>
    <?php

        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $content = $block->json_params->content->{$locale} ?? $block->content;
        $image = $block->image != '' ? $block->image : '';
        $image_background = $block->image_background != '' ? $block->image_background : '';
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;
        $style = isset($block->json_params->style) && $block->json_params->style == 'slider-caption-right' ? 'd-none' : '';

        // Filter all blocks by parent_id
        $block_childs = $blocks->filter(function ($item, $key) use ($block) {
            return $item->parent_id == $block->id;
        });

        $items = [];
        $i = 0;
        foreach ($block_childs as $item) {
            $items[$i] = $item;
            $i++;
        }

    ?>
    <div class="section mt-3"
        style="
              background: #fff url('<?php echo e($image_background); ?>')
                no-repeat 100% 50% / auto 100%;
            ">
            <svg
            viewBox="0 0 1382 58"
            width="100%"
            height="60"
            preserveAspectRatio="none"
            style="position: absolute; top: -58px; left: 0; z-index: 1"
          >
            <path style="fill: #fff" d="M1.52.62s802.13,127,1380,0v56H.51Z" />
          </svg>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 center">
                    <div class="heading-block border-bottom-0 mb-4">
                        <h2 class="mb-4 nott"><?php echo $title; ?></h2>
                    </div>
                    <div class="svg-line bottommargin-sm">
                        <img src="<?php echo e($image); ?>" alt="svg divider" height="20" />
                    </div>
                    <p>
                        <?php echo $brief; ?>

                    </p>
                </div>
            </div>
            <div class="row mt-5 col-mb-50 mb-0">
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

                        <div class="col-md-3">
                            <div class="feature-box flex-column ps-0">
                                <div class="fbox-media position-relative">
                                    <img src="<?php echo e($image); ?>" alt="Featured Icon" width="60" class="mb-3" />
                                </div>
                                <div class="fbox-content px-0">
                                    <h3 class="nott ls0">
                                        <a href="#" class="text-dark"><?php echo $title; ?></a>
                                    </h3>
                                    <p>
                                        <?php echo $brief; ?>

                                    </p>
                                    <a href="<?php echo $url_link; ?>"
                                        class="button button-rounded button-border nott ls0 fw-normal ms-0 mt-4"><?php echo $url_link_title; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nonprofit\resources\views/frontend/blocks/custom/styles/about_us.blade.php ENDPATH**/ ?>