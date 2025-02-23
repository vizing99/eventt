@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Pendaftaran Acara</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pengguna</th>
                <th>Acara</th>
                <th>Status Pendaftaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $registration)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $registration->user->name }}</td>
                <td>{{ $registration->event->title }}</td>
                <td>{{ ucfirst($registration->status) }}</td>
                <td>
                    <a href="{{ route('admin.registration.edit', $registration->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.registration.destroy', $registration->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
