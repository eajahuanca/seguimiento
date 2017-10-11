<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Session;
use Hash;
use Input;

use DB;
use Carbon\Carbon;
use App\User;
use App\Role;
use App\Role_user;
use App\Permission;
use App\Permission_role;

class AdministracionController extends Controller
{
    public function __construct(){
        $permisos = Permission::all();
        $this->permisos = $permisos;
        Carbon::setLocale('es');
    }

    public function createUser(){
        return view('admin.user.create');
    }

    public function storeUser(Request $request){
        try{
            $usuario = new User($request->all());
            $usuario->save();
            Session::put('active','1');
            //return response()->json(['success' => 'true']);
            return redirect('roles');
        }
        catch(\Exception $ex){
            return response()->json(['success' => $ex->getMessage()]);
        }
    }

    public function roles(){
        $roles = Role::all();
        $usuarios = Role_user::rightJoin('users','role_user.user_id','=','users.id')
                ->leftJoin('roles','role_user.role_id','=','roles.id')
                ->select('users.us_carnet','users.us_expedido','users.us_paterno','users.us_materno','users.us_nombre','users.us_nacimiento','users.us_genero','users.us_telefono','users.us_celular','users.email','users.id_profesion','users.id_cargo','users.us_foto','users.us_cuenta','users.us_estado','users.us_obs','users.id as idUser','roles.name as rolName','roles.id as roleId')
                ->where('users.us_estado','=',1)
                ->get();
        return view('admin.user.rolesPermisos')
                ->with('role',$roles)
                ->with('user',$usuarios);
    }

    public function permisos($idRol){
        $permisosAsignados = $this->getPermisosAsignados($idRol);
        $permisos = $this->permisos;
        return view('admin.user.formPermisos')
                ->with('permisosAsignados', $permisosAsignados)
                ->with('permisos', $permisos)
                ->with('idRol', $idRol);
    }

    public function getPermisosAsignados($idrol){
        $permisosRol = Permission_role::where('role_id','=',$idRol)->get();
        $asignados = array();
        foreach($permisosRol as $item){
            foreach($this->permisos as $key => $value){
                if($value->id == $item->permission_id){
                    $asignados = $value;
                }
            }
        }
        return $asignados;
    }

    public function asignar(Request $request){
        try{
            $adicionar = new Permission_role($request->all());
            $adicionar->save();
            return json_encode('ok');
        }catch(\Exception $ex){
            return response()->json(['success' => $ex->getMessage()]);
        }
    }

    public function desasignar(Request $request){
        try{
            $rol = Role::find($request->input('rol_id'));
            $rolPermisos = Permission_role::where('role_id','=',$request->input('rol_id'))
                ->where('permission_id','=',$request->input('permission_id'))->first();
            DB:table('permission_role')->where('permission_id','=',$rolPermisos->permission_id)->delete();
            return json_encode('ok');
        }catch(\Exception $ex){
            return response()->json(['success' => $ex->getMessage()]);
        }
    }

    public function asignarRol($idUser){
        $rol = Role::all();
        return view('admin.user.formAsignaRol')
            ->with('rol', $rol)
            ->with('idUser', $idUser);
    }

    public function storeRol(Request $request){
        try{
            $roles = new Role($request->all());
            $roles->save();
            Session::put('active','1');
            //Session:: flash('flash_message','El rol se registro con exito');
            return redirect('roles');
        }catch(\Exception $ex){
            return response()->json(['success' => $ex->getMessage()]);
        }
    }

    public function storeAsignaRol(Request $request){
        try{
            $roles = new Role_user($request->all());
            $roles->save();
            Session::put('active','1');
            //Session:: flash('flash_message','El rol se asigno con exito');
        }catch(\Exception $ex){
            return response()->json(['success' => $ex->getMessage()]);
        }
    }

    public function perfil(){
        try{
            $rol = DB::table('role_user')
                ->join('roles', 'role_user.role_id','=','roles.id')
                ->select('roles.display_name','role_user.role_id')
                ->where('role_user.user_id','=',Auth::user()->id)
                ->first();
            if (!isset($rol->role_id))
            {
                $permisos = '';
                return view('admin.user.perfil')
                    ->with('rol', $rol);    
            }else{
                $permisos = DB::table('permission_role')
                    ->join('permissions', 'permission_role.permission_id','=','permissions.id')
                    ->select('permissions.display_name','permissions.description')
                    ->where('permission_role.role_id','=',$rol->role_id)
                    ->get();
                return view('admin.user.perfil')
                    ->with('rol', $rol)
                    ->with('permisos', $permisos);
            }
        }catch(\Exception $ex){
            return response()->json(['success' => $ex->getMessage()]);
        }
    }
 
    public function updatePerfil(Request $request, $id){
        try{
            $perfil = User::find($id);
            $perfil->update();
            Session::put('active','1');
            //Session:: flash('message_Perfil','Su perfil se actualizo correctamente');
            return redirect('perfil');
        }catch(\Exception $ex){
             return response()->json(['success' => $ex->getMessage()]);
        }
     }

    public function updatePassword(Request $request){
        try{
            if (Hash::check($request->input('passwordActual'),Auth::user()->password)){
                $password = User::find(Auth::user()->id);
                $password->password = Hash::make($request->input('password'));
                $password->update();
                Session::put('active','1');
                //Session:: flash('message_Perfil','Su password se actualizo correctamente');
                return redirect('perfil');
            }
            else
            {
                Session:: flash('redirect_message','Passwrord Incorrecto');
                return back();
            } 
        }catch(\Exception $ex){
            return response()->json(['success' => $ex->getMessage()]);
        }
    }

    public function updateFoto(Request $request)
    {
        try
        {
            $user = Empleado::find(Auth::user()->id);
            $user->fill($request->all());
            $user->update();
            //flash('Se actualizó de manera satisfactoria la fotografia del empleado, con nombre: <b>'. $empleado->em_nombre.' '.$empleado->em_paterno.' '.$empleado->em_materno.'</b>','success');
            Session::put('active','1');
            return redirect('perfil');
        }
        catch(\Exception $ex)
        {
            return response()->json(['success' => $ex->getMessage()]);
        }
    }
}