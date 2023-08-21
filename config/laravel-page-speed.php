<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Laravel Page Speed
    |--------------------------------------------------------------------------
    |
    | Set this field to false to disable the laravel page speed service.
    | You would probably replace that in your local configuration to get a readable output.
    |
    */
    'enable' => env('LARAVEL_PAGE_SPEED_ENABLE', true),

    /*
    |--------------------------------------------------------------------------
    | Skip Routes
    |--------------------------------------------------------------------------
    |
    | Skip Routes paths to exclude.
    | You can use * as wildcard.
    |
    */
    'skip' => [
        '*.xml',
        '*.less',
        '*.pdf',
        '*.doc',
        '*.txt',
        '*.ico',
        '*.rss',
        '*.zip',
        '*.mp3',
        '*.rar',
        '*.exe',
        '*.wmv',
        '*.doc',
        '*.avi',
        '*.ppt',
        '*.mpg',
        '*.mpeg',
        '*.tif',
        '*.wav',
        '*.mov',
        '*.psd',
        '*.ai',
        '*.xls',
        '*.mp4',
        '*.m4a',
        '*.swf',
        '*.dat',
        '*.dmg',
        '*.iso',
        '*.flv',
        '*.m4v',
        '*.torrent',
        '*admin/class-marksheet',
        '*admin/stream-marksheet',
        '*admin/stream-students/*',
        '*admin/class-teachers/*',
        '*admin/student-details/*',
        '*admin/st-pdf-report-card',
        '*admin/school-students/*',
        '*admin/letter-head/*',
        '*admin/instant-download/*',
        '*admin/school-letters/*',
        '*student/download-results',
        '*school-departments/*',
        '*department-teachers/*',
        '*school-clubs/*',
        '*superadmin/school-teachers/*',
        '*librarian/library-books/*',
        '*librarian/borrowed-pdf',
        '*librarian/book-return-date',
        '*librarian/book-issued-date',
        '*accountant/download-receipt/*',
        '*staff/letter-head/*',
        '*staff/instant-download/*',
        '*accountant/stream-fee-balances',
        '*accountant/student-payment-details',
        '*parent/download-results',
    ],
];
