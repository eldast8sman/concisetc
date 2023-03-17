<form class="team_form" data-id="{{ $data_id }}">
    @component('admin.components.forms.input')
        @slot('input_label')
            Name
        @endslot
        @slot('input_type')
            text
        @endslot
        @slot('input_name')
            name
        @endslot
        @slot('input_id')
            team_name
        @endslot
        @slot('input_placeholder')
            Firstname Lastname
        @endslot
        @slot('input_value')
            {{ $name_value }}
        @endslot
    @endcomponent
    @component('admin.components.forms.input')
        @slot('input_label')
            Position
        @endslot
        @slot('input_type')
            text
        @endslot
        @slot('input_name')
            position
        @endslot
        @slot('input_id')
            team_position
        @endslot
        @slot('input_placeholder')
            Team Member's Position
        @endslot
        @slot('input_value')
            {{ $position_value }}
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