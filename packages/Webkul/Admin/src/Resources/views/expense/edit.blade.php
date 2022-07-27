@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.expenses.edit-title') }}
@stop

@section('content-wrapper')
    <div class="content full-page adjacent-center">
        {!! view_render_event('admin.expenses.edit.header.before', ['expenses' => $expenses]) !!}

        <div class="page-header">

            {{ Breadcrumbs::render('expenses.edit', $expenses) }}

            <div class="page-title">
                <h1>{{ __('admin::app.expenses.edit-title') }}</h1>
            </div>
        </div>

        {!! view_render_event('admin.expenses.edit.header.after', ['expenses' => $expenses]) !!}

        <form method="POST" action="{{ route('admin.expenses.update', $expenses->id) }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-content">
                <div class="form-container">

                    <div class="panel">
                        <div class="panel-header">
                            {!! view_render_event('admin.expenses.edit.form_buttons.before', ['expenses' => $expenses]) !!}

                            <button type="submit" class="btn btn-md btn-primary">
                                {{ __('admin::app.expenses.save-btn-title') }}
                            </button>

                            <a href="{{ route('admin.expenses.index') }}">{{ __('admin::app.expenses.back') }}</a>

                            {!! view_render_event('admin.expenses.edit.form_buttons.after', ['expenses' => $expenses]) !!}
                        </div>
        
                        <div class="panel-body">
                            {!! view_render_event('admin.expenses.edit.form_controls.before', ['expenses' => $expenses]) !!}

                            @csrf()

                            <input name="_method" type="hidden" value="PUT">
                
                            @include('admin::common.custom-attributes.edit', [
                                'customAttributes' => app('Webkul\Attribute\Repositories\AttributeRepository')->findWhere([
                                    'entity_type' => 'expenses',
                                ]),
                                'entity'           => $expenses,
                            ])

                            {!! view_render_event('admin.expenses.edit.form_controls.after', ['expenses' => $expenses]) !!}

                        </div>
                    </div>

                </div>

            </div>

        </form>

    </div>
@stop