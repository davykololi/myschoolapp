@extends('layouts.librarian')
@section('title', '| Issued Book Details')

@section('content')
@role('librarian')
<x-frontend-main>
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div class="row">
                <div class="col-md-12 margin-tb">
                    <div class="pull-left">
                        <h2>ISSUED BOOK DETAILS</h2>
                        <br/>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('librarian.issued-books.index') }}" class="label label-primary pull-right"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        {{ $issuedBook->book->title }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Serial No:</strong>
                        {{ $issuedBook->serial_no }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Author:</strong>
                        {{ $issuedBook->book->author }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Student Info:</strong>
                        <b style="color: green">Name:</b> {{ $issuedBook->student->user->full_name }} 
                        <b style="color: green">Class:</b> {{ $issuedBook->student->stream->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Library</strong>
                        {{ $issuedBook->book->library->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Issued Date</strong>
                        {{ $issuedBook->issued_date }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Return Date</strong>
                        {{ $issuedBook->return_date }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Returned ?:</strong>
                        @if($issuedBook->returned == 0)
                            <div><p class="label label-danger">{{$issuedBook->returned ? 'YES':'NO'}}</p></div>
                        @else
                            <div><p class="label label-success">{{$issuedBook->returned ? 'YES':'NO'}}</p></div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Returned Status</strong>
                        @if($issuedBook->returned_status == 1)
                            <div><p class="label label-success">{{$issuedBook->returned_status ? 'GOOD':'POOR'}}</p></div>
                        @else
                            <div><p class="label label-danger">{{$issuedBook->returned_status ? 'GOOD':'POOR'}}</p></div>
                        @endif
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Recommentation</strong>
                        {{ $issuedBook->recommentation }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Created</strong>
                        {{ $issuedBook->created_at }}
                    </div>
                </div>

                <div class="w-full border-2 border-black mt-8 py-2 md:px-4 dark:border-slate-400">
                    <h3 class="uppercase text-center font-thin mb-2">Answer The Following Questions On Book Return</h3>
                    <div class="w-full flex flex-row">
                        <div class="inline-flex mr-4">
                            <p>Has the book been returned?</p>
                        </div>
                        <div class="inline-flex">
                            <form action="{{ route('librarian.issuedbook.returned',$issuedBook->id) }}" method="post" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <div class="col-sm-10">
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
                            <form action="{{ route('librarian.issuedbook.faulty',$issuedBook->id) }}" method="post" class="form-horizontal">
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
                            <form action="{{ route('librarian.issuedbook.returned',$issuedbook->id) }}" method="post" class="form-horizontal">
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
                            <form action="{{ route('librarian.faultybook.cleared',$issuedbook->id) }}" method="post" class="form-horizontal">
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
                            <form action="{{ route('librarian.notyetreturned.reset',$issuedbook->id) }}" method="post" class="form-horizontal">
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
        </div>
    </div>     
</div>
</x-frontend-main>
@endrole
@endsection
