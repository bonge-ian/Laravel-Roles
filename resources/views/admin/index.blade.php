@extends('layouts.app')

@section('content')

<section class="grid-x grid-padding-x align-center">
    <div class="small-11 medium-10 cell">
        <div class="card">

            <div class="card-divider align-center">
                <h3>Manage Users</h3>
            </div>

            <div class="card-section">

            <div class="grid-x grid-padding-x align-center">
                <div class="small-11 cell">
    
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th colspan="3">Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</td>
                                <td colspan="3">
                                    <div class="button-group">
                                        <a href="{{ route('admin.users.edit', $user->id) }}" class="button radius secondary">Edit Role</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="button radius alert">Delete User</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                        
                        
                    </table>
                   {{ $users->links() }}
                </div>
            </div>

        </div>

        </div>
        
    </div>
</section>

@endsection
