@extends('layouts.app')

@section('content')
    <div class="mx-auto flex flex-col justify-center items-center w-full py-12 ">
        <table class="w-full">
            <thead class=" gap-5 mx-auto sm:px-6 lg:px-8 bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                <th class="p-2 text-gray-900 ">Nome</th>
                <th class="p-2 text-gray-900 ">Email</th>
                <th class="p-2 text-gray-900 ">Ações</th>
            </thead>
            <tbody>


                @forelse ($users as $item)
                    <tr
                        class=" gap-5 mx-auto sm:px-6 lg:px-8 bg-white  even:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                        <td class="px-2 p-6 text-gray-900 ">{{ $item->name }}</td>
                        <td class="px-2 p-6 text-gray-900 ">{{ $item->email }}</td>
                        <td class="px-2 p-6 text-gray-900 ">
                            {{-- <a class="border-b" href="{{ route('users.edit', $item) }}">Editar</a> --}}
                            <a href="{{ route('user.show', $item->id) }}"
                                class="bg-blue-600 p-1 rounded-md hover:opacity-90" type="button">
                                <x-lucide-eye class="w-6 h-6 text-white" />
                            </a>
                            <a href="{{ route('user.edit', $item->id) }}"
                                class="bg-yellow-600 p-1 rounded-md hover:opacity-90" type="button">
                                <x-lucide-pencil class="w-6 h-6 text-white" />
                            </a>
                            {{-- <a class="border-b" >Detalhes</a> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100">Nenhum usuário no banco</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
