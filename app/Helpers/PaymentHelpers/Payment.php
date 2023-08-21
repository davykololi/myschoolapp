<?php

use App\Models\PaymentRecord;
use Illuminate\Database\Eloquent\Collection;

function getYears($st_id)
{
    return PaymentRecord::where(['student_id' => $st_id])->pluck('year')->unique();;
}

function genRefCode()
{
    return date('Y').'/'.mt_rand(10000, 999999);
}