@extends('admin.layouts.admin')
@section('content')
<div class="dash-app">
    <div class="dass-midd-padd">
        @include('admin.layouts.admin_header')
        <div class="camp-create-sec create-admin-main-sec">
            <div class="camp-midd-sec">
                <div class="setting-midd-part">
                    <div class="task-detail-sec">
                        <div class="profile-form-section">
                            <div class="profile-form-part">
                                <div class="setting-middle-section">
                                    <form class="items-center" action="{{ route('admin.sia_licence.update', base64_encode($sia->sia_id)) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="flex-center-between setting-title-border">
                                            <div class="setting-h-con">
                                                <h6>{{ __('Create Sia Licence')}}</h6>
                                            </div>
                                            <div class="save-setting mb-2">
                                                <button type="submit" class="btn btn-primary">{{ __('Save')}}</button>
                                            </div>
                                        </div>

                                        <div class="setting-form-section">
                                            <div class="setting-row">
                                                <div class="set-lebal-title">{{ __('Sia Licence Name')}}</div>
                                                <div class="set-inputfield">
                                                    <input type="text" name="licence_name" value="{{ old('licence_name', $sia->name) }}" class="form-control prmcd" placeholder="Sia Licence Name">
                                                    @error('licence_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="setting-row">
                                                <div class="set-lebal-title">{{ __('Logo')}}</div>
                                                <div class="set-inputfield">
                                                    <input type="file" name="logo" id="logo" class="form-control prmcd">
                                                    @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="setting-row">
                                                <div class="set-lebal-title">{{ __('Current Logo')}}</div>
                                                <div class="set-inputfield">
                                                    <img src="{{ GetStoragePath($sia->logo) }}" />
                                                </div>
                                            </div>

                                            <div class="setting-row status-setting">
                                                <div class="set-lebal-title">{{ __('Status') }}</div>
                                                <div class="set-inputfield">
                                                    <div class="d-flex">
                                                        <div class="form-check me-4">
                                                            <input class="form-check-input me-2" type="radio" name="status" value="1" id="active" {{ $sia->status == 1 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="active">
                                                                {{ __('Active') }}
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input me-2" type="radio" name="status" value="0" id="deactive" {{ $sia->status == 0 ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="deactive">
                                                                {{ __('Disabled') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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