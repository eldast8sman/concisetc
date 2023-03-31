@extends('layouts.admin.backup_app')

@section('title')
    Concise Admin || Projects
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @component('admin.components.breadcrumbs')
                @slot('page_header')
                    Projects
                @endslot
                @slot('page_desc')
                    {{ $project->title }}
                @endslot
                @slot('other_links')
                    <li class="breadcrumb-item"><a href="{{ env('ADMIN_URL') }}projects">Projects</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $project->title }}</a></li>
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-12">
                    @component('admin.components.cards')
                        @slot('title')
                            {{ $project->title }}
                        @endslot
                        @slot('body')
                            <div class="col-lg-9 col-md-12 mx-auto text-justify text-dark">
                                <p class="text-dark">
                                    <strong>Summary</strong>
                                    <br>
                                    {{ $project->summary }}
                                </p>
                                <p class="text-dark">
                                    <strong>Problem</strong>
                                    <br>
                                    {{ $project->problem }}
                                </p>
                                <p class="text-dark">
                                    <strong>Solution</strong>
                                    <br>
                                    {{ $project->solution }}
                                </p>
                                <p class="text-dark">
                                    <strong>Conclusion</strong>
                                    <br>
                                    {{ $project->conclusion }}
                                </p>
                                <p>
                                    <strong>Tags</strong>
                                    <br>
                                    {{ $project->tags }}
                                </p>
                                <p>
                                    <strong>Project URL</strong>
                                    <a href="{{ $project->work_url }}">{{ $project->work_url }}</a>
                                </p>
                                <p>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_work_modal">Edit</button>
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete_work_modal">Delete</button>

                                    @component('admin.components.long_modal')
                                        @slot('modal_id')
                                            edit_work_modal
                                        @endslot  
                                        @slot('modal_title')
                                            Edit Project
                                        @endslot
                                        @slot('modal_body')
                                            <div class="col-12 py-3">
                                                @component('admin.components.work_form')
                                                    @slot('data_id')
                                                        {{ $project->id }}
                                                    @endslot
                                                    @slot('title_value')
                                                        {{ $project->title }}
                                                    @endslot
                                                    @slot('summary_value')
                                                        {{ $project->summary }}
                                                    @endslot
                                                    @slot('problem_value')
                                                        {{ $project->problem }}
                                                    @endslot
                                                    @slot('solution_value')
                                                        {{ $project->solution }}
                                                    @endslot
                                                    @slot('conclusion_value')
                                                        {{ $project->conclusion }}
                                                    @endslot
                                                    @slot('url_value')
                                                        {{ $project->work_url }}
                                                    @endslot
                                                    @slot('tags_value')
                                                        {{ $project->tags }}
                                                    @endslot
                                                @endcomponent
                                            </div>
                                        @endslot
                                    @endcomponent
                                    @component('admin.components.small_modal')
                                        @slot('modal_id')
                                            delete_work_modal
                                        @endslot
                                        @slot('modal_title')
                                            Delete {{ $project->title }}
                                        @endslot
                                        @slot('modal_body')
                                            Do you really want to delete {{ $project->title }} as a Project from this Website? <br />
                                            Please note that this is not reversible
                                            <p class="text-center">
                                                <button class="btn btn-danger mt-4" data-id="{{ $project->id }}" id="delete_project">Delete</button>
                                            </p>
                                        @endslot
                                    @endcomponent
                                </p>
                            </div>
                        @endslot
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection