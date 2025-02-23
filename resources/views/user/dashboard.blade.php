@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Selamat datang, {{ Auth::user()->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h3>Acara yang Tersedia:</h3>
    <div class="list-group">
        @foreach($events as $event)
            <div class="list-group-item">
                <h4>{{ $event->title }}</h4>
                <p>{{ $event->description }}</p>
                <p><strong>Tanggal:</strong> {{ $event->event_date }}</p>
                <p><strong>Lokasi:</strong> {{ $event->location }}</p>
                <form action="{{ route('events.register', $event) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Daftar untuk Acara Ini</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endsection
