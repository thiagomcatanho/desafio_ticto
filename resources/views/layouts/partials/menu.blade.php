<div class="hidden sm:ml-6 sm:block">
    <div class="flex space-x-4">
        @if (auth()->user()->isAdmin())
            <a href="{{ route('users.index') }}" class="menu-item">Funcionarios</a>
            <a href="{{ route('report.users') }}" class="menu-item">Relatorio de Funcionario</a>
        @endif
    </div>
</div>
