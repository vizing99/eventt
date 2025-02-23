@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Daftar Acara</h2>
    <a href="{{ route('admin.event.create') }}" class="mb-3 btn btn-primary">Buat Acara Baru</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Acara</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $event->title }}</td>
                <td>{{ $event->description }}</td>
                <td>{{ $event->event_date }}</td>
                <td>{{ $event->location }}</td>
                <td>
                    <a href="{{ route('admin.event.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('admin.event.destroy', $event->id) }}" method="POST" class="d-inline">
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
