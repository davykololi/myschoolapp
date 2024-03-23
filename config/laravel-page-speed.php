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
        '*admin/stream-students',
        '*admin/stream-register',
        '*admin/stream-teachers',
        '*admin/class-teachers',
        '*admin/class-students',
        '*admin/pdf-student-details',
        '*admin/two-exams-report-card',
        '*admin/three-exams-report-card',
        '*admin/school-students',
        '*admin/school-teachers',
        '*admin/school-parents',
        '*admin/school-subordinates',
        '*admin/letter-head',
        '*admin/instant-download/*',
        '*admin/school-pdf-generation/*',
        '*student/download-results',
        '*admin/school-departments',
        '*admin/department-teachers',
        '*admin/department-subordinates',
        '*admin/school-clubs',
        '*admin/student-exam-results',
        '*admin/dormitory-students',
        '*superadmin/school-teachers',
        '*librarian/library-books',
        '*librarian/borrowed-pdf',
        '*librarian/book-return-date',
        '*librarian/book-issued-date',
        '*accountant/download-receipt/*',
        '*subordinate/letter-head/*',
        '*subordinate/instant-download/*',
        '*accountant/class-fee-balances',
        '*accountant/stream-fee-balances',
        '*accountant/student-payment-statement',
        '*accountant/payments-by-reference-number',
        '*parent/child-exam-results',
        '*admin/club-students',
        '*admin/club-teachers',
        '*matron/dormitory-students',
    ],
];
