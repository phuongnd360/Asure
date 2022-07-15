@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('Users Management') }}
                    @if($typeUser == 'admin')
                     <span style="float: right"><button type="button" class="btn btn-success btn-sm" title="Add User" onclick="location.href='{{ route('addUser') }}'"><i class="fas fa-plus"></i></button></span>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                              <th scope="col">name</th>
                              <th scope="col">Email</th>
                              <th scope="col">Type</th>
                              <th scope="col">Actions</th>
                            </tr>
                          </thead>

                          <tbody>
                            @if($typeUser == 'admin')
                                @if(count($users) > 0)
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>
                                        <button type="button" class="btn btn-info btn-sm btnDel" title="User View" onclick="location.href='{{ route('showUser', $user->id) }}'"><i class="fa fa-eye"></i></button>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete this user?')" href="{{route('delUser', $user->id)}}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            @else
                                @if(count($users) > 0)
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->type }}</td>
                                        <td>
                                        <button type="button" class="btn btn-primary btn-sm" title="User View" onclick="location.href='{{ route('showUser', $user->id) }}'"><i class="far fa-eye"></i></button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            @endif
                          </tbody>
                    </table></table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        $(".alert").alert('close');
    }, 4000);
</script>
@endsection
