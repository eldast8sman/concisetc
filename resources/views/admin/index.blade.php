@extends('layouts.admin.app')

@section('title')
    Concise Admin
@endsection

@section('content')
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @component('admin.components.cards')
                            @slot('title')
                                Team Members
                            @endslot
                            @slot('body')
                                <p class="py-3">
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#add_team_modal">Add Team Member</button>
                                </p>
                                <div class="row">
                                    @foreach ($teams as $team)
                                        <div class="col-lg-4 col-md-6 col-sm-12">
                                            @component('admin.components.cards')
                                                @slot('title')
                                                    
                                                @endslot
                                                @slot('body')
                                                    <div style="
                                                        height: 300px;
                                                        background-image: url({{ $team->filename }});
                                                        background-size: contain;
                                                        background-position: center center;
                                                        background-repeat: no-repeat;
                                                    ">
                                                        <img src="{{ $team->filename }}" alt="{{ $team->name }}" height="300px" style="opacity: 0">
                                                    </div>
                                                    <p class="col-12">
                                                        <table>
                                                            <tr>
                                                                <td><strong>Name: </strong></td><td>{{ $team->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td><strong>Position: </strong></td><td>{{ $team->position }}</td>
                                                            </tr>
                                                        </table>
                                                    </p>
                                                    <p class="col-12">
                                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#edit_team_modal_{{ $team->id }}">Edit Team</button>
                                                        <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete_team_modal_{{ $team->id }}">Delete</button>
                                                    </p>
                                                    @component('admin.components.long_modal')
                                                        @slot('modal_id')
                                                            edit_team_modal_{{ $team->id }}
                                                        @endslot
                                                        @slot('modal_title')
                                                            Edit Team
                                                        @endslot
                                                        @slot('modal_body')
                                                            <div class="col-12 py-3">
                                                                @component('admin.components.team_form')
                                                                    @slot('data_id')
                                                                        {{ $team->id }}
                                                                    @endslot
                                                                    @slot('name_value')
                                                                        {{ $team->name }}
                                                                    @endslot
                                                                    @slot('position_value')
                                                                        {{ $team->position }}
                                                                    @endslot
                                                                @endcomponent
                                                            </div>
                                                        @endslot
                                                    @endcomponent

                                                    @component('admin.components.small_modal')
                                                        @slot('modal_id')
                                                            delete_team_modal_{{ $team->id }}
                                                        @endslot
                                                        @slot('modal_title')
                                                            Delete {{ $team->position }}
                                                        @endslot
                                                        @slot('modal_body')
                                                            Do you really want to delete {{ $team->name }} as the {{ $team->position }} of Concise?
                                                            Please note that this is not reversible
                                                            <p class="text-center">
                                                                <button class="btn btn-danger mt-4 delete_team" data-id="{{ $team->id }}">Delete</button>
                                                            </p>
                                                        @endslot
                                                    @endcomponent
                                                @endslot
                                            @endcomponent
                                        </div>
                                    @endforeach
                                </div>
                                @component('admin.components.long_modal')
                                    @slot('modal_id')
                                        add_team_modal
                                    @endslot
                                    @slot('modal_title')
                                        Add Team
                                    @endslot
                                    @slot('modal_body')
                                        <div class="col-12 py-3">
                                            @component('admin.components.team_form')
                                                @slot('data_id')
                                                    
                                                @endslot
                                                @slot('name_value')
                                                    
                                                @endslot
                                                @slot('position_value')
                                                    
                                                @endslot
                                            @endcomponent
                                        </div>
                                    @endslot
                                @endcomponent
                            @endslot
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection