<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class order extends Model
{
    use HasFactory;
    Public Function orderItem():HasMany{
        return $this->HasMany(OrderItem::class,"food_id","id");
    }
      
    
}
