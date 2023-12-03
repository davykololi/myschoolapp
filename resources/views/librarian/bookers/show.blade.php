@extends('layouts.librarian')
@section('title', '| Show Issued Book')

@section('content')
<x-frontend-main>
    <div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2>ISSUED BOOK DETAILS</h2>
            <br/>
        </div>
        <div class="pull-right">
            <a href="{{ route('librarian.bookers.index') }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $booker->book->title }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Serial No:</strong>
            {{ $booker->serial_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Author:</strong>
            {{ $booker->book->author }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student Info:</strong>
            <b style="color: green">Name:</b> {{ $booker->student->full_name }} 
            <b style="color: green">Class:</b> {{ $booker->student->stream->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Library</strong>
            {{ $booker->book->library->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Issued Date</strong>
            {{ $booker->issued_date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Return Date</strong>
            {{ $booker->return_date }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Returned ?:</strong>
            @if($booker->returned == 0)
                <div><p class="label label-danger">{{$booker->returned ? 'YES':'NO'}}</p></div>
            @else
                <div><p class="label label-success">{{$booker->returned ? 'YES':'NO'}}</p></div>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Returned Status</strong>
            @if($booker->returned_status == 1)
                <div><p class="label label-success">{{$booker->returned_status ? 'GOOD':'POOR'}}</p></div>
            @else
                <div><p class="label label-danger">{{$booker->returned_status ? 'GOOD':'POOR'}}</p></div>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Recommentation</strong>
            {{ $booker->recommentation }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Created</strong>
            {{ $booker->created_at }}
        </div>
    </div>

    <div class="w-full border-2 border-black mt-8 py-2 md:px-4 dark:border-slate-400">
        <h3 class="uppercase text-center font-thin mb-2">Answer The Following Questions On Book Return</h3>
        <div class="w-full flex flex-row">
            <div class="inline-flex mr-4">
                <p>Has the book been returned?</p>
            </div>
            <div class="inline-flex">
                <form action="{{ route('librarian.issuedbook.returned',$booker->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="hidden" name="returned" id="returned" value="true"/>
                            <button type="submit" class="text-[green]">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="w-full flex flex-row">
            <div class="inline-flex mr-4">
                <p>If "Yes", Is the returned book faulty?</p>
            </div>
            <div class="inline-flex mr-4">
                <form action="{{ route('librarian.issuedbook.faulty',$booker->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="hidden" name="returned_status" id="returned_status" value="false"/>
                            <button type="submit" class="text-[green] px-2">Yes</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="inline-flex mr-8">
                <form action="{{ route('librarian.issuedbook.returned',$booker->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="hidden" name="returned" id="returned" value="true"/>
                            <button type="submit" class="text-red-800">No</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="w-full border-2 border-black mt-4 py-2 md:px-4 dark:border-slate-400">
        <h3 class="uppercase text-center font-thin mb-2">Only use this section when clearing faulty book</h3>
        <div class="w-full flex flex-row">
            <div class="inline-flex mr-4">
                <p>Faulty book issues solved and ready to clear the book?</p>
            </div>
            <div class="inline-flex">
                <form action="{{ route('librarian.faultybook.cleared',$booker->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="hidden" name="returned_status" id="returned_status" value="true"/>
                            <button type="submit" class="text-[green]">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="w-full border-2 border-black mt-4 py-2 md:px-4 dark:border-slate-400">
        <h3 class="uppercase text-center font-thin mb-2">Use this section to revert book set as returned to unreturned</h3>
        <div class="w-full flex flex-row">
            <div class="inline-flex mr-4">
                <p>Want to set book to unreturned status?</p>
            </div>
            <div class="inline-flex">
                <form action="{{ route('librarian.notyetreturned.reset',$booker->id) }}" method="post" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-10">
                            <input type="hidden" name="returned_status" id="returned_status" value="true"/>
                            <button type="submit" class="text-[green]">Yes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>     
</div>
</x-frontend-main>
@endsection
