<form class="work_image_form" data-id="{{ $data_id }}">
    @component('admin.components.forms.input')
        @slot('input_label')
            
        @endslot
        @slot('input_type')
            hidden
        @endslot
        @slot('input_name')
            work_id
        @endslot
        @slot('input_id')
            work_id
        @endslot
        @slot('input_placeholder')
            
        @endslot
        @slot('input_value')
            {{ $work_id }}
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
    @component('admin.components.forms.submit')
        @slot('submit_id')
            team_submit
        @endslot
        @slot('submit_value')
            Submit
        @endslot
    @endcomponent
</form>