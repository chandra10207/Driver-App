<x-layout>
  <div class="my-5">
      <h1 class="text-4xl mb-5  ">{{ $title }}</h1>
      @if(count($vehicles) > 0)
      <table class="table-auto border-separate border-spacing-2 border border-slate-400">
          <thead>
              <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>AgiDrive</th>
                  <th></th>
              </tr>
          </thead>
          <tbody>
              @foreach ($vehicles as $vehicle)
              <tr>
                <td class="p-3 border border-slate-300 ...">{{ $vehicle['id'] }}</td>
                <td class="p-3 border border-slate-300 ...">{{ $vehicle['name'] }}</td>
                <td class="p-3 border border-slate-300 ...">{{ $vehicle['is_agidrive'] }}</td>
                <td class="p-3 border border-slate-300 ...">
                    <a class="mr-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="/vehicle/{{$vehicle['id']}}/log_count"> Log Count </a> 
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="/vehicle/{{$vehicle['id']}}/last_info"> Last Info </a> 
                </td>
              </tr>
              @endforeach
          </tbody>
      </table>
      @else
      <p>No vehicles found</p>
      @endif
  </div>
</x-layout>