<?php

namespace App\Observers;

use App\Models\UserModel;
use App\Services\UpdateSPKBansosService;

class UpdateBansosObserver
{
    /**
     * Handle the UserModel "created" event.
     */

    protected $updateSPKBansosService;

    public function __construct(UpdateSPKBansosService $updateSPKBansosService)
    {
        $this->updateSPKBansosService = $updateSPKBansosService;
    }

    public function created(UserModel $userModel): void
    {
        $this->updateSPKBansosService->updateBansos();
    }

    /**
     * Handle the UserModel "updated" event.
     */
    public function updated(UserModel $userModel): void
    {
        $this->updateSPKBansosService->updateBansos();
    }

    /**
     * Handle the UserModel "deleted" event.
     */
    public function deleted(UserModel $userModel): void
    {
        $this->updateSPKBansosService->updateBansos();
    }

    /**
     * Handle the UserModel "restored" event.
     */
    public function restored(UserModel $userModel): void
    {
        //
    }

    /**
     * Handle the UserModel "force deleted" event.
     */
    public function forceDeleted(UserModel $userModel): void
    {
        //
    }
}
