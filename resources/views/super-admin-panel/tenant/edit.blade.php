@extends('super-admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Edit Tenant</h4>
                <h6><a href="{{ route('tenants.index')}}">All tenants /</a> Edit tenant category</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Laravel form for editing a tenant -->
                    <form action="{{ route('tenants.update', $tenant->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- Use PUT method for updating -->
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Tenant Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $tenant->name) }}" required>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Domain</label>
                                <input type="text" name="domain" class="form-control" value="{{ old('domain', $tenant->domain) }}">
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Subdomain</label>
                                <input type="text" name="subdomain" class="form-control" value="{{ old('subdomain', $tenant->subdomain) }}" required>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="plan" class="form-label">Plan</label>
                                <select class="form-select" id="plan" name="plan">
                                    <option value="free" {{ old('plan', $tenant->plan) == 'free' ? 'selected' : '' }}>Free</option>
                                    <option value="premium" {{ old('plan', $tenant->plan) == 'premium' ? 'selected' : '' }}>Premium</option>
                                    <option value="enterprise" {{ old('plan', $tenant->plan) == 'enterprise' ? 'selected' : '' }}>Enterprise</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="checkbox" name="status" value="1" {{ old('status', $tenant->status) == 'active' ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                            <a href="{{ route('tenants.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
