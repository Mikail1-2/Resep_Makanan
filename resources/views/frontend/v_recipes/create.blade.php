@extends('frontend.v_layouts.app')

<link rel="stylesheet" href="{{ asset('frontend/css/create-recipe.css') }}">

@section('content')

    <h1 class="page-title">
        Buat Resep 
    </h1>

    <div class="create-recipe-card">

        <form action="{{ route('recipe.store') }}" method="POST" enctype="multipart/form-data">

            @csrf

            {{-- ========================= --}}
            {{-- RECIPE NAME --}}
            {{-- ========================= --}}
            <div class="form-group">
                <label>
                    Nama Resep
                    <span class="required-text">*Wajib Diisi</span>
                </label>

                {{-- Tambahkan class bawaan untuk mewarnai border jadi merah kalau error --}}
                <input type="text" name="recipe_name" placeholder="Contoh: Nasgor Goreng" class="form-control @error('recipe_name') is-invalid @enderror"
                    value="{{ old('recipe_name') }}" style="@error('recipe_name') border-color: red; @enderror">

                {{-- Munculkan pesan error di bawah inputan --}}
                @error('recipe_name')
                    <small style="color: red; font-weight: bold;">{{ $message }}</small>
                @enderror
            </div>

            {{-- ========================= --}}
            {{-- CATEGORY + TAG --}}
            {{-- ========================= --}}
            <div class="form-row">

                {{-- CATEGORY --}}
                <div class="form-group half">

                    <label>
                        Kategori
                        <span class="required-text">*Wajib Diisi</span>
                    </label>

                    <select name="kategori_id" class="form-control">

                        {{-- GANTI CATEGORY DISINI --}}
                        <option value="">
                            Pilih Kategori...
                        </option>

                        <option value="1">
                            Makanan
                        </option>

                        <option value="2">
                            Minuman
                        </option>

                        <option value="3">
                            Dessert
                        </option>

                    </select>

                    @error('kategori_id')
                    <small style="color: red; font-weight: bold;">{{ $message }}</small>
                    @enderror

                </div>

                {{-- TAG --}}
                <div class="form-group half">
                    <label>
                        Tags
                        <span class="required-text">*Wajib Diisi</span>
                    </label>

                    {{-- Dropdown Pilihan Tag --}}
                    <select id="tagSelector" class="form-control">
                        <option value="">Pilih Tag...</option>

                        {{-- Looping langsung dari tabel tags di database --}}
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>

                    {{-- TAG YANG SUDAH DIPILIH USER (Wadah Kosong) --}}
                    <div id="selectedTags" class="selected-tags"
                        style="display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px;">
                    </div>

                    <small class="tag-info">Pilih minimal 1 tag</small>

                    {{-- Pesan error validasi (warna merah) kalau user lupa pilih tag --}}
                    @error('tags')
                        <br><small style="color: red; font-weight: bold;">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            {{-- ========================= --}}
            {{-- IMAGE --}}
            {{-- ========================= --}}
            <div class="form-group">

                <label>
                    Gambar Resep
                    <span class="required-text">*Wajib Diisi</span>
                </label>

                <input type="file" name="image" class="form-control">

            </div>

            {{-- ========================= --}}
            {{-- INGREDIENTS --}}
            {{-- ========================= --}}
            <div class="form-group">

                <label>
                    Bahan-bahan
                    <span class="required-text">*Wajib Diisi</span>
                </label>

                <textarea name="ingredients" rows="5" placeholder="Enter ingredients" class="form-control"></textarea>

            </div>

            {{-- ========================= --}}
            {{-- INSTRUCTIONS --}}
            {{-- ========================= --}}
            <div class="form-group">

                <label>
                    Langkah-langkah
                    <span class="required-text">*Wajib Diisi</span>
                </label>

                <textarea name="instructions" rows="6" placeholder="Enter cooking instructions"
                    class="form-control"></textarea>

            </div>

            <button type="submit" class="publish-btn">
                Publish Resep
            </button>

        </form>
        <script>
            document.getElementById('tagSelector').addEventListener('change', function () {
                let tagId = this.value;
                let tagName = this.options[this.selectedIndex].text;

                // Kalau yang dipilih "Pilih Tag...", hentikan proses
                if (tagId === "") return;

                // Cegah tag ganda (kalau user milih tag yang sama 2 kali)
                if (document.getElementById('hidden-tag-' + tagId)) {
                    this.value = ""; // Reset pilihan
                    return;
                }

                // 1. Bikin Tampilan Badge Tag Hijau
                let badge = document.createElement('span');
                badge.className = 'tag-green'; // Menggunakan class CSS hijaumu yang sebelumnya
                badge.innerHTML = tagName + ' <span onclick="removeTag(this, ' + tagId + ')" style="cursor:pointer; margin-left:8px; color:red; font-weight:bold;">&times;</span>';

                // 2. Bikin Input Rahasia untuk dikirim ke Laravel (name="tags[]")
                let hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'tags[]'; // Ini kunci utamanya!
                hiddenInput.value = tagId;
                hiddenInput.id = 'hidden-tag-' + tagId;

                // 3. Masukkan ke dalam div selectedTags
                let container = document.getElementById('selectedTags');
                container.appendChild(badge);
                container.appendChild(hiddenInput);

                // Reset kembali dropdown-nya
                this.value = "";
            });

            // Fungsi untuk menghapus tag kalau user berubah pikiran (klik tanda X)
            function removeTag(element, tagId) {
                element.parentElement.remove(); // Hapus badge hijaunya
                document.getElementById('hidden-tag-' + tagId).remove(); // Hapus input rahasianya
            }
        </script>
    </div>

@endsection