document.addEventListener("DOMContentLoaded", () => {
    const fotoInput = document.getElementById("foto");

    if (!fotoInput) return;

    fotoInput.addEventListener("change", function (e) {
        const file = e.target.files[0];

        if (!file) return;

        const reader = new FileReader();

        reader.onload = function (event) {
            const preview = document.getElementById("preview-image");

            preview.src = event.target.result;
            preview.style.display = "block";

            preview.style.display = "block";

            const avatar = document.getElementById("avatar-letter");

            if (avatar) {
                avatar.style.display = "none";
            }

            document.getElementById("remove_photo").value = 0;
        };

        reader.readAsDataURL(file);
    });
});

function hapusFoto() {
    document.getElementById("remove_photo").value = 1;

    const preview = document.getElementById("preview-image");

    const avatar = document.getElementById("avatar-letter");

    if (preview) {
        preview.src = "";
        preview.style.display = "none";
    }

    if (avatar) {
        avatar.style.display = "flex";
    }

    document.getElementById("foto").value = "";
}
