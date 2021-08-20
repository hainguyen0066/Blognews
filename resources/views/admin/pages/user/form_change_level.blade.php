
@php
use App\Helpers\Form as FormTemplate;
use App\Helpers\Template;

$formInputAttr = config('zvn.template.form_input');
$formLabelAttr = config('zvn.template.form_label_edit');

$levelValue       = ['default' => 'Select value', 'admin' => config('zvn.template.level.admin.name'), 'member' => config('zvn.template.level.member.name')];

$inputHiddenID    = Form::hidden('id', @$item['id']);
$inputHiddenTask  = Form::hidden('task', 'change-level');

$elements = [
    [
        'label'   => Form::label('level', 'Level', $formLabelAttr),
        'element' => Form::select('level', $levelValue, @$item['level'], $formInputAttr)
    ],[
        'element' => $inputHiddenID . $inputHiddenTask . Form::submit('Save', ['class'=>'btn btn-success']),
        'type'    => "btn-submit-edit"
    ]
];


@endphp

<div class="col-md-6 col-sm-12 col-xs-12">
<div class="x_panel">
    @include('admin.templates.x_title', ['title' => 'Quyền truy cập'])
    <div class="x_content">
        {{ Form::open([
            'method'         => 'POST',
            'url'            => route("$controllerName/level",[
                'level' => $user->level,
                'id' => $user->id
            ]),
            'accept-charset' => 'UTF-8',
            'enctype'        => 'multipart/form-data',
            'class'          => 'form-horizontal form-label-left',
            'id'             => 'main-form' ])  }}
            {!! FormTemplate::show($elements)  !!}
        {{ Form::close() }}
    </div>
</div>
</div>
