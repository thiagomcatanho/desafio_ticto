document.addEventListener("DOMContentLoaded", () => {

    const zipInput = document.getElementById('zip_code');
    const streetInput = document.getElementById('street');
    const neighborhoodInput = document.getElementById('neighborhood');
    const cityInput = document.getElementById('city');
    const stateInput = document.getElementById('state');
    const submitBtn = document.querySelector('button[type="submit"]');
    const zipError = document.getElementById('zip-error');

    function toggleSubmit(enable) {
        submitBtn.disabled = !enable;
        submitBtn.classList.toggle('opacity-50', !enable);
        submitBtn.classList.toggle('cursor-not-allowed', !enable);
    }

    if (zipInput && zipInput.value.replace(/\D/g, '').length === 8) {
        toggleSubmit(true);
        zipError.classList.add('hidden');
    } else {
        toggleSubmit(false);
    }

    zipInput.addEventListener('blur', () => {
        const cepValue = zipInput.value.replace(/\D/g, '');

        if (cepValue.length !== 8) {
            streetInput.value = '';
            neighborhoodInput.value = '';
            cityInput.value = '';
            stateInput.value = '';
            zipError.classList.remove('hidden');
            toggleSubmit(false);
            return;
        }

        fetch(`https://viacep.com.br/ws/${cepValue}/json/`)
            .then(response => response.json())
            .then(data => {
                if (!data.erro) {
                    streetInput.value = data.logradouro || '';
                    neighborhoodInput.value = data.bairro || '';
                    cityInput.value = data.localidade || '';
                    stateInput.value = data.uf || '';
                    zipError.classList.add('hidden');
                    toggleSubmit(true);
                } else {
                    streetInput.value = '';
                    neighborhoodInput.value = '';
                    cityInput.value = '';
                    stateInput.value = '';
                    zipError.classList.remove('hidden');
                    toggleSubmit(false);
                }
            })
            .catch(() => {
                streetInput.value = '';
                neighborhoodInput.value = '';
                cityInput.value = '';
                stateInput.value = '';
                zipError.classList.remove('hidden');
                toggleSubmit(false);
            });
    });

    zipInput.addEventListener('input', () => {
        toggleSubmit(false);
        zipError.classList.add('hidden');
    });
});
