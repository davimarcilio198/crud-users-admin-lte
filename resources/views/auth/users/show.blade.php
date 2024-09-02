@extends('layouts.app')

@section('content')
    <div class="mx-auto flex flex-col justify-center items-center w-full py-12 ">

        <form class="w-full">
            <x-adminlte-input name="iLabel" disabled value="{{ $user->name }}" label="Nome" placeholder="Fulano de tal"
                fgroup-class="col-md-6" disable-feedback />
            <x-adminlte-input name="iLabel" disabled value="{{ $user->email }}" type="email" label="Email"
                placeholder="@gmail.com" fgroup-class="col-md-6" disable-feedback />
            <x-adminlte-input name="iLabel" disabled value="{{ $user->created_at }}" type="datetime"
                label="Data de criação" placeholder="__/__/____" fgroup-class="col-md-6" disable-feedback />
        </form>

        @if ('is-admin' && $user->id !== auth('')->user()->id)
            <form action="{{ Route('user.destroy', $user->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="bg-red-500 text-white rounded-md py-1 px-2" type="submit">Apagar</button>
            </form>
        @endif


    </div>
@endsection
