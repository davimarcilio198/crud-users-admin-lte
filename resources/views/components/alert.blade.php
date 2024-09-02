@if (session()->has('message'))
    <x-adminlte-alert dismissable theme="{{ session('type') }}">
        {{ session('message') }}
    </x-adminlte-alert>
@endif
