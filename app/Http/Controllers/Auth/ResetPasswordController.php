<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Display the password reset request form.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.password.email');
    }

    /**
     * Send the password reset link.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'email' => 'required|email',
        ], [
            'email.required' => 'The email is required.',
            'email.email' => 'Please enter a valid email address.',
        ]);

        // Send the reset link
        $status = Password::sendResetLink(['email' => $validatedData['email']]);

        // Log to verify the request
        Log::info('Password reset request for: ' . $validatedData['email']);

        // Return the JSON response
        if ($status === Password::RESET_LINK_SENT) {
            return response()->json([
                'status' => 'success',
                'message' => 'We have sent a password reset link to your email.',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Failed to send the password reset link. Please try again later.',
        ], 400);
    }

    /**
     * Display the password reset form.
     *
     * @param string $token
     * @return \Illuminate\View\View
     */
    public function showResetForm($token)
    {
        return view('auth.password.reset', ['token' => $token]);
    }

    /**
     * Reset the user's password.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        // Validate the data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required',
        ], [
            'email.required' => 'The email is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 8 characters.',
            'token.required' => 'The token is required.',
        ]);

        // Reset the password
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = Hash::make($request->password);
                $user->save();
                Log::info('Password reset for: ' . $user->email);
            }
        );

        // Check if the reset was successful
        if ($status == Password::PASSWORD_RESET) {
            // JSON response on success
            return response()->json([
                'status' => 'success',
                'message' => 'Password successfully reset!',
            ], 200);
        }

        // JSON response on error
        return response()->json([
            'status' => 'error',
            'message' => trans($status),
        ], 400);
    }
}
