@extends('layouts.admin')

@section('title', 'Semua Notifikasi')

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">Semua Notifikasi</h4>

    @if($notifications->count() > 0)
    <ul class="list-group mb-3">
        @foreach($notifications as $notif)
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div>
                <div>Notifikasi Perawatan Mesin <b>{{ $notif->data['machine']}}</b> Siklus <b>{{ $notif->data['description']}}</b></div>
                <small class="text-muted">{{ $notif->created_at->diffForHumans() }}</small>
            </div>
            @if(is_null($notif->read_at))
            <a href="{{ route('notifications.read', $notif->id) }}" class="btn btn-sm btn-outline-primary">Tandai Dibaca</a>
            @else
            <span class="badge bg-secondary">Sudah Dibaca</span>
            @endif
        </li>
        @endforeach
    </ul>

    {{ $notifications->links() }}
    @else
    <p class="text-muted">Tidak ada notifikasi.</p>
    @endif
</div>
@endsection