@extends('layouts.mainadmin')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="container pt-5 my-5">
    <h1>Daftar Testimoni</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    @auth
        @if (auth()->user()->role == 'user')
            <a href="{{ route('userr.testimoni.create') }}" class="btn btn-primary mb-3">Tambah Testimoni</a>
            @endauth
        @else
        <a>Login Terlebih dahulu jika ingin menambahkan Ulasan</a>
        <br>
        <a href="{{ route('login') }}" class="btn btn-primary mb-3">Login</a>
        @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Rating</th>
                <th>Deskripsi</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($testimonis as $testimoni)
                <tr>
                    <td>{{ $testimoni->nama }}</td>
                    <td>
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $testimoni->rating)
                                <span class="fa fa-star" style="color: gold;"></span>
                            @else
                                <span class="fa fa-star" style="color: black;"></span>
                            @endif
                        @endfor
                    </td>
                    <td>{{ $testimoni->deskripsi }}</td>
                    <td>

                                        {{-- <form action="{{ route('userr.testimoni.destroy', $testimoni->id) }}" method="POST"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">Hapus</button> --}}
@include('testimonis.delete')
                                    {{-- </form> --}}
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
