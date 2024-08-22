@extends('layout')
@section('title')
    <title>{{ $seo_text->seo_title }}</title>
@endsection
@section('meta')
    <meta name="description" content="{{ $seo_text->seo_description }}">
@endsection

@section('user-content')
<!--=====BANNER START=====-->
<section class="wsus__banner">
    <div class="row banner_slider">
        @foreach ($sliders as $slider)
            <div class="col-xl-12">
                <div class="wsus__banner_single" style="background: url({{ asset($slider->image) }});">
                <div class="container banner_content">
                    <div class="row">
                    <div class="col-xl-5">
                        <div class="wsus__banner_text">
                        <a href="javascript:;">{{ $slider->translated_title }}</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="container wsus__for_search">
      <div class="wsus__banner_search">
        <h4>{{__('user.Find Your Property')}}</h4>
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">{{__('user.Any')}}</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">{{__('user.Sell')}}</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">{{__('user.Rent')}}</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <form method="GET" action="{{ route('search-property') }}">
              <div class="wsus__serach_single">
                <select class="select_2" name="city_id">
                    <option value="">{{__('user.Select Location')}}</option>
                    @foreach ($cities as $city_item)
                    <option value="{{ $city_item->id }}">{{ $city_item->translated_name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="wsus__serach_single">
                <select class="select_2" name="property_type">
                    <option value="">{{__('user.Property Type')}}</option>
                    @foreach ($propertyTypes as $property_type_item)
                        <option value="{{ $property_type_item->id }}">{{ $property_type_item->translated_type }}</option>
                    @endforeach
                </select>
              </div>

              <div class="wsus__serach_single">
                <select class="select_2" name="price_range">
                    <option value="">{{__('user.Price Range')}}</option>
                    @php
                        $min_price = $minimum_price;
                    @endphp
                    @for ($i = 1; $i <= 10; $i++)
                        @php
                            $max_price = $minimum_price + ($mod_price * $i)
                        @endphp
                        <option value="{{ $min_price.':'.$max_price }}">{{ $currency.$min_price }} - {{ $currency.$max_price }}</option>
                        @php
                            $min_price = $max_price + 1;
                        @endphp
                    @endfor
                </select>
              </div>

              <div class="wsus__serach_single">
                <select class="select_2" name="number_of_room">
                    <option value="">{{__('user.Number Of Rooms')}}</option>
                    @for ($i = 1; $i <= $max_number_of_room; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
              </div>

              <div class="wsus__serach_single">
                <input type="text" placeholder="{{__('user.Property Id')}}" name="property_id">
              </div>





              <input type="hidden" name="page_type" value="list_view">
                <input type="hidden" name="purpose_type" value="">
              <div class="wsus__serach_single">
                <input type="text" placeholder="{{__('user.Type Here ...')}}" name="search">
                <button class="common_btn" type="submit">{{__('user.Search Property')}}</button>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form method="GET" action="{{ route('search-property') }}">
                <div class="wsus__serach_single">
                  <select class="select_2" name="city_id">
                      <option value="">{{__('user.Select Location')}}</option>
                      @foreach ($cities as $city_item)
                      <option value="{{ $city_item->id }}">{{ $city_item->translated_name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="wsus__serach_single">
                  <select class="select_2" name="property_type">
                    <option value="">{{__('user.Property Type')}}</option>
                      @foreach ($propertyTypes as $property_type_item)
                          <option value="{{ $property_type_item->id }}">{{ $property_type_item->translated_type }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="wsus__serach_single">
                    <select class="select_2" name="price_range">
                        <option value="">{{__('user.Price Range')}}</option>
                        @php
                            $min_price = $minimum_price;
                        @endphp
                        @for ($i = 1; $i <= 10; $i++)
                            @php
                                $max_price = $minimum_price + ($mod_price * $i)
                            @endphp
                            <option value="{{ $min_price.':'.$max_price }}">{{ $currency.$min_price }} - {{ $currency.$max_price }}</option>
                            @php
                                $min_price = $max_price + 1;
                            @endphp
                        @endfor
                    </select>
                  </div>

                  <div class="wsus__serach_single">
                    <select class="select_2" name="number_of_room">
                        <option value="">{{__('user.Number Of Rooms')}}</option>
                        @for ($i = 1; $i <= $max_number_of_room; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                  </div>

                  <div class="wsus__serach_single">
                    <input type="text" placeholder="{{__('user.Property Id')}}" name="property_id">
                  </div>

                <input type="hidden" name="page_type" value="list_view">
                <input type="hidden" name="purpose_type" value="1">
                <div class="wsus__serach_single">
                  <input type="text" placeholder="{{__('user.Type')}}" name="search">
                  <button class="common_btn" type="submit">{{__('user.Search Property')}}</button>
                </div>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <form method="GET" action="{{ route('search-property') }}">
                <div class="wsus__serach_single">
                  <select class="select_2" name="city_id">
                      <option value="">{{__('user.Select Location')}}</option>
                      @foreach ($cities as $city_item)
                      <option value="{{ $city_item->id }}">{{ $city_item->translated_name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="wsus__serach_single">
                  <select class="select_2" name="property_type">
                    <option value="">{{__('user.Property Type')}}</option>
                      @foreach ($propertyTypes as $property_type_item)
                          <option value="{{ $property_type_item->id }}">{{ $property_type_item->translated_type }}</option>
                      @endforeach
                  </select>
                </div>

                <div class="wsus__serach_single">
                    <select class="select_2" name="price_range">
                        <option value="">{{__('user.Price Range')}}</option>
                        @php
                            $min_price = $minimum_price;
                        @endphp
                        @for ($i = 1; $i <= 10; $i++)
                            @php
                                $max_price = $minimum_price + ($mod_price * $i)
                            @endphp
                            <option value="{{ $min_price.':'.$max_price }}">{{ $currency.$min_price }} - {{ $currency.$max_price }}</option>
                            @php
                                $min_price = $max_price + 1;
                            @endphp
                        @endfor
                    </select>
                  </div>

                  <div class="wsus__serach_single">
                    <select class="select_2" name="number_of_room">
                        <option value="">{{__('user.Number Of Rooms')}}</option>
                        @for ($i = 1; $i <= $max_number_of_room; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                  </div>

                  <div class="wsus__serach_single">
                    <input type="text" placeholder="{{__('user.Property Id')}}" name="property_id">
                  </div>


                <input type="hidden" name="page_type" value="list_view">
                <input type="hidden" name="purpose_type" value="2">
                <div class="wsus__serach_single">
                  <input type="text" placeholder="{{__('user.Type')}}" name="search">
                  <button class="common_btn" type="submit">{{__('user.Search Property')}}</button>
                </div>
            </form>
          </div>

        </div>
      </div>
    </div>

  </section>
  <!--=====BANNER END=====-->



  @if ($about_us->about_visibility)
   <!--=====ABOUT START=====-->
   <section class="wsus__about mt_100 xs_mt_75">
    <div class="container">
      <div class="row">
        <div class="col-xl-5 col-lg-5">
          <div class="wsus__about_img">
            <img src="{{ asset($about_us->about_us->image) }}" alt="about images" class="img-fluid w-100">
          </div>
        </div>
        <div class="col-xl-7 col-lg-7">
          <div class="wsus__about_counter">
            <div class="row">
              <div class="col-12">
                <div class="wsus__section_heading mb_40 mt_30">
                  <h2>{{__('user.About Us')}}</h2>
                </div>
              </div>
              <div class="col-12">
                <div class="about_small"> {!! clean($about_us->about_us->translated_about_us) !!} <a href="{{ route('about.us') }}">{{__('user.Read More')}}</a>
              </div>
              </div>

              @foreach ($about_us->overviews as $overview)
                <div class="col-xl-6 col-md-6">
                    <div class="wsus__about_counter_single text-center">
                    <div class="wsus__about_counter_icon">
                        <i class="{{ $overview->icon }}"></i>
                    </div>
                    <div class="wsus__about_counter_text">
                        <h3 class="counter m-0">{{ $overview->qty }}</h3>
                        <p>{{ $overview->translated_name }}</p>
                    </div>
                    </div>
                </div>
              @endforeach
          </div>
        </div>
      </div>
      </div>
    </div>
  </section>
  <!--=====ABOUT END=====-->
  @endif


  @if ($top_properties->top_visibility)
    <!--=====NEW PROPERTIES END=====-->
    <section class="wsus__new_properties pt_90 xs_pt_65 pb_75 xs_pb_50 mt_100 xs_mt_75">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="wsus__section_heading text-center mb_60">
                <h2>{{ $top_properties->title }}</h2>
                <span>{{ $top_properties->description }}</span>
              </div>
            </div>
          </div>
          <div class="row">
            @foreach ($top_properties->top_properties as $top_item)
            <div class="col-xl-4 col-md-6">
                <div class="wsus__single_property">
                  <div class="wsus__single_property_img">
                    <img src="{{ asset($top_item->thumbnail_image) }}" alt="properties" class="img-fluid w-100">

                      @if ($top_item->property_purpose_id==1)
                      <span class="sale">{{ $top_item->propertyPurpose->translated_custom_purpose }}</span>

                      @elseif($top_item->property_purpose_id==2)
                      <span class="sale">{{ $top_item->propertyPurpose->translated_custom_purpose }}</span>
                      @endif

                      @if ($top_item->urgent_property==1)
                          <span class="rent">{{__('user.Urgent')}}</span>
                      @endif

                  </div>
                  <div class="wsus__single_property_text">
                      @if ($top_item->property_purpose_id==1)
                          <span class="tk">{{ $currency }}{{ $top_item->price }}</span>
                      @elseif ($top_item->property_purpose_id==2)
                      <span class="tk">{{ $currency }}{{ $top_item->price }} /
                          @if ($top_item->period=='Daily')
                          <span>{{__('user.Daily')}}</span>
                          @elseif ($top_item->period=='Monthly')
                          <span>{{__('user.Monthly')}}</span>
                          @elseif ($top_item->period=='Yearly')
                          <span>{{__('user.Yearly')}}</span>
                          @endif
                      </span>
                      @endif

                      <a href="{{ route('property.details',$top_item->slug) }}" class="title w-100">{{ $top_item->translated_title }}</a>
                      <ul class="d-flex flex-wrap justify-content-between">
                          <li><i class="fal fa-bed"></i> {{ $top_item->number_of_bedroom }} {{__('user.Bed')}}</li>
                          <li><i class="fal fa-shower"></i> {{ $top_item->number_of_bathroom }} {{__('user.Bath')}}</li>
                          <li><i class="fal fa-draw-square"></i> {{ $top_item->area }} {{__('user.Sqft')}}</li>
                      </ul>
                      <div class="wsus__single_property_footer d-flex justify-content-between align-items-center">
                        <a href="{{ route('search-property',['page_type' => 'list_view','property_type' => $top_item->propertyType->id]) }}" class="category">{{ $top_item->propertyType->translated_type }}</a>

                      @php
                          $total_review=$top_item->reviews->where('status',1)->count();
                          if($total_review > 0){
                              $avg_sum=$top_item->reviews->where('status',1)->sum('avarage_rating');

                              $avg=$avg_sum/$total_review;
                              $intAvg=intval($avg);
                              $nextVal=$intAvg+1;
                              $reviewPoint=$intAvg;
                              $halfReview=false;
                              if($intAvg < $avg && $avg < $nextVal){
                                  $reviewPoint= $intAvg + 0.5;
                                  $halfReview=true;
                              }
                          }
                      @endphp

                      @if ($total_review > 0)
                        <span class="rating">{{ sprintf("%.1f", $reviewPoint) }}

                          @for ($i = 1; $i <=5; $i++)
                              @if ($i <= $reviewPoint)
                                  <i class="fas fa-star"></i>
                              @elseif ($i> $reviewPoint )
                                  @if ($halfReview==true)
                                  <i class="fas fa-star-half-alt"></i>
                                      @php
                                          $halfReview=false
                                      @endphp
                                  @else
                                  <i class="fal fa-star"></i>
                                  @endif
                              @endif
                          @endfor
                        </span>
                      @else
                          <span class="rating">0.0
                              @for ($i = 1; $i <=5; $i++)
                              <i class="fal fa-star"></i>
                              @endfor
                          </span>
                      @endif
                      </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
      <!--=====NEW PROPERTIES END=====-->
@endif



@if ($featured_properties->featured_visibility)
    <section class="wsus__popular_properties mt_90 xs_mt_65">
    <div class="container">
        <div class="row">
        <div class="col-12">
            <div class="wsus__section_heading text-center mb_60">
            <h2>{{ $featured_properties->title }}</h2>
            <span>{{ $featured_properties->description }}</span>
            </div>
        </div>
        </div>
        <div class="row">
        @foreach ($featured_properties->featured_properties as $featured_item)
            <div class="col-xl-4 col-md-6">
            <div class="wsus__popular_properties_single">
                <img src="{{ asset($featured_item->thumbnail_image) }}" alt="popular properties">
                <a href="{{ route('property.details',$featured_item->slug) }}" class="wsus__popular_text">
                <h4>{{ $featured_item->translated_title }}</h4>
                <ul class="d-flex flex-wrap mt-3">
                    <li><i class="fal fa-bed"></i> {{ $featured_item->number_of_bedroom }} {{__('user.Bed')}}</li>
                    <li><i class="fal fa-shower"></i> {{ $featured_item->number_of_bathroom }} {{__('user.Bath')}}</li>
                    <li><i class="fal fa-draw-square"></i> {{ $featured_item->area }} {{__('user.Sqft')}}</li>
                </ul>
                </a>
            </div>
            </div>
        @endforeach
        </div>
    </div>
    </section>
@endif


@if ($urgent_properties->urgent_visibility)


        <!--=====TOP PROPERTIES START=====-->
  <section class="wsus__top_properties mt_75 xs_mt_50 pt_90 xs_pt_65 pb_75 xs_pb_50">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="wsus__section_heading text-center mb_60">
            <h2>{{ $urgent_properties->title }}</h2>
            <span>{{ $urgent_properties->description }}</span>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($urgent_properties->urgent_properties as $urgent_item)
            <div class="col-xl-4 col-sm-6 col-lg-4">
                <div class="wsus__top_properties_item">
                    <div class="row">
                    <div class="col-xl-6">
                        <div class="wsus__top_properties_img">
                        <img src="{{ asset($urgent_item->thumbnail_image) }}" alt="top properties" class="ifg-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="wsus__top_properties_text">
                        <a href="{{ route('property.details',$urgent_item->slug) }}">{{ $urgent_item->translated_title }}</a>

                            @if ($urgent_item->property_purpose_id==1)
                                <p>{{ $currency }}{{ $urgent_item->price }}</p>
                            @elseif ($urgent_item->property_purpose_id==2)
                            <p>{{ $currency }}{{ $urgent_item->price }} /
                                @if ($urgent_item->period=='Daily')
                                <span>{{__('user.Daily')}}</span>
                                @elseif ($urgent_item->period=='Monthly')
                                <span>{{__('user.Monthly')}}</span>
                                @elseif ($urgent_item->period=='Yearly')
                                <span>{{__('user.Yearly')}}</span>
                                @endif
                            </p>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        @endforeach
      </div>
    </div>
  </section>
  <!--=====TOP PROPERTIES END=====-->
  @endif


  @if ($services->service_visibility)
  <section class="wsus__services" style="background: url({{ asset($services->image) }});">
    <div class="wsus__services_overlay pt_100 xs_pt_75 pb_75 xs_pb_50">
      <div class="container">
        <div class="row">
          <div class="col-xl-5 col-lg-4">
            <div class="wsus__services_heading">
              <div class="wsus__section_heading">
                <h2 class="text-white">{{ $services->title }}</h2>
                <span class="text-white">{{ $services->description }}</span>
              </div>
            </div>
          </div>
          <div class="col-xl-7 col-lg-8">
            <div class="row">
                @foreach ($services->services as $service_item)
                    <div class="col-xl-6 col-md-6">
                        <div class="wsus__single_service">
                        <i class="{{ $service_item->icon }}"></i>
                        <h4>{{ $service_item->translated_title }}</h4>
                        <p>{{ $service_item->translated_description }}</p>
                        <span><i class="fas fa-flower"></i></span>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif


  @if ($agents->agent_visibility)
  <section class="wsus__agents mt_90 xs_mt_65">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="wsus__section_heading text-center mb_35 xs_mb_30">
            <h2>{{ $agents->title }}</h2>
            <span>{{ $agents->description }}</span>
          </div>
        </div>
      </div>
      <div class="row">
        @foreach ($agents->agents as $agent)
        <div class="col-xl-3 col-sm-6 col-lg-4">
          <div class="wsus__single_team">
            <a href="{{ route('agent.show',['user_type' => '2','user_name'=>$agent->slug]) }}" class="wsus__single_team_img">
              <img src="{{ $agent->image ? url($agent->image) : url($default_profile_image) }}" alt="team images" class="imf-fluid w-100">
            </a>
            <a href="{{ route('agent.show',['user_type' => '2','user_name'=>$agent->slug]) }}" class="title">{{ $agent->name }}</a>
            <p><i class="fal fa-location-circle"></i> {{ $agent->address }}</p>

            <ul class="agent_link">
                @if ($agent->icon_one && $agent->link_one)
                <li><a href="{{ $agent->link_one }}"><i class="{{ $agent->icon_one }}"></i></a></li>
                @endif

                @if ($agent->icon_two && $agent->link_two)
                <li><a href="{{ $agent->link_two }}"><i class="{{ $agent->icon_two }}"></i></a></li>
                @endif

                @if ($agent->icon_three && $agent->link_three)
                <li><a href="{{ $agent->link_three }}"><i class="{{ $agent->icon_three }}"></i></a></li>
                @endif

                @if ($agent->icon_four && $agent->link_four)
                <li><a href="{{ $agent->link_four }}"><i class="{{ $agent->icon_four }}"></i></a></li>
                @endif
            </ul>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif




  @if ($blogs->blog_visibility)
  <section class="wsus__blog mt_90 xs_mt_70">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="wsus__section_heading text-center mb_60">
            <h2>{{ $blogs->title}}</h2>
            <span>{{ $blogs->description }}</span>
          </div>
        </div>
      </div>
      <div class="row">
        @php
            $colorId=1;
        @endphp
        @foreach ($blogs->blogs as $index => $blog_item)
        @php
            if($index %4 ==0){
                $colorId=1;
            }

            $color="";
            if($colorId==1){
                $color="";
            }else if($colorId==2){
                $color="oreangr";
            }else if($colorId==3){
                $color="gren";
            }else if($colorId==4){
                $color="blur";
            }
        @endphp
        <div class="col-xl-4 col-md-6">
          <div class="wsus__single_blog">
            <div class="wsus__blog_img">
              <img src="{{ asset($blog_item->image) }}" alt="blog items" class="img-fluid w-100">
              <span class="category {{ $color }}">{{ $blog_item->category->translated_name }}</span>
            </div>
            <div class="wsus__blog_text">
              <p class="blog_date">
                <span>{{ $blog_item->created_at->format('d') }}</span>
                <span>{{ $blog_item->created_at->format('m') }}</span>
                <span>{{ $blog_item->created_at->format('Y') }}</span>
              </p>
              <span class="comment"><i class="fal fa-comment-dots"></i> {{ $blog_item->totalComment }}</span>
              <div class="wsus__blog_header d-flex flex-wrap align-items-center justify-content-between">
                <div class="blog_header_images d-flex flex-wrap align-items-center w-100">
                  <img src="{{ $blog_item->admin ? url($blog_item->admin->image) : url($default_profile_image) }}" alt="bloger" class="img-fluid img-thumbnail">
                  <span>{{ $blog_item->admin ? $blog_item->admin->name : '' }}</span>
                </div>
              </div>
              <a href="{{ route('blog.details',$blog_item->slug) }}" class="blog_title">{{ $blog_item->translated_title }}</a>
              <p>{{ $blog_item->translated_short_description }}</p>
            </div>
          </div>
        </div>
        @php
            $colorId ++;
        @endphp
        @endforeach
      </div>
    </div>
  </section>
  @endif


  @if ($testimonials->testimonial_visibility)
  <section class="wsus__testimonial mt_75 xs_mt_50 pt_90 xs_pt_65 pb_85 xs_pb_100" style="background: url({{ asset('user/images/bg_shape.jpg') }});">
    <div class="container">
      <div class="row justify-content-between align-content-center">
        <div class="col-xl-4 col-lg-4">
          <div class="wsus__section_heading d-flex align-content-center justify-content-center flex-column">
            <h2>{{ $testimonials->title }}</h2>
            <span>{{ $testimonials->description }}</span>
          </div>
        </div>
        <div class="col-xl-7 col-lg-8">
          <div class="row testi_slider">
            @foreach ($testimonials->testimonials as $testimonial_item)
            <div class="col-12">
              <div class="wsus__testi_item">
                <div class="row">
                  <div class="col-xl-5 col-md-5">
                    <div class="wsus__testi_img d-flex justify-content-center align-items-center">
                      <i class="fal fa-flower top_icon"></i>
                      <img src="{{ asset($testimonial_item->image) }}" alt="Clients" class="img-fluid img-thumbnail">
                      <i class="fas fa-flower bottom_icon"></i>
                    </div>
                  </div>
                  <div class="col-xl-7 col-md-7">
                    <div class="wsus__testi_text">
                      <h2>{{ $testimonial_item->translated_name }}</h2>
                      <h5>{{ $testimonial_item->translated_designation }}</h5>
                      <p><i class="fal fa-quote-right"></i> {{ $testimonial_item->translated_comment }}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
@endsection
