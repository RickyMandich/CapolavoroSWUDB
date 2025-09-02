@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <span>{{ __('custom.Documentazione') }}</span>
                        <a href="{{ route('guida.avanzata') }}" class="btn btn-outline-primary btn-sm">
                            <i class="fas fa-graduation-cap me-1"></i>Guida Avanzata
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="markdown-content">
                        {!! Illuminate\Support\Str::markdown(file_get_contents(base_path('documentation.md'))) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
