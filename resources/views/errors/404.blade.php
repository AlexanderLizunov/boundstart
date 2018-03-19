@extends('pages.layout')
{{--@extends('pages.partials._articles-header')--}}
@extends('pages.partials._footer')

{{--@section('meta')--}}
{{--<title>@lang('navigation.about') - ГО Смарт</title>--}}
{{--<meta name="title" content="@lang('navigation.about') - ГО Смарт, СмартUp">--}}
{{--<meta name="keywords" content="@lang('navigation.about') - ГО Смарт, СмартUp">--}}
{{--<meta name="description" content="@lang('navigation.about') - ГО Смарт, СмартUp">--}}
{{--@stop--}}

@section('css')
    {!! Html::style('css/404.css') !!}
@stop


@section('body')
    <div class="header-section">
        <div class="custom-container header-container">
            <div class="language">
                {{App::getLocale()}}
                <ul>
                    <li @if(App::getLocale() == 'ru') class="language__active" @endif>
                        <a href="{{route('articles', ['lang' => 'ru'])}}"
                           class="main-content_details-link">ru</a>
                    </li>
                    <li @if(App::getLocale() == 'en') class="language__active" @endif>
                        <a href="{{route('articles', ['lang'=> 'en'])}}"
                           class="main-content_details-link">en</a>
                    </li>
                </ul>
            </div>
            @include('pages.partials._articles-header')
        </div>
    </div>

    <div class="custom-container">
        <div class="row" style="text-align: center">
            @include('flash::message')
            <div class="errors-page">
                <div class="main_block">
                    <h2>@lang('error404.text')</h2>
                </div>
            </div>
        </div>
    </div>
@stop



