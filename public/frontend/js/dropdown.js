console.log('JS CONNECTED');

const categoryToggle = document.querySelector(".category-toggle");

const subcategory = document.querySelector(".subcategory");

if (categoryToggle) {
    categoryToggle.addEventListener("click", function () {
        subcategory.classList.toggle("show");
    });
}
