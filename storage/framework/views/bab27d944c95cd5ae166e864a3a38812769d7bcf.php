<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $image = $block->image != '' ? $block->image : '';
        $background = $block->image_background != '' ? $block->image_background : url('demos/seo/images/sections/5.jpg');
        $url_link = $block->url_link != '' ? $block->url_link : '';
        $url_link_title = $block->json_params->url_link_title->{$locale} ?? $block->url_link_title;

        $params['status'] = App\Consts::TAXONOMY_STATUS['active'];
        $params['taxonomy'] = App\Consts::TAXONOMY['product'];

        $taxonomys = App\Http\Services\ContentService::getCmsTaxonomy($params)->get();

        $params['status'] = App\Consts::POST_STATUS['active'];
        $params['is_featured'] = true;
        $params['is_type'] = App\Consts::POST_TYPE['product'];
        $rows = App\Http\Services\ContentService::getCmsPost($params)->get();

    ?>
    <div class="section bg-transparent mt-0 mb-4">
        <div class="container clearfix">

            <div class="row justify-content-center" style="margin-top: 100px">
                <div class="col-md-7 center">
                    <div class="heading-block border-bottom-0 mb-4">
                        <h2 class="mb-4 nott"><?php echo e($title); ?></h2>
                    </div>
                    <div class="svg-line bottommargin-sm clearfix">
                        <img src="<?php echo e($image); ?>" alt="svg divider" height="20" />
                    </div>
                    <p>
                        <?php echo e($brief); ?>

                    </p>
                </div>
            </div>
        </div>

        <div class="owl-carousel owl-carousel-full image-carousel carousel-widget topmargin-sm charity-card"
            data-stage-padding="20" data-margin="10" data-center="true" data-loop="true" data-nav="true"
            data-autoplay="500000" data-speed="400" data-pagi="true" data-items-xs="1" data-items-sm="2"
            data-items-md="2" data-items-lg="3" data-items-xl="4">

            <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $title = $item->json_params->title->{$locale} ?? $item->title;
                    $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                    $content = $item->json_params->content->{$locale} ?? $item->content;
                    $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                    $date = date('H:i d/m/Y', strtotime($item->created_at));
                    // Viet ham xu ly lay slug
                    $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                    $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);

                ?>
                <div class="oc-item text-start">
                    <img src="<?php echo e($image); ?>" alt="<?php echo e($title); ?>" class="rounded" />
                    <div class="oc-desc d-flex flex-column justify-content-center shadow-lg">
                        <small class="text-uppercase fw-normal ls1 color mb-2 d-block"><?php echo e($brief); ?></small>
                        <h3 class="mb-3">
                            <a href="<?php echo e($alias); ?>"><?php echo e($title); ?></a>
                        </h3>
                        <p class="mb-4 text-black-50">
                            <?php echo $content; ?>

                        </p>
                        <a href="<?php echo e($alias); ?>"
                            class="button button-rounded button-border nott ls0 fw-medium m-0 d-flex align-self-start">Quyên
                            góp</a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\nonprofit\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>