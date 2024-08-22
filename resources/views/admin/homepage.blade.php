@extends('admin.master_layout')
@section('title')
    <title>{{ __('admin.Homepage') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header d-flex justify-content-between">
                <h1>{{ __('admin.Homepage') }}</h1>
                <div>
                    <p>{{__('admin.Translations')}}</p>
                    @forelse($languages as $key => $language)
                        <i
                            class="fa {{ $homepage->translation($language->code)?->first()?->top_property_title ? 'fa-check' : 'fa-edit' }}"></i>
                        <a
                            href="{{ route('admin.homepage.translation', ['id' => $homepage->id, 'code' => $language->code]) }}">{{ strtoupper($language->code) }}</a>
                        @if (!$loop->last)
                            ||
                        @endif
                    @empty
                        <a
                            href="{{ route('admin.homepage.translation', ['id' => $homepage->id, 'code' => $language->code]) }}">{{ strtoupper(config('app.locale')) }}</a>
                    @endforelse
                </div>
            </div>

            <div class="section-body homepage_box">
                <form action="{{ route('admin.update-homepage') }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row mt-4">
                        <div class="col">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>{{ __('admin.Top Property') }}</h6>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.Title') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->top_property_title }}"
                                            name="top_property_title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Description') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->top_property_description }}"
                                            name="top_property_description" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.How many item want to show ?') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->top_property_item }}"
                                            name="top_property_item" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="top_visibility" class="form-control" id="">
                                            <option {{ $homepage->top_visibility == 1 ? 'selected' : '' }} value="1">
                                                {{ __('admin.Active') }}</option>
                                            <option {{ $homepage->top_visibility == 0 ? 'selected' : '' }} value="0">
                                                {{ __('admin.Inactive') }}</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>{{ __('admin.Featured Property') }}</h6>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.Title') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->featured_property_title }}"
                                            name="featured_property_title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Description') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->featured_property_description }}"
                                            name="featured_property_description" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.How many item want to show ?') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->featured_property_item }}"
                                            name="featured_property_item" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="featured_visibility" class="form-control" id="">
                                            <option {{ $homepage->featured_visibility == 1 ? 'selected' : '' }}
                                                value="1">{{ __('admin.Active') }}</option>
                                            <option {{ $homepage->featured_visibility == 0 ? 'selected' : '' }}
                                                value="0">{{ __('admin.Inactive') }}</option>
                                        </select>

                                    </div>

                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>{{ __('admin.Urgent Property') }}</h6>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.Title') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->urgent_property_title }}"
                                            name="urgent_property_title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Description') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->urgent_property_description }}"
                                            name="urgent_property_description" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.How many item want to show ?') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->urgent_property_item }}"
                                            name="urgent_property_item" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="urgent_visibility" class="form-control" id="">
                                            <option {{ $homepage->urgent_visibility == 1 ? 'selected' : '' }}
                                                value="1">{{ __('admin.Active') }}</option>
                                            <option {{ $homepage->urgent_visibility == 0 ? 'selected' : '' }}
                                                value="0">{{ __('admin.Inactive') }}</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>{{ __('admin.Service') }}</h6>
                                    <hr>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Existing Image') }}</label>
                                        <div>
                                            <img src="{{ asset($homepage->service_bg_image) }}" alt=""
                                                class="w_300">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.New Image') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="file" name="service_bg_image" class="form-control-file">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Title') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->service_title }}"
                                            name="service_title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Description') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->service_description }}"
                                            name="service_description" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.How many item want to show ?') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->service_item }}" name="service_item"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="service_visibility" class="form-control" id="">
                                            <option {{ $homepage->service_visibility == 1 ? 'selected' : '' }}
                                                value="1">{{ __('admin.Active') }}</option>
                                            <option {{ $homepage->service_visibility == 0 ? 'selected' : '' }}
                                                value="0">{{ __('admin.Inactive') }}</option>
                                        </select>

                                    </div>



                                </div>
                            </div>


                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>{{ __('admin.Our Agent') }}</h6>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.Title') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->agent_title }}" name="agent_title"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Description') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->agent_description }}"
                                            name="agent_description" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.How many item want to show ?') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->agent_item }}" name="agent_item"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="agent_visibility" class="form-control" id="">
                                            <option {{ $homepage->agent_visibility == 1 ? 'selected' : '' }}
                                                value="1">{{ __('admin.Active') }}</option>
                                            <option {{ $homepage->agent_visibility == 0 ? 'selected' : '' }}
                                                value="0">{{ __('admin.Inactive') }}</option>
                                        </select>

                                    </div>

                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>{{ __('admin.Blog') }}</h6>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.Title') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->blog_title }}" name="blog_title"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Description') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->blog_description }}"
                                            name="blog_description" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.How many item want to show ?') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->blog_item }}" name="blog_item"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="blog_visibility" class="form-control" id="">
                                            <option {{ $homepage->blog_visibility == 1 ? 'selected' : '' }}
                                                value="1">{{ __('admin.Active') }}</option>
                                            <option {{ $homepage->blog_visibility == 0 ? 'selected' : '' }}
                                                value="0">{{ __('admin.Inactive') }}</option>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="card mb-3">
                                <div class="card-body">
                                    <h6>{{ __('admin.Testimonial') }}</h6>
                                    <hr>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.Title') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->testimonial_title }}"
                                            name="testimonial_title" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Description') }} <span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->testimonial_description }}"
                                            name="testimonial_description" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.How many item want to show ?') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" value="{{ $homepage->testimonial_item }}"
                                            name="testimonial_item" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="">{{ __('admin.Status') }} <span
                                                class="text-danger">*</span></label>
                                        <select name="testimonial_visibility" class="form-control" id="">
                                            <option {{ $homepage->testimonial_visibility == 1 ? 'selected' : '' }}
                                                value="1">{{ __('admin.Active') }}</option>
                                            <option {{ $homepage->testimonial_visibility == 0 ? 'selected' : '' }}
                                                value="0">{{ __('admin.Inactive') }}</option>
                                        </select>

                                    </div>

                                    <button class="btn btn-primary" type="submit">{{ __('admin.Update') }}</button>
                                </div>
                            </div>






                        </div>
                    </div>
                </form>
        </section>
    </div>
@endsection
