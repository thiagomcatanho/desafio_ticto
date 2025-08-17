import IMask from 'imask';

export function applyMasks() {
    const cpf = document.querySelector('.cpf-mask');
    const cep = document.querySelector('.cep-mask');

    if (cep) {
        IMask(cep, { mask: '00000-000' });
    }
    if (cpf) {
        IMask(cpf, { mask: '000.000.000-00' });
    }
}
