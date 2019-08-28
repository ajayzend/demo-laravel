<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use App\Repositories\Frontend\Pages\PagesRepository;
use App\Models\Evisacountry\Evisacountry;
use App\Models\Port\Port;
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
       // $evisacountry = Evisacountry::getSelectData('name', 1);
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;
        return view('frontend.home', compact('google_analytics', $google_analytics))->with([
            'header_title'       => config('seo.home.title'),
            'header_description'       => config('seo.home.description'),
            'header_keywords'       => config('seo.home.keywords')
        ]);
    }

    public function privacy()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.privacy_policy', compact('google_analytics', $google_analytics))->with([
            'header_title'       => config('seo.privacy-policy.title'),
            'header_description'       => config('seo.privacy-policy.description')
        ]);
    }

    public function document()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.document', compact('google_analytics', $google_analytics))->with([
            'header_title'       => config('seo.document.title'),
            'header_description'       => config('seo.document.description')
        ]);
    }

    public function instruction()
    {
        $evisacountry = Evisacountry::getSelectData('name', 1);
        $port = Port::getSelectData('name', 1);
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.instruction', compact('google_analytics', $google_analytics))->with([
            'evisa_country'       => $evisacountry,
            'port_arrival'       => $port,
            'header_title'       => config('seo.instruction.title'),
            'header_description'       => config('seo.instruction.description')
        ]);
    }

    public function condition()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.condition', compact('google_analytics', $google_analytics))->with([
            'header_title'       => config('seo.condition.title'),
            'header_description'       => config('seo.condition.description')
        ]);
    }

    public function about()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.about', compact('google_analytics', $google_analytics))->with([
            'header_title'       => config('seo.about-us.title'),
            'header_description'       => config('seo.about-us.description')
        ]);
    }

    public function disclaimer()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.disclaimer', compact('google_analytics', $google_analytics))->with([
            'header_title'       => config('seo.disclaimer.title'),
            'header_description'       => config('seo.disclaimer.description')
        ]);
    }

    public function faq()
    {
        $evisacountry = Evisacountry::getSelectData('name', 1);
        $port = Port::getSelectData('name', 1);
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.faq', compact('google_analytics', $google_analytics))->with([
            'evisa_country'       => $evisacountry,
            'port_arrival'       => $port,
            'header_title'       => config('seo.faq.title'),
            'header_description'       => config('seo.faq.description')
        ]);
    }

    public function sitemap()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.sitemap', compact('google_analytics', $google_analytics))->with([
            'header_title'       => "Apply e-Visa to India | Indian Visa Application"
        ]);
    }

    public function customerCare()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.customecare', compact('google_analytics', $google_analytics))->with([
            'header_title'       => config('seo.customer-care.title'),
            'header_description'       => config('seo.customer-care.description')
        ]);
    }

    public function visafee()
    {
        $evisacountry = Evisacountry::getSelectData('name', 0);
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.visafee', compact('google_analytics', $google_analytics))->with([
            'evisa_country'       => $evisacountry
        ]);
    }

    public  function visafeecal()
    {
        $country = @$_GET['country'];
        $visa_type = @$_GET['visa_type'];
        if($country > 0 && $visa_type > 0) {
            $evisacountryfee = Evisacountry::getSelectCustomDataVisaFee();
            $visafee = $evisacountryfee[$country];
            $consult_fee = ($visa_type == 1) ? config('app.consultnfee') : config('app.consultufee');
            echo $totalvisafee = $visafee + $consult_fee;
        }else{
            echo "Please select options to Calculate eVisa Fee";
        }
        die;
    }

    public function visaProcess2()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.visaprocess.visaprocess2', compact('google_analytics', $google_analytics));
    }

    public function visaAmendment()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.visaprocess.amendprocess', compact('google_analytics', $google_analytics));
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
