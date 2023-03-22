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
            <th>Prijs per Kg €</th>
            <th>Opslag in Kg</th>
            <th>Actie</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($parts as $part)
            <tr>
                <form id="Onderdelen_bewerken_verwijderen" method="POST" action="/parts/{{ $part->id }}" onsubmit="return showConfirmationEdit();">
                    @csrf
                    @method('PUT')
                    <td><input type="text" name="name" value="{{ $part->name }}"></td>
                    <td><input type="text" name="description" value="{{ $part->description }}"></td>
                    <td><input type="text" name="PricePerKg" value="{{ $part->PricePerKg }}"></td>
                    <td><input type="text" name="StashKg" value="{{ $part->StashKg }}"></td>
                    <td class="bg-green-400 rounded-3xl">
                        <button type="submit" >Bewerken</button>
                    </td>
                    <td class="bg-yellow-400 rounded-3xl">
                        <a href="{{ route('parts.index') }}">Terugzetten</a>
                    </td>
                </form>
                <form action="{{ route('parts.destroy', $part->id) }}" method="POST" onsubmit="return showConfirmationDelete();">
                    @csrf
                    <td class="bg-red-400 rounded-3xl">
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Verwijderen</button>
                    <td>
                </form>

        @endforeach
        <tr>
            <form id="Onderdelen_toevoegen" action="{{ route('parts.store') }}" method="POST" onsubmit="return showConfirmation();">
                @csrf
                <td><input type="text" name="name" class="form-control" placeholder="Naam"></td>
                <td><input type="text" name="description" class="form-control" placeholder="Omschrijving"></td>
                <td><input type="number" name="PricePerKg" class="form-control" placeholder="Prijs per kilo"></td>
                <td><input type="number" name="StashKg" class="form-control" placeholder="Opslag in kilo"> </td>
                <td class="bg-green-400 rounded-3xl">
                    <button id="toevoegen" >Toevoegen</button>
                </td>
                <td class="bg-yellow-400 rounded-3xl">
                     <a href="{{ route('parts.store') }}" > Terugzetten <a>
                </td>
            </form>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        </tbody>
    </table>



        <label for="afdrukken">Afdrukken:</label>
    <a href="{{ url('parts/export') }}">Printen</a>


    <script>
        function showConfirmation() {
            return confirm('Weet je zeker dat je alles hebt ingevuld?');
        }

        function showConfirmationEdit() {
            return confirm('Weet je zeker dat je de juiste gegevens hebt Gewijzigd?');
        }
        function showConfirmationDelete() {
            return confirm('Weet je zeker dat je de juiste kolom hebt geselecteerd en wilt verwijderen?');
        }
    </script>
</x-app-layout>

