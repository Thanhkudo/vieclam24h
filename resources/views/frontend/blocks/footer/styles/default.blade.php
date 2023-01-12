
<footer id="footer" class="dark">
    <div class="container">
        <!-- Footer Widgets
        ============================================= -->
        <div class="footer-widgets-wrap">

            <div class="row col-mb-50">
                <div class="col-lg-3 order-last order-lg-first">

                    <div class="widget clearfix">

                        <img src="{{ $web_information->image->logo_footer ?? '' }}"
                            style="position: relative; opacity: 0.85; left: -10px; max-height: 80px;margin: auto; margin-bottom: 20px;"
                            alt="Footer Logo">


                        <div class="line" style="margin: 30px 0;">Chúng tôi tin tưởng vào các Tiêu chuẩn thiết kế đơn
                            giản, sáng tạo và linh hoạt với cách tiếp cận Retina & Responsive. Duyệt qua các Tính năng
                            tuyệt vời mà mẫu này cung cấp.
                        </div>

                        <p class="ls1 fw-light" style="opacity: 0.6; font-size: 13px;">Copyrights &copy; 2020 Canvas:
                            Real Estate</p>

                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="widget clearfix">
                        <h4>Thông tin liên hệ</h4>

                        <div>
                            <address>
                                <strong>Địa chỉ:</strong><br />
                                {!! $web_information->information->address ?? '' !!}
                            </address>
                            <abbr title="Phone Number"><strong>@lang('phone'):</strong></abbr>
                            {{ $web_information->information->phone ?? '' }}<br />
                            <abbr title="Fax"><strong>Hotline:</strong></abbr>
                            {{ $web_information->information->hotline ?? '' }}<br />
                            <abbr title="Email Address"><strong>Email:</strong></abbr>
                            {{ $web_information->information->email ?? '' }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row col-mb-50">
                        @isset($menu)
                            @php
                                $footer_menu = $menu->filter(function ($item, $key) {
                                    return $item->menu_type == 'footer' && ($item->parent_id == null || $item->parent_id == 0);
                                });

                                $content = '';
                                foreach ($footer_menu as $main_menu) {
                                    $url = $title = '';
                                    $title = isset($main_menu->json_params->title->{$locale}) && $main_menu->json_params->title->{$locale} != '' ? $main_menu->json_params->title->{$locale} : $main_menu->name;
                                    $content .= '<div class="col-6 bottommargin-sm widget_links widget_real_estate_popular"><div class="widget widget_links clearfix">';
                                    $content .= '<h4 class="ls1 fw-normal text-uppercase">' . $title . '</h4>';
                                    $content .= '<ul class="row">';
                                    foreach ($menu as $item) {
                                        if ($item->parent_id == $main_menu->id) {
                                            $title = isset($item->json_params->title->{$locale}) && $item->json_params->title->{$locale} != '' ? $item->json_params->title->{$locale} : $item->name;
                                            $url = $item->url_link;

                                            $active = $url == url()->current() ? 'active' : '';

                                            $content .= '<li class="col-6"><a href="#">' . $title . '</a>';
                                            $content .= '</li>';
                                        }
                                    }
                                    $content .= '</ul>';
                                    $content .= '</div></div>';
                                }
                                echo $content;
                            @endphp
                        @endisset
                        <div class="col-md-6">
                            <div class="col-md-6 col-lg-12 hidden" >
                                <div class="widget  clearfix">
                                    <h4>Đăng kí nhận tư vấn</h4>
                                    <form action="{{ route('frontend.contact.store') }}" method="post"
                                        class="mb-0 form_ajax">
                                        @csrf
                                        <div class="input-group mx-auto">
                                            <div class="input-group-text">
                                                <i class="icon-email2"></i>
                                            </div>
                                            <input type="email" id="email" name="email" class="form-control"
                                                placeholder="Địa chỉ email" required />
                                            <button class="btn bg-light" type="submit">
                                                Đăng ký
                                            </button>
                                            <input type="hidden" name="is_type" value="call_request">
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-3 col-lg-12 mt-3">
                                <div class="widget clearfix" style="margin-bottom: -20px">
                                    <h4>Kết nối với chúng tôi</h4>
                                    <div class="row">
                                        <div class="col-12 clearfix bottommargin-sm">
                                            @isset($web_information->social->facebook)
                                                <a href="{{ $web_information->social->facebook }}"
                                                    class="social-icon si-rounded si-dark si-colored si-facebook mb-0"
                                                    style="margin-right: 10px">
                                                    <i class="icon-facebook"></i>
                                                    <i class="icon-facebook"></i>
                                                </a>
                                            @endisset
                                            @isset($web_information->social->twitter)
                                                <a href="{{ $web_information->social->twitter }}"
                                                    class="social-icon si-rounded si-dark si-colored si-twitter mb-0"
                                                    style="margin-right: 10px">
                                                    <i class="icon-twitter"></i>
                                                    <i class="icon-twitter"></i>
                                                </a>
                                            @endisset
                                            @isset($web_information->social->instagram)
                                                <a href="{{ $web_information->social->instagram }}"
                                                    class="social-icon si-rounded si-dark si-colored si-instagram mb-0"
                                                    style="margin-right: 10px">
                                                    <i class="icon-instagram"></i>
                                                    <i class="icon-instagram"></i>
                                                </a>
                                            @endisset
                                            @isset($web_information->social->youtube)
                                                <a href="{{ $web_information->social->youtube }}"
                                                    class="social-icon si-rounded si-dark si-colored si-youtube mb-0"
                                                    style="margin-right: 10px">
                                                    <i class="icon-youtube"></i>
                                                    <i class="icon-youtube"></i>
                                                </a>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>

        </div><!-- .footer-widgets-wrap end -->
    </div>
</footer>
