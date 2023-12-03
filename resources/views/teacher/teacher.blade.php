<x-teacher>
    <!-- frontend-main view -->
    <x-frontend-main>
            <div class="container ">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">Teacher Dashboard</div>

                            <div class="panel-body">
                                You are logged in as a Teacher! Welcome {{ Auth::user()->salutation }} {{Auth::user()->first_name}}
                            </div>

                            <label class="swap swap-flip text-9xl mt-12">
                                <!-- this hidden checkbox controls the state -->
                                <input type="checkbox"/>
                                <div class="swap-on">😈</div>
                                <div class="swap-off">😇</div>
                            </label>

                            <div class="avatar">
  <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
    <img src="{{ asset('/static/avatarb.jpg')}}" />
  </div>
</div>





                        </div>
                    </div>
                </div>
            </div>
    </x-frontend-main>
</x-teacher>
