let previewMode = false;

let originalPhoto = "";

let isDirty = false;

document.addEventListener("DOMContentLoaded", () => {
    const fotoInput = document.getElementById("foto");

    const preview = document.getElementById("preview-image");

    const removeBtn = document.getElementById("remove-btn");

    if (
        preview &&
        preview.getAttribute("src") &&
        preview.getAttribute("src") !== ""
    ) {
        originalPhoto = preview.src;
    }

    if (!fotoInput) return;

    fotoInput.addEventListener("change", function (e) {
        const file = e.target.files[0];

        if (!file) return;

        previewMode = true;

        removeBtn.disabled = false;

        const reader = new FileReader();

        reader.onload = function (event) {
            const preview = document.getElementById("preview-image");

            const avatar = document.getElementById("avatar-letter");

            preview.src = event.target.result;

            preview.style.display = "block";

            if (avatar) {
                avatar.style.display = "none";
            }
        };

        reader.readAsDataURL(file);
    });

    const formInputs = document.querySelectorAll("#profileForm input");

    formInputs.forEach((input) => {
        input.addEventListener("input", () => {
            isDirty = true;
        });

        input.addEventListener("change", () => {
            isDirty = true;
        });
    });
});

function handleRemovePhoto() {
    if (previewMode) {
        cancelPreview();
    } else {
        confirmDeletePhoto();
    }
}

function cancelPreview() {
    const preview = document.getElementById("preview-image");

    const avatar = document.getElementById("avatar-letter");

    const fotoInput = document.getElementById("foto");

    const removeBtn = document.getElementById("remove-btn");

    fotoInput.value = "";

    previewMode = false;

    if (originalPhoto) {
        preview.src = originalPhoto;

        preview.style.display = "block";

        avatar.style.display = "none";

        removeBtn.disabled = false;
    } else {
        preview.src = "";

        preview.style.display = "none";

        avatar.style.display = "flex";

        removeBtn.disabled = true;
    }
}

function confirmDeletePhoto() {
    Swal.fire({
        title: "Delete Profile Photo?",
        text: "This action cannot be undone.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ef4444",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Delete",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("deletePhotoForm").submit();
        }
    });
}

function confirmSave() {
    Swal.fire({
        title: "Save Changes?",
        text: "Do you want to save the changes?",
        icon: "question",
        showCancelButton: true,
        confirmButtonColor: "#ff8c42",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Save",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            isDirty = false;
            document.getElementById("profileForm").submit();
        }
    });
}

document.addEventListener("click", function (e) {
    const link = e.target.closest("a");

    if (!link) return;

    if (!isDirty) return;

    const href = link.getAttribute("href");

    if (!href || href.startsWith("#")) return;

    e.preventDefault();

    Swal.fire({
        title: "Unsaved Changes",
        text: "You have unsaved changes. Are you sure you want to leave this page?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ef4444",
        cancelButtonColor: "#6b7280",
        confirmButtonText: "Leave",
        cancelButtonText: "Stay",
    }).then((result) => {
        if (result.isConfirmed) {
            isDirty = false;

            window.location.href = href;
        }
    });
});
