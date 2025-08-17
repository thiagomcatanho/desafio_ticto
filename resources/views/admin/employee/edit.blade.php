@extends('layouts.app')

@section('title', 'Editar Funcionario')

@section('content')
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 border-b pb-4 mb-6">
            Editar Funcionário
        </h1>

        <form method="POST" action="{{ route('users.update', $employee->id) }}">
            @csrf
            @method('PUT')

            <x-employee-form :employee="$employee" />

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('users.index') }}" class="btn-form-cancel">Cancelar</a>
                <button type="submit" class="btn-form-submit">Editar</button>
            </div>
        </form>
    </div>
@endsection
