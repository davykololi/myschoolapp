@extends('layouts.admin')
@section('title', '| Student Info Form')

@section('content')
  <!-- frontend-main view -->
  <x-backend-main>
        <div class="w-full px-4">
            <div>
                <h5 class="text-green-800 uppercase text-2xl font-extrabold">GET STUDENT CLASS BY STUDENT NAME</h5>
                <div class="mt-4 mb-8 w-full text-right px-4 md:px-2">
                <a href="{{ url()->previous() }}" type="button" class="px-6 py-0.5 bg-blue-800 text-white rounded-md border-2 border-white md:hover:bg-blue-500">
                    Back
                </a>
                </div>
            </div>
            <div class="bg-blue-200 rounded-md p-4 border-2 border-green-800 my-4">
                <form action="{{ route('admin.student.class') }}" method="GET" class="p-2" enctype="multipart/form-data">
                   @csrf 
                <div class="w-full flex flex-col md:flex-row">
                    <div class="py-2 w-full md:w-1/3">
                        <label class="text-green-800" >Student Name <span class="text-[red]">***</span></label>
                        @foreach($schoolStudents as $student)
                        <div class="w-full">
                            <input type="text" name="student_name" id="student_name" class="py-1 bg-gray-200 w-full md:w-[220px] rounded-md focus:shadow-outline focus:bg-blue-100 placeholder-indigo-300" placeholder="Student Name">
                        </div>
                        <p>{{ $className }}</p>
                        @endforeach
                        
                    </div>
                    <div>
                        <button type="submit" class="py-0.5 px-4 bg-green-800 text-white border-2 border-white">Get</button>
                    </div>
                </div>
                </form>
            </div>
        </div>            
  </x-backend-main>
</div>  
@endsection






