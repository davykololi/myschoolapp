@extends('layouts.admin')
@section('title', '| All Rewards')

@section('content')
<main role="main" class="container"  style="margin-top: 5px" id="main">
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($rewards))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>AWARDS LIST</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{route('admin.rewards.create')}}"> Add An Aword</a>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    @include('partials.rewardhead')
                    <!-- Table Body -->
                    <tbody>
                    @foreach($rewards as $reward)
                        <tr>
                            <td class="table-text">
                                <div>{{$reward->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{\Carbon\Carbon::parse($reward->date)->format('d-m-Y')}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$reward->purpose}}</div>
                            </td>
                            <td>
                                <form action="{{route('admin.rewards.destroy',$reward->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('admin.rewards.show', $reward->id) }}" class="btn btn-success btn-xs">Details</a>
                                    <a href="{{ route('admin.rewards.edit', $reward->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to delete {{$reward->name}}?')">
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
