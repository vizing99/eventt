@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Buat Acara Baru</h2>
    <form action="{{ route('admin.event.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Acara</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="event_date" class="form-label">Tanggal Acara</label>
            <input type="datetime-local" class="form-control" id="event_date" name="event_date" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan Acara</button>
    </form>
</div>
@endsection
