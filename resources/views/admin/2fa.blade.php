@extends('layouts.frontend')
  
@section('content')
  <!-- frontend-main view -->
  <x-auth-card>
    <div class="pt-2 px-4 text-center">
      <h1 class="font-extrabold text-white justify-center">ENTER AND SUBMIT THE CODE</h1>
      <x-2fa-mail-message/>
      @include('partials.errors')
    </div>
    <div class="flex w-auto justify-center py-10 items-center">
      <form method="POST" action="{{ route('admin.2fa.store') }}">
        <x-admin2fa-form/>
      </form>
    </div>
    <div class="flex w-auto justify-center py-10 items-center">
        <a href="{{ route('admin.2fa.resend') }}" class="inline-block align-baseline font-bold text-sm text-teal-500 hover:text-teal-800 ml-4">
          Resend Code
        </a>
    </div>
  </x-auth-card>
@endsection

<script>
document.addEventListener("DOMContentLoaded", function(event) {

function OTPInput() {
const inputs = document.querySelectorAll('#otp > *[id]');
for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput(); });
</script>
