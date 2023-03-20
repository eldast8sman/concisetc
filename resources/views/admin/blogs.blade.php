@extends('layouts.admin.other_app')

@section('title')
    Concise Admin || Blogs
@endsection

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            @component('admin.components.breadcrumbs')
                @slot('page_header')
                    Blogs
                @endslot
                @slot('page_desc')
                    All Uploaded Blogs
                @endslot
                @slot('other_links')
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blogs</a></li>
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-12">
                    @component('admin.components.cards')
                        @slot('title')
                            Blogs
                        @endslot
                        @slot('body')
                            <p class="py-3">
                                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#add_blog_modal">Add Blog Post</button>
                            </p>
                            <div class="row">
                                @foreach ($blogs as $blog)
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                                        <a href="{{ env('ADMIN_URL') }}blogs/{{ $blog->slug }}">
                                            @component('admin.components.cards')
                                                @slot('title')
                                                    
                                                @endslot
                                                @slot('body')
                                                    <div style="
                                                        height: 200px;
                                                        background-image: url({{ $blog->filename }});
                                                        background-repeat: no-repeat;
                                                        background-size: contain;
                                                        background-position: center center;
                                                        margin: 0 auto;
                                                    ">
                                                    </div>
                                                    <div class="mt-2" style="height: 80px">
                                                        <h5 class="text-primary">{{ $blog->title }}</h5>
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
                    <div class="col-12">{{ $blogs->links(); }}</div>
                </div>
                @component('admin.components.long_modal')
                    @slot('modal_id')
                        add_blog_modal
                    @endslot
                    @slot('modal_title')
                        Add Blog post
                    @endslot
                    @slot('modal_body')
                        <div class="col-12 py-3">
                            @component('admin.components.blog_form')
                                @slot('data_id')
                                    
                                @endslot
                                @slot('title_value')
                                    
                                @endslot
                                @slot('author_value')
                                    
                                @endslot
                                @slot('body_value')
                                    
                                @endslot
                                @slot('summary_value')
                                    
                                @endslot
                                @slot('publication_date')
                                    
                                @endslot
                            @endcomponent
                        </div>
                    @endslot
                @endcomponent
            </div>
        </div>
    </div>
@endsection