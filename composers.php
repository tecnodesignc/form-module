<?php

view()->composer(['form::admin.forms.create', 'form::admin.forms.edit'], \Modules\Form\Composers\TemplateViewComposer::class);
