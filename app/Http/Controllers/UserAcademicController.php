<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAcademic;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\UserAcademicRequest;

class UserAcademicController extends Controller
{
    public function index()
    {
        $u_id = Session::get('user_id');
        $row = User::join('user_academics', 'users.id', '=', 'user_academics.user_id')
            ->where('users.id', $u_id)
            ->select('users.*', 'user_academics.*')
            ->first();
        if ($row) {
            // Convert the row to array
            return view('back-end.view-user-academic-record', compact('row'));
        } else {
            return redirect()->back()->with('error', 'Record not found');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Add Academic Form";
        $url = "/academic/create";
        $data = null;
        return view('back-end.add-academic-form',compact('title','url','data'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserAcademic $userAcademic, UserAcademicRequest $request)
    {
        DB::beginTransaction();
        try {
            if ($request->hasFile('matric_certificate') && $request->hasFile('intermediate_certificate')) {

                $file1 = $request->file('matric_certificate');
                $matric_certificate_extension = $file1->getClientOriginalExtension();
                $matric_certificate_name = "matric-certificate-" . time() . "." . $matric_certificate_extension;
                $matric_file_path = public_path('uploads/matric_certificate');

                $file2 = $request->file('intermediate_certificate');
                $intermediate_certificate_extension = $file2->getClientOriginalExtension();
                $intermediate_certificate_name = "intermediate-certificate-" . time() . "." . $intermediate_certificate_extension;
                $intermediate_file_path = public_path('uploads/intermediate_certificate');
                $user_id = Session::get('user_id');
                if (UserAcademic::where('user_id', $user_id)->exists()) {
                    return redirect()->route('view-user-academic-record')->with(['message' => 'User id already exists in the academic records.']);
                }
                $store_user_academic_data = new UserAcademic();
                $store_user_academic_data->user_id = $user_id;
                $store_user_academic_data->matricCategory = $request->matric_category;
                $store_user_academic_data->matricYear = $request->matric_year;
                $store_user_academic_data->matricPercentage = $request->matric_percentage;
                $store_user_academic_data->matricCertificate = $matric_certificate_name;
                $store_user_academic_data->interCategory = $request->intermediate_category;
                $store_user_academic_data->interYear = $request->intermediate_year;
                $store_user_academic_data->interPercentage = $request->intermediate_percentage;
                $store_user_academic_data->interCertificate = $intermediate_certificate_name;

                if ($store_user_academic_data->save()) {
                    DB::commit();
                    $file1->move($matric_file_path, $matric_certificate_name);
                    $file2->move($intermediate_file_path, $intermediate_certificate_name);
                    // echo "data stored successfully";
                    return redirect()->route('view-user-academic-record')->with(["message" => "Record inserted sucsesfully"]);
                } else {
                    return redirect()->route('academic.show')->with(["message" => "NOt record found!."]);
                }
            } else {
                return redirect()->route('academic.show')->with(["message" => "Both Certificate required!."]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing academic data: ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UserAcademic $userAcademic)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserAcademic $userAcademic, string $id)
    {
        // echo $id;
        $data = User::with('academic')->find($id);
        // dd($data->toArray());
        if (!$data) {
            return redirect()->back();
        } else {
            // dd($data->toArray());
            $title = "Edit Academic Record Form";
            $url = "/academic/update/" . $id;
            return view('back-end.add-academic-form', compact('title', 'url', 'data'));
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserAcademic $userAcademic, $id)
    {
        // dd($request->toArray());
        // echo $id;
        // die;
        $store_user_academic_data = UserAcademic::where('user_id', $id)->first();
        // dd($user->toArray());
        // DB::beginTransaction();
        // print_r($request->matric_certificate);
        // echo "<pre>";
        // print_r($request->toArray());
        // print_r($request->file());
        // echo "</pre>";
        // die;
        $user_id = $id;
      echo  $matric_certificate_name_default = $store_user_academic_data->matricCertificate;
      echo   $intermediate_certificate_name_default = $store_user_academic_data->InterCertificate;

       try {
            $store_user_academic_data->user_id = $user_id;
            $store_user_academic_data->matricCategory = $request->matric_category;
            $store_user_academic_data->matricYear = $request->matric_year;
            $store_user_academic_data->matricPercentage = $request->matric_percentage;
            $store_user_academic_data->InterCategory = $request->inter_category;
            $store_user_academic_data->interYear = $request->intermediate_year;
            $store_user_academic_data->interPercentage = $request->intermediate_percentage;
// die;
            // $store_user_academic_data->interCertificate = $intermediate_certificate_name;
            if ($request->hasFile('matric_certificate')) {
                $matric_file = $request->file('matric_certificate');
                $matric_file_extension = $matric_file->getClientOriginalExtension();
                $matric_certificate_name = 'matric_certificate-' . time() . "." . $matric_file_extension;
                $matric_certificate_path = public_path('uploads/matric_certificate');
                $store_user_academic_data->matricCertificate = $matric_certificate_name;
                $matric_file->move($matric_certificate_path, $matric_certificate_name);


            } else {
                $store_user_academic_data->matricCertificate = $matric_certificate_name_default;
            }
            if ($request->hasFile('intermediate_certificate')) {
                $inter_file1 = $request->file('intermediate_certificate');
                $inter_file_extension = $inter_file1->getClientOriginalExtension();
                $inter_certificate_name = 'intermediate_certificate-' . time() . "." . $inter_file_extension;
                $inter_certificate_path = public_path('uploads/intermediate_certificate');
                $store_user_academic_data->interCertificate = $inter_certificate_name;
                $inter_file1->move($inter_certificate_path, $inter_certificate_name);
            } else {
                $store_user_academic_data->InterCertificate = $intermediate_certificate_name_default;
            }
            if ($store_user_academic_data->save()) {
                echo"successfully";
                $row = $store_user_academic_data;
                return redirect()->route('view-user-academic-record');
                // return view('back-end.view-user-academic-record',compact('row'));
            } else {
                echo "Failed to save the academic data";
            }

        } catch (\Exception $e) {

            echo "error";
            // DB::rollBack();
            // return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserAcademic $userAcademic)
    {
        //
    }
}
