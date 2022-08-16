<?php

namespace Modules\Form\Events\Handlers;

use Illuminate\Contracts\Mail\Mailer;
use Modules\Form\Emails\Sendmail;
use Modules\Form\Events\LeadWasCreated;
use Illuminate\Support\Arr;

class SendEmail
{

    private $mail;
    private $setting;

    public function __construct(Mailer $mail)
    {
        $this->mail = $mail;
        $this->setting = app('Modules\Setting\Contracts\Setting');
    }

    public function handle(LeadWasCreated $event)
    {

        $leads = $event->entity;
        $form=$event->data['form'];
        $reply=$event->data['reply'];
        $sender = $this->setting->get('core::site-name');
        $subject = $form->title . " " . trans('form::forms.messages.from') . " " . $sender;
        $view = ['form::frontend.emails.form','form::frontend.emails.textform'];

        $formEmails = !empty($this->setting->get('form::form-emails'))?$this->setting->get('form::form-emails'):env('MAIL_FROM_ADDRESS');
        $emails = explode(',', $formEmails);

        if (isset($form->destination_email) && !empty($form->destination_email)) {
            Arr::add($emails, count($emails),$form->destination_email);
        }

        $this->mail->to($emails)->send(new Sendmail(['lead'=>$leads,'form'=>$form], $subject, 'form::frontend.emails.form'),function ($m) use($reply) {
            $m->replyTo($reply->to, $reply->toName);
        });

       if ($form->send_confirmation){

            $email_lead=$leads->values['email'];
            $subject=$form->subject;
            $template = $this->getTemplateForEmail($form);
            $this->mail->to($email_lead)->send(new Sendmail(['lead'=>$leads,'form'=>$form], $subject, $template),function ($m) use($reply) {
                $m->replyTo($reply->to, $reply->toName);
            });
        }

    }

    /**
     * Return the template for the given page
     * or the default template if none found
     * @param $form
     * @return string
     */
    private function getTemplateForEmail($form): string
    {
        return (view()->exists('forms.emails.response.'.$form->template)) ? 'forms.emails.response.'.$form->template : 'form::frontend.emails.form-response';
    }
}
