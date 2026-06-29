@extends('backend.v_layouts.app')

<link rel="stylesheet" href="{{ asset('frontend/css/manage-user.css') }}">

@section('content')

<h1 class="page-title">
    Kelola Pengguna
</h1>

{{-- ========================= --}}
{{-- STATISTICS --}}
{{-- ========================= --}}
<div class="stats">

    <div class="card">

        <h3>Total Pengguna</h3>

        <h2>
            {{ $totalUsers }}
        </h2>

    </div>

    <div class="card">

        <h3>Total Admins</h3>

        <h2>
            {{ $totalAdmins }}
        </h2>

    </div>

</div>


{{-- ========================= --}}
{{-- USER SECTION --}}
{{-- ========================= --}}
<div class="management-card">

    <div class="section-header">

        <h2>
            Tamu / Pengguna
        </h2>

        <input type="text"
            id="userSearch"
            placeholder="Search user..."
            class="search-input">

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>
                        Nama
                    </th>

                    <th>
                        Email
                    </th>

                    <th>
                        No. HP
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody id="userTable">

                {{-- LOOP USER DISINI --}}
                @foreach($users as $row)
                <tr>

                    <td>
                        {{ $row->nama }}
                    </td>

                    <td>
                        {{ $row->email }}
                    </td>

                    <td>
                        {{ $row->hp }}
                    </td>

                    <td>

                        <form action="{{ route('manage-user.destroy', $row->id) }}"
                            method="POST"
                            class="delete-form">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="delete-btn">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>


{{-- ========================= --}}
{{-- ADMIN SECTION --}}
{{-- ========================= --}}
<div class="management-card">

    <div class="section-header">

        <h2>
            Admin
        </h2>

        <input type="text"
            id="adminSearch"
            placeholder="Search admin..."
            class="search-input">

    </div>

    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>
                        Nama
                    </th>

                    <th>
                        Email
                    </th>

                    <th>
                        No. HP
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody id="adminTable">

                {{-- LOOP ADMIN DISINI --}}
                @foreach($admins as $row)

                <tr>

                    <td>
                        {{ $row->nama }}
                    </td>

                    <td>
                        {{ $row->email }}
                    </td>

                    <td>
                        {{ $row->hp }}
                    </td>

                    <td>
                        <div class="action-group">

                            <a href="{{ route('manage-user.edit', $row->id) }}"
                                class="edit-btn">
                                Edit
                            </a>

                            <form action="{{ route('manage-user.destroy', $row->id) }}"
                                method="POST"
                                class="delete-form">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="delete-btn">

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

@endsection