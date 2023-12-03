<x-accountant>
  <!-- frontend-main view -->
  <x-frontend-main>
<div class="w-full">
    <div class="row">
        <div class="col-md-12 margin-tb">
            <div class="pull-left">
                <h2 style="text-transform: uppercase;">My Profile</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img style="width:15%" src="/storage/storage/{{ Auth::user()->image }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{$accountant->full_name}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position:</strong>
                @if($accountant->role === 'senioraccountant')
                {{ __('Senior Accountant') }}
                @elseif($accountant->role === 'deputysenioraccountant')
                {{ __('Deputy Senior Accountant') }}
                @elseif($accountant->role === 'accountsauditor')
                {{ __('Accounts Auditor') }}
                @else($accountant->role === 'ordinaryaccountant')
                {{ __('Ordinary Accountant') }}
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $accountant->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DOB:</strong>
                {{ $accountant->dob }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <strong>Age:</strong>
            
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Postal Address:</strong>
                {{ $accountant->address }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>History:</strong>
                {!! $accountant->history !!}
            </div>
        </div>
    </div>
</div>
</x-frontend-main>
</x-accountant>
