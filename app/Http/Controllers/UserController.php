<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function index(Request $request)
    {
        \View::share('model_title', 'Create User');
        $tableData['userData']    = User::Where('is_delete', 0)->get();

        $data['tableContent'] = view('user.ajax_user_table', $tableData)->render();

        if($request->loadContent == 1)
        {
            return $data['tableContent'];
        }
        else{            
            return view('user.index_user')->with($data);
        }
    }

    public function ajaxFormView(Request $request)
    {
        $isFormLoad = TRUE;
        $data = [];        

        if(!empty($_POST))
        {
            $validator = Validator::make($request->all(), [
                'name'                => 'required',
                'email'               => 'required',
                'password'            => 'required',
                'password-confirm'    => 'required',
            ]);

            if ($validator->fails()) 
            {
                //$data['error']      = $validator->errors()->all();                                 
                $data['error']  = $validator->errors()->getMessages();                                 
            }else
            {
                if($request->user_id == '') //Insert
                {
                    $createData =   User::create([
                                        'name'      => $request->name,
                                        'email'     => $request->email,
                                        'password'  => Hash::make($request->password),
                                    ]);
                }else //Update
                {
                    $editData = User::where('id', $request->user_id)->update(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);
                }

                $isFormLoad = FALSE;
                $ajaxResponse['result']           = 'success';
                $ajaxResponse['loadContentURL']   =  route('user');                  
                echo json_encode($ajaxResponse);
            }
        } 

        if($isFormLoad)
        {
            //Get data from table for edit the data
            if($request->pkey_id !='')
            {               
                $data['formData']  = User::Where('id', $request->pkey_id)->get();                
            }            

            return view('user.ajax_user_form')->with($data);
        }
    }

    public function delete($user_id='')
    {
        $result['error']  = false;
        $remove = User::where('id', $user_id)->update(['is_delete' => 1]);

        return $result;
    }
}
