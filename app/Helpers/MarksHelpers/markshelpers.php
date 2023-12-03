<?php

use App\Models\Mark;
use Illuminate\Database\Eloquent\Collection;

function classMarks($yearId,$termId,$examId,$classId)
{
    $classMarks = Mark::with('year','term','exam','student','school','teacher','class','stream.stream_section','subject')->where(['term_id'=>$termId,'exam_id'=>$examId,'class_id'=>$classId,'year_id'=>$yearId])->get()->sortByDesc('total');

    return $classMarks;
}

function streamMarks($yearId,$termId,$examId,$streamId)
{
    $streamMarks = Mark::with('year','term','exam','student','school','teacher','class','stream.stream_section','subject')->where(['term_id'=>$termId,'exam_id'=>$examId,'stream_id'=>$streamId,'year_id'=>$yearId])->get()->sortByDesc('total');

    return $streamMarks;
}

function overalPosition($classRankings,$markName)
{
	foreach($classRankings as $mark_total => $pos){
		if($mark_total === $markName){
			$overalPosition = $pos['rank'];
			return $overalPosition;
		}
	}
}

function streamPosition($streamRankings,$markName)
{
	foreach($streamRankings as $mark_total => $pos){
		if($mark_total === $markName){
			$streamPosition = $pos['rank'];
			return $streamPosition;
		}
	}
}