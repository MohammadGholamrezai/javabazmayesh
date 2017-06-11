<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

use App\BaseModel;

class AuthenticateEmployee
{
    protected $segment;
    protected $employee_id;
    protected $controller;
    protected $functionCalled;

    public function __construct()
    {

        if (app('locale') == '') {
            $this->segment = Request::segment(1);
            $this->controller = Request::segment(2);
            $this->functionCalled = Request::segment(3);
        } else {
            $this->segment = Request::segment(2);
            $this->controller = Request::segment(3);
            $this->functionCalled = Request::segment(4);
        }

        if ($this->segment == 'cpAdmin') {
            $this->auth = Auth::guard('employee')->user();
            $this->employee_id = isset(Auth::guard('employee')->user()->id) ? Auth::guard('employee')->user()->id : 0;
        }

    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::guard('employee')->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest(app('locale') .'/cpAdmin/login');
            }
        }else {

            $userRequest = [
                'controller' => $this->controller
                , 'functionCalled' => $this->functionCalled
                , 'method' => $request->method()
                , 'requestUri' => $request->getRequestUri()
                , 'prefix' => $this->segment
                , 'currentRoute' => \Illuminate\Support\Facades\Route::getCurrentRoute()
            ];
            $baseModel = new BaseModel();
            $result = $baseModel->checkPermission($userRequest, $this->employee_id);

            if (!$result) {
                if ($request->ajax() || $request->wantsJson()) {
                    return response('Access Denied.', 302);
                } else {
                    return abort(302);
                }
            }

        }

//        if (! Auth::guard('employee')->check()) {
//            return redirect('/cpAdmin/login');
//        }

        return $next($request);
    }
}
