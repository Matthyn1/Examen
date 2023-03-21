<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>
{{--Oude code dat voor nu wordt gebruikt in de testomgeving--}}

{{--    <x-sidebar.dropdown--}}
{{--        title="Buttons"--}}
{{--        :active="Str::startsWith(request()->route()->uri(), 'buttons')"--}}
{{--    >--}}
{{--        <x-slot name="icon">--}}
{{--            <x-heroicon-o-view-grid class="flex-shrink-0 w-6 h-6" aria-hidden="true" />--}}
{{--        </x-slot>--}}

{{--        <x-sidebar.sublink--}}
{{--            title="Text button"--}}
{{--            href="{{ route('buttons.text') }}"--}}
{{--            :active="request()->routeIs('buttons.text')"--}}
{{--        />--}}
{{--        <x-sidebar.sublink--}}
{{--            title="Icon button"--}}
{{--            href="{{ route('buttons.icon') }}"--}}
{{--            :active="request()->routeIs('buttons.icon')"--}}
{{--        />--}}
{{--        <x-sidebar.sublink--}}
{{--            title="Text with icon"--}}
{{--            href="{{ route('buttons.text-icon') }}"--}}
{{--            :active="request()->routeIs('buttons.text-icon')"--}}
{{--        />--}}
{{--    </x-sidebar.dropdown>--}}

    <div
        x-transition
        x-show="isSidebarOpen || isSidebarHovered"
        class="text-sm text-gray-500"
    >
        Dummy Links
    </div>
{{--    With @can we are defining what roles can see what buttons/functions--}}
    @canany(['admin', 'appbeheer'])
    <x-sidebar.link             title="Onderhoud"
                                href="{{ route('parts.index') }}"
                                :active="request()->routeIs('parts.index')"  />
    @endcan
@canany(['inname', 'appbeheer'])
    <x-sidebar.link             title="Inname"
                                href="{{ route('buttons.icon') }}"
                                :active="request()->routeIs('buttons.icon')"  />
    @endcan
    @canany(['verwerking', 'appbeheer'])
    <x-sidebar.link             title="Verwerking"
                                href="{{ route('buttons.text-icon') }}"
                                :active="request()->routeIs('buttons.text-icon')"  />
    @endcan

        @canany(['uitgifte', 'appbeheer'])
    <x-sidebar.link             title="Uitgifte"
                                href="{{ route('issues.index') }}"
                                :active="request()->routeIs('Issues.index')"  />
        @endcan

            @cannot('admin')
    <x-sidebar.link             title="Rapportage"
                                href="{{ route('rapportage') }}"
                                :active="request()->routeIs('rapportage')"  />
            @endcan
    @can('admin')
    <x-sidebar.link             title="Gebruikers-Beheer"
                                href="{{ route('buttons.text-icon') }}"
                                :active="request()->routeIs('buttons.text-icon')"  />
    @endcan

</x-perfect-scrollbar>
