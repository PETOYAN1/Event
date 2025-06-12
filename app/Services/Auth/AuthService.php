<?php
namespace App\Services\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Exceptions\CustomException;
use Illuminate\Http\Request;


class AuthService
{
    /**
     * Register a new user.
     *
     * @param array $data
     * @return User
     * @throws CustomException
     */
    public function register(array $data): array
    {
        try {
            $user = User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'password' => Hash::make($data['password']),
            ]);

            // Generate a token for the user
            
            $token = $user->createToken('token')->plainTextToken;
            return [
            'token' => $token,
            'user' => $user,
            ];
        } catch (\Exception $e) {
            Log::error('Registration failed: ' . $e->getMessage());
            throw new CustomException('Registration failed', 500);
        }
    }

    /**
     * Login a user.
     *
     * @param array $credentials
     * @return User|null
     */
    public function login(array $credentials): array
    {
        if (!auth()->attempt($credentials)) {
            return false;
        }

        $user = auth()->user();
        $token = $user->createToken('token')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user,
        ];
    }

    /**
     * Logout the authenticated user.
     *
     * @return void
     */
    public function logout($user)
    {
        $user->tokens()->delete();
    }
}
?>