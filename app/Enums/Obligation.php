<?php

namespace App\Enums;

enum Obligation: string
{
    case Obligatory = 'obligatory';
    case Recommended = 'recommended';
    case Prohibited = 'prohibited';
}
