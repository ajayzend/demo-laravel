@extends('frontend.layouts.app')

@section('content')
        <!-- Content -->
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="row">
        <div class="about_us">
            <h4>Site <span>Map</span></h4>
            <?php
            $xml=simplexml_load_file("sitemap.xml");

            header("Content-Type: application/xml; charset=utf-8");

            echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;

            echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

            $xml=simplexml_load_file("sitemap.xml");
            echo '<ul>' . PHP_EOL;
            foreach($xml as $row)
            {
                $p=parse_url($row->loc);
                $url = $p['path'];
                $url = str_replace('/visas/', '',$url);
                $url = str_replace('/', '',$url);
                $url = str_replace('blog', '',$url);
                $url = ($url) ? $url : 'Home';
                $url = ucfirst($url);
//                            /print_r($url);
                echo '<url>' . PHP_EOL;
                //  echo '<loc>'.$row->loc.'/</loc>' . PHP_EOL;
                //echo '<changefreq>daily</changefreq>' . PHP_EOL;
                // echo '<priority>'.$row->priority.'</priority>' . PHP_EOL;
                // echo '<br>' . PHP_EOL;
                echo '<li>' . PHP_EOL;
                echo '<a href="'.$row->loc.'">' . PHP_EOL;
                echo '</>' . PHP_EOL;
                echo $url. PHP_EOL;
                echo '</li>' . PHP_EOL;

            }
            echo '</ul>' . PHP_EOL;
            echo '</urlset>' . PHP_EOL;
            ?>
        </div>
    </div>
</div>
@endsection