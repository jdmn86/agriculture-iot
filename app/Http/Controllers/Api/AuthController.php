<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;


/** 
 * Undocumented class.
 * @package category
 */ 
class AuthController extends Controller
{

    /** 
     * Login to the system.
     *
     * @param Request $request
     * @return JsonResponse
     */ 
    public function login(Request $request): JsonResponse
    {        

        $credentials = $this->validate($request, [
            'email'    => 'required|email|exists:users',
            'password' => 'required|min:4',
        ]);

         try { 

          if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'blocked' => 0])){
            // if (auth()->attempt($credentials)) {
                $user = auth()->user();
                /** @var User $user */
                $user['token'] = $this->generateTokenForUser($user);

                 // $user['roles']= $user->getRoleNames();

                  // $user['permissions']=$user->getPermissionsViaRoles();
                  // $user['roles']= $user->getRoleNames();
                 

                 // $send['user_id'] = $user;

                return response()->json($user);
            } else {
                return response()->json(['success' => 'false', 'message' => 'Authentication failed, probabli you are blocked'], 401);
            }
        } catch (\Exception $exception) {
            logger()->error($exception);

            return response()->json([
                'success' => false,
                'message' => 'Unable to login user.',
            ], 401);
        }
    }

    /**
     * Generate the token for the user.
     *
     * @param User $user
     * @return string
     */
    private function generateTokenForUser($user): string
    {
        return $user->createToken(config('app.name'))->accessToken;
    }

    /**
     * Register user.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function register(Request $request): JsonResponse
    {
        $userData = $this->validate($request, [
            'name'                  => 'required|string|max:255',
            'email'                 => 'required|string|email|max:255|unique:users',
            'password'              => 'required|string|min:4|confirmed',
            'password_confirmation' => 'required',
        ]);

        try {
            $user          = app(User::class)->create($userData);
            $user['token'] = $this->generateTokenForUser($user);
        } catch (\Exception $exception) {
            logger()->error($exception);

            return response()->json([
                'success' => false,
                'message' => 'Unable to create new user.',
            ]);
        }

        return response()->json($user);
    }

    /**
     * Get current user.
     * @return User
     */
    public function getCurrentUser(): User
    {
        return request()->user();
    }

    /**
     * Logout the user from the system.
     * @return JsonResponse
     */
    public function logout()
    {
        request()->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function changePassword(Request $request): JsonResponse
    {
     
        if(Auth::Check())
        {

            $request->validate([
                'oldPassword' => 'required|min:4',
                'password' => 'required|min:4|confirmed',

            ]);

           
            $currentPassword = Auth::User()->password;

            if(Hash::check($request['oldPassword'], $currentPassword))
            {
                $userId = Auth::User()->id;
                $user = User::find($userId);
                $user->password = Hash::make($request['password']);
                $user->save();

                // $user->token()->revoke();
                request()->user()->token()->revoke();

                return response()->json([
                    'success' => true,
                    'message' => 'Your password has been updated successfully.',
                ]);
               
            }
            else
            {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, your current password was not recognised. Please try again.',
                ]);
          
            }
        }
        else
        {
            return response()->json([
                        'success' => false,
                        'message' => 'Not authenticated',
                    ]);
        }



    }
}
