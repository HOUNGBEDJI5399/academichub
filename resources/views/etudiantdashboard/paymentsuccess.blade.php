@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h4 class="mb-0"><i class="fas fa-check-circle"></i> Paiement réussi</h4>
                </div>

                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-check-circle text-success" style="font-size: 5rem;"></i>
                    </div>
                    <h3 class="mb-3">Merci pour votre paiement !</h3>
                    <p class="lead">Votre transaction a été effectuée avec succès.</p>
                    <a href="{{ route('etudiantdashboard.acceuil') }}" class="btn btn-primary mt-4">
                        <i class="fas fa-home me-2"></i> Retour à l'accueil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection