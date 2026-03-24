<?php

namespace App\Enums;

enum QuizType: string
{
    case VerseIdentification = 'verse_identification';
    case VerseCompletion = 'verse_completion';
    case ActionClassification = 'action_classification';
    case Implementation = 'implementation';
    case TranslationMatching = 'translation_matching';
    case MajorSins = 'major_sins';
}
