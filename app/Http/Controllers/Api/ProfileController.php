<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordChangeRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * عرض البيانات.
     */
    public function edit(Request $request)
    {
        return response()->apiSuccess($request->user(), 'Profile fetched successfully');
    }

    /**
     * تحديث البيانات.
     */
    public function update(ProfileUpdateRequest $request)
    {
        $user = $request->user();
        $updated = $this->userRepo->updateUser($user, $request->validated());

        if (!$updated) {
            return response()->apiFail('Failed to update profile', 500);
        }

        return response()->apiSuccess($user->fresh(), 'Profile updated successfully');
    }

    /**
     * حذف الحساب.
     */
    public function destroy(Request $request)
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $this->userRepo->deleteUser($user);

        return response()->apiSuccess(null, 'Account deleted successfully');
    }
    public function changePassword(PasswordChangeRequest $request)
    {
        $user = $request->user();
        $changed = $this->userRepo->changePassword($user, $request->password);

        if (!$changed) {
            return response()->apiFail('Failed to change password', 500);
        }

        return response()->apiSuccess(null, 'Password changed successfully');
    }
}
