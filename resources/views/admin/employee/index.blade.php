@extends('layouts.app')

@section('title', 'Listagem de Funcionarios')

@section('content')
    <div class="bg-white rounded-lg shadow p-4">
        <!-- Campo de busca -->
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-4 gap-2">
            <form class="w-full sm:w-1/3" action="{{ route('home') }}" method="GET">
                <div class="relative">
                    <input type="text" placeholder="Buscar usuário..." name="search" value="{{ request('search') }}"
                        class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                        stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35M5 11a6 6 0 1112 0 6 6 0 01-12 0z" />
                    </svg>
                </div>
            </form>
            <a href="{{ route('users.create') }}" class="btn-form-submit">Adicionar Funcionario</a>
        </div>

        <!-- Tabela em telas médias/grandes -->
        <div class="hidden md:block overflow-x-auto">
            <table class="min-w-full text-sm text-left text-gray-500">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">Nome</th>
                        <th class="px-6 py-3">CPF</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3">Cargo</th>
                        <th class="px-6 py-3">Endereço</th>
                        <th class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $employee->name }}</td>
                            <td class="px-6 py-4">{{ $employee->document }}</td>
                            <td class="px-6 py-4">{{ $employee->email }}</td>
                            <td class="px-6 py-4">{{ $employee->position }}</td>
                            <td class="px-6 py-4">{{ $employee->fullAddress }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('users.edit', $employee->id) }}"
                                    class="text-blue-500 hover:underline">Editar</a>
                                <button class="text-red-500 hover:underline"
                                    onclick="openDeleteModal('{{ route('users.destroy', $employee->id) }}', '{{ $employee->name }}')">
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                {{ $employees->links() }}
            </div>
        </div>

        <!-- Cards no mobile -->
        <div class="grid grid-cols-1 gap-4 md:hidden">
            @foreach ($employees as $employee)
                <div class="border rounded-lg p-4 shadow-sm bg-gray-50">
                    <p class="text-sm text-gray-500">ID: {{ $employee->id }}</p>
                    <p class="font-bold text-gray-900">{{ $employee->name }}</p>
                    <p class="text-gray-600">{{ $employee->email }}</p>
                    <p class="text-xs text-gray-500 mt-2">Criado em: {{ $employee->created_at->format('d/m/Y') }}</p>
                    <div class="mt-3 flex gap-3">
                        <a href="#" class="text-blue-500 hover:underline text-sm">Editar</a>
                        <button class="text-red-500 hover:underline text-sm"
                            onclick="openDeleteModal({{ $employee->id }}, '{{ $employee->name }}')">Excluir</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Form oculto para exclusão -->
    <form id="deleteForm" method="POST" style="display:none;">
        @csrf
        @method('DELETE')
    </form>

    <!-- Modal de exclusão -->
    <div id="deleteModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Confirmar Exclusão</h2>
            <p class="text-gray-600 mb-6">
                Tem certeza que deseja excluir <span id="deleteItemName" class="font-bold"></span>?
            </p>
            <div class="flex justify-end space-x-3">
                <button onclick="closeDeleteModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Cancelar
                </button>
                <button onclick="confirmDelete()" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Excluir
                </button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let deleteRoute = null;

        function openDeleteModal(route, name) {
            deleteRoute = route;
            document.getElementById('deleteItemName').textContent = name;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            deleteRoute = null;
            document.getElementById('deleteModal').classList.add('hidden');
        }

        function confirmDelete() {
            if (!deleteRoute) return;

            const form = document.getElementById('deleteForm');
            form.action = deleteRoute;
            form.submit();
        }
    </script>
@endpush
