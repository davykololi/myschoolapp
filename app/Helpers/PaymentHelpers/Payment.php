<?php

use Illuminate\Support\Number;
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

function streamStudents($stream)
{
    $streamStudents = $stream->students()->with('payments','payment_records','user')->inRandomOrder()->get();

    return $streamStudents;
}

function streamTotalBalance($stream)
{
    $streamStudentsBalances = $stream->students()->with('payments','payment_records')->get()->pluck('fee_balance'); 
    $streamBalancesToCollection = collect($streamStudentsBalances);
    $totalStreamBalance = $streamBalancesToCollection->sum();

    return Number::format($totalStreamBalance, precision:2);
}

function classStudents($class)
{
    $classStudents = $class->students()->with('payments','payment_records','stream.stream_section','user')->inRandomOrder()->get();

    return $classStudents;
}

function classTotalBalance($class)
{
   $classStudentsBalances = $class->students()->with('payments','payment_records')->get()->pluck('fee_balance'); 
   $classBalancesToCollection = collect($classStudentsBalances);
   $totalClassBalance = $classBalancesToCollection->sum();

   return Number::format($totalClassBalance, precision:2);
}

function paymentByRefNumberTotalSum($payments)
{
    $totalSum = collect($payments->pluck('amount')->toArray())->sum();

    return Number::format($totalSum, precision:2);
}