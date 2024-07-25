<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
// use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //simple

        // $data  = new User();
        // $record  = $data->all();
        // dd($record->toArray());

        // through Relation
        // $data = User::with('role')->get();

        // if ($data) {
        //     dump($data->toArray()); // Dumps the data without stopping execution
        // } else {
        //     return response()->json(['message' => 'User not found'], 404);
        // }

        // return $data;
// echo "testing";
        $data = User::where('roleType', '!=', 'admin')
            ->get();
        if ($data) {
            // echo "pre";
            // print_r($data->toArray());
            return view('back-end.show-user', ['data' => $data]);
        } else {
            echo "not fetch";
        }
    }





    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('back-end.sign-up');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $userData = $request->validated();
        if ($userData) {
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $file_name = time() . "." . $extension;
                    $destinationPath = public_path('uploads/user_profiles');
                    $file->move($destinationPath, $file_name);
                    // dump('File moved successfully');
                } else {
                    dump('File is not valid');
                }
            }
            try {

                $data1 = new User();
                $data1->roleType = $request->role_type;
                $data1->firstName = $request->first_name;
                $data1->lastName = $request->last_name;
                $data1->email = $request->email;
                $data1->phoneNumber = $request->phone_number;
                $data1->password = bcrypt($request->password);
                $data1->profileImage = $file_name;
                $data1->save();
                if ($data1) {
                    return redirect()->route('login.form');
                }
            } catch (\Exception $e) {
                return redirect()->route('login.form')->with('message', 'This user already exists. Please change the account.');
            }
        } else {
            echo "failed";
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = User::find($id);
        // dd($data->toArray());
        if ($data) {
            return view('back-end.view-profile', compact('data'));
        } else {
            echo "record not found";
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $id)
    {
        // $url = "/user/edit";
        // $title = 'Edit User Record';
        $data = User::find($id)->first();

        // Uncomment these lines for debugging if needed
        // echo "<pre>";
        // print_r($data->toArray());
        // die;
// dd($data->toArray());
// die;
        if ($data) {

            return view('back-end.edit-user', compact('data'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // echo "<pre>";
        // print_r($request->toArray());
        // print_r($request->file());
        // echo "</pre>";
        // die;
        // Fetch the user by ID
        $data = User::where('id', $id)->first();
        $profileImage = $data->profileImage;
        // dd($data->toArray());
        // echo $data->profileImage;
        // die;
        if (!$data) {
            return redirect()->back()->with('error', 'User not found.');
        }

        // Update user details
        $data->firstName = $request->first_name;
        $data->lastName = $request->last_name;
        $data->email = $request->email;
        $data->phoneNumber = $request->phone_number;
        $data->password = bcrypt($request->password); // Assuming you want to hash the password

        // Handle profile image upload
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');

            // Validate the file
            // $request->validate([
            //     'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation rules
            // ]);

            $extension = $file->getClientOriginalExtension();
            $file_name = time() . "." . $extension;
            $destinationPath = public_path('uploads/user_profiles');
            $file->move($destinationPath, $file_name);
            $data->profileImage = $file_name;
            $data->roleType = $request->role_type ?? 'user';
            // Save the user
            $data->save();
        } else {
            $data->profileImage = $profileImage;
            $data->save();
        }
        // Redirect back with a success message
        return view('back-end.view-profile', compact('data'));
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            // Delete the user
            $user->delete();
            return redirect()->route('user.show')->with(['delete_message' => "Record Delete Successfully"]);
        } else {
            return response()->json(['message' => 'User not found.'], 404);
        }
    }
}
