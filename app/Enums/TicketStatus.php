<?php

namespace App\Enums;

enum TicketStatus: string
{
    case OPEN = 'Open';
    case CLOSED = 'Closed';
}