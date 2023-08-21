                        @csrf 
                        <x-2fa-code/>
                        <div class="mb-4 text-center">
                            <div class="">
                                <a class="text-white" href="{{ route('teacher.2fa.resend') }}">Resend Code?</a>
                            </div>
                        </div>
                        <x-2fa-button/>