<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BannerImage;

use App\Models\HomePage;
use App\Models\HomePageTranslation;
use App\Models\Language;
use App\Models\Setting;
use App\Traits\TranslationTrait;
use Image;
use File;

class HomePageController extends Controller
{
    use TranslationTrait;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function homepage()
    {
        $homepage = HomePage::first();
        $languages = Language::all();
        return view('admin.homepage')->with(['homepage' => $homepage, 'languages' => $languages]);
    }

    public function updateHomepage(Request $request)
    {

        $rules = [
            'top_property_title' => 'required',
            'top_property_description' => 'required',
            'top_property_item' => 'required',
            'top_visibility' => 'required',

            'featured_property_title' => 'required',
            'featured_property_description' => 'required',
            'featured_property_item' => 'required',
            'featured_visibility' => 'required',

            'urgent_property_title' => 'required',
            'urgent_property_description' => 'required',
            'urgent_property_item' => 'required',
            'urgent_visibility' => 'required',

            'service_title' => 'required',
            'service_description' => 'required',
            'service_item' => 'required',
            'service_visibility' => 'required',

            'agent_title' => 'required',
            'agent_description' => 'required',
            'agent_item' => 'required',
            'agent_visibility' => 'required',

            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_item' => 'required',
            'blog_visibility' => 'required',

            'testimonial_title' => 'required',
            'testimonial_description' => 'required',
            'testimonial_item' => 'required',
            'testimonial_visibility' => 'required',
        ];
        $customMessages = [
            'top_property_title.required' => trans('admin_validation.Top property title is required'),
            'top_property_description.required' => trans('admin_validation.Top property description is required'),
            'top_property_item.required' => trans('admin_validation.Top property item is required'),
            'top_visibility.required' => trans('admin_validation.Top property status is required'),

            'featured_property_title.required' => trans('admin_validation.Featured property title is required'),
            'featured_property_description.required' => trans('admin_validation.Featured property description is required'),
            'featured_property_item.required' => trans('admin_validation.Featured property item is required'),
            'featured_visibility.required' => trans('admin_validation.Featured property status is required'),

            'urgent_property_title.required' => trans('admin_validation.Urgent property title is required'),
            'urgent_property_description.required' => trans('admin_validation.Urgent property description is required'),
            'urgent_property_item.required' => trans('admin_validation.Urgent property item is required'),
            'urgent_visibility.required' => trans('admin_validation.Urgent property status is required'),

            'service_title.required' => trans('admin_validation.Service title is required'),
            'service_description.required' => trans('admin_validation.Service description is required'),
            'service_item.required' => trans('admin_validation.Service item is required'),
            'service_visibility.required' => trans('admin_validation.Service status is required'),

            'agent_title.required' => trans('admin_validation.Agent title is required'),
            'agent_description.required' => trans('admin_validation.Agent description is required'),
            'agent_item.required' => trans('admin_validation.Agent item is required'),
            'agent_visibility.required' => trans('admin_validation.Agent status is required'),

            'blog_title.required' => trans('admin_validation.Blog title is required'),
            'blog_description.required' => trans('admin_validation.Blog description is required'),
            'blog_item.required' => trans('admin_validation.Blog item is required'),
            'blog_visibility.required' => trans('admin_validation.Blog status is required'),

            'testimonial_title.required' => trans('admin_validation.Testimonial title is required'),
            'testimonial_description.required' => trans('admin_validation.Testimonial description is required'),
            'testimonial_item.required' => trans('admin_validation.Testimonial item is required'),
            'testimonial_visibility.required' => trans('admin_validation.Testimonial status is required'),

        ];
        $this->validate($request, $rules, $customMessages);

        $homepage = HomePage::first();
        $homepage->top_property_title = $request->top_property_title;
        $homepage->top_property_description = $request->top_property_description;
        $homepage->top_property_item = $request->top_property_item;
        $homepage->top_visibility = $request->top_visibility;

        $homepage->featured_property_title = $request->featured_property_title;
        $homepage->featured_property_description = $request->featured_property_description;
        $homepage->featured_property_item = $request->featured_property_item;
        $homepage->featured_visibility = $request->featured_visibility;

        $homepage->urgent_property_title = $request->urgent_property_title;
        $homepage->urgent_property_description = $request->urgent_property_description;
        $homepage->urgent_property_item = $request->urgent_property_item;
        $homepage->urgent_visibility = $request->urgent_visibility;

        $homepage->service_title = $request->service_title;
        $homepage->service_description = $request->service_description;
        $homepage->service_item = $request->service_item;
        $homepage->service_visibility = $request->service_visibility;

        if ($request->service_bg_image) {
            $old_image = $homepage->service_bg_image;
            $image = $request->service_bg_image;
            $ext = $image->getClientOriginalExtension();
            $service_image = 'service_bg_image-' . date('Y-m-d-h-i-s-') . rand(999, 9999) . '.' . $ext;
            $service_image = 'uploads/website-images/' . $service_image;
            $logo = Image::make($image)
                ->save(public_path() . '/' . $service_image);
            $homepage->service_bg_image = $service_image;
            $homepage->save();

            if ($old_image) {
                if (File::exists(public_path() . '/' . $old_image)) unlink(public_path() . '/' . $old_image);
            }
        }

        $homepage->agent_title = $request->agent_title;
        $homepage->agent_description = $request->agent_description;
        $homepage->agent_item = $request->agent_item;
        $homepage->agent_visibility = $request->agent_visibility;

        $homepage->blog_title = $request->blog_title;
        $homepage->blog_description = $request->blog_description;
        $homepage->blog_item = $request->blog_item;
        $homepage->blog_visibility = $request->blog_visibility;

        $homepage->testimonial_title = $request->testimonial_title;
        $homepage->testimonial_description = $request->testimonial_description;
        $homepage->testimonial_item = $request->testimonial_item;
        $homepage->testimonial_visibility = $request->testimonial_visibility;
        $homepage->save();

        $notification = trans('admin_validation.Update Successfully');
        $notification = array('messege' => $notification, 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    public function editTranslation($id, $code)
    {
        if ($code == 'en') {
            $this->updateDefaultTranslation(
                $id,
                $code,
                'HomePageTranslation',
                'HomePage',
                'home_page_id',
                'top_property_title',
                'top_property_description',
                'featured_property_title',
                'featured_property_description',
                'urgent_property_title',
                'urgent_property_description',
                'service_title',
                'service_description',
                'agent_title',
                'agent_description',
                'blog_title',
                'blog_description',
                'testimonial_title',
                'testimonial_description'
            );

            $notification = array(
                'messege' => trans('admin_validation.Update Successfully'),
                'alert-type' => 'success'
            );

            return redirect()->route('admin.homepage')->with($notification);
        }

        $translation = $this->createAndUpdateFromGoogleTranslation(
            $id,
            $code,
            'HomePageTranslation',
            'HomePage',
            'home_page_id',
            'top_property_title',
            'top_property_description',
            'featured_property_title',
            'featured_property_description',
            'urgent_property_title',
            'urgent_property_description',
            'service_title',
            'service_description',
            'agent_title',
            'agent_description',
            'blog_title',
            'blog_description',
            'testimonial_title',
            'testimonial_description'
        );

        return view('admin.homepage_translation', [
            'homepage' => $translation,
        ]);
    }

    public function updateTranslation(Request $request, $id, $code)
    {
        if ($code == 'en') {
            $this->updateDefaultTranslation(
                $id,
                $code,
                'HomePageTranslation',
                'HomePage',
                'home_page_id',
                'top_property_title',
                'top_property_description',
                'featured_property_title',
                'featured_property_description',
                'urgent_property_title',
                'urgent_property_description',
                'service_title',
                'service_description',
                'agent_title',
                'agent_description',
                'blog_title',
                'blog_description',
                'testimonial_title',
                'testimonial_description'
            );

            $notification = array(
                'messege' => trans('admin_validation.Update Successfully'),
                'alert-type' => 'success'
            );

            return redirect()->route('admin.homepage')->with($notification);
        }

        $rules = [
            'top_property_title' => 'required',
            'top_property_description' => 'required',
            'featured_property_title' => 'required',
            'featured_property_description' => 'required',
            'urgent_property_title' => 'required',
            'urgent_property_description' => 'required',
            'service_title' => 'required',
            'service_description' => 'required',
            'agent_title' => 'required',
            'agent_description' => 'required',
            'blog_title' => 'required',
            'blog_description' => 'required',
            'testimonial_title' => 'required',
            'testimonial_description' => 'required',
        ];

        $customMessages = [
            'top_property_title.required' => trans('admin_validation.Top property title is required'),
            'top_property_description.required' => trans('admin_validation.Top property description is required'),
            'featured_property_title.required' => trans('admin_validation.Featured property title is required'),
            'featured_property_description.required' => trans('admin_validation.Featured property description is required'),
            'urgent_property_title.required' => trans('admin_validation.Urgent property title is required'),
            'urgent_property_description.required' => trans('admin_validation.Urgent property description is required'),
            'service_title.required' => trans('admin_validation.Service title is required'),
            'service_description.required' => trans('admin_validation.Service description is required'),
            'agent_title.required' => trans('admin_validation.Agent title is required'),
            'agent_description.required' => trans('admin_validation.Agent description is required'),
            'blog_title.required' => trans('admin_validation.Blog title is required'),
            'blog_description.required' => trans('admin_validation.Blog description is required'),
            'testimonial_title.required' => trans('admin_validation.Testimonial title is required'),
            'testimonial_description.required' => trans('admin_validation.Testimonial description is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        $translation = HomePageTranslation::firstOrCreate([
            'language_code' => $code,
            'home_page_id' => $id
        ]);

        $translation->top_property_title = $request->top_property_title;
        $translation->top_property_description = $request->top_property_description;
        $translation->featured_property_title = $request->featured_property_title;
        $translation->featured_property_description = $request->featured_property_description;
        $translation->urgent_property_title = $request->urgent_property_title;
        $translation->urgent_property_description = $request->urgent_property_description;
        $translation->service_title = $request->service_title;
        $translation->service_description = $request->service_description;
        $translation->agent_title = $request->agent_title;
        $translation->agent_description = $request->agent_description;
        $translation->blog_title = $request->blog_title;
        $translation->blog_description = $request->blog_description;
        $translation->testimonial_title = $request->testimonial_title;
        $translation->testimonial_description = $request->testimonial_description;
        $translation->save();

        $notification = array(
            'messege' => trans('admin_validation.Update Successfully'),
            'alert-type' => 'success'
        );

        return redirect()->route('admin.homepage')->with($notification);
    }
}
