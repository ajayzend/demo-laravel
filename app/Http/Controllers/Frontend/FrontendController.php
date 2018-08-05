<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;

/**
 * Class FrontendController.
 */
class FrontendController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.home', compact('google_analytics', $google_analytics));
    }

    public function privacy()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.privacy_policy', compact('google_analytics', $google_analytics));
    }

    public function visaProcess1()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.visaprocess.visaprocess1', compact('google_analytics', $google_analytics));
    }

    /**
     * show page by $page_slug.
     */
    public function showPage($slug, PagesRepository $pages)
    {
        $result = $pages->findBySlug($slug);

        return view('frontend.pages.index')
            ->withpage($result);
    }
}
