<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Secure PDF Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains all customizable settings for the secure PDF viewer
    |
    */

    // Document mapping - add your PDFs here
    'documents' => [
        'company-profile' => [
            'path' => 'private/pdfs/company-profile.pdf',
            'title' => 'Company Profile',
            'requires_role' => null, // null = any authenticated user, or ['admin', 'manager']
        ],
        // Add more documents:
        // 'financial-report' => [
        //     'path' => 'private/pdfs/financial-report-2024.pdf',
        //     'title' => 'Financial Report 2024',
        //     'requires_role' => ['admin', 'finance'],
        // ],
    ],

    // Watermark settings
    'watermark' => [
        'enabled' => true,
        'opacity' => 0.15, // 0.1 to 0.3 recommended
        'rotation' => -0.5, // Angle in radians (-0.3 to -0.7)
        'font_size_divisor' => 25, // Lower = bigger text
        'include_timestamp' => true,
        'include_email' => true,
    ],

    // Security settings
    'security' => [
        'enable_audit_log' => true,
        'block_suspicious_agents' => true,
        'require_same_origin' => true,
        'rate_limit' => 60, // Requests per minute
        'session_timeout' => 30, // Minutes
    ],

    // Viewer settings
    'viewer' => [
        'initial_scale' => 1.5, // Initial zoom level
        'max_scale' => 3.0, // Maximum zoom
        'min_scale' => 0.5, // Minimum zoom
        'show_page_count' => true,
        'background_color' => '#525659', // Viewer background
    ],

    // Access control
    'access' => [
        'require_verification' => true, // Require email verification
        'business_hours_only' => false, // Set to true to restrict to business hours
        'business_hours' => [
            'start' => 9, // 9 AM
            'end' => 17, // 5 PM
        ],
        'allowed_ips' => [], // Empty = all IPs, or ['192.168.1.1', '10.0.0.1']
    ],

];