<form class="work_form" data-id="">
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
            work_title
        @endslot
        @slot('input_placeholder')
            Project Title
        @endslot
        @slot('input_value')
            
        @endslot
    @endcomponent
    @component('admin.components.forms.textarea')
        @slot('textarea_label')
            Summary
        @endslot
        @slot('textarea_id')
            work_summary
        @endslot
        @slot('textarea_name')
            summary
        @endslot
        @slot('textarea_placeholder')
            Project Summary
        @endslot
        @slot('textarea_rows')
            3
        @endslot
        @slot('textarea_value')
            
        @endslot
    @endcomponent
    @component('admin.components.forms.textarea')
        @slot('textarea_label')
            Problem
        @endslot
        @slot('textarea_id')
            work_problem
        @endslot
        @slot('textarea_name')
            problem
        @endslot
        @slot('textarea_placeholder')
            Project Problem
        @endslot
        @slot('textarea_rows')
            5
        @endslot
        @slot('textarea_value')
            
        @endslot
    @endcomponent
    @component('admin.components.forms.textarea')
        @slot('textarea_label')
            Solution
        @endslot
        @slot('textarea_id')
            work_solution
        @endslot
        @slot('textarea_name')
            solution
        @endslot
        @slot('textarea_placeholder')
            Project Solution
        @endslot
        @slot('textarea_rows')
            5
        @endslot
        @slot('textarea_value')
            
        @endslot
    @endcomponent
    @component('admin.components.forms.textarea')
        @slot('textarea_label')
            Conclusion
        @endslot
        @slot('textarea_id')
            work_conclusion
        @endslot
        @slot('textarea_name')
            conclusion
        @endslot
        @slot('textarea_placeholder')
            Project Conclusion
        @endslot
        @slot('textarea_rows')
            5
        @endslot
        @slot('textarea_value')
            
        @endslot
    @endcomponent
    @component('admin.components.forms.input')
        @slot('input_label')
            URL
        @endslot
        @slot('input_type')
            url
        @endslot
        @slot('input_name')
            work_url
        @endslot
        @slot('input_id')
            work_url
        @endslot
        @slot('input_placeholder')
            Project URL
        @endslot
        @slot('input_value')
            
        @endslot
    @endcomponent
    @component('admin.components.forms.textarea')
        @slot('textarea_label')
            Tags
        @endslot
        @slot('textarea_id')
            work_tags
        @endslot
        @slot('textarea_name')
            tags
        @endslot
        @slot('textarea_placeholder')
            Project Tags
        @endslot
        @slot('textarea_rows')
            2
        @endslot
        @slot('textarea_value')
            
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
            work_submit
        @endslot
        @slot('submit_value')
            Submit
        @endslot
    @endcomponent
</form>