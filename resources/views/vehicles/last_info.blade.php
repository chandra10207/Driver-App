<x-layout>
    <div class="my-5">
        <h1 class="text-4xl mb-5  ">{{ $title }}</h1>
        @if(!empty($vehicle_agi_log))
        <table class="table-auto border-separate border-spacing-2 border border-slate-400">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Local Time</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Location</th>
                    <th>Speed</th>
                    <th>Direction</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="p-3 border border-slate-300">{{ $vehicle_id }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_name }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_agi_log->local_time }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_agi_log->lat }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_agi_log->lng }}</td>
                    <td class="p-3 border border-slate-300">{{ $location }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_agi_log->speed }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_agi_log->direction }}</td>
                </tr>
            </tbody>
        </table>
        @else
        <p>No vehicles log found</p>
        @endif
    </div>
</x-layout>