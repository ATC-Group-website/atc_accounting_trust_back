<?php

namespace App\Services\Implementations;

use App\Jobs\SendCandidateApplyConfirmationJob;
use App\Jobs\SendNewApplyEmailToAdminJob;
use App\Models\Apply;
use App\Services\Interfaces\ApplyInterface;
use App\Traits\IUpload;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ApplyService implements ApplyInterface
{
    use IUpload, ResponseTrait;

    /**
     * List all candidate applications.
     */
    public function index()
    {
        try {
            $applies = Apply::latest()->paginate(12);

            $applies->getCollection()->transform(function ($apply) {
                $apply->cv_url = $apply->cv ? asset('storage/' . $apply->cv) : null;
                return $apply;
            });

            return $this->success200($applies, 'Applications retrieved successfully');

        } catch (\Exception $e) {
            Log::error('Failed to retrieve applications', ['error' => $e->getMessage()]);
            return $this->error500($e->getMessage(), 'Failed to retrieve applications');
        }
    }

    /**
     * Store candidate application.
     */
    public function store(array $data)
    {
        try {
            return DB::transaction(function () use ($data) {
                // Handle file upload
                if (isset($data['cv'])) {
                    $data['cv'] = $this->uploadDocument($data['cv'], 'cvs');
                }

                // Create application
                $apply = Apply::create($data);

                // Log apply info
                Log::info('New application submitted', ['email' => $apply->email, 'id' => $apply->id]);

                // Send confirmation email to candidate
                dispatch(new SendCandidateApplyConfirmationJob($apply));

                // Send email to admin
                dispatch(new SendNewApplyEmailToAdminJob($apply));

                return $this->success201($apply, 'Your application has been submitted successfully!');
            });

        } catch (\Exception $e) {
            // Log error data
            Log::error('Application submission failed', [
                'email' => $data['email'] ?? 'unknown',
                'error' => $e->getMessage(),
            ]);

            return $this->error500('Something went wrong. Try again later', 'Something went wrong. Try again later');
        }
    }
}
