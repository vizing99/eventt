@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $event->title }}</h1>
    <p><strong>Deskripsi:</strong> {{ $event->description }}</p>
    <p><strong>Tanggal:</strong> {{ $event->event_date }}</p>
    <p><strong>Lokasi:</strong> {{ $event->location }}</p>

    <form action="{{ route('events.register', $event) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Daftar untuk Acara Ini</button>
    </form>
</div>
@endsection
