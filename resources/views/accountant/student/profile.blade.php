@extends('layouts.accountant')
@section('title', '| Student Accounts Profile')

@section('content')
<!-- frontend-main view -->
<x-frontend-main>
@role('accountant')
<div class="max-w-screen h-fit md:min-h-screen lg:min-h-screen mb-8">
    <div class="w-full">
        <div class="mx-2 md:mx-8 lg:mx-8">
            <div>
                <div class="mt-4">
                    <h2 class="uppercase text-center font-bold text-lg dark:text-slate-400">
                        {{ $student->user->full_name }} Accounts Profile
                    </h2>
                </div>
                <div class="w-full">
                    @include('partials.messages')
                    @include('partials.errors')
                </div>
            </div>

            <div><h3 class="uppercase text-center text-lg font-bold underline mt-4 -mb-6">{{ __('Personal Details') }}</h3></div>
            <!-- User Card -->
            <div class="pt-4 -mb-4">
                <div class="mx-2 md:mx-8 lg:mx-8 py-4">
                    <div class="flex flex-col md:flex-row lg:flex-row border rounded-lg">
                        <div class="w-full md:w-1/2 lg:w-1/2 md:rounded-l md:py-4 lg:py-4 flex-wrap">
                            <div class="mx-2 md:mx-auto">
                                <div class="mx-auto md:mx-4">
                                    @if($student->gender === "Male")
                                    <img class="w-64 h-64 md:hover:scale-150 border border-4 border-gray-700" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'" alt="{{ $student->user->full_name  }}">
                                    @elseif($student->gender === "Female")
                                    <img class="w-64 h-64 md:hover:scale-150 border-8 border-yellow-800 p-4" src="{{ $student->image_url }}" onerror="this.src='{{asset('static/female_avatar.png')}}'" alt="{{ $student->user->full_name  }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="w-full md:w-1/2 lg:w-1/2 md:rounded-r md:py-4 lg:py-4">
                            <div class="card-footer">
                                <div class="mx-2 md:mx-4">
                                    <div>
                                        <p>Adm No: {{ $student->admission_no  }}</p>
                                        <p>Stream: {{ $student->stream->name }}</p>
                                        <p>Intake: {{ $student->getAdmissionMonth() }} Intake</p>
                                        <p>DOA: {{ $student->getDoa() }}</p>
                                        <p class="text-[red]">Bal: Kshs: {{ number_format($student->fee_balance,2) }}</p>
                                        <p>
                                            @if($student->total_payment_amount > $student->paid_amount)
                                            Clearance: 
                                            <span class="bg-[red] text-white px-4 py-0.5 mx-auto my-4 animate-pulse">
                                                Status: {{ __('Pending')}}
                                            </span>
                                            @elseif($student->payments->isEmpty())
                                            <span class="bg-[red] text-white px-4 py-2 mx-auto mt-4 rounded">
                                                Status: {{ __('Payments Notyet Assigned To ') }} {{ $student->user->full_name }}
                                            </span>
                                            @else
                                            <span class="bg-[green] text-white px-4 mx-auto mt-2 rounded">
                                                Status: {{ __('Cleared')}}
                                            </span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of user card -->

            @can('seniorAccountant')
            @if($student->payment_locked ==='false') <!-- Start if payment switch is locked or not -->
            <div class="md:mx-8 mt-8">
                <button class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] mb-2" type="button" data-te-collapse-init
                data-te-ripple-init data-te-ripple-color="light" data-te-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Payment Details
                </button>
                <div class="!visible hidden" id="collapseExample" data-te-collapse-item>
                    <div class="w-full md:w-1/4 lg:w-1/4 block rounded-lg bg-[#202C4B] p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] text-white dark:bg-[#32302f] dark:text-slate-400">
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
                                <span class="bg-green-800 text-white px-2 mx-auto mt-2 ml-2 rounded"> {{ __('CLEARED')}}</span>
                                @endif
                            </p>
                            @elseif($studentPayments->isEmpty())
                            <p>{{ __('The payments for this student notyet initiated.') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif <!-- End if payment switch is locked or not -->
            @endcan

            <div class="w-full mt-8">
                <h3 class="uppercase text-lg text-center font-bold underline">{{ __('Payment Details Table')}}</h3>
            </div>
            <div class="flex flex-col overflow-x-auto md:mx-8">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto">
                            <table class=" text-left text-sm font-light bg-transparent w-full mx-auto justify-evenly">
                                <!-- Table Headings -->
                                <thead class="border-b bg-neutral-800 font-medium text-white dark:border-neutral-500 flex-grow dark:text-slate-400 dark:bg-black">
                                    <tr>
                                        <th scope="col" class="px-2 py-4" width="5%">NO</th>
                                        <th scope="col" class="px-2 py-4" width="10%">TITLE</th>
                                        <th scope="col" class="px-2 py-4" width="5%">YEAR</th>
                                        <th scope="col" class="px-2 py-4" width="15%">TERM</th>
                                        <th scope="col" class="px-2 py-4" width="10%">AMOUNT</th>
                                        @can('seniorAccountant')
                                        @if($student->payment_locked === 'false')
                                        <th scope="col" class="px-2 py-4" width="5%">EDIT</th>
                                        <th scope="col" class="px-2 py-4" width="5%">DELETE</th>
                                        @endif
                                        @endcan
                                        <th scope="col" class="px-2 py-4" width="5%">PAID</th>
                                        <th scope="col" class="px-2 py-4" width="10%">BALANCE</th>
                                        <th scope="col" class="px-2 py-4" width="5%">STATUS</th>
                                        <th scope="col" class="px-2 py-4" width="5%">PAID DETAILS</th>
                                        <th scope="col" class="px-2 py-4" width="10%">RECEIPT</th>
                                        <th scope="col" class="px-2 py-4" width="5%">BAL DETAILS</th>
                                        @can('seniorAccountant')
                                        <th scope="col" class="px-2 py-4" width="5%">DELETE</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @if($studentPayments->isNotEmpty())
                                    @foreach($studentPayments as $payment)
                                    <tr class="border-b dark:border-neutral-500 dark:text-slate-400 dark:bg-gray-800">
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $loop->iteration }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $payment->payment_section->name }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>{{ $payment->year->year }}</div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($payment->terms->isNotEmpty())
                                            @forelse($payment->terms as $term)
                                            <div>{{ $term->name }}</div>
                                            @empty
                                            <div>{{ (__('----------')) }}</div>
                                            @endforelse
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div>Kshs:{{ number_format($payment->amount,2) }}</div>
                                        </td>
                                        @can('seniorAccountant')
                                        @if($payment->student->payment_locked === 'false')
                                        <td class="whitespace-nowrap p-2">
                                            <div class="items-center justify-center">
                                                <a href="{{ route('accountant.payments.edit',$payment->id)}}" class="bg-[#fe7639] px-2 text-white rounded">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                        @endif

                                        @if($payment->student->payment_locked === 'false')
                                        <td class="whitespace-nowrap p-2">
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
                                        @endif
                                        @endcan
                                        <td class="whitespace-nowrap p-2">
                                            <div class="text-white dark:text-slate-400">
                                                Kshs:{{ number_format($payment->paid,2) }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            <div class="text-[red]">
                                                Kshs:{{ number_format($payment->balance,2) }}
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if($payment->amount > $payment->paid)
                                            <div class="bg-[red] text-white px-2 mx-auto">
                                                <a type="button" href="{{ route('accountant.make.payment', $payment->id) }}" class="animate-ping font-bold">
                                                    {{ __('PENDING') }}
                                                </a>
                                            </div>
                                            @else
                                            <div class="bg-green-800 text-white px-2 mx-auto font-bold">
                                                {{ __('CLEARED') }}
                                            </div>
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if(!empty($payment->payment_records))
                                            @forelse($payment->payment_records as $paymentRecord)
                                            <div class="bg-green-800 text-white px-2 mx-auto mt-1">
                                                Kshs:{{ number_format($paymentRecord->amount_paid,2) }}
                                            </div>
                                            @empty
                                            <div class="bg-red-700 text-white px-2 mx-auto mt-1">
                                                Kshs:{{ number_format($payment->paid,2) }}
                                            </div>
                                            @endforelse
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2">
                                            @if(!empty($payment->payment_records))
                                            @forelse($payment->payment_records as $paymentRecord)
                                            <div class="bg-black text-white px-2 mx-auto mt-1 rounded-md">
                                                <a href="{{ route('accountant.download.receipt',$paymentRecord->id)}}" class="px-4">
                                                    {{ __('Receipt') }}
                                                </a>
                                            </div>
                                            @empty
                                            <div>{{ ("-------------") }}</div>
                                            @endforelse
                                            @endif
                                        </td>
                                        <td class="whitespace-nowrap p-2 justify-center">
                                            @if(!empty($payment->payment_records))
                                            @forelse($payment->payment_records as $paymentRecord)
                                            @if($loop->last)
                                            <div class="bg-red-700 text-white px-2 mx-auto mt-1">
                                                Kshs:{{ number_format($paymentRecord->balance,2) }}
                                            </div>
                                            @endif
                                            @empty
                                            <div class="bg-red-700 text-white px-2 mx-auto mt-1">
                                                Kshs:{{ number_format($payment->balance,2) }}
                                            </div>
                                            @endforelse
                                            @endif
                                        </td>
                                        @can('seniorAccountant')
                                        <td class="whitespace-nowrap p-2">
                                            @if(!empty($payment->payment_records))
                                            @forelse($payment->payment_records as $paymentRecord)
                                            <div class="items-center justify-center mx-auto mt-1">
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
                                        @endcan
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    @if($studentPayments->isEmpty())
                                    <tr>
                                        <td colspan="16" class="w-full text-center text-white bg-red-700 uppercase tracking-tighter h-12 dark:bg-[#3a3a3f] dark:text-slate-400">
                                            {{ $student->user->full_name }} {{ __('Payments Notyet Initiated') }}
                                        </td>
                                    </tr>
                                    @endif

                                    @if($studentPayments->isNotEmpty())
                                    <tr class="bg-black">
                                        <td>
                                            <p class="ml-2 py-2">#</p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">#</p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">#</p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">#</p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">
                                                Kshs:{{ number_format($student->total_payment_amount,2) }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">
                                                Kshs:{{ number_format($student->paid_amount,2) }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">
                                                Kshs:{{ number_format($student->fee_balance,2) }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">#</p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">
                                                Kshs:{{ number_format($student->paid_amount,2) }}
                                            </p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">#</p>
                                        </td>
                                        <td>
                                            <p class="ml-2 py-2">
                                                Kshs:{{ number_format($student->fee_balance,2) }}
                                            </p>
                                        </td>
                                        <td>
                                            @can('seniorAccountant')
                                            <p class="ml-2 py-2">#</p>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full"><hr class="mt-8 mx-8"/></div>

            @can('seniorAccountant')
            <div class="w-full mt-4 md:p-8">
                @if($student->payment_locked === 0)
                <button class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] mb-2" type="button" data-te-collapse-init
                data-te-ripple-init data-te-ripple-color="light" data-te-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Add Payment
                </button>
                <div class="!visible hidden" id="collapseExample" data-te-collapse-item>
                    <div><h3 class="uppercase text-center text-lg font-bold mb-4 underline">{{ __('Add Payment') }}</h3></div>
                    <div>
                        <form action="{{ route('accountant.payments.store') }}" method="POST" class="shadowed-border-payment" enctype="multipart/form-data">
                            @include('ext._csrfdiv')
                            <input type="hidden" name="student" id="student" class="form-control" value="{{ $student->id }}">
                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Payment Category</label>
                                    <div class="w-full block">
                                        @include('ext._payment_section')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Year</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_yeardiv')
                                    </div>
                                </div>
                                <div class="w-full md:w-1/3 lg:w-1/3">
                                    <label class="label-one" >Term</label>
                                    <div class="input-div-two">
                                        @include('ext._attach_termdiv')
                                    </div>
                                </div>
                            </div>
                            @include('ext._submit_create_button')
                        </form>
                    </div>
                </div>
                @endif <!-- end if payment locked -->
            </div>
            @endcan
        </div>
    </div>
</div>
@endrole
</x-frontend-main>
@endsection





