<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SignInController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Return the login view
        return view('auth.sign-in');
    }

    /**
     * Attempt to log the user in.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // Validate the input data (email and password)
        $request->validate([
            'email' => 'required|email', // Email is required and must be valid
            'password' => 'required', // Password is required
        ]);

        // Log the login attempt with the provided email
        Log::info('Login attempt with provided data.', $request->only('email'));

        // Retrieve the login credentials
        $credentials = $request->only('email', 'password');

        // Check if the user exists by their email
        $user = User::where('email', $credentials['email'])->first();

        // If the user does not exist
        if (!$user) {
            // Log the incorrect email
            Log::warning('Incorrect email: ' . $credentials['email']);
            // Return JSON response with error
            return response()->json(['success' => false, 'error' => 'Incorrect email.']);
        }

        // Check if the user is using a temporary password
        if ($this->isTemporaryPassword($user, $credentials['password'])) {
            // Generate a password reset token
            $token = Str::random(60);
            $user->password_reset_token = $token;

            try {
                // Save the token in the database
                $user->save();
                // Log the event of generating the token
                Log::info('Temporary password detected. Reset token generated for: ' . $user->email);
            } catch (\Exception $e) {
                // Log any error during token save
                Log::error('Error saving the token: ' . $e->getMessage());
                // Return JSON response with server error
                return response()->json(['error' => 'Error generating token.'], 500);
            }

            // Redirect to the password reset page
            return response()->json([
                'success' => false,
                'redirect_url' => route('password.reset', ['token' => $token, 'email' => $user->email]),
            ]);
        }

        // Attempt authentication with email and password
        if (Auth::attempt($credentials)) {
            // If user is authenticated, retrieve the user object
            $user = Auth::user();
            // Log the successful login
            Log::info('Login successful for user: ' . $user->email);

            // Check if the user is inactive
            if ($user->ETAT === 0) {
                // Log the inactive status
                Log::warning('Inactive user: ' . $user->email);
                // Redirect to the inactive user dashboard
                return response()->json(['success' => false, 'redirect_url' => route('inactive.dashboard')]);
            }

            // If the user is active, handle role-based redirection
            return $this->handleUserRoleRedirect($user);
        }

        // If the password is incorrect
        Log::warning('Incorrect password for: ' . $credentials['email']);
        // Return JSON response with incorrect password error
        return response()->json(['success' => false, 'error' => 'Incorrect password.']);
    }

    /**
     * Check if the user is using a temporary password.
     *
     * @param  \App\Models\User  $user
     * @param  string  $password
     * @return bool
     */
    protected function isTemporaryPassword($user, $password)
    {
        // Check if a temporary password exists and matches the one provided
        $isTemporary = !empty($user->temporary_password) && Hash::check($password, $user->temporary_password);
        // Log the result of the temporary password check
        Log::info('Checking temporary password for: ' . $user->email, ['is_temporary' => $isTemporary]);
        return $isTemporary;
    }

    /**
     * Handle redirection based on the user's roles.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    protected function handleUserRoleRedirect($user)
    {
        // Check if the user has at least one role
        if ($user->roles && $user->roles->isNotEmpty()) {
            // Log that the user has one or more roles
            Log::info("User {$user->email} with at least one role: redirecting to default dashboard.");
            // Redirect to the default user dashboard
            return response()->json(['success' => true, 'redirect_url' => route('default.dashboard')]);
        }

        // If no roles are associated with the user
        Log::warning("User {$user->email} without roles: redirecting to guest page.");
        // Redirect to a guest dashboard page
        return response()->json(['success' => true, 'redirect_url' => route('guest.dashboard')]);
    }

    /**
     * Show the default dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function defaultDashboard()
    {
        return view('dashboards.default');
    }

    /**
     * Show the guest dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function guestDashboard()
    {
        return view('dashboards.guest');
    }

    /**
     * Show the inactive user dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function inactiveDashboard()
    {
        return view('dashboards.inactive');
    }

    /**
     * Handle user logout.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Déconnecter l'utilisateur
        Auth::logout();

        // Effacer les données de session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Ajouter un message dans les logs
        Log::info('Utilisateur déconnecté avec succès.');

        // Rediriger vers la page d'accueil ou une autre page
        return redirect('/login');
    }
}
