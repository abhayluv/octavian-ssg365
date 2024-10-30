@extends('admin.layouts.admin')
@section('content')
<div class="dash-app">
    <div class="dass-midd-padd">
        @include('admin.layouts.admin_header')
        <div class="camp-create-sec create-admin-main-sec">
            <div class="formwhitebg form-secton none-whitebg">
                <div class="setting-midd-part">
                    <div class="task-detail-sec">
                        <div class="profile-form-section">
                            <div class="profile-form-part">
                                <div class="setting-middle-section">
                                    <!--  Start:: Delete Row -->
                                    <form action="" id="deleteRow" method="POST" style="display:inline;" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    <!--  End:: Delete Row -->
                                    <form class="items-center" action="{{ route('admin.intro_screen.save') }}" method="POST" id="form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="flex-center-between setting-title-border">
                                            <div class="setting-h-con">
                                                <h6>{{ __('Intro Screen') }}</h6>
                                            </div>
                                            <div class="save-setting mb-2">
                                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                            </div>
                                        </div>

                                        @if(!empty($intro_screen_data))
                                        <div class="table-border-none staff-table addremove-table">
                                            <div class="commontable tablesection invoice-table table-responsive mob-border-none odd-even-table add-remove-table-sec">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Image') }}</th>
                                                            <th>{{ __('Existing Image') }}</th>
                                                            <th>{{ __('Title') }}</th>
                                                            <th>{{ __('Action') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="introscreen">
                                                        @foreach($intro_screen_data as $intro_screen)
                                                        <tr>
                                                            <input type="hidden" name="id[]" value="{{ $intro_screen->id }}" />
                                                            <td>
                                                                <input type="file" name="image[]" class="form-control prmcd" data-existing-image="{{ $intro_screen->image ? 'true' : 'false' }}">
                                                            </td>
                                                            <td>
                                                                <img src="{{ GetStoragePath($intro_screen->image) }}" />
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="" value="{{ $intro_screen->title }}" name="title[]" autocomplete="off" class="form-control" />
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger" onclick="removeRow('{{ $intro_screen->id }}')">{{ __('Remove') }}</button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="addmorerowbtn">
                                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="add_row()">{{ __('Add Row') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="table-border-none staff-table addremove-table">
                                            <div class="commontable tablesection invoice-table table-responsive mob-border-none odd-even-table add-remove-table-sec">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>{{ __('Image') }}</th>
                                                            <th>{{ __('Title') }}</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="introscreen">
                                                        <tr>
                                                            <td>
                                                                <input type="file" name="image[]" class="form-control prmcd">
                                                            </td>
                                                            <td>
                                                                <input type="text" placeholder="" value="" name="title[]" autocomplete="off" class="form-control" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div class="addmorerowbtn">
                                                    <a href="javascript:void(0);" class="btn btn-primary" onclick="add_row()">{{ __('Add Row') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom_javascript')
<script>
    function add_row() {
        var html = `<tr>
                        <td>
                            <input type="file" name="image[]" class="form-control prmcd">
                        </td>
                        <td>
                            <input type="text" placeholder="Title" value="" name="title[]" autocomplete="off" class="form-control" />
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm remove-row" style="float: right;">Remove</button>
                        </td>
                    </tr>`;

        $("#introscreen").append(html);
        reinit();
    }

    $(document).on('click', '#introscreen .remove-row', function() {
        $(this).closest('tr').remove();
    });

    $(document).ready(function() {
        $('#form').on('submit', function(event) {
            let valid = true;

            $('input[name="title[]"]').each(function() {
                const input = $(this);
                const errorDiv = input.parent().find('.text-danger');

                if (!input.val().trim()) {
                    valid = false;
                    input.addClass('is-invalid');
                    if (errorDiv.length === 0) {
                        const errorMsg = $('<div class="text-danger">This field is required</div>');
                        input.parent().append(errorMsg);
                    }
                } else {
                    input.removeClass('is-invalid');
                    errorDiv.remove();
                }
            });

            $('input[name="image[]"]').each(function() {
                const input = $(this);
                const errorDiv = input.parent().find('.text-danger');
                const existingImage = input.data('existing-image');

                if (!existingImage && !input.val().trim()) {
                    valid = false;
                    input.addClass('is-invalid');
                    if (errorDiv.length === 0) {
                        const errorMsg = $('<div class="text-danger">This field is required</div>');
                        input.parent().append(errorMsg);
                    }
                } else {
                    input.removeClass('is-invalid');
                    errorDiv.remove();
                }
            });

            if (!valid) {
                event.preventDefault();
            }
        });
    });

    function removeRow(id) {
        if (confirm('Are you sure you want to delete this Record?')) {
            let action = "{{ route('admin.intro_screen.delete', ':id') }}";
            action = action.replace(':id', id);
            $('#deleteRow').attr('action', action);
            $('#deleteRow').submit();
        }
    }
</script>
@endsection