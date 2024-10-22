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
                                    <form class="items-center" action="{{ route('admin.general_setting.save') }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="flex-center-between setting-title-border">
                                            <div class="setting-h-con">
                                                <h6>{{ __('General Settings')}}</h6>
                                            </div>
                                            <div class="save-setting mb-2">
                                                <button type="submit" class="btn btn-primary">{{ __('Save')}}</button>
                                            </div>
                                        </div>

                                        @if(!empty($general_setting))
                                        <input type="hidden" value="{{$general_setting->id}}" name="general_setting_id">
                                        @endif

                                        <div class="setting-form-section">
                                            <div class="setting-row">
                                                <div class="set-lebal-title">{{ __('Logo')}}</div>
                                                <div class="set-inputfield">
                                                    <input type="file" name="logo" id="logo" class="form-control prmcd">
                                                    @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            @if(!empty($general_setting))
                                            <div class="setting-row">
                                                <div class="set-lebal-title">{{ __('Current Logo')}}</div>
                                                <div class="set-inputfield">
                                                    <img src="{{ asset('storage/' . $general_setting->logo) }}" />
                                                </div>
                                            </div>
                                            @endif

                                            <div class="setting-row">
                                                <div class="set-lebal-title">{{ __('Login Screen Text') }}</div>
                                                <div class="set-inputfield">
                                                    <textarea name="login_screen_text" class="form-control prmcd">{{ old('login_screen_text', !empty($general_setting) ? $general_setting->login_screen_text : '') }}</textarea>
                                                    @error('login_screen_text')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
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