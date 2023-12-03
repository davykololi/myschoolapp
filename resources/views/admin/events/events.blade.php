 <x-admin>
  <!-- frontend-main view -->
  <x-backend-main>
 <div class="container mt-5" style="max-width: 700px;">
      <h2 class="h2 text-center mb-5 border-bottom pb-3 uppercase">{{ Auth::user()->school->name }} Events</h2>
      <div class="bg-blue-300 p-4 mx-auto md:rounded dark:bg-[#1a1919] dark:text-slate-400 dark:border-2 dark:border-slate-600" id='calendar'></div>
</div>
</x-backend-main>
</x-admin>

