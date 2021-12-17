<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('partials.pdf_head')
</head>
<body>
    @include('partials.pdf_header')
    @include('partials.pdf_school_footer')
    <div class="flex-center position-ref full-height">
        <div class="content" style="margin-top: 40px">
            <h2 class="title"><u>{{$title}}</u></h2>
            <br/>
            <table class="table table-bordered" id="table_style">
                <thead>
                    <tr>
                        <td><b>NO</b></td>
                        <td><b>NAME</b></td>
                        <td><b>MATHS</b></td>
                        <td><b>ENG</b></td>
                        <td><b>KISW</b></td>
                        <td><b>CHEM</b></td>
                        <td><b>BIO</b></td>
                        <td><b>PHYSICS</b></td>
                        <td><b>CRE</b></td>
                        <td><b>ISLAM</b></td>
                        <td><b>HIST</b></td>
                        <td><b>GHC</b></td>
                        <td><b>TOTAL</b></td>
                        <td><b>STRM</b></td>
                        <td><b>P/F</b></td>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($marks))
                    @forelse($marks as $key=>$mark)
                    <tr>
                        @foreach($rankings as $name=>$pos)
                        @if($name === $mark->name && $pos['score'] === $mark->total)
                        <td class="flex-center">{{ $pos['rank'] }}</td>
                        @endif
                        @endforeach
                        <td>{{ $mark->name }}</td>
                        <td>{{ $mark->mathematics }}</td>
                        <td>{{ $mark->english }}</td>
                        <td>{{ $mark->kiswahili }}</td>
                        <td>{{ $mark->chemistry ?? '-' }}</td>
                        <td>{{ $mark->biology ?? '-' }}</td>
                        <td>{{ $mark->physics ?? '-' }}</td>
                        <td>{{ $mark->cre ?? '-' }}</td>
                        <td>{{ $mark->islam ?? '-' }}</td>
                        <td>{{ $mark->history ?? '-' }}</td>
                        <td>{{ $mark->ghc ?? '-' }}</td>
                        <td>{{ $mark->total }}</td>
                        @if($mark->stream->stream_section->name === 'North')
                        <td style="color: red">{{ $mark->stream->stream_section->initials }}</td>
                        @elseif($mark->stream->stream_section->name === 'South')
                        <td style="color: orange">{{ $mark->stream->stream_section->initials }}</td>
                        @elseif($mark->stream->stream_section->name === 'West')
                        <td style="color: green">{{ $mark->stream->stream_section->initials }}</td>
                        @elseif($mark->stream->stream_section->name === 'East')
                        <td style="color: blue">{{ $mark->stream->stream_section->initials }}</td>
                        @endif
                        @if($passMark > $mark->total)
                        <td><span style="color: red">FAIL</span></td>
                        @else
                        <td><span style="color: green">PASS</span></td>
                        @endif
                    @empty
                        <td colspan="10" style="color: red">
                            {{$title}} Not Found.
                        </td>
                    </tr>
                    @endforelse
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td><b>#</b></td>
                        <td><b>MEAN SCORES</b></td>
                        <td><b>{{ round($maths->sum()/$marks->count(),1) }}</b></td>
                        <td><b>{{ round($english->sum()/$marks->count(),1) }}</b></td>
                        <td><b>{{ round($kiswahili->sum()/$marks->count(),1) }}</b></td>
                        <td><b>#</b></td>
                        <td><b>#</b></td>
                        <td><b>#</b></td>
                        <td><b>#</b></td>
                        <td><b>#</b></td>
                        <td><b>#</b></td>
                        <td><b>#</b></td>
                        <td><b>{{ round($totals->sum()/$marks->count(),1) }}</b></td>
                        <td><b>#</b></td>
                        <td><b>#</b></td>
                    </tr>
                </tfoot>
            </table> 
            <div style="margin-left: 150px">
            	<br/><br/>
            	<b><u>NB:</u></b>
            	<ul>
            		<li><span style="margin: 20px">P/F</span>: PASS OR FAIL</li>
                    <li><span style="margin: 20px">PASS MARK: {{ $passMark }} MARKS</span></li>
            		<li><span style="color: green;margin: 20px">PASS</span>: ABOVE PASS MARK</li>
            		<li><span style="color: red;margin: 20px">FAIL</span>: BELOW PASS MARK</li>
            	</ul>
        	</div>
        </div>
    </div>         
</body>
</html>
