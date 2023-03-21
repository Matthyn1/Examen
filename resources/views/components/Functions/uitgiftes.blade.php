<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('uitgiftes') }}
            </h2>
        </div>
        <table>
            <thead>
            <tr>
                <th>Medewerker</th>
                <th>Onderdeel</th>
                <th>Datum</th>
                <th>Gewicht</th>
                <th>Prijs</th>
                <th>Actie</th>
            </tr>
            </thead>
            <tbody>
            @foreach($issues as $issue)
                <tr>
                    <form method="POST" action="/issues/{{ $issue->id }}">
                        @csrf
                        @method('PUT')
                        <td><select name="user_id>
                                @foreach(App\Models\User::all() as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select></td>
                        <td>
                            <select name="parts_id">
                                @foreach(App\Models\parts::all() as $parts)
                                    <option value="{{ $parts->id }}">{{ $parts->name }}</option>
                                @endforeach
                            </select></td>
                        <td><input type="text" name="Datum" value="{{ $issue->Time }}"></td>
                        <td><input type="text" name="PricePerKg" value="{{ $issue->WeightKg }} Kg"></td>
                        <td><input type="text" name="StashKg" value="€ {{ $issue->Price }}"></td>
                        <td>
                            <button type="submit">Bijwerken</button>
                        </td>
                        <td>
                            <a href="{{ route('issues.index') }}">Annuleren</a>
                        </td>
                    </form>
                    <form action="{{ route('issues.destroy', $issue->id) }}" method="POST">
                        @csrf
                        <td>
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        <td>
                    </form>
            @endforeach
            <tr>
                <form action="{{ route('issues.store') }}" method="POST">
                    @csrf
                    <td><select name="user_id">
                            @foreach(App\Models\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select></td>
                    <td>
                    <select name="parts_id">
                        @foreach(App\Models\parts::all() as $parts)
                            <option value="{{ $parts->id }}">{{ $parts->name }}</option>
                        @endforeach
                    </select></td>
                    <td><input type="datetime-local" name="datetime"></td>
                    <td><input type="number" name="Weight" class="form-control" placeholder="Gewicht"></td>
                    <td><input type="number" name="Price" class="form-control" placeholder="Prijs"> </td>
                    <td>
                        <button type="submit">Toevoegen</button>
                    </td>
                </form>
            </tbody>
        </table>
    </x-slot>
</x-app-layout>
