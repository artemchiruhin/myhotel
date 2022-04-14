const deleteForms = document.querySelectorAll('.form-delete');
const btnCancel = document.querySelector('.btn-cancel');
const btnConfirm = document.querySelector('.btn-confirm');
const closeModalBtn = document.querySelector('.modal-close');
const modalWrapper = document.querySelector('.modal-wrapper');

if(deleteForms !== null) {
    deleteForms.forEach(form => {
        form.addEventListener('submit', e => {
            e.preventDefault();
            modalWrapper.classList.remove('d-none');
            if(btnConfirm !== null) {
                btnConfirm.addEventListener('click', e => {
                    form.submit();
                });
            }
        });
    });
}

if(btnCancel !== null) {
    btnCancel.addEventListener('click', e => {
        modalWrapper.classList.add('d-none');
    })
}

if(closeModalBtn !== null) {
    closeModalBtn.addEventListener('click', e => {
        modalWrapper.classList.add('d-none');
    })
}

if(modalWrapper !== null) {
    modalWrapper.addEventListener('click', e => {
        modalWrapper.classList.add('d-none');
    })

    modalWrapper.children[0].addEventListener('click', e => {
        e.stopPropagation();
    });
}
