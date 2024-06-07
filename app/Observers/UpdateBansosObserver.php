<?php

namespace App\Observers;

use App\Models\KartuKeluargaModel;
use App\Models\UserModel;
use App\Services\UpdateSPKBansosService;
use App\Services\UpdateSPKVikorService;

class UpdateBansosObserver
{
    /**
     * Handle the UserModel "created" event.
     */

    protected $updateSPKBansosService;
    protected $updateSPKVikor;

    public function __construct(UpdateSPKBansosService $updateSPKBansosService, UpdateSPKVikorService $updateSPKVikor)
    {
        $this->updateSPKBansosService = $updateSPKBansosService;
        $this->updateSPKVikor = $updateSPKVikor;
    }

    public function created(UserModel $userModel): void
    {
        if(KartuKeluargaModel::where('nama_kepala_keluarga', $userModel->nama_user)->first()) {
            //
        } else {
            $this->updateSPKBansosService->updateBansos();
            $this->updateSPKVikor->updateBansos();
        }
    }

    /**
     * Handle the UserModel "updated" event.
     */
    public function updated(UserModel $userModel): void
    {
        
    }

    /**
     * Handle the UserModel "deleted" event.
     */
    public function deleted(UserModel $userModel): void
    {
        if(KartuKeluargaModel::where('nama_kepala_keluarga', $userModel->nama_user)->first()) {
            KartuKeluargaModel::destroy($userModel->kartu_keluarga_id);
        } else {
            $this->updateSPKBansosService->updateBansos();
            $this->updateSPKVikor->updateBansos();
        }
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
