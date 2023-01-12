<?php if($block): ?>
    <?php
        $title = $block->json_params->title->{$locale} ?? $block->title;
        $brief = $block->json_params->brief->{$locale} ?? $block->brief;
        $image = $block->image != '' ? $block->image : url('demos/barber/images/icons/comb3.svg');
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
    <section
        class="mt-5 wp-container-fluid  border-none  lg:bg-se-titan-white lg:border lg:border-solid lg:border-se-bright-gray pt-0 lg:pt-[18px] pb-8 lg:pb-10 lg:rounded-xl lg:px-12 m-auto max-w-full lg:my-8">
        <div class="wp-container px-3 lg:px-0 pt-4">
            <div class="flex items-center mr-3 lg:mr-8 mb-2 xl:mb-0 min-w-max">
                <svg width="40" height="40" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="mr-2 lg:mr-4 w-[28px] lg:w-9">
                    <g clip-path="url(#sv-ic-24-hours_svg__clip0)">
                        <circle cx="18" cy="18" r="16" fill="#D5EAFF"></circle>
                        <path
                            d="M36 18v1.055h-2.11V18c0-4.245-1.652-8.235-4.653-11.237A15.789 15.789 0 0018 2.11 15.789 15.789 0 006.763 6.763 15.789 15.789 0 002.11 18c0 4.245 1.653 8.235 4.654 11.237A15.788 15.788 0 0018 33.89h1.055V36H18a17.883 17.883 0 01-12.728-5.272C1.872 27.328 0 22.808 0 18S1.872 8.672 5.272 5.272C8.672 1.872 13.192 0 18 0s9.328 1.872 12.728 5.272C34.128 8.672 36 13.192 36 18z"
                            fill="#5C27D6"></path>
                        <path
                            d="M36 18v1.055h-2.11V18c0-4.245-1.652-8.235-4.653-11.237A15.789 15.789 0 0018 2.11V0c4.808 0 9.328 1.872 12.728 5.272C34.128 8.672 36 13.192 36 18z"
                            fill="#5C27D6"></path>
                        <path d="M16.945 8.016h2.11v8.93h-2.11v-8.93z" fill="#2C95FF"></path>
                        <path d="M18 8.016h1.055v8.93H18v-8.93z" fill="#2C95FF"></path>
                        <path d="M11.542 22.962l5.119-5.118 1.491 1.49-5.118 5.12-1.492-1.492z" fill="#2C95FF"></path>
                        <path d="M18 20.505a2.505 2.505 0 100-5.01 2.505 2.505 0 000 5.01z" fill="#5C27D6"></path>
                        <path d="M20.505 18A2.508 2.508 0 0118 20.505v-5.01A2.508 2.508 0 0120.505 18z" fill="#5C27D6">
                        </path>
                        <path
                            d="M34.685 33.079l-2.11-.005.008-2.975h-5.792l5.117-8.917h2.808l-.018 6.808H36v2.11h-1.307l-.008 2.979zm-4.252-5.089h2.156l.01-3.774-2.166 3.774z"
                            fill="#2C95FF"></path>
                        <path
                            d="M27.53 33.056l-7.008-.022.007-1.792.29-.304c.007-.008 1.016-1.088 3.324-4.385.44-.628.723-1.188.843-1.665l.03-.237a1.396 1.396 0 00-2.762-.213l-.203 1.035-2.07-.407.203-1.035a3.51 3.51 0 013.438-2.826 3.508 3.508 0 013.505 3.504v.067l-.063.49-.012.052c-.174.751-.572 1.574-1.181 2.445a80.19 80.19 0 01-2.32 3.171l3.985.012-.007 2.11z"
                            fill="#2C95FF"></path>
                    </g>
                    <defs>
                        <clipPath id="sv-ic-24-hours_svg__clip0">
                            <path fill="#fff" d="M0 0h36v36H0z"></path>
                        </clipPath>
                    </defs>
                </svg>
                <h3 class="m-0 text-24 leading-10 lg:leading-12 lg:text-32 text-se-neutral-80 font-bold"><?php echo e($title); ?></h3>
            </div>
            
            <div
                class="job-new grid grid-cols-1 w-full md:grid-cols-2 xl:grid-cols-4 gap-2 py-2 gap-x-4 xl:grid-cols-3">
                <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                        $price = $item->json_params->price ?? null;
                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                        $date = date('H:i d/m/Y', strtotime($item->created_at));
                        // Viet ham xu ly lay slug
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
                    ?>
                    
                    <div class="min-h-[112px] p-2 relative bg-white leading-6 rounded border border-solid hover:shadow-sd-hover hover:border-se-accent-100 hover:border-opacity-50 border-se-blue-10"
                            target="_blank"
                            href="/thuong-mai-dien-tu/nhan-vien-kinh-doanh-thiet-bi-y-te-smartdental-luong-tren-20-30tr-c175p73id200153005.html?svs=vl24h.jobbox.trangchu_tuyengap">
                            <div  class="flex items-start justify-between mb-2">
                                <div class="flex items-start flex-1">
                                    <div class="text-13 flex-1 JobTitleV3_title__zQ_LA text-se-neutral-100-n font-medium text-se-neutral-80 text-14 !leading-6">
                                        <?php echo e($title); ?></div>
                                </div>
                                <span class="hover:cursor-pointer ml-2 text-lg text-se-accent-100 mt-0.5"><i class="icon icon-heart-empty"></i></span>
                            </div>
                            <div class="flex flex-row">
                                <div title="Công Ty CP Tb Nha Khoa Thông Minh Việt Nam - Smartdental,. Jsc"
                                    class="bg-white flex flex-row rounded-md w-16 h-12 mr-1" role="link"><img
                                        class="w-auto m-auto object-contain"
                                        src="https://cdn1.vieclam24h.vn/tvn/images/old_employer_avatar/images/64527d127cdf5166191bbf7421cc6b44_5dc8c493c2d93_1573438611.w-62.h-62.padding-1.png?v=220513"
                                        alt=""></div>
                                <div class="pl-2 h-16 flex flex-col">
                                    <div title="Công Ty CP Tb Nha Khoa Thông Minh Việt Nam - Smartdental,. Jsc"
                                        class="text-se-neutral-64 text-12 leading-6 truncate mb-2 font-normal max-w-[230px] lg:max-w-[260px]"
                                        role="button">Công Ty CP Tb Nha Khoa Thông Minh Việt Nam - Smartdental,. Jsc
                                    </div>
                                    <div class="flex flex-row text-left text-xs mt-auto">
                                        <div class="inline-flex items-center mr-3 mr-3">
                                            <span
                                                class="text-se-neutral-24 mr-1  text-[#2C95FF]"><i class="icon icon-dollar"></i></span>
                                                <span
                                                title="20 - 30 triệu"
                                                class="text-se-neutral-80 text-14 whitespace-nowrap font-medium">20 - 30
                                                triệu</span></div>
                                        <div class="inline-flex items-center mr-3 overflow-hidden">
                                            <span class="text-se-neutral-24 mr-1  text-[#2C95FF]"><i class="icon icon-line-map-pin"></i></span>
                                                <span class="text-se-neutral-80 text-14 whitespace-nowrap truncate">Hà Nội</span></div>
                                    </div>
                                </div>
                                <div class="flex flex-col ml-auto"></div>
                            </div>
                        </a></div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\vieclam\resources\views/frontend/blocks/cms_product/styles/default.blade.php ENDPATH**/ ?>