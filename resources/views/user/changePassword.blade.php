<!-- Change Password Dashboard -->
@extends('layouts.password')
@section('title', '| Change Password')

@section('content')
@role('teacher')
<x-frontend-main>
    <x-change-password-form/>
</x-frontend-main>
@endrole

@role('accountant')
<x-frontend-main>
    <x-change-password-form/>
</x-frontend-main>
@endrole

@role('student')
<x-frontend-main>
    <x-change-password-form/>
</x-frontend-main>
@endrole

@role('librarian')
<x-frontend-main>
    <x-change-password-form/>
</x-frontend-main>
@endrole

@role('matron')
<x-frontend-main>
    <x-change-password-form/>
</x-frontend-main>
@endrole

@role('admin')
<x-backend-main>
    <x-change-password-form/>
</x-backend-main>
@endrole

@role('superadmin')
<x-backend-main>
    <x-change-password-form/>
</x-backend-main>
@endrole

@role('subordinate')
<x-frontend-main>
    <x-change-password-form/>
</x-frontend-main>
@endrole

@role('parent')
<x-frontend-main>
    <x-change-password-form/>
</x-frontend-main>
@endrole
@endsection
