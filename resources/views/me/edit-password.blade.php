@extends('layouts.app')

@section('title', 'Alterar Senha')

@section('content')
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 border-b pb-4 mb-6">
            Alterar Senha
        </h1>
        <form method="POST" action="{{ route('me.update_password') }}">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 sm:grid-cols-6 gap-6">
                <div class="sm:col-span-3">
                    <label for="password" class="input-label">Senha</label>
                    <input type="password" name="password" placeholder="Digite uma nova senha" class="input-field"
                        required>
                    @error('password')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="sm:col-span-3">
                    <label for="password_confirmation" class="input-label">Confirmação</label>
                    <input type="password" name="password_confirmation" placeholder="Digite novamente a nova senha"
                        class="input-field" required>
                    @error('password_confirmation')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <a href="{{ route('home') }}" class="btn-form-cancel">Cancelar</a>
                <button type="submit" class="btn-form-submit">Alterar</button>
            </div>
        </form>
    </div>
@endsection
