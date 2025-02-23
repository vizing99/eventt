@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit Acara</h2>
    <form action="{{ route('admin.event.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Judul Acara</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $event->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="event_date" class="form-label">Tanggal Acara</label>
            <input type="datetime-local" class="form-control" id="event_date" name="event_date" value="{{ $event->event_date->format('Y-m-d\TH:i') }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Acara</button>
    </form>
</div>
@endsection
