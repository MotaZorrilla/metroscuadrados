@extends('layout')
@section('title')
    <title>{{__('user.Terms And Conditions')}}</title>
@endsection
@section('meta')
    <meta name="description" content="{{__('user.Terms And Conditions')}}">
@endsection

@section('user-content')
<!--===BREADCRUMB PART START====-->
<section class="wsus__breadcrumb" style="background: url({{ $banner_image ? url($banner_image) : '' }});">
    <div class="wsus_bread_overlay">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>{{__('user.Terms And Conditions')}}</h4>
                    <nav style="--bs-breadcrumb-divider: '-';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{__('user.Home')}}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{__('user.Terms And Conditions')}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!--===BREADCRUMB PART END====-->


<!--=========PRIVACY PART START============-->
<section class="wsus__custome_page mt_40 mb_15">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="wsus__privacy_text">
                    @if ($terms_conditions)
                    {!! clean($terms_conditions->translated_terms_and_condition) !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!--=========PRIVACY PART END==========-->

@endsection
