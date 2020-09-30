<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getIsContractedNameAttribute() {
        if ($this->is_contracted) {
            return "contracted";
        }
        return "non-contracted";
    }

    public function getIsContractedIconAttribute() {
        if ($this->is_contracted) {
            return "Contracted.svg";
        }
        return "Non Contracted.svg";
    }

    public function getRawPhoneAttribute() {
        $rawPhone = preg_replace('/[^0-9+]+/', '', $this->phone);
        return $rawPhone;
    }
}
