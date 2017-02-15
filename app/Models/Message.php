<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{


    protected $fillable = [
      'timelineMessage','profileMessage','SRIMessage','deputyMessage','companiesMessage','judicialMessage','penalMessage','senecytMessage','comptrollerMessage'
    ];

}
