@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h4 class="mb-0"><i class="fas fa-times-circle"></i> Paiement annulé</h4>
                </div>

                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-times-circle text-danger" style="font-size: 5rem;"></i>
                    </div>
                    <h3 class="mb-3">Paiement non abouti</h3>
                    <p class="lead">Votre transaction n'a pas pu être complétée.</p>
                    <a href="{{ route('payment.form') }}" class="btn btn-primary mt-4">
                        <i class="fas fa-redo me-2"></i> Réessayer
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection