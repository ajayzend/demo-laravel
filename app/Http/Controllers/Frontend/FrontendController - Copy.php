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

    /* -------------------------------------------------------------------------
     ------------------------------- SET DEFAULTS -------------------------------
     --------------------------------------------------------------------------*/
    private $urlPrefix 	= 'http'; // Set URL prefix for your website.
    private $replaceInUrl 	= array('?customer=new','?version=mobile'); // strip out any custom strings from URL.
    private $myIp 		= array('10.0.0.1'); // Put IP addresses you would like to filter out (not track) in array.
    private $reportingTimezone = 'America/Kentucky/Louisville'; // http://www.php.net/manual/en/timezones.america.php
    private $dateFormat 	= 'Y-m-d H:i:s'; // Preferred date format - http://php.net/manual/en/function.date.php
    private $cookieExpire 	= 30; // Set number of days for AdWords tracking cookies to be valid.
    /* =========================================================================
    ============================= DO NOT EDIT BELOW ============================
    ==========================================================================*/
    private $dbHost;
    private $dbUsername;
    private $dbPassword;
    private $dbDatabase;
    private $trackPrefix;
    private $deleteRollingDays;
    private	$referrerMedium;
    private	$referrerSource;
    private	$referrerContent;
    private	$referrerCampaign;
    private	$referrerKeyword;
    private	$referrerAdwordsKeyword;
    private	$referrerAdwordsMatchType;
    private	$referrerAdwordsPosition;
    private	$identifyUser;
    private	$firstVisit;
    private	$previousVisit;
    private	$currentVisitStarted;
    private	$timesVisited;
    private	$pagesViewed;
    private	$theCurrentUrl;
    private $referrerPageViewed;
    private $userIp;
    private $visitTimestamp;

    function __construct() {
        $trackPrefix = 'ttcpc';
        $deleteRollingDays = 30;
        $this->dbHost = "localhost";
        $this->dbUsername = "root";
        $this->dbPassword = "";
        $this->dbDatabase = "evisadev_25112018";

        /*$this->dbUsername = "evisa";
        $this->dbPassword = "Dev1@Db02Mayaasr2019";
        $this->dbDatabase = "live";*/
        $this->trackPrefix = $trackPrefix;
        $this->deleteRollingDays = "$deleteRollingDays";
        date_default_timezone_set($this->reportingTimezone); // Set timezone.
        $cookieDie = time() + ($this->cookieExpire * 24 * 60 * 60); // Cookie is good for X Number of days; 24 hours; 60 mins; 60secs
        $this->setAdwordsCookies(); // Set cookies for AdWords
        // If we have the cookies - parse them
        if(isset($_COOKIE['__utma']) && isset($_COOKIE['__utmz'])):
            $this->processDefaults();
            $this->parseCookies();
            $this->setIfAdWords();
            $this->logTraffic();
        endif;
    } //-- end __construct($_COOKIE)

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
       // $evisacountry = Evisacountry::getSelectData('name', 1);
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.home', compact('google_analytics', $google_analytics))->with([
            //'evisa_country'       => $evisacountry
        ]);
    }

    public function privacy()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.privacy_policy', compact('google_analytics', $google_analytics));
    }

    public function document()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.document', compact('google_analytics', $google_analytics));
    }

    public function instruction()
    {
        $evisacountry = Evisacountry::getSelectData('name', 1);
        $port = Port::getSelectData('name', 1);
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.instruction', compact('google_analytics', $google_analytics))->with([
            'evisa_country'       => $evisacountry,
            'port_arrival'       => $port
        ]);
    }

    public function condition()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.condition', compact('google_analytics', $google_analytics));
    }

    public function about()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.about', compact('google_analytics', $google_analytics));
    }

    public function disclaimer()
    {
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.disclaimer', compact('google_analytics', $google_analytics));
    }

    public function faq()
    {
        $evisacountry = Evisacountry::getSelectData('name', 1);
        $port = Port::getSelectData('name', 1);
        $settingData = Setting::first();
        $google_analytics = $settingData->google_analytics;

        return view('frontend.pages.faq', compact('google_analytics', $google_analytics))->with([
            'evisa_country'       => $evisacountry,
            'port_arrival'       => $port
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

        return view('frontend.pages.customecare', compact('google_analytics', $google_analytics));
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

    private function setAdwordsCookies() {
        if(isset($_GET[$this->trackPrefix]) && $_GET[$this->trackPrefix] == 'true'):
            // Set cookie indicating referrer is Google AdWords Click good for 30 days
            setcookie($this->trackPrefix.'_referrer', 'googleAdwords', $cookieDie,'/');
            setcookie($this->trackPrefix.'_kw', $_GET[$this->trackPrefix.'_kw'], $cookieDie,'/');
            setcookie($this->trackPrefix.'_pos', $_GET[$this->trackPrefix.'_pos'], $cookieDie,'/');
            setcookie($this->trackPrefix.'_mt', $_GET[$this->trackPrefix.'_mt'], $cookieDie,'/');
        endif;
    } //-- end setAdwordsCookies()

    private function processDefaults() {
        $dirtyUrl 		= $this->urlPrefix.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; // Get URL of the current page.
        $this->theCurrentUrl 	= str_replace($replaceInUrl, '', $dirtyUrl); // delete unwanted strings from URL.
        $this->visitTimestamp 	= date($this->dateFormat); // Set Current Date & Time
        $this->userIp 		= $_SERVER['REMOTE_ADDR']; // Set Visitor's IP Address
    } //--end processDefaults()

    private function parseCookies() {
        // Parse __utmz cookie
        list($domainHash,$sourceTimestamp, $sessionNumber, $campaignNumber, $campaignData) = explode('.', $_COOKIE["__utmz"],5);
        $sourceData = parse_str(strtr($campaignData, '|', '&')); // Parse the __utmz data

        $this->referrerMedium		= $utmcmd;	// medium (organic, referral, direct, etc)
        $this->referrerSource		= $utmcsr;	// source (google, facebook.com, etc)
        $this->referrerContent		= $utmcct;	// content (index.html, etc)
        $this->referrerCampaign		= $utmccn; // campaign
        $this->referrerKeyword		= $utmctr;	// term (search term)
        $this->referrerPageViewed	= $this->theCurrentUrl;
        if(isset($utmgclid)): // if from AdWords
            $this->referrerSource		= 'google';
            $this->referrerCampaign		= '';
            $this->referrerMedium		= 'cpc';
            $this->referrerContent		= '';
            $this->referrerAdwordsKeyword	= $utmctr;
        endif;

        // Parse the __utma Cookie
        list($domainHash,$uniqueId,$timestampFirstVisit,$timestampPreviousVisit,$timestampStartCurrentVisit,$numSessionsStarted) = explode('.', $_COOKIE["__utma"]);

        $this->identifyUser		= $uniqueId; // Get Google Analytics unique user ID.
        setcookie($this->trackPrefix.'_id', $this->identifyUser, $cookieDie,'/'); // Set Unique ID to $trackPrefix_id cookie.
        $this->firstVisit		= date($this->dateFormat,$timestampFirstVisit); // Get timestamp of first visit.
        $this->previousVisit		= date($this->dateFormat,$timestampPreviousVisit); // Get timestamp of previous visit.
        $this->currentVisitStarted	= date($this->dateFormat,$timestampStartCurrentVisit); // Get timestamp of current visit.
        $this->timesVisited		= $numSessionsStarted; // Get number of times visited.

        // Parse the __utmb Cookie
        list($domainHash,$pageViews,$garbage,$timestampStartCurrentVisit) = explode('.', $_COOKIE['__utmb']);
        $this->pagesViewed = $pageViews; // Get the total number of page views.
    }	//-- end parseCookies()

    // If user came from AdWords
    private function setIfAdWords() {
        $this->referrerAdwordsKeyword	= (isset($_COOKIE[$this->trackPrefix.'_kw']) ? $_COOKIE[$this->trackPrefix.'_kw'] : $utmctr); // Set adwordsKeyword
        $this->referrerAdwordsMatchType	= (isset($_COOKIE[$this->trackPrefix.'_mt']) ? $_COOKIE[$this->trackPrefix.'_mt'] : ''); // Set adwordsMatchType
        $this->referrerAdwordsPosition	= (isset($_COOKIE[$this->trackPrefix.'_pos']) ? $_COOKIE[$this->trackPrefix.'_pos'] : ''); // Set adwordsPosition
    } //-- end setIfAdWords()

    private function logTraffic() { // Write to Database
        error_reporting(0);
        $mysqli = new mysqli($this->dbHost,$this->dbUsername,$this->dbPassword,$this->dbDatabase); // Connect to database
        if ($mysqli->connect_error):
            die('Connect Error (' . $mysqli->connect_errno . ') '.$mysqli->connect_error);
        endif;
        if(isset($this->referrerPageViewed) && !in_array($this->userIp,$this->myIp)): // If referrerPageViewed is set & not an internal IP
            $mysqli->query("INSERT INTO trafficTracker (identifyUser, medium, source, content, campaign, keyword, pageViewed, adwordsKeyword, adwordsMatchType, adwordsPosition, firstVisit, previousVisit, currentVisit, timesVisited, pagesViewed, userIp, timestamp) VALUES
				(
				'".$this->identifyUser."',
				'".$this->referrerMedium."',
				'".$this->referrerSource."',
				'".$this->referrerContent."',
				'".$this->referrerCampaign."',
				'".$this->referrerKeyword."',
				'".$this->referrerPageViewed."',
				'".$this->referrerAdwordsKeyword."',
				'".$this->referrerAdwordsMatchType."',
				'".$this->referrerAdwordsPosition."',
				'".$this->firstVisit."',
				'".$this->previousVisit."',
				'".$this->currentVisitStarted."',
				'".$this->timesVisited."',
				'".$this->pagesViewed."',
				'".$this->userIp."',
				'".$this->visitTimestamp."'
				)"
            );
        endif;
        $mysqli->query("DELETE FROM trafficTracker WHERE timestamp < DATE_SUB(NOW(), INTERVAL ".$this->deleteRollingDays." DAY)");
        $mysqli->close();
    } //-- end logTraffic()
}
