@extends('pages.layouts.layout')

@section('header-js')
    @include('pages.partials.mautic._header-conn')
@stop

@section('css')
    {!! Html::style('css/photographers.css') !!}
@stop

@section('body')
    <header>
        <div class="custom-container header-container">
            <a href="{{route('index')}}" class="header-logo-cover">
                <img src="{{asset('img/images/photographers/boundstart-logo.png')}}" alt="Boundstart logo"
                     class="header-logo">
            </a>
        </div>
    </header>
    <div class="promo-section">
        <h1 class="promo-title">
            Get More Leads
        </h1>
        <div class="custom-container promo-container">
            <div class="promo-title-small">
                FOR YOUR PHOTOGRAPHY BUSINESS
            </div>
            @include('pages.partials.forms._photographers-form')
        </div>
    </div>
    <div class="advantages-section">
        <div class="advantages-container">
            <p class="advantages-main-title">
                BOOK A FREE 15-20 MIN DEMO <br>
                <span>We will:</span>
            </p>
            <div class="advantages_item">
                <img class="advantages_image" src="{{asset('img/images/photographers/sales-item-1.jpg')}}"
                     alt="We'll look at your existing strategies">
                <p class="advantages-item-title">
                    1
                </p>
                <p class="advantages-comment">
                    Look at your <br>
                    existing strategies
                </p>
            </div>
            <div class="advantages_item">
                <img class="advantages_image" src="{{asset('img/images/photographers/sales-item-2.jpg')}}"
                     alt="We'll suggest some fresh ideas">
                <p class="advantages-item-title">
                    2
                </p>
                <p class="advantages-comment">
                    Suggest fresh ideas <br>
                    specific to your business
                </p>
            </div>
            <div class="advantages_item">
                <img class="advantages_image" src="{{asset('img/images/photographers/sales-item-3.jpg')}}"
                     alt="We'll share live examples">
                <p class="advantages-item-title">
                    3
                </p>
                <p class="advantages-comment">
                    Share live examples
                </p>
            </div>

            <div class="inline-fake"></div>
        </div>
    </div>

    <div id="section-3" class="works-section">
        <div class="works-title">
            Recent Campaign for Jumi Story
        </div>
        <div class="custom-container works-container">
            <div class="works-slider-block">
                @lang('index.portfolio.1.img')
            </div>

            <div class="slider-content-block">
                @lang('index.portfolio.1.description')
            </div>
        </div>
    </div>

    <div class="slick-slider-cover">
        <div class="custom-container customers-container">
            <div class="customers-block">
                <div>
                    <img src="{{asset('img/images/photographers/customer-1.jpg')}}" alt="boundstart-logo"
                         class="customer-img">
                </div>
                <div>
                    <img src="{{asset('img/images/photographers/customer-2.jpg')}}" alt="boundstart-logo"
                         class="customer-img">
                </div>
                <div>
                    <img src="{{asset('img/images/photographers/customer-3.jpg')}}" alt="boundstart-logo"
                         class="customer-img">
                </div>

                <div>
                    <img src="{{asset('img/images/photographers/customer-5.jpg')}}" alt="boundstart-logo"
                         class="customer-img">
                </div>
                <div>
                    <img src="{{asset('img/images/photographers/customer-6.jpg')}}" alt="boundstart-logo"
                         class="customer-img">
                </div>
                <div>
                    <img src="{{asset('img/images/photographers/customer-4.jpg')}}" alt="boundstart-logo"
                         class="customer-img">
                </div>
            </div>
        </div>
    </div>

    <div class="quote-section">
        <p class="quote-title">
            Review
        </p>
        <p class="quote-stars">★ ★ ★ ★ ★</p>
        {{--<img src="img/images/quote-img.png" alt="" class="quote-img">--}}
        <div class="custom-container quote-container">
            <p class="quote-text">
                “ We weren’t seeing much engagement on our social media so we were looking for a new approach.
                Boundstart’s contest helped us reach new eyes in Vancouver. We definitely got our bang for our
                buck with this campaign. Thanks team!“
            </p>
            <p class="quote-text quote-author">Jun from JuMi Story</p>
        </div>
    </div>

    <div class="join-section join-last">
        <button id="button-join-now" class="button-join-now join_button ">Schedule Demo Now</button>
    </div>
    <footer>
        <p class="footer-text">©2018 Boundstart</p>
    </footer>
    @include('pages.partials.mautic._form-ajax')
@stop
