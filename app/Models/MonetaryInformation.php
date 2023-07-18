<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonetaryInformation extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'monetary_informations';

    protected $fillable = [
        'bank_account_name',
        'bank_account_number',
        'bank_name',
        'bank_branch_name',
    ];
}
