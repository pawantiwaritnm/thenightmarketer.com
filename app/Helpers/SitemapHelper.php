<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;
use App\Models\Blog;
use App\Models\Service;

class SitemapHelper
{
    public static function update()
    {
        $urls = [];

        // Static Pages
        $urls[] = [
            'loc' => url('/'),
            'priority' => '1.00',
        ];

        $staticPages = [
            'about-us',
            'ui-design-services',
            'ux-design-services',
            'graphic-design-services',
            'branding-services',
            'conversion-rate-optimization',
            'shopify-development-company',
            'wordpress-development',
            'custom-frontend-and-backend',
            'erp-crm',
            'mobile-app-development',
            'social-media-marketing',
            'google-ads-services',
            'search-engine-optimization',
            'performance-marketing',
            'email-marketing',
            'case-study',
            'client-and-partners',
            'contact-us',
            'blogs'
        ];

        foreach ($staticPages as $page) {
            $urls[] = [
                'loc' => url($page),
                'priority' => '0.80',
            ];
        }

        // Dynamic Services
        $services = Service::all();
        foreach ($services as $service) {
            $urls[] = [
                'loc' => url("service/" . $service->slug),
                'priority' => '0.80',
            ];
        }

        // Dynamic Blogs
        $blogs = Blog::all();
        foreach ($blogs as $blog) {
            $urls[] = [
                'loc' => url("blog/" . $blog->slug),
                'priority' => '0.64',
            ];
        }

        // XML Structure
        $xml = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

        foreach ($urls as $url) {
            $xml .= "  <url>\n";
            $xml .= "     <loc>{$url['loc']}</loc>\n";
            $xml .= "     <lastmod>".now()->format('Y-m-d\TH:i:sP')."</lastmod>\n";
            $xml .= "     <priority>{$url['priority']}</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        // Save to public/sitemap.xml
        File::put(public_path('sitemap.xml'), $xml);
    }
}
