<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeneficiaryStudent extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'date_birthday',
        'image_term',
        'data_term'
    ];

    /**
     * Get the events associated with the user.
     */
    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    /**
     * Get the events associated with the user or return a message if no events are associated.
     */
    public function getEventsOrMessage()
    {
        $events = $this->events;

        if ($events->isEmpty()) {
            return "Beneficiário não está inscrito em nenhum evento ainda";
        }
        
        return $events;
    }

}
