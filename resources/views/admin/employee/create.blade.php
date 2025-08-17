@extends('layouts.app')

@section('title', 'Cadastrar Funcionário')

@section('content')

<div class="bg-white shadow-lg rounded-lg p-8 max-w-7xl mx-auto">
    <h1 class="text-2xl font-bold text-gray-800 border-b pb-4 mb-6">
        Cadastrar Funcionário
    </h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <x-employee-form />

        <div class="mt-8 flex items-center justify-end gap-4">
            <a href="{{ route('home') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg">
                Cancelar
            </a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg">
                Cadastrar
            </button>
        </div>
    </form>
</div>
@endsection
