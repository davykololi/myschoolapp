@extends('layouts.admin')
@section('title', '| All Letters')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($letters))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>LETTERS LIST</h2>
                </div>
                <div class="pull-right">
                    <a href="{{route('admin.letter.head',Auth::user()->school->id)}}" class="btn btn-primary btn-border">
                        Letter Head PDF
                    </a>
                    <br/>
                    <a class="btn btn-success" href="{{route('admin.letters.create')}}"> Add Letter</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.letterhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($letters as $letter)
                        <tr>
                            <td class="table-text">
                                <div>{{$letter->school->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{!! $letter->excerpt() !!}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$letter->created_at}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.letters.destroy',$letter->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.letters.show', $letter->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.letters.edit', $letter->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete')">
                                        Delete
                                    </button>
                                </form>
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
</main>
@endsection
