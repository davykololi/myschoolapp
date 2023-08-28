<x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
<div class="row">
    <div class="col-md-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-transform: uppercase;">{{ $department->school->name }} {{ $department->name }}</h2>
            <br/>
        </div>
        <div style="text-align: center;">
            @include('partials.messages')
            @include('partials.errors')
        </div>
        <div class="flex flex-row" style="float: right">
            <x-back-button/>
            <a href="{{route('admin.dept.teachers',$department->id)}}" class="pdf">
                <x-pdf-svg/>
            </a>
        </div>
    </div>
</div>
<div class="w-full">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Code:</strong>
            {{ $department->code }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Phone No.:</strong>
            {{ $department->phone_no }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Head:</strong>
            {{ $department->head_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assitant Head:</strong>
            {{ $department->asshead_name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Motto:</strong>
            {{ $department->motto }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Vision:</strong>
            {{ $department->vision }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{ $department->name }} Meetings:</strong>
            <ol>
            @forelse($department->meetings as $meeting)
            <a href="{{route('admin.meetings.show',$meeting->id)}}">
                <li>
                    {{$meeting->name}} will be held on {{ $meeting->getDate() }} at {{ $meeting->venue }}. Agenda wiil be {{ $meeting->agenda }}.
                </li>
            </a>
            @empty
            <p style="color: red">No meeting(s) assigned to {{ $department->name }} yet.</p>
            @endforelse
            </ol>
        </div>
    </div>

<!-- Container -->
<div class="container my-8 mx-auto md:px-6">
  <!-- Section: Department Teachers Section -->
  <section class="mb-12 text-center">
    <h2 class="mb-12 text-3xl font-bold underline">
      {{ $department->name }} Teachers
    </h2>
    <div class="lg:gap-xl-12 grid gap-x-3 md:grid-cols-2 lg:grid-cols-3 md:gap-4">
        @forelse($department->teachers as $teacher)
      <div class="mb-12 lg:mb-0 bg-gray-200 py-4 px-2 rounded dark:bg-[#1a1919]  dark:text-slate-400">
        <a href="{{route('admin.teachers.show',$teacher->id)}}">
            <img class="mx-auto mb-6 rounded-lg shadow-lg dark:shadow-black/20 w-[150px]" src="{{ $teacher->image_url }}" alt="{{ $teacher->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'"/>
        </a>
        <a href="{{route('admin.teachers.show',$teacher->id)}}">
            <h5 class="mb-1 text-lg font-bold">{{ $teacher->title }} {{ $teacher->full_name }}</h5>
        </a>
        <p class="mb-1 text-lg font-hairline">{{ $teacher->phone_no }}</p>
        <p class="mb-1 text-lg font-hairline">{{ $teacher->email }}</p>
        <ul class="mx-auto flex list-inside justify-center">
          <a href="#!" class="px-2">
            <!-- GitHub -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
              class="h-4 w-4 text-primary dark:text-primary-400">
              <path fill="currentColor"
                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
            </svg>
          </a>
          <a href="#!" class="px-2">
            <!-- Twitter -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
              class="h-4 w-4 text-primary dark:text-primary-400">
              <path fill="currentColor"
                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
              </svg>
          </a>
          <a href="#!" class="px-2">
            <!-- Linkedin -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
              class="h-3.5 w-3.5 text-primary dark:text-primary-400">
              <path fill="currentColor"
                d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
            </svg>
          </a>
        </ul>
      </div>
      @empty
        <span>No teachers(s) assigned to {{ $department->name }} yet</span>
      @endforelse
    </div>
  </section>
  <!-- Section: End Department Teachers Section -->

<!-- Section: Department Sub Staffs Section -->
  <section class="mb-12 text-center">
    <h2 class="mb-12 text-3xl font-bold underline">
      {{ $department->name }} Sub Staffs
    </h2>
    <div class="lg:gap-xl-12 grid gap-x-3 md:grid-cols-2 lg:grid-cols-4">
        @forelse($department->staffs as $staff)
      <div class="mb-12 lg:mb-0 bg-gray-200 py-4 px-2 rounded dark:bg-[#1a1919]  dark:text-slate-400">
        <img class="mx-auto mb-6 rounded-lg shadow-lg dark:shadow-black/20 w-[150px]" src="{{ $staff->image_url }}" alt="{{ $staff->full_name }}" onerror="this.src='{{asset('static/avatar.png')}}'"/>
        <h5 class="mb-1 text-lg font-bold">{{ $staff->salutation }} {{ $staff->full_name }}</h5>
        <p class="mb-1 text-lg font-hairline">{{ $staff->phone_no }}</p>
        <p class="mb-1 text-lg font-hairline">{{ $staff->email }}</p>
        <ul class="mx-auto flex list-inside justify-center">
          <a href="#!" class="px-2">
            <!-- GitHub -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
              class="h-4 w-4 text-primary dark:text-primary-400">
              <path fill="currentColor"
                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
            </svg>
          </a>
          <a href="#!" class="px-2">
            <!-- Twitter -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
              class="h-4 w-4 text-primary dark:text-primary-400">
              <path fill="currentColor"
                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
              </svg>
          </a>
          <a href="#!" class="px-2">
            <!-- Linkedin -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
              class="h-3.5 w-3.5 text-primary dark:text-primary-400">
              <path fill="currentColor"
                d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
            </svg>
          </a>
        </ul>
      </div>
      @empty
        <span>No sub staff(s) assigned to {{ $department->name }} yet</span>
      @endforelse
    </div>
  </section>
  <!-- Section: End Department Sub Staffs Section -->
</x-backend-main>
</x-admin>
