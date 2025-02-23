@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Dashboard Admin</h2>
    <div class="mt-4 row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Acara</h5>
                    <p class="card-text">{{ $eventCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Pengguna Terdaftar</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Acara Terbaru</h5>
                    <p class="card-text">{{ $latestEvent->title ?? 'Tidak ada acara terbaru' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
