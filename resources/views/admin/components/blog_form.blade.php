<form class="blog_form" data-id="{{ $data_id }}" enctype="multipart/form-data">
    @component('admin.components.forms.input')
        @slot('input_label')
            Title
        @endslot
        @slot('input_type')
            text
        @endslot
        @slot('input_name')
            title
        @endslot
        @slot('input_id')
            blog_title
        @endslot
        @slot('input_placeholder')
            Blog Title
        @endslot
        @slot('input_value')
            {{ $title_value }}
        @endslot
    @endcomponent
    @component('admin.components.forms.input')
        @slot('input_label')
            Author
        @endslot
        @slot('input_type')
            text
        @endslot
        @slot('input_name')
            author
        @endslot
        @slot('input_id')
            blog_author
        @endslot
        @slot('input_placeholder')
            Blog Author
        @endslot
        @slot('input_value')
            {{ $author_value }}
        @endslot
    @endcomponent
    @component('admin.components.forms.textarea')
        @slot('textarea_label')
            Blog
        @endslot
        @slot('textarea_id')
            blog_body
        @endslot
        @slot('textarea_name')
            body
        @endslot
        @slot('textarea_placeholder')
            Body
        @endslot
        @slot('textarea_rows')
            10
        @endslot
        @slot('textarea_value')
            {{ $body_value }}
        @endslot
    @endcomponent
    @component('admin.components.forms.textarea')
        @slot('textarea_label')
            Blog Summary
        @endslot
        @slot('textarea_id')
            blog_summary
        @endslot
        @slot('textarea_name')
            summary
        @endslot
        @slot('textarea_placeholder')
            Blog Summary
        @endslot
        @slot('textarea_rows')
            3
        @endslot
        @slot('textarea_value')
            {{ $summary_value }}
        @endslot
    @endcomponent
    @component('admin.components.forms.file_input')
        @slot('input_label')
            Photo
        @endslot
        @slot('input_id')
            image_upload
        @endslot
        @slot('input_name')
            file
        @endslot
        @slot('input_accept')
            image/jpg, image/jpeg, image/png
        @endslot
    @endcomponent
    @component('admin.components.forms.input')
        @slot('input_label')
            Publication Date
        @endslot
        @slot('input_type')
            date
        @endslot
        @slot('input_name')
            publication_date
        @endslot
        @slot('input_id')
            publication_date
        @endslot
        @slot('input_placeholder')
            Publication Date
        @endslot
        @slot('input_value')
            {{ $publication_date }}
        @endslot
    @endcomponent
    @component('admin.components.forms.submit')
        @slot('submit_id')
            blog_submit
        @endslot
        @slot('submit_value')
            Submit
        @endslot
    @endcomponent
</form>