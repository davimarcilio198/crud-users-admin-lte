@extends('layouts.app')

@section('content')
    <div class="mx-auto flex flex-col justify-center items-center w-full py-12 ">
        <form action="{{ Route('user.store') }}" method="POST" class="w-full">
            @csrf()
            <x-adminlte-input enable-old-support error-key="name" name="name" value="" label="Nome"
                placeholder="Fulano de tal" fgroup-class="col-md-6" disable-feedback />
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <x-adminlte-input name="email" error-key="email" enable-old-support value="" type="email"
                label="Email" placeholder="@gmail.com" fgroup-class="col-md-6" disable-feedback />
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <x-adminlte-input name="password" type="password" error-key="password" value="" label="Senha"
                placeholder="***********" fgroup-class="col-md-6" disable-feedback />
            @error('password')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
            <x-adminlte-input name="password_confirmation" error-key="password_confirmation" type="password" value=""
                label="Confirmar Senha" placeholder="***********" fgroup-class="col-md-6" disable-feedback />
            @error('password_confirmation')
                <p class="text-red-500">{{ $message }}</p>
            @enderror

            <button class=" text-white rounded-md !bg-emerald-600 py-1 px-2" type="submit">Criar usuário</button>
        </form>



    </div>
@endsection
