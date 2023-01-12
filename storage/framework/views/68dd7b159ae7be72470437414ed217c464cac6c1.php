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
    ?>
    <div class="container-fluid clearfix" style="background-color: #002d40">
        <div class="container">
            <!-- Footer Widgets
              ============================================= -->
            <div class="footer-widgets-wrap dark clearfix"
                style="
            background: radial-gradient(
                rgba(0, 45, 64, 0.5),
                rgba(0, 45, 64, 0.1),
                rgba(0, 45, 64, 0.5)
              ),
              url('<?php echo e($image_background); ?>') repeat center
                center / cover;
            padding: 150px 0;
          ">
                <div class="mx-auto center" style="max-width: 700px">
                    <h2 class="display-2 fw-bold text-white mb-0 ls1 font-secondary mb-4">
                        <i class="icon-heart d-block mb-3"></i><?php echo e($title); ?>

                    </h2>
                    <a href="<?php echo e($url_link); ?>"
                        class="button button-rounded button-xlarge button-white bg-white button-light text-dark shadow nott ls0 ms-0 mt-5"><?php echo e($url_link_title); ?></a>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nonprofit\resources\views/frontend/blocks/custom_th/styles/about_client.blade.php ENDPATH**/ ?>