@extends('layouts.app')

@section('title', __('dashboard.title'))

@section('content')
<div class="row g-4">
    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">{{ __('dashboard.total_users') }}</p>
                <h3 class="mb-0">{{ $stats['total_users'] }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">{{ __('dashboard.active_users') }}</p>
                <h3 class="mb-0">{{ $stats['active_users'] }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">Language</p>
                <h3 class="mb-0">{{ strtoupper($stats['current_locale']) }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <p class="text-muted mb-1">{{ __('dashboard.status') }}</p>
                <span class="badge bg-success">{{ __('dashboard.active') }}</span>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white border-bottom">
                <h5 class="mb-0">{{ __('dashboard.welcome') }}</h5>
            </div>
            <div class="card-body">
                <p>The Nursery Management System is now initialized and ready for configuration.</p>
                <ul class="list-group">
                    <li class="list-group-item">✓ Authentication system ready</li>
                    <li class="list-group-item">✓ Bilingual support (English/Arabic)</li>
                    <li class="list-group-item">✓ Role and permission system</li>
                    <li class="list-group-item">✓ Settings and localization configured</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
