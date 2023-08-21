@extends('layouts.admin')
@section('title', '| Class Streams')

@section('content') 
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($streams))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>STREAMS</h2>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="20%">STREAM</th>
                        <th width="20%">STUDENTS</th>
                        <th width="20%">MALES</th>
                        <th width="20%">FEMALES</th>
                        <th width="20%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($streams as $stream)
                        <tr>
                            <td class="table-text">
                                <div>{{ $stream->name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $stream->students->count() }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $stream->males() }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $stream->females() }}</div>
                            </td>
                            <td>
                                <a type="button" class="bg-[blue] text-white px-2 mx-0.5 rounded text-center" href="{{ route('admin.stream.details',$stream->id) }}">Details</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
</x-backend-main>
@endsection
