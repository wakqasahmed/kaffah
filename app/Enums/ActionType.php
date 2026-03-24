<?php

namespace App\Enums;

enum ActionType: string
{
    case Do = 'do';
    case Avoid = 'avoid';
    case Reflect = 'reflect';
    case Seek = 'seek';
    case Affirm = 'affirm';
    case Respect = 'respect';
    case Acknowledge = 'acknowledge';
    case Proclaim = 'proclaim';
    case Recognize = 'recognize';
}
