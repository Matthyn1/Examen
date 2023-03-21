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

    <div>
    <form method="POST" action="/onderdelen">
        @csrf

        <label for="toevoegen">Onderdeel toevoegen:</label>
        <input type="text" id="toevoegen" name="toevoegen">

        <label for="wijzigen">Onderdeel wijzigen:</label>
        <input type="text" id="wijzigen" name="wijzigen">

        <label for="verwijderen">Onderdeel verwijderen:</label>
        <select id="verwijderen" name="verwijderen">
            @foreach($parts as $part)
                <option value="{{ $part->id }}">{{ $part->name }}</option>
            @endforeach
        </select>

        <label for="afdrukken">Afdrukken:</label>
        <input type="checkbox" id="afdrukken" name="afdrukken" value="1">

        <button type="submit">Verzenden</button>
    </form>
    </div>
</x-app-layout>
