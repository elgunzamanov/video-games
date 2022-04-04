@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session("error_password"))
    <div class="alert alert-danger">
        Current password entered incorrectly!
    </div>
@endif

@if(session("error"))
    <div class="alert alert-danger">
        An unexpected error occurred!
    </div>
@endif

@if(session("error_users_email"))
    <div class="alert alert-danger">
        This email has already been used!
    </div>
@endif

@if(session("success"))
    <div class="alert alert-success">
        The operation was completed successfully!
    </div>
@endif
