<x-layout>
    <div class="my-5">
        <h1 class="text-4xl mb-5  ">{{ $title }}</h1>
        @if(count($vehicle_agi_logs) > 0)
        <table class="table-auto border-separate border-spacing-2 border border-slate-400">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Year-Mon</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicle_agi_logs as $vehicle_agi_log)
                <tr>
                    <td class="p-3 border border-slate-300">{{ $vehicle_id }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_name }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_agi_log->year.'-'.$vehicle_agi_log->month }}</td>
                    <td class="p-3 border border-slate-300">{{ $vehicle_agi_log->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p>No vehicles log found</p>
        @endif
    </div>
</x-layout>