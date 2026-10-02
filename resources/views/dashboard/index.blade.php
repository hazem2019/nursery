@extends('layouts.app')

@section('title', __('dashboard.title'))

@section('content')
<div class="container-fluid">
    <div class="row g-4 mb-4">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="mb-0">{{ __('dashboard.welcome') }}</h2>
                <span class="badge bg-success">
                    <i class="bi bi-check-circle"></i> {{ __('dashboard.active') }}
                </span>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 small">{{ __('dashboard.total_users') }}</p>
                            <h3 class="mb-0">{{ $stats['total_users'] ?? 0 }}</h3>
                        </div>
                        <div style="font-size: 32px; color: #3498db; opacity: 0.2;">
                            <i class="bi bi-people"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 small">{{ __('dashboard.active_users') }}</p>
                            <h3 class="mb-0">{{ $stats['active_users'] ?? 0 }}</h3>
                        </div>
                        <div style="font-size: 32px; color: #27ae60; opacity: 0.2;">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 small">{{ __('Language') }}</p>
                            <h3 class="mb-0">{{ strtoupper($stats['current_locale'] ?? 'EN') }}</h3>
                        </div>
                        <div style="font-size: 32px; color: #f39c12; opacity: 0.2;">
                            <i class="bi bi-globe"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1 small">{{ __('dashboard.status') }}</p>
                            <span class="badge bg-success" style="font-size: 14px;">{{ __('dashboard.active') }}</span>
                        </div>
                        <div style="font-size: 32px; color: #27ae60; opacity: 0.2;">
                            <i class="bi bi-heart-pulse"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom">
                    <h5 class="mb-0">
                        <i class="bi bi-info-circle"></i> {{ __('System Overview') }}
                    </h5>
                </div>
                <div class="card-body">
                    <h6 class="mb-3">{{ __('dashboard.welcome') }}</h6>
                    <p class="text-muted">
                        The Nursery Management System is now initialized and ready for configuration.
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h6 class="mb-3">{{ __('Enabled Features') }}</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-check-circle text-success"></i> 
                                    <strong>Authentication</strong> - Login, logout, and password management
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle text-success"></i> 
                                    <strong>{{ __('Bilingual Support') }}</strong> - English and Arabic
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle text-success"></i> 
                                    <strong>{{ __('RTL/LTR Layout') }}</strong> - Dynamic layout switching
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-check-circle text-success"></i> 
                                    <strong>{{ __('Role System') }}</strong> - Role and permission management
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6 class="mb-3">{{ __('Quick Start') }}</h6>
                            <ol class="ps-3" style="font-size: 14px;">
                                <li class="mb-2">Configure database settings</li>
                                <li class="mb-2">Run migrations: <code>php artisan migrate</code></li>
                                <li class="mb-2">Seed demo data: <code>php artisan db:seed</code></li>
                                <li class="mb-2">Start development server</li>
                                <li class="mb-2">Begin adding nursery modules</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
