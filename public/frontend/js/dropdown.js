console.log("JS CONNECTED");

/* ========================= */
/* SIDEBAR CATEGORY DROPDOWN */
/* ========================= */

const categoryToggle = document.querySelector(".category-toggle");
const subcategory = document.querySelector(".subcategory");

if (categoryToggle) {
    categoryToggle.addEventListener("click", function () {
        subcategory.classList.toggle("show");
    });
}

/* ========================= */
/* TAG SELECTOR              */
/* ========================= */

/*
    TAG YANG SUDAH DIPILIH USER
*/
let selectedTagList = [];

/*
    ELEMENT HTML
*/
const tagSelector = document.getElementById("tagSelector");
const selectedTags = document.getElementById("selectedTags");

/*
    JIKA HALAMAN TIDAK PUNYA TAG SELECTOR
    MAKA STOP
*/
if (tagSelector && selectedTags) {
    tagSelector.addEventListener("change", function () {
        const selectedTag = this.value;

        /*
            JIKA USER BELUM MEMILIH TAG
        */
        if (selectedTag === "") {
            return;
        }

        /*
            CEGAH TAG DUPLIKAT
        */
        if (selectedTagList.includes(selectedTag)) {
            this.value = "";

            return;
        }

        /*
            SIMPAN KE ARRAY
        */
        selectedTagList.push(selectedTag);

        renderTags();

        this.value = "";
    });
}

/* ========================= */
/* RENDER TAG                */
/* ========================= */

function renderTags() {
    selectedTags.innerHTML = "";

    selectedTagList.forEach((tag, index) => {
        selectedTags.innerHTML += `

            <div class="tag-badge">

                ${tag}

                <button
                    type="button"
                    class="tag-remove"
                    onclick="removeTag(${index})">

                    ×

                </button>

                <!--
                    INPUT TERSEMBUNYI
                    AGAR IKUT TERKIRIM KE CONTROLLER
                -->
                <input
                    type="hidden"
                    name="tags[]"
                    value="${tag}">

            </div>

        `;
    });
}

/* ========================= */
/* HAPUS TAG                 */
/* ========================= */

function removeTag(index) {
    selectedTagList.splice(index, 1);

    renderTags();
}

/* =====================================
    SEARCH USER
===================================== */

const userSearch = document.getElementById("userSearch");
const userTable = document.getElementById("userTable");

if (userSearch && userTable) {
    userSearch.addEventListener("keyup", function () {
        let keyword = this.value.toLowerCase();

        let rows = userTable.getElementsByTagName("tr");

        for (let row of rows) {
            let text = row.textContent.toLowerCase();

            row.style.display = text.includes(keyword) ? "" : "none";
        }
    });
}

/* =====================================
    SEARCH ADMIN
===================================== */

const adminSearch = document.getElementById("adminSearch");
const adminTable = document.getElementById("adminTable");

if (adminSearch && adminTable) {
    adminSearch.addEventListener("keyup", function () {
        let keyword = this.value.toLowerCase();

        let rows = adminTable.getElementsByTagName("tr");

        for (let row of rows) {
            let text = row.textContent.toLowerCase();

            row.style.display = text.includes(keyword) ? "" : "none";
        }
    });
}

/* =====================================
   DELETE CONFIRMATION
===================================== */

const deleteForms = document.querySelectorAll(".delete-form");

deleteForms.forEach((form) => {
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Hapus Data?",
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: "warning",

            showCancelButton: true,

            confirmButtonText: "Ya, Hapus",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
