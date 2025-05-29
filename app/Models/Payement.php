<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payement extends Model
{
    protected $table = 'payement';

    protected $fillable = [
        'firstname',
        'lastname',
        'niveau',
        'transaction_id',
        'fedapay_transaction_id',
        'user_id',
        'amount',
        'currency',
        'status',
        'payment_method',
        'phone_number',
        'callback_url',
        'metadata',
        'paid_at'
    ];

    protected $casts = [
        'metadata' => 'array',
        'paid_at' => 'datetime',
        'amount' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Relation avec User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Vérifier si le paiement est en attente
     */
    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    /**
     * Vérifier si le paiement est complété
     */
    public function isCompleted(): bool
    {
        return $this->status === 'completed';
    }

    /**
     * Vérifier si le paiement a échoué
     */
    public function isFailed(): bool
    {
        return $this->status === 'failed';
    }

    /**
     * Vérifier si le paiement est annulé
     */
    public function isCancelled(): bool
    {
        return $this->status === 'cancelled';
    }

    /**
     * Obtenir le libellé du statut
     */
    public function getStatusLabelAttribute(): string
    {
        $labels = [
            'pending' => 'En attente',
            'completed' => 'Complété',
            'failed' => 'Échoué',
            'cancelled' => 'Annulé'
        ];

        return $labels[$this->status] ?? 'Inconnu';
    }

    /**
     * Obtenir le libellé de la méthode de paiement
     */
    public function getPaymentMethodLabelAttribute(): string
    {
        $labels = [
            'standard' => 'Paiement standard',
            'mtn' => 'MTN Mobile Money',
            'moov' => 'Moov Money'
        ];

        return $labels[$this->payment_method] ?? 'Inconnu';
    }

    /**
     * Obtenir le montant formaté
     */
    public function getFormattedAmountAttribute(): string
    {
        return number_format($this->amount, 0, ',', ' ') . ' ' . $this->currency;
    }

    /**
     * Scope pour les paiements réussis
     */
    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    /**
     * Scope pour les paiements en attente
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Scope pour les paiements échoués
     */
    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }
}