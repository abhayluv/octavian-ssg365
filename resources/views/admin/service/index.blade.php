@extends('admin.layouts.admin')
@section('content')
<div class="dash-app">
    <div class="dass-midd-padd">
        @include('admin.layouts.admin_header')
        <div class="camp-create-sec">
            <div class="billing-page-sec px-0">
                <div class="invoices-secion billing-invoices-sec">
                    <div class="graph-exp-sec flex-center-between flex-wrap filter-create-btn">
                        <div class="right-btn camp-filterbtn top-search-filter">
                            <div class="search-form camp-search">
                                <form action="" method="GET">
                                    <div class="header-row flex-center-between mob-fix-header mon-flex-wrap">
                                        <div class="header-col h-right date-select-top overview-gap hed-ovr-mob-flex-wrap">
                                            <input type="submit" name="filter" value="">
                                            <input type="text" id="search" name="search" value="{{ request('search') }}" class="form-control form-input" placeholder="Search">
                                            <button type="submit" class="btn btn-primary" name="filter">Search</button>
                                            <a class="btn btn-primary" href="{{ route('admin.manage_service.index')}}">Reset</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="actions">
                            <a href="{{ route('admin.manage_service.create') }}" class="btn btn-primary btn-sm">Create</a>
                        </div>
                    </div>

                    <div class="table-border-none staff-table">
                        <div class="commontable tablesection invoice-table table-responsive odd-even-table">
                            <table class="table" id="zero_config">
                                <thead>
                                    <tr>
                                        <th>{{ __('Id') }}</th>
                                        <th>{{ __('Service Name') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }} </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($service_data as $service)
                                    <tr>
                                        <td>{{$loop->index + 1}}</td>
                                        <td>{{$service->name}}</td>
                                        <td>
                                            @if($service->status== 1)
                                            {{__('Active')}}
                                            @else
                                            {{__('Deactive')}}
                                            @endif
                                        </td>
                                        <td class="action-btn-width-setting">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('admin.manage_service.edit', base64_encode($service->ser_id)) }}" class="btn btn-white"><img src="{{ asset('images/edit-pen-icon.svg') }}" alt=""></a>
                                                    <a href="javascript:void(0)" onclick="event.preventDefault(); if (confirm('Are you sure you want to delete this record?')) submitForm('delete-form-{{ base64_encode($service->ser_id) }}');" class="btn btn-white delete-package">
                                                        <img src="{{ asset('images/trash-detete-icon.svg') }}" alt="">
                                                    </a>
                                                    <form id="delete-form-{{ base64_encode($service->ser_id) }}" action="{{ route('admin.manage_service.delete', base64_encode($service->ser_id)) }}" method="post" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </li>

                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- <div class="pagination-cls pt-4">
                        {{ $service_data->withQueryString()->links() }}
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('custom_javascript')
<script>
    function submitForm(formId) {
        document.getElementById(formId).submit();
    }
</script>
@endsection