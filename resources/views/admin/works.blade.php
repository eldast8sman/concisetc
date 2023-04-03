@extends('layouts.admin.other_app')

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
                    All Uploaded Projects
                @endslot
                @slot('other_links')
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Projects</a></li>
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-12">
                    @component('admin.components.cards')
                        @slot('title')
                            Projects
                        @endslot
                        @slot('body')
                            <p class="py-3">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add_work_modal">Add Project</button>
                            </p>
                            <div class="row">
                                @foreach ($projects as $project)
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                        <a href="{{ env('ADMIN_URL') }}/projects/{{ $project->slug }}">
                                            @component('admin.components.cards')
                                                @slot('title')
                                                    {{ $project->title }}
                                                @endslot
                                                @slot('body')
                                                    <div style="
                                                        height: 200px;
                                                        background-image: url({{ $project->filename }});
                                                        background-repeat: no-repeat;
                                                        background-size: contain;
                                                        background-position: center center;
                                                        margin: 0 auto;
                                                    ">
                                                    </div>
                                                    <div class="mt-2" style="height: 80px">
                                                        <p class="text-dark">{{ $project->summary }}</p>
                                                    </div>
                                                @endslot
                                            @endcomponent
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endslot
                    @endcomponent
                </div>
                <div class="row">
                    <div class="col-12">{{ $projects->links() }}</div>
                </div>
                @component('admin.components.long_modal')
                    @slot('modal_id')
                        add_work_modal
                    @endslot
                    @slot('modal_title')
                        Add a Project
                    @endslot
                    @slot('modal_body')
                        <div class="col-12 py-3">
                            @component('admin.components.work_add_form')
                                
                            @endcomponent
                        </div>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection