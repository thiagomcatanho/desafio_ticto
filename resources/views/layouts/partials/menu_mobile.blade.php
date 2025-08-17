<el-disclosure id="mobile-menu" hidden class="block sm:hidden">
    <div class="space-y-1 px-2 pt-2 pb-3">
        @if (auth()->user()->isAdmin())
            <a href="{{ route('users.index') }}" aria-current="page" class="menu-mobile-item">Funcionarios</a>
            <a href="{{ route('report.users') }}" aria-current="page" class="menu-mobile-item">Relatorio de Funcionario</a>
        @endif
    </div>
</el-disclosure>
