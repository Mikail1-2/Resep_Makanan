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