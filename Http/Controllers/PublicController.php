<?php

namespace Modules\Form\Http\Controllers;

// Requests & Response
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Form\Http\Requests\CreateFieldRequest;
use Modules\Form\Http\Requests\UpdateLeadRequest as UpdateRequest;
use Modules\Form\Repositories\FormRepository;
use Modules\Form\Repositories\LeadRepository;
use Modules\Form\Services\LeadsExportService;
use Modules\Core\Http\Controllers\BasePublicController;
use Illuminate\Support\Facades\Storage;

class PublicController extends BasePublicController
{

    private $lead;
    private $form;

    public function __construct(LeadRepository $lead, FormRepository $form)
    {
        parent::__construct();
        $this->lead = $lead;
        $this->form = $form;
    }


    public function store(CreateFieldRequest $request)
    {
         \DB::beginTransaction();
            try {
                $data = $request->all() ?? [];//Get data

                $form = $this->form->find($data['form_id']);
                if (empty($form->id)) {
                    throw new \Exception(trans('form::common.forms_not_found'));
                }


                $validator = \Validator::make($data, [
                    'g-recaptcha-response' => 'required|captcha'
                ]);
                if ($validator->fails()) {
                    $response['status']="fail";
                    $response['data']["g-recaptcha-response"] = trans('forms::common.captcha_required');
                }

                $attr = array();
                $attr['form'] = $form;
                $attr['form_id'] = $form->id;
                $attr['values'] = array();
                $attr['reply'] = ['to'=>env('MAIL_FROM_ADDRESS'),'toName'=>'Client'];
                $fields = $form->fields;
                foreach ($fields as $field) {
                    if ($field->name == 'email') {
                        $attr['reply']['to'] = $data[$field->name] ?? env('MAIL_FROM_ADDRESS');
                    }
                    if ($field->name == 'name') {
                        $attr['reply']['toName'] = $data[$field->name] ?? 'Client';
                    }

                    if($field->type=='file'){
                        if (isset($data[$field->name])){
                            $path= $data[$field->name]->store('invoices/'.time(),'publicmedia');
                            $attr['values'][$field->name] = $path;
                        }
                    }else{
                        $attr['values'][$field->name] = $data[$field->name];
                    }
                }
                $attr['reply']=json_decode(json_encode($attr['reply']));
                //Create item
                $newData = $this->lead->create($attr);
                \DB::commit();//Commit to Data Base
                return redirect()->route('form.thank');
            } catch (\Exception $e) {
                \DB::rollback();
                \Log::error($e);
                return redirect()->back()
                    ->withError($e->getMessage())->withInput($request->all());
            }
    }
    public function thank()
    {

        $lead['form']=$this->form->findBySystemName('inscription');
        $lead['lead']=$this->lead->find(275);
       return view('forms.emails.response.inscription',compact('lead'));

    }

}
