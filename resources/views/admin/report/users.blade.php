@extends('layouts.app')

@section('title', 'Relatório de Pontos dos Funcionários')

@section('content')
    <div class="bg-white rounded-2xl shadow-lg p-6 space-y-6">
        <!-- Filtros -->
        <form action="{{ route('report.users') }}" method="GET" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Data Inicial -->
                <div>
                    <label for="date_begin" class="block text-sm font-medium text-gray-700">Data Inicial</label>
                    <input type="date" name="date_begin" id="date_begin" value="{{ request('date_begin') }}"
                        max="{{ now()->format('Y-m-d') }}"
                        class="mt-1 block w-full rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('date_begin')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Data Final -->
                <div>
                    <label for="date_end" class="block text-sm font-medium text-gray-700">Data Final</label>
                    <input type="date" name="date_end" id="date_end" value="{{ request('date_end') }}"
                        max="{{ now()->format('Y-m-d') }}"
                        class="mt-1 block w-full rounded-sm border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    @error('date_end')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botão -->
                <div class="flex items-end">
                    <button type="submit"
                        class="w-full md:w-auto px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg shadow-md transition duration-150">
                        Pesquisar
                    </button>
                </div>
            </div>
        </form>

        <!-- Tabela -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 text-sm text-gray-600">
                <thead class="bg-gray-100 text-gray-700 text-xs uppercase tracking-wide">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">Nome</th>
                        <th class="px-6 py-3 text-center">Cargo</th>
                        <th class="px-6 py-3 text-center">Idade</th>
                        <th class="px-6 py-3 text-center">Gestor</th>
                        <th class="px-6 py-3">Data do Registro</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($result as $row)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-medium text-gray-800">{{ $row->id }}</td>
                            <td class="px-6 py-4">{{ $row->name }}</td>
                            <td class="px-6 py-4 text-center">{{ $row->position }}</td>
                            <td class="px-6 py-4 text-center">{{ $row->age }} anos</td>
                            <td class="px-6 py-4 text-center">{{ $row->admin_name }}</td>
                            <td class="px-6 py-4 text-center">
                                {{ \Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i:s') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">Nenhum registro encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
