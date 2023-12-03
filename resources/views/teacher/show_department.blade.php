<x-teacher>
    <!-- frontend-main view -->
    <x-frontend-main>
<div class="max-w-full">
    <div class="row">
        @include('partials.messages')
        <div class="col-md-12 margin-tb">
            <div class="pull-left">
                <h2 style="text-transform: uppercase;">{{ $department->name }}</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('teacher.departments') }}" class="label label-primary pull-right"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
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
                    <li>
                        {{ $meeting->name }} on {{ \Carbon\Carbon::parse($meeting->date)->format('d-m-Y') }}. Agenda: {{ $meeting->agenda }}
                    </li>
                @empty
                <p class="text-red-700">No meeting(s) assigned to {{ $department->name }}.</p>
                @endforelse
                </ol>
            </div>
        </div>

        <div class="max-w-full mt-8">
            <div><h3 class="mb-8 mt-8 uppercase text-center text-2xl">{{ $department->name }} Teachers</h3></div>
        <div class="flex flex-col md:flex-row gap-2">
                @forelse($department->teachers as $teacher)
                <div class="w-full bg-blue-300 md:px-4 py-4 mb-4">
                    <div class="items-center justify-center">
                        <img class=" w-auto md:w-48 h-48 rounded mx-auto" src="{{ $teacher->image_url }}" onerror="this.src='{{asset('static/avatar.png')}}'">
                    </div>
                    <div class="bg-gray-500 p-4 mt-2 rounded text-white">
                        <a href="{{route('teacher.show',$teacher->id)}}">
                    	   {{ $teacher->title }} {{ $teacher->full_name }} {{ $teacher->phone_no }} 
                    	   <span>{{ $teacher->email }}</span>
                        </a> 
                    </div>     
                </div>
                @empty
                <p class="text-red-700">No teachers(s) assigned to {{ $department->name }}.</p>
                @endforelse
        </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>{{ $department->name }} Subordinade Staff(s):</strong>
                <ol>
                @forelse($department->staffs as $staff)
                    <li>{{ $staff->title }} {{ $staff->full_name }} {{ $staff->phone_no }} 
                        <span style="color: blue">{{ $staff->email }}</span>
                    </li>
                @empty
                <p class="text-red-700">No subordinade staff(s) assigned to {{ $department->name }}.</p>
                @endforelse
                </ol>
            </div>
        </div>
</div>
</x-frontend-main>
</x-teacher>
