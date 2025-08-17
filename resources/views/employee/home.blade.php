@extends('layouts.app')

@section('title', 'Listagem de Funcionarios')

@section('content')
    <div class="flex items-center justify-center min-h-[70vh]">
        <form method="POST" action="{{ route('time_record.store') }}">
            @csrf
            <button type="submit"
                class="px-12 py-6 text-2xl font-bold text-white bg-blue-500 rounded-2xl shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-400 transition">
                🕒 Registra Ponto
            </button>
        </form>
    </div>
@endsection
