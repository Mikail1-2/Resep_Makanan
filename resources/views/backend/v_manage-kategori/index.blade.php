@extends('backend.v_layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('frontend/css/manage-kategori.css') }}">
@endpush

@section('content')

    <h1 class="page-title">Kelola Kategori & Tags</h1>

    <div class="management-card">

        <div class="section-header">
            <h3>Kategori</h3>

            <form action="{{ route('kategori.store') }}" method="POST" class="add-form">
                @csrf

                <input type="text" name="name" class="search-input" placeholder="Nama Kategori" required>

                <button class="search-btn">
                    Tambah Kategori
                </button>
            </form>
        </div>

        <div class="table-wrapper">

            <table>

                <thead>

                    <tr>
                        <th width="80">No</th>
                        <th>Nama</th>
                        <th width="180">Total Resep</th>
                        <th width="250">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                    @foreach($categories as $category)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $category->name }}</td>

                            <td>{{ $category->resep->count() }}</td>

                            <td>

                                <div class="action-group">

                                    <form action="{{ route('kategori.update', $category->id) }}" method="POST">

                                        @csrf
                                        @method('PUT')

                                        <input type="text" name="name" value="{{ $category->name }}" class="edit-input">

                                        <button class="edit-btn">
                                            Edit
                                        </button>

                                    </form>

                                    <form action="{{ route('kategori.delete', $category->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button class="delete-btn" type="button">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
    {{-- Card Tags --}}
    <div class="management-card" style="margin-top: 24px;">
        <div class="section-header">
            <h3>Tag</h3>
            <form action="{{ route('tags.store') }}" method="POST" class="add-form">
                @csrf
                <input type="text" name="name" class="search-input" placeholder="Nama Tag" required>
                <button class="search-btn">Tambah Tag</button>
            </form>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th width="60">No</th>
                        <th>Nama</th>
                        <th width="140">Total Resep</th>
                        <th width="320">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->recipes->count() }}</td>
                            <td>
                                <div class="action-group">
                                    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" value="{{ $tag->name }}" class="edit-input">
                                        <button class="edit-btn">Edit</button>
                                    </form>
                                    <form action="{{ route('tags.delete', $tag->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="delete-btn" type="button">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const form = this.closest('form');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#f97316',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, hapus!',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
</script>
@endsection