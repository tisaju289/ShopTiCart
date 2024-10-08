@extends('super-admin-panel.layouts.master')

@section('content')

<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Add Tenant</h4>
                <h6><a href="{{ route('tenants.index')}}">All tenant /</a> Create new tenant category</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">

                    <!-- Laravel form for creating a category -->
                    <form action="{{ route('tenants.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>tenant Name *</label>
                                <input type="text" name="name" class="form-control"  placeholder="" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>domain</label>
                                <input type="text" name="domain" class="form-control"  placeholder="">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>subdomain</label>
                                <input type="text" name="subdomain" class="form-control"  placeholder="" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="plan" class="form-label">Plan</label>
                                <select class="form-select" id="plan" name="plan">
                                    <option value="free" {{ old('plan') == 'free' ? 'selected' : '' }}>Free</option>
                                    <option value="premium" {{ old('plan') == 'premium' ? 'selected' : '' }}>Premium</option>
                                    <option value="enterprise" {{ old('plan') == 'enterprise' ? 'selected' : '' }}>Enterprise</option>
                                </select>
                            </div>
                        </div>

                   
                        
                      
                            <div class="form-group">
                                <label for="status">Status:</label>
                                <input type="checkbox" name="status" value="1">
                            </div>
                      


                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
   
    document.getElementById('tenantName').addEventListener('input', function() {
        var name = this.value;
        var slug = name.toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        document.getElementById('tenantSlug').value = slug;
    });

   
    document.getElementById('imageInput').addEventListener('change', function(event) {
        var imagePreview = document.getElementById('imagePreview');
        var file = event.target.files[0];
        
        if (file) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '/admin-panel/assets/img/icons/upload.svg';
        }
    });
</script>




@endSection