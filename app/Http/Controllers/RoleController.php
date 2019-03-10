<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Role;
use Validator;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        \View::share('model_title', 'Create Role');
        $tableData['roleData']    = Role::Where('is_delete', 0)->get();

        $data['tableContent'] = view('user.ajax_role_table', $tableData)->render();

        if($request->loadContent == 1)
        {
            return $data['tableContent'];
        }
        else{            
            return view('user.index_role')->with($data);
        }
    }    

    public function ajaxFormView(Request $request)
    {
        $isFormLoad = TRUE;
        $data = [];        

        if(!empty($_POST))
        {
            $validator = Validator::make($request->all(), [
                'role_name' => 'required',
            ]);

            if ($validator->fails()) 
            {
                $data['error'] = $validator->errors()->all();                                 
            }else
            {
                if($request->role_id == '') //Insert
                {
                    $createData = Role::create([
                                                'role_name'  => $request->role_name,
                                                'created_at' => date('Y-m-d H:i:s'),
                                              ]);
                }else //Update
                {
                    $editData = Role::where('role_id', $request->role_id)->update(['role_name' => $request->role_name]);
                }

                $isFormLoad = FALSE;
                $ajaxResponse['result']           = 'success';
                $ajaxResponse['loadContentURL']   =  route('role');                  
                echo json_encode($ajaxResponse);
            }
        } 

        if($isFormLoad)
        {
            //Get data from table for edit the data
            if($request->pkey_id !='')
            {               
                $data['formData']  = Role::Where('role_id', $request->pkey_id)->get();                
            }            

            return view('user.ajax_role_form')->with($data);
        }
    }

    public function delete($role_id='')
    {
        $result['error']  = false;
        $remove = Role::where('role_id', $role_id)->update(['is_delete' => 1]);

        return $result;
    }
}