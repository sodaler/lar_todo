<?php

namespace App\Actions;

use App\Models\Task;
use Laravel\Scout\Builder;

class TaskAction
{
    /**
     * @param string|null $searchTerm
     * @return Builder
     */
    public function getSearchAuth(?string $searchTerm): Builder
    {
        $userId = auth()->user()->getAuthIdentifier();

        return Task::search($searchTerm)
            ->where('user_id', $userId);
    }
}
