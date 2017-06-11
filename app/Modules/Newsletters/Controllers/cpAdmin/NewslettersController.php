<?php namespace App\Modules\Newsletters\Controllers\cpAdmin;

use App\Http\Requests\Request;
use App\Language;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Modules\Newsletters\Models\Newsletters;
use App\Http\Controllers\cpAdmin\cpAdminController;
use App\Modules\MailSender\Controllers\cpAdmin\MailSenderController;

class NewslettersController extends cpAdminController {

    protected $locale;
    protected $language;
    protected $langActive;
    protected $newsletters;

    public function __construct(Newsletters $newsletters, Language $language){
        $this->newsletters          = $newsletters;
        $this->language             = $language;
        $this->langActive           = app('getLocale');
        $this->locale               = app('locale') == '' ? '' : app('locale') . '.';
    }

    /**
     * Display a listing of the resource.
     *
     * @return Resource
     */
    public function index(){
        $request = \Request::all();
        $locale  = $this->locale;
        $lang    = $this->language->getLanguage($this->langActive);
        if(isset($request['filtering']) && $request['filtering']){
            $users  = $this->newsletters->getNewsletters($request);
        }else{
            $users  = $this->newsletters->getNewsletters();
        }
        $users  = view('Newsletters::render.list', compact('users', 'locale'))->render();

        return view('Newsletters::index', compact('locale', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Resource
     */
    public function create(){
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Resource
     */
    public function store(){
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Resource
     */
    public function show($id){
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Resource
     */
    public function edit($id){
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Resource
     */
    public function update($id){
        $newsletter         = $this->newsletters->find($id);
        $input['status']    = ($newsletter->status)?0:1;
        $newsletter->fill($input)->save();
        return $input['status'];
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Resource
     */
    public function destroy($id){
        $this->newsletters->find($id)->delete();
        return Redirect::back();
    }

    public function getMail($id){
        $result = view('Newsletters::render.mail', compact('id'))->render();
        return $result;
    }

    public function postMail($id){
        $input           = (object)Input::all();
        $user_newsletter = $this->newsletters->getValidUserEmail($id);

        $result = false;
        if(count($user_newsletter)){
            $input->path     = (isset($input->attach))?$this->UploadAttachFile($input->attach):null;
            $mail            = new MailSenderController();
            $mail->nameEmail = Config::get('app.webSiteName');
            $mail->message   = "Newsletters::emails.newsletter";
            $result          = $mail->setMail($input, $user_newsletter);
        }

        if($result){
            $message = ["valid"=>true, "text"=>"ایمیل شما با موفقیت ارسال شد."];
        }else{
            $message = ["valid"=>false, "text"=>"ارسال ایمیل با خطا رو به رو شده. لطفا دوباره سعی کنید"];
        }

        return Redirect::back()->with('message', $message);
    }

    private function UploadAttachFile($file){
        $file_path = null;
        if($file){
            $file_info  = explode('.', $file->getClientOriginalName());
            $exc        = end($file_info);
            $file_name  = 'irna_art.'.$exc;
            $file_path  = "uploads/attach_mail/".$file_name;
            if(file_exists($file_path)){unlink($file_path);}
            move_uploaded_file($file, $file_path);
        }
        return public_path().'/'.$file_path;
    }

}
