@extends('layouts.superadmin')
@section('title', '| Superadmin All Parents')

@section('content')
<x-backend-main>
<div class="row">
    <div class="col-lg-12">
    @include('partials.messages')
    <!-- Posts list -->
    @if(!empty($parents))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>PARENTS LIST</h2>
                </div>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-bordered table-head-bg-info table-bordered-bd-info">
                    <!-- Table Headings -->
                    <thead>
                        <th width="5%">NO</th>
                        <th width="20%">NAME</th>
                        <th width="10%">EMAIL</th>
                        <th width="10%">ID NO.</th>
                        <th width="10%">PHONE</th>
                        <th width="5%">BANNED</th>
                        <th width="10%">BANNED ST</th>
                        <th width="5%">LOCKED</th>
                        <th width="10%">LOCKED ST</th>
                        <th width="15%">ACTION</th>
                    </thead>
                    <!-- Table Body -->
                    <tbody>
                    @foreach($parents as $parent)
                        <tr>
                            <td class="table-text">
                                <div>{{ $loop->iteration }} </div>
                            </td>
                            <td class="table-text">
                                <div>{{ $parent->salutation }} {{$parent->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$parent->email}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$parent->id_no}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$parent->phone_no}}</div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                @if($parent->is_banned == 1)
                                <div class="text-[red]">{{ __('YES') }}</div>
                                @else
                                <div class="text-[green]">{{ __('NO') }}</div>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div>
                                    @if($parent->is_banned == 0)
                                    <form action="{{ route('superadmin.parent.bann',$parent->id) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" class="text-[red]">BANN</button>
                                    </form>
                                    @elseif($parent->is_banned == 1)
                                    <form action="{{ route('superadmin.parent.unbann',$parent->id) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" class="text-[green]">LIFT BANN</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                @if($parent->lock === "disabled")
                                <div class="text-[green]">{{ __('YES') }}</div>
                                @else
                                <div class="text-[red]">{{ __('NO') }}</div>
                                @endif
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                <div>
                                    @if($parent->lock === "enabled")
                                    <form action="{{ route('superadmin.parent.lock',$parent->id) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" class="text-[green]">LOCK</button>
                                    </form>
                                    @elseif($parent->lock === "disabled")
                                    <form action="{{ route('superadmin.parent.unlock',$parent->id) }}" method="POST">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" class="text-[red]">UNLOCK</button>
                                    </form>
                                    @endif
                                </div>
                            </td>
                            <td class="whitespace-nowrap px-2 py-4">
                                
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
