<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Onderdelen') }}
            </h2>
        </div>
    </x-slot>
    <div>
        <p>Dit zijn de onderdelen</p>
    </div>
    <table>
        <thead>
        <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Prijs per kg</th>
            <th>Opslag kg</th>
            <th>Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($parts as $part)
            <tr>
                <form method="POST" action="/parts/{{ $part->id }}">
                    @csrf
                    @method('PUT')
                    <td><input type="text" name="name" value="{{ $part->name }}"></td>
                    <td><input type="text" name="description" value="{{ $part->description }}"></td>
                    <td><input type="text" name="PricePerKg" value="€ {{ $part->PricePerKg }}"></td>
                    <td><input type="text" name="StashKg" value="{{ $part->StashKg }} Kg"></td>
                    <td>
                        <button type="submit">Bewerken</button>
                    </td>
                    <td>
                        <a href="{{ route('parts.index') }}">Annuleren</a>
                    </td>
                </form>
                <form action="{{ route('parts.destroy', $part->id) }}" method="POST">
                    @csrf
                    <td>
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Verwijderen</button>
                    <td>
                </form>

        @endforeach
        <tr>
            <form action="{{ route('parts.store') }}" method="POST">
                @csrf
                <td><input type="text" name="name" class="form-control" placeholder="Name"></td>
                <td><input type="text" name="description" class="form-control" placeholder="Description"></td>
                <td><input type="number" name="PricePerKg" class="form-control" placeholder="Price per kg"></td>
                <td><input type="number" name="StashKg" class="form-control" placeholder="Stash Kg"> </td>
                <td>
                    <button type="submit">Toevoegen</button>
                    <a href="{{ route('parts.store') }}">Annuleren</a>
                </td>
            </form>
        </tbody>
    </table>

        <form method="POST" action="/onderdelen">
            @csrf
        <label for="afdrukken">Afdrukken:</label>
        <input type="checkbox" id="afdrukken" name="afdrukken" value="1">
            <button type="submit">Verzenden</button>
        </form>

    </div>
</x-app-layout>
