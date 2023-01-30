<?php

namespace App\Enums;

enum TicketEventType: string
{
    case OPENED = 'Ticket opened';
    case CLOSED = 'Ticket closed';
}