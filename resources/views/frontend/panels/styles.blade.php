{{-- <link
    href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Montserrat:300,400,500,600,700|Merriweather:300,400,300i,400i&amp;display=swap"
    rel="stylesheet" type="text/css" /> --}}
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/bootstrap.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/style.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/swiper.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/dark.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/font-icons.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/animate.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/magnific-popup.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/custom.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/demos/shop/shop.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/demos/shop/css/fonts.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/vieclam.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/vieclam2.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/components/bs-select.css') }}"  type="text/css"/>
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/components/bs-switches.css') }}"  type="text/css"/>
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/css/components/ion.rangeslider.css') }}"  type="text/css"/>
{{-- <link rel="preload" href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap"
    as="style" onload="this.onload=null;this.rel='stylesheet'" /> --}}
{{-- <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/thaiever/demos/nonprofit/nonprofit.css') }}"
      type="text/css"
    /> --}}
<!-- Theme Color -->
{{-- <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/thaiever/demos/nonprofit/css/fonts.css') }}"
      type="text/css"
    /> --}}
{{-- <link
      rel="stylesheet"
      href="{{ asset('themes/frontend/thaiever/css/colorsa0f9.css?color=C6C09C') }}"
      type="text/css"
    /> --}}
{{-- <link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/fhm_thaiever.css') }}" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/fhm_thaiever-introduce.css') }}" /> --}}

<!-- Real Estate Demo Specific Stylesheet -->
{{-- <link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/demos/real-estate/real-estate.css') }}"
  type="text/css" />
<link rel="stylesheet" href="{{ asset('themes/frontend/thaiever/demos/real-estate/css/font-icons.css') }}"
  type="text/css" /> --}}

<style>
    /* @import url("https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"); */

    html {
        scroll-behavior: smooth;
    }

    :root {
        scroll-behavior: smooth;
    }

    :target:before {
        content: "";
        display: block;
        margin: 25px 0 0;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        float: left;
        padding-right: 0.5rem;
        color: #6c757d;
        content: var(--bs-breadcrumb-divider, "/");
    }

    .header-size-sm #header-wrap #logo img {
        height: 50px !important;
    }

    .heading-block h2,
    .heading-block h3,
    .font-secondary {
        font-family: "Pacifico", cursive !important;
    }

    body,
    small,
    .sub-menu-container .menu-item>.menu-link,
    .wp-caption,
    .fbox-center.fbox-italic p,
    .skills li .progress-percent .counter,
    .nav-tree ul ul a,
    .font-body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    #logo a,
    .menu-link,
    .mega-menu-style-2 .mega-menu-title>.menu-link,
    .top-search-form input,
    .entry-link,
    .entry.entry-date-section span,
    .button.button-desc,
    .fbox-content h3,
    .tab-nav-lg li a,
    .counter,
    label,
    .widget-filter-links li a,
    .nav-tree li a,
    .wedding-head,
    .font-primary,
    .entry-link span,
    .entry blockquote p,
    .more-link,
    .comment-content .comment-author span,
    .comment-content .comment-author span a,
    .button.button-desc span,
    .testi-content p,
    .team-title span,
    .before-heading,
    .wedding-head .first-name span,
    .wedding-head .last-name span {
        font-family: "Montserrat", sans-serif !important;
    }
    .sl2_search{border: none !important}
</style>

@isset($web_information->source_code->header)
    {!! $web_information->source_code->header !!}
@endisset
