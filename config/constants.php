<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Current School Id
    |--------------------------------------------------------------------------
    |
    | This the id of the school that's in use. Ensure you get the id from the 
    | database and add it in your .env file.
    |
    */

    'school_id' => env('SCHOOL_ID'),

    /*
    |--------------------------------------------------------------------------
    | Number of Subjects per class
    |--------------------------------------------------------------------------
    |
    | This the number of subjects offered in each class in a school. Ensure you set this in your .env file.
    |
    */

    'form_one_and_two_subjects_number' => env('FORM_ONE_AND_TWO_SUBJECTS_NUMBER'),
    'constants.form_three_and_four_subjects_number' => env('FORM_TWO_AND_THREE_SUBJECTS_NUMBER'),

    /*
    |--------------------------------------------------------------------------
    | Out off total marks in an exam
    |--------------------------------------------------------------------------
    |
    | This the sum of upper limits of exam marks in all exams taken by the class. Ensure you set this in your .env file.
    |
    */

    'f1_and_f2_out_of_marks' => env('FORM_ONE_AND_TWO_OUT_OF_TOTAL_MARKS'),
    'f3_and_f4_out_of_marks' => env('FORM_THREE_AND_FOUR_OUT_OF_TOTAL_MARKS'),

];

    