function confirmSave() {
    Swal.fire({
        title: "Submit Recipe?",
        text: "The recipe will be sent for review.",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Yes, Submit",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("recipeForm").submit();
        }
    });
}
