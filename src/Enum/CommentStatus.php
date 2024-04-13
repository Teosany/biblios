<?php
namespace App\Enum;
enum CommentStatus: string
{
    case Pending = 'pending';
    case Published = 'published';
    case Moderated = 'moderated';
    public function getLabel(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::Published => 'Published',
            self::Moderated => 'Moderated',
        };
    }
}