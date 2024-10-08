@extends('super-admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">

     

                <div class="page-header">
                <div class="page-title">
                <h4>Tenant List</h4>
                <h6>View/Search product tenant</h6>
                </div>
                <div class="page-btn">
                <a href="{{route('tenants.create')}}" class="btn btn-added">
                <img src="/admin-panel/assets/img/icons/plus.svg" class="me-1" alt="img">Add tenant
                </a>
                </div>
                </div>
                
        <div class="card">
            <div class="card-body">
                <div class="table-top">

                    <div class="search-set">
                        <div class="search-path">
                            <a class="btn btn-filter" id="filter_search">
                            <img src="/admin-panel/assets/img/icons/filter.svg" alt="img">
                            <span><img src="/admin-panel/assets/img/icons/closes.svg" alt="img"></span>
                            </a>
                        </div>

                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="/admin-panel/assets/img/icons/search-white.svg" alt="img"></a>
                        </div> 
                    </div>

                    <div class="wordset">
                        <ul>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="/admin-panel/assets/img/icons/pdf.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="/admin-panel/assets/img/icons/excel.svg" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="/admin-panel/assets/img/icons/printer.svg" alt="img"></a>
                            </li>
                        </ul>
                    </div>
                </div>
                
              
                <div class="table-responsive">
                <table class="table  datanew text-center">
                <thead class="text-center">
                <tr>
                
                <th>name</th>
                <th>domain</th>
                <th>subdomain</th>
                <th>plan</th>
                <th>status</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($tenants as $tenant)
                    <tr>
                        <td>{{ $tenant->name }}</td>
                        <td>
                            <a href="javascript:void(0);">{{ $tenant->domain }}</a>
                        </td>
                        <td>
                            <a href="{{ route('tenants.show', $tenant->id)}}">{{ $tenant->subdomain }}</a>
                        </td>
                        <td>
                            <a href="javascript:void(0);">{{ $tenant->plan }}</a>
                        </td>
                        <td>
                           @if ($tenant->status == 1)
                               <span class="badge bg-success">Active</span>
                           @else
                               <span class="badge bg-danger">Inactive</span>  
                           @endif
                        </td>
                        <td>
                            <!-- Edit Icon -->
                            <a class="me-3" href="{{ route('tenants.edit', $tenant->id) }}">
                                <img src="/admin-panel/assets/img/icons/edit.svg" alt="img">
                            </a>
                            <!-- Delete Icon with confirmation -->
                            <a href="javascript:void(0);" onclick="confirmDelete({{ $tenant->id }})" class="me-3">
                                <img src="/admin-panel/assets/img/icons/delete.svg" alt="img">
                            </a>
                
                            <!-- Hidden delete form -->
                            <form id="delete-form-{{ $tenant->id }}" action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
            </div>
        </div>              
    </div>
</div>


<script>
    function confirmDelete(tenantId) {
        if (confirm('Are you sure you want to delete this tenant?')) {
            document.getElementById('delete-form-' + tenantId).submit();
        }
    }
    
</script>

@endsection
