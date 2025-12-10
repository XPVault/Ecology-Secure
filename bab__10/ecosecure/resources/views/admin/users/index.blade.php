<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data User</title>
    <link rel="stylesheet" href="{{ asset('css/admin-users.css') }}">
</head>
<body>

<header>
    <h1>Halaman Admin</h1>
    <nav>
        <a href="{{ route('users.index') }}">Home</a>
        <a href="{{ route('users.create') }}">Tambah User</a>
    </nav>
</header>

<main>
    <div class="admin-container">

        <h2>Data User</h2>

        <a class="tambah" href="{{ route('users.create') }}">
            <button class="tambah">+ Tambah User</button>
        </a>

        <table>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>

            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}">
                        <button>Edit</button>
                    </a>

                    <form action="{{ route('users.destroy', $user->id) }}"
      method="POST"
      style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Hapus</button>
</form>
<a href="{{ route('users.pdf') }}" class="btn-pdf" target="_blank">
    Cetak PDF
</a>


                </td>
            </tr>
            @endforeach

        </table>

    </div>
</main>

<footer>
    © 2025 Admin Panel | All Rights Reserved
</footer>

</body>
</html>
