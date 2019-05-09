@extends('layouts.app')

@section('content')

<section class="grid-x grid-padding-x align-center">
    <div class="small-11 medium-10 cell">
        <div class="card">

            <div class="card-divider align-center">
                <h3>Edit User Roles</h3>
            </div>

        </div>
        <div class="card-section">

            <div class="grid-grid-padding-x align-center">
                <div class="small-9 cell">

                    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        @foreach ($roles as $role)
                            <div class="grid-x small-up-1">
                                <div class="cell">
                                    <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                    {{ $user->hasRole($role->name) ? 'checked' : '' }}>
                                    <label for="">{{ $role->name }}</label>
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="button radius">Update Role</button>
                    </form>
                    
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
