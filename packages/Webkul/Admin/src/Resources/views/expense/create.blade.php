@extends('admin::layouts.master')

@section('page_title')
    {{ __('admin::app.expenses.create-title') }}
@stop

@section('content-wrapper')
    <div class="content full-page adjacent-center">
        {!! view_render_event('admin.expenses.create.header.before') !!}

        <div class="page-header">

            {{ Breadcrumbs::render('expenses.create') }}

            <div class="page-title">
                <h1>{{ __('admin::app.expenses.create-title') }}</h1>
            </div>
        </div>

        {!! view_render_event('admin.expenses.create.header.after') !!}

        <form method="POST" action="{{ route('admin.expenses.store') }}" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-content">
                <div class="form-container">

                    <div class="panel">
                        <div class="panel-header">
                            {!! view_render_event('admin.expenses.create.form_buttons.before') !!}

                            <button type="submit" class="btn btn-md btn-primary">
                                {{ __('admin::app.expenses.save-btn-title') }}
                            </button>

                            <a href="{{ route('admin.expenses.index') }}">{{ __('admin::app.expenses.back') }}</a>

                            {!! view_render_event('admin.expenses.create.form_buttons.after') !!}
                        </div>
        
                        <div class="panel-body">
                            {!! view_render_event('admin.expenses.create.form_controls.before') !!}

                            @csrf()

                            @include('admin::common.custom-attributes.edit', [
                                'customAttributes' => app('Webkul\Attribute\Repositories\AttributeRepository')->findWhere([
                                    'entity_type' => 'expenses',
                                ]),
                            ])

                            {!! view_render_event('admin.expenses.create.form_controls.after') !!}

                        </div>
                    </div>

                </div>

            </div>

        </form>

    </div>
@stop