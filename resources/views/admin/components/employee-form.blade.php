<div class="grid grid-cols-1 sm:grid-cols-6 gap-6">
    <div class="sm:col-span-4">
        <label for="name" class="input-label">Nome</label>
        <input type="text" name="name" placeholder="Nome" value="{{ old('name', $employee?->name) }}"
            class="input-field" required>
        @error('name')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-4">
        <label for="position" class="input-label">Cargo</label>
        <input type="text" name="position" placeholder="Cargo" value="{{ old('position', $employee?->position) }}"
            class="input-field" required>
        @error('position')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-3">
        <label for="email" class="input-label">Email</label>
        <input type="email" name="email" placeholder="E-mail" value="{{ old('email', $employee?->email) }}"
            class="input-field" required>
        @error('email')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-1">
        <label for="document" class="input-label">CPF</label>
        <input type="text" name="document" placeholder="CPF" value="{{ old('document', $employee?->document) }}"
            class="input-field cpf-mask" required>
        @error('document')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="birth_date" class="input-label">Data de Nascimento</label>
        <input type="date" name="birth_date" max="2007-08-14"
            value="{{ old('birth_date', $employee?->getRawOriginal('birth_date')) }}" class="input-field" required>
        @error('birth_date')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    @if (!$employee)
        <div class="sm:col-span-3">
            <label for="password" class="input-label">Senha</label>
            <input type="password" name="password" placeholder="Senha" class="input-field" required>
            @error('password')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="sm:col-span-3">
            <label for="password_confirmation" class="input-label">Confirmar Senha</label>
            <input type="password" name="password_confirmation" placeholder="Confirmar Senha" class="input-field"
                required>
            @error('password_confirmation')
                <span class="text-red-600 text-sm">{{ $message }}</span>
            @enderror
        </div>
    @endif

    <div class="sm:col-span-2">
        <label for="zip_code" class="input-label">CEP</label>
        <input type="text" name="zip_code" id="zip_code" placeholder="CEP"
            value="{{ old('zip_code', $employee?->zip_code) }}" class="input-field cep-mask" required>
        <span id="zip-error" class="text-red-600 text-sm hidden">CEP inválido.</span>
        @error('zip_code')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-4">
        <label for="street" class="input-label">Rua</label>
        <input type="text" name="street" id="street" placeholder="Rua"
            value="{{ old('street', $employee?->street) }}" class="input-field readonly-input" readonly>
        @error('street')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-2">
        <label for="neighborhood" class="input-label">Bairro</label>
        <input type="text" name="neighborhood" id="neighborhood" placeholder="Bairro"
            value="{{ old('neighborhood', $employee?->neighborhood) }}" class="input-field readonly-input" readonly>
        @error('neighborhood')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-1">
        <label for="city" class="input-label">Cidade</label>
        <input type="text" name="city" id="city" placeholder="Cidade"
            value="{{ old('city', $employee?->city) }}" class="input-field readonly-input" readonly>
        @error('city')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-1">
        <label for="state" class="input-label">Estado</label>
        <input type="text" name="state" id="state" placeholder="Estado" minlength="2" maxlength="2"
            value="{{ old('state', $employee?->state) }}" class="input-field readonly-input" readonly>
        @error('state')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="sm:col-span-1">
        <label for="number" class="input-label">Número</label>
        <input type="text" name="number" placeholder="Número" value="{{ old('number', $employee?->number) }}"
            class="input-field" required>
        @error('number')
            <span class="text-red-600 text-sm">{{ $message }}</span>
        @enderror
    </div>
</div>

@push('scripts')
    @vite('resources/js/forms/cepValidation.js')
@endpush
