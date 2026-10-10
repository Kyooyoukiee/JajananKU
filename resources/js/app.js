document.querySelectorAll('[data-custom-select]').forEach((selectElement) => {
    const valueInput = selectElement.querySelector('[data-select-value]');
    const trigger = selectElement.querySelector('[data-select-trigger]');
    const label = selectElement.querySelector('[data-select-label]');
    const optionsList = selectElement.querySelector('[data-select-options]');
    const options = Array.from(selectElement.querySelectorAll('[data-option-value]'));

    if (!valueInput || !trigger || !label || !optionsList || options.length === 0) {
        return;
    }

    const closeSelect = (restoreFocus = false) => {
        optionsList.classList.add('hidden');
        trigger.setAttribute('aria-expanded', 'false');
        selectElement.classList.remove('custom-select-open');

        if (restoreFocus) {
            trigger.focus();
        }
    };

    const openSelect = (focusLastOption = false) => {
        optionsList.classList.remove('hidden');
        trigger.setAttribute('aria-expanded', 'true');
        selectElement.classList.add('custom-select-open');

        const selectedOption = options.find((option) => option.dataset.optionValue === valueInput.value);
        const focusedOption = selectedOption ?? options[0];

        (focusLastOption ? options[options.length - 1] : focusedOption).focus();
    };

    trigger.addEventListener('click', () => {
        if (trigger.getAttribute('aria-expanded') === 'true') {
            closeSelect();
            return;
        }

        openSelect();
    });

    trigger.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowDown' || event.key === 'ArrowUp' || event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            openSelect(event.key === 'ArrowUp');
        }
    });

    options.forEach((option, index) => {
        option.tabIndex = -1;

        option.addEventListener('click', () => {
            valueInput.value = option.dataset.optionValue;
            label.textContent = option.textContent.trim();

            options.forEach((selectableOption) => {
                selectableOption.setAttribute('aria-selected', String(selectableOption === option));
            });

            closeSelect(true);
        });

        option.addEventListener('keydown', (event) => {
            if (event.key === 'ArrowDown' || event.key === 'ArrowUp') {
                event.preventDefault();
                const direction = event.key === 'ArrowDown' ? 1 : -1;
                const nextIndex = (index + direction + options.length) % options.length;
                options[nextIndex].focus();
            }

            if (event.key === 'Home' || event.key === 'End') {
                event.preventDefault();
                options[event.key === 'Home' ? 0 : options.length - 1].focus();
            }

            if (event.key === 'Escape') {
                event.preventDefault();
                closeSelect(true);
            }

            if (event.key === 'Tab') {
                closeSelect();
            }
        });
    });

    document.addEventListener('click', (event) => {
        if (!selectElement.contains(event.target)) {
            closeSelect();
        }
    });
});

const deleteConfirmation = document.getElementById('delete-confirmation');
const deleteConfirmationMessage = document.getElementById('delete-confirmation-message');
const deleteConfirmationPanel = deleteConfirmation?.querySelector('[role="alertdialog"]');
const cancelDeleteButton = document.getElementById('cancel-delete');
const confirmDeleteButton = document.getElementById('confirm-delete');

if (deleteConfirmation && deleteConfirmationMessage && deleteConfirmationPanel && cancelDeleteButton && confirmDeleteButton) {
    let deleteUrl = null;
    let lastDeleteTrigger = null;

    const closeDeleteConfirmation = () => {
        deleteConfirmation.classList.add('hidden');
        deleteConfirmation.classList.remove('flex');
        deleteConfirmation.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
        lastDeleteTrigger?.focus();
        deleteUrl = null;
    };

    document.addEventListener('click', (event) => {
        const deleteLink = event.target.closest('[data-confirm-delete]');

        if (deleteLink) {
            event.preventDefault();
            deleteUrl = deleteLink.href;
            lastDeleteTrigger = deleteLink;
            deleteConfirmationMessage.textContent = `Yakin ingin menghapus “${deleteLink.dataset.itemName}”? Data ini tidak dapat dikembalikan.`;
            deleteConfirmation.classList.remove('hidden');
            deleteConfirmation.classList.add('flex');
            deleteConfirmation.setAttribute('aria-hidden', 'false');
            document.body.classList.add('overflow-hidden');
            cancelDeleteButton.focus();
        }

        if (event.target === deleteConfirmation) {
            closeDeleteConfirmation();
        }
    });

    cancelDeleteButton.addEventListener('click', closeDeleteConfirmation);

    confirmDeleteButton.addEventListener('click', () => {
        if (deleteUrl) {
            window.location.assign(deleteUrl);
        }
    });

    deleteConfirmation.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeDeleteConfirmation();
            return;
        }

        if (event.key === 'Tab') {
            event.preventDefault();
            (document.activeElement === cancelDeleteButton ? confirmDeleteButton : cancelDeleteButton).focus();
        }
    });
}
