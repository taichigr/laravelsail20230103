<?php

namespace App\Profile\UseCase;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

final class ShowProfileUseCase
{

    /**
     * プロフィール表示
     *
     * @throws ValidationException
     */
    public function handle(int $profile_id, User $user): array
    {
        // 
        $user = $user->findOrFail($profile_id);

        return [
            'user' => $user,
        ];
    }
}
