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
