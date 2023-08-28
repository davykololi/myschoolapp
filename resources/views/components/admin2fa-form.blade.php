                        @csrf 
                        <x-2fa-code/>
                        <div class="mb-4 text-left">
                            <div class="">
                                <a class="users-2fa-code-resend-link" href="{{ route('admin.2fa.resend') }}">Resend Code?</a>
                            </div>
                        </div>
                        <x-2fa-button/>