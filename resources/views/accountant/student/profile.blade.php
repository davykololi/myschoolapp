@extends('layouts.accountant')

@section('content') 
  <!-- frontend-main view -->
  <x-frontend-main>
    <div class="max-w-screen dark:bg-slate-900 dark:text-slate-400">
        <div class="w-full">
            <div class="flex flex-col">
                <div class="mb-2">
                    <h2 class="uppercase text-center font-bold text-2xl">{{ $student->full_name }} Accounts Profile</h2>
                </div>
                <div class="mt-4 w-full">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>
        </div>
        <div><h3 class="uppercase text-center text-lg font-bold underline">{{ __('Personal Details') }}</h3></div>
        <div class="flex flex-col overflow-x-auto md:mx-8">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="10%">AVATAR</th>
                                    <th scope="col" class="px-2 py-4" width="20%">NAME</th>
                                    <th scope="col" class="px-2 py-4" width="10%">ADM NO</th>
                                    <th scope="col" class="px-2 py-4" width="15%">STREAM</th>
                                    <th scope="col" class="px-2 py-4" width="10%">INTAKE</th>
                                    <th scope="col" class="px-2 py-4" width="10%">DOA</th>
                                    <th scope="col" class="px-2 py-4" width="10%">BALANCE</th>
                                    <th scope="col" class="px-2 py-4" width="15%">CLEARANCE</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="pl-4">@include('partials.student-avatar')</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->full_name  }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->admission_no  }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->stream->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->getAdmissionMonth() }} Intake</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $student->getDoa() }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="text-[red]">Kshs: {{ number_format($student->fee_balance,2) }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>
                                            @if($student->total_payment_amount > $student->paid_amount)
                                            <span class="bg-red-700 text-white px-4 mx-auto mt-2 animate-pulse">{{ __('PENDING')}}</span>
                                            @else
                                            <span class="bg-green-800 text-white px-4 mx-auto mt-2">{{ __('CLEARED')}}</span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="md:mx-8 mt-8">
            <button class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] mb-2" type="button" data-te-collapse-init
            data-te-ripple-init data-te-ripple-color="light" data-te-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Payment Details
            </button>
            <div class="!visible hidden" id="collapseExample" data-te-collapse-item>
                <div class="block rounded-lg bg-[#202C4B] p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] text-white dark:bg-[#32302f] dark:text-slate-400">
                    <div class="">
                        <h4 class="uppercase underline font-bold text-lg dark:text-slate-400">Payment Details</h4>
                        @if($studentPayments->isNotEmpty())
                        <p><span>TO PAY:</span>Kshs: {{ number_format($student->total_payment_amount,2) }}</p>
                        <p><span>PAID:</span>Kshs: {{ number_format($student->paid_amount,2) }}</p>
                        <p><span>BALANCE:</span>Kshs: {{ number_format($student->fee_balance,2) }}</p>
                        <p><span>CLEARANCE:</span> 
                            @if($student->total_payment_amount > $student->paid_amount)
                            <span class="bg-red-700 text-white px-2 mx-auto mt-2 ml-2"> {{ __('PENDING')}}</span>
                            @else
                            <span class="bg-green-800 text-white px-2 mx-auto mt-2 ml-2"> {{ __('CLEARED')}}</span>
                            @endif
                        </p>
                        @elseif($studentPayments->isEmpty())
                        <p>{{ __('The payments for this student notyet initiated.') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full mt-8">
            <h3 class="uppercase text-lg text-center font-bold underline">{{ __('Payment Details Table')}}</h3>
        </div>
        <div class="flex flex-col overflow-x-auto md:mx-8">
            <div class="sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-x-auto">
                        <table class=" text-left text-sm font-light bg-gray-100 w-full mx-auto justify-evenly">
                            <!-- Table Headings -->
                            <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                <tr>
                                    <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                    <th scope="col" class="px-2 py-4" width="15%">TITLE</th>
                                    <th scope="col" class="px-2 py-4" width="5%">YEAR</th>
                                    <th scope="col" class="px-2 py-4" width="5%">TERM</th>
                                    <th scope="col" class="px-2 py-4" width="10%">AMOUNT</th>
                                    @can('seniorAccountant')
                                    <th scope="col" class="px-2 py-4" width="5%">EDIT</th>
                                    <th scope="col" class="px-2 py-4" width="5%">DELETE</th>
                                    @endcan
                                    <th scope="col" class="px-2 py-4" width="5%">PAID</th>
                                    <th scope="col" class="px-2 py-4" width="5%">BALANCE</th>
                                    <th scope="col" class="px-2 py-4" width="5%">STATUS</th>
                                    <th scope="col" class="px-2 py-4" width="5%">PAID DETAILS</th>
                                    <th scope="col" class="px-2 py-4" width="10%">REF NO</th>
                                    <th scope="col" class="px-2 py-4" width="5%">BAL DETAILS</th>
                                    <th scope="col" class="px-2 py-4" width="5%">DETAILS</th>
                                    <th scope="col" class="px-2 py-4" width="5%">EDIT</th>
                                    <th scope="col" class="px-2 py-4" width="5%">DELETE</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                            @if(!empty($studentPayments))
                            @forelse($studentPayments as $payment)
                                <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-slate-900">
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$loop->iteration}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{$payment->title}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $payment->year->year }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>{{ $payment->term->name }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>Kshs:{{ number_format($payment->amount,2) }}</div>
                                    </td>
                                    @can('seniorAccountant')
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="items-center justify-center">
                                            <a href="{{ route('accountant.payments.edit',$payment->id)}}" class="bg-[#fe7639] px-2 text-white rounded">
                                                Edit
                                            </a>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="items-center justify-center">
                                            <form action="{{ route('accountant.payments.destroy',$payment->id)}}" method="POST">
                                                {{method_field('DELETE')}}
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">  
                                                <button type="submit" class="bg-red-800 text-white px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete {{$payment->title}}?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    @endcan
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div>Kshs:{{ number_format($payment->paid,2) }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        <div class="text-[red]">Kshs:{{ number_format($payment->balance,2) }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if($payment->amount > $payment->paid)
                                        <div class="bg-[red] text-white px-2 mx-auto">
                                            <a type="button" href="{{ route('accountant.payments.show', $payment->id) }}" class="animate-ping font-bold">
                                            {{ __('PENDING') }}
                                            </a>
                                        </div>
                                        @else
                                        <div class="bg-green-800 text-white px-2 mx-auto font-bold">
                                            {{ __('CLEARED') }}
                                        </div>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if(!empty($payment->payment_records))
                                        @forelse($payment->payment_records as $paymentRecord)
                                        <div class="bg-green-800 text-white px-2 mx-auto mt-2">
                                            Kshs:{{ number_format($paymentRecord->amount_paid,2) }}
                                        </div>
                                        @empty
                                        <div class="bg-red-700 text-white px-2 mx-auto mt-2">
                                            Kshs:{{ number_format($payment->paid,2) }}
                                        </div>
                                        @endforelse
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4 justify-center">
                                        @if(!empty($payment->payment_records))
                                        @forelse($payment->payment_records as $paymentRecord)
                                        <div class="bg-inherit px-2 mx-auto mt-2">
                                            <a href="{{ route('accountant.download.receipt',$paymentRecord->id)}}">
                                                {{ $paymentRecord->ref_no }}
                                            </a>
                                        </div>
                                        @empty
                                        <div>{{ ("-------------") }}</div>
                                        @endforelse
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4 justify-center">
                                        @if(!empty($payment->payment_records))
                                        @forelse($payment->payment_records as $paymentRecord)
                                        <div class="bg-red-700 text-white px-2 mx-auto mt-2">
                                            Kshs:{{ number_format($paymentRecord->balance,2) }}
                                        </div>
                                        @empty
                                        <div class="bg-red-700 text-white px-2 mx-auto mt-2">
                                            Kshs:{{ number_format($payment->balance,2) }}
                                        </div>
                                        @endforelse
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4 justify-center">
                                        @if(!empty($payment->payment_records))
                                        @forelse($payment->payment_records as $paymentRecord)
                                        <div class="bg-blue-500 px-2 text-white rounded mx-auto mt-2">
                                            <a type="button" href="{{ route('accountant.paymentrecords.show',$paymentRecord->id) }}" class="px-4">
                                                Details
                                            </a>
                                        </div>
                                        @empty
                                        <div>{{ __('------------')}}</div>
                                        @endforelse
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if(!empty($payment->payment_records))
                                        @forelse($payment->payment_records as $paymentRecord)
                                        <div class="bg-yellow-700 px-2 text-white rounded mx-auto mt-2 items-center justify-center">
                                            <a type="button" href="{{ route('accountant.paymentrecords.edit',$paymentRecord->id) }}" class="px-4">
                                                Edit
                                            </a>
                                        </div>
                                        @empty
                                        <div>{{ __('------------')}}</div>
                                        @endforelse
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-2 py-4">
                                        @if(!empty($payment->payment_records))
                                        @forelse($payment->payment_records as $paymentRecord)
                                        <div class="items-center justify-center mx-auto mt-2">
                                            <form action="{{ route('accountant.paymentrecords.destroy',$paymentRecord->id) }}" method="POST">
                                                {{method_field('DELETE')}}
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <button type="submit" class="bg-red-800 text-white px-2 inline-flex mx-0.5 rounded" onclick="return confirm('Are you sure to delete {{$paymentRecord->amount_paid}}?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                        @empty
                                        <div>{{ __('------------')}}</div>
                                        @endforelse
                                        @endif
                                    </td>
                            @empty
                                    <td colspan="16" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-[#3a3a3f] dark:text-slate-400">
                                        {{ $student->full_name }} {{ __('Payments Notyet Initiated') }}
                                    </td>
                                </tr>
                            @endforelse
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @can('seniorAccountant')
        <div class="w-full mt-4 md:p-8">
            <div><h3 class="uppercase text-center text-lg font-bold mb-4 underline">{{ __('Add Payment') }}</h3></div>
            <div>
                <form action="{{ route('accountant.payments.store') }}" method="POST" class="p-4 dark:bg-gray-900 border-2 border-black dark:text-slate-600 dark:border-2 dark:border-white" enctype="multipart/form-data">
                    @include('ext._csrfdiv')
                    <input type="hidden" name="student" id="student" class="form-control" value="{{ $student->id }}">
                    <div class="flex flex-col md:flex-row gap-4 mb-4">
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" >Payment Title</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="text" name="title" id="title" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('title') }}" placeholder="Title">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" >Payment Description</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="text" name="description" id="description" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('description') }}" placeholder="Description">
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row gap-4 mb-4">
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" >Payment Amount</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="text" name="amount" id="amount" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('amount') }}" placeholder="Amount">
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" >Refrence Number</label>
                            <div class="flex-1 relative mb-4 flex flex-wrap items-stretch md:mr-32">
                                <input type="text" name="ref_no" id="ref_no" class="relative m-0 -mr-0.5 block w-[1px] min-w-0 flex-auto rounded-l border border-solid border-neutral-300 bg-transparent bg-clip-padding px-3 py-[0.25rem] text-base font-normal leading-[1.6] text-neutral-700 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary" value="{{ old('ref_no') }}" placeholder="Reference Number">
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col md:flex-row gap-4 mb-4">
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" >Select Year</label>
                            <div class="flex-1 flex-wrap items-stretch md:mr-32">
                                @include('ext._attach_yeardiv')
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2">
                            <label class="" >Select Term</label>
                            <div class="flex-1 flex-wrap items-stretch md:mr-32">
                                @include('ext._attach_termdiv')
                            </div>
                        </div>
                    </div>
                    @include('ext._submit_create_button')
                </form>
            </div>
        </div>
        @endcan
    </div>
  </x-frontend-main>
@endsection





