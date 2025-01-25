<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SignUpController extends Controller
{
    /**
     * Display the registration form to the user.
     *
     * This method is responsible for rendering the registration page.
     * It also logs the action for debugging purposes.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Log the action of showing the registration form
        Log::info('Displaying the registration form to the user.');

        // Return the view for the sign-up page
        return view('auth.sign-up');
    }

    /**
     * Handle the registration of a new user.
     *
     * This method validates the user input, creates a new user in the database,
     * and returns a JSON response indicating success or failure.
     * It logs all key actions for debugging and monitoring purposes.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Log the incoming registration request data
        Log::info('Starting validation of registration data.', ['data' => $request->all()]);

        // Validate the input data
        $validator = Validator::make(
            $request->all(),
            [
                'first_name' => 'required|string|max:255', // First name is required and must be a string
                'last_name'  => 'required|string|max:255', // Last name is required and must be a string
                'email'      => 'required|string|email|max:255|unique:users', // Email must be unique and in a valid format
                'password'   => 'required|string|min:8|confirmed', // Password must be at least 8 characters and match the confirmation field
            ],
            [
                // Custom error messages
                'first_name.required' => 'The first name is required.',
                'first_name.string'   => 'The first name must be a valid string.',
                'first_name.max'      => 'The first name may not exceed 255 characters.',
                'last_name.required'  => 'The last name is required.',
                'last_name.string'    => 'The last name must be a valid string.',
                'last_name.max'       => 'The last name may not exceed 255 characters.',
                'email.required'      => 'The email address is required.',
                'email.string'        => 'The email address must be a valid string.',
                'email.email'         => 'The email address must be in a valid format.',
                'email.unique'        => 'The email address is already registered.',
                'password.required'   => 'The password is required.',
                'password.string'     => 'The password must be a valid string.',
                'password.min'        => 'The password must be at least 8 characters long.',
                'password.confirmed'  => 'The password confirmation does not match.',
            ]
        );

        // Check if validation fails
        if ($validator->fails()) {
            // Log the validation errors for debugging purposes
            Log::error('Validation failed during registration.', ['errors' => $validator->errors()]);

            // Return a JSON response with the validation errors
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 400); // HTTP 400 Bad Request
        }

        // If validation passes, log the success
        Log::info('Validation succeeded. Proceeding to create a new user.', ['email' => $request->input('email')]);

        // Create a new user in the database
        $user = User::create([
            'first_name' => $request->input('first_name'), // First name from the form
            'last_name'  => $request->input('last_name'),  // Last name from the form
            'email'      => $request->input('email'),      // Email from the form
            'password'   => Hash::make($request->input('password')), // Hash the password before saving
        ]);

        // Log the successful creation of the user
        Log::info('User successfully created.', ['user_id' => $user->id]);

        // Return a JSON response indicating success
        return response()->json([
            'status' => 'success',
            'message' => 'Account created successfully!'
        ], 200); // HTTP 200 OK
    }
}
