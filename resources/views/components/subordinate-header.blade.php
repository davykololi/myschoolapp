@if(Auth::user()->hasRole('subordinate'))
<div>
    <x-subordinate-sidebar/>   
</div>
@endif