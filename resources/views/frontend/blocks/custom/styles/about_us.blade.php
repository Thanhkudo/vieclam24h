@if ($block)
    @php
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
        // lấy tất sp, xét theo new_hot sau
        $rows = App\Http\Services\ContentService::getCmsPost($params)->get();

    @endphp
    <section
        class="mt-5 wp-container-fluid  border-none  lg:bg-se-titan-white lg:border lg:border-solid lg:border-se-bright-gray pt-0 lg:pt-[18px] pb-8 lg:pb-10 lg:rounded-xl lg:px-12 m-auto max-w-full lg:my-8">
        <div class="wp-container px-3 lg:px-0 pt-4">
            <div class="flex items-center mr-3 lg:mr-8 mb-2 xl:mb-0 min-w-max">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2 lg:mr-4 w-[28px] lg:w-9"><rect x="5.70312" y="11.3281" width="27.7344" height="19.5312" fill="white"></rect><path d="M37.2812 22.539L39.3806 20L37.2812 17.4609L38.6439 14.4567L35.9402 12.5625L36.4453 9.29708L33.3234 8.20716L32.9098 4.92141L29.5984 4.74731L28.2588 1.70593L25.0299 2.50937L22.8405 7.84226e-05L20 1.73784L17.1596 0L14.9702 2.50929L11.7413 1.70585L10.4017 4.74716L7.09029 4.92133L6.67661 8.20708L3.55468 9.297L4.0598 12.5625L1.35603 14.4567L2.71878 17.4609L0.619324 20L2.71878 22.5391L1.35603 25.5433L4.0598 27.4375L3.55468 30.7029L6.67653 31.7928L7.09021 35.0786L10.4016 35.2528L11.7412 38.2941L14.9701 37.4906L17.1595 39.9999L20.0001 38.2621L22.8405 39.9999L25.0299 37.4906L28.2588 38.2941L29.5984 35.2528L32.9098 35.0787L33.3235 31.7929L36.4454 30.703L35.9403 27.4374L38.6441 25.5433L37.2812 22.539ZM20.5285 17.4739V19.2157H17.9054V19.7957H21.0072V21.6085H15.614V15.1697H20.892V16.9824H17.9054V17.4739H20.5285ZM25.0975 24.8099V27.1626H15.4776V24.8099H25.0975ZM23.6214 21.6086L21.561 15.1698H23.9627L24.9601 18.4233L26.0145 15.1698H28.1105L29.1076 18.4633L30.1618 15.1698H32.394L30.3336 21.6086H27.9182L27.0012 18.5735L26.0355 21.6086H23.6214ZM14.3078 15.1698V21.6086H12.4158L10.2311 18.9966V21.6086H7.95756V15.1698H9.84943L12.0342 17.7816V15.1698H14.3078Z" fill="#5C27D6"></path></svg>
                <h3 class="m-0 text-24 leading-10 lg:leading-12 lg:text-32 text-se-neutral-80 font-bold">{{$title}}</h3>
            </div>
            {{-- <div class="row justify-content-center col-mb-50"> --}}
            <div
                class="job-new grid grid-cols-1 w-full md:grid-cols-2 xl:grid-cols-4 gap-2 py-2 gap-x-4 xl:grid-cols-3">
                @foreach ($rows as $item)
                    @php
                        $title = $item->json_params->title->{$locale} ?? $item->title;
                        $brief = $item->json_params->brief->{$locale} ?? $item->brief;
                        $price = $item->json_params->price ?? null;
                        $image = $item->image_thumb != '' ? $item->image_thumb : ($item->image != '' ? $item->image : null);
                        $date = date('H:i d/m/Y', strtotime($item->created_at));
                        // Viet ham xu ly lay slug
                        $alias_category = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $item->taxonomy_title, $item->taxonomy_id);
                        $alias = App\Helpers::generateRoute(App\Consts::TAXONOMY['product'], $title, $item->id, 'detail', $item->taxonomy_title);
                    @endphp
                    <div class="min-h-[112px] p-2 relative bg-white leading-6 rounded border border-solid hover:shadow-sd-hover hover:border-se-accent-100 hover:border-opacity-50 border-se-blue-10"
                            target="_blank"
                            href="/thuong-mai-dien-tu/nhan-vien-kinh-doanh-thiet-bi-y-te-smartdental-luong-tren-20-30tr-c175p73id200153005.html?svs=vl24h.jobbox.trangchu_tuyengap">
                            <div  class="flex items-start justify-between mb-2">
                                <div class="flex items-start flex-1">
                                    <div class="text-13 flex-1 JobTitleV3_title__zQ_LA text-se-neutral-100-n font-medium text-se-neutral-80 text-14 !leading-6">
                                        {{$title}}</div>
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
                @endforeach
            </div>
        </div>
    </section>
@endif
