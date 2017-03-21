@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Following -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Users
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>User</th>
                            <th> </th>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td clphpass="table-text"><div>{{ $user->name }}</div></td>
                                    @if ($user->followed_by(Auth::User(), $user->id))
                                        <td>
                                            <form action="{{url('follow/' . $user->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-follow-{{ $user->target_id }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Unfollow
                                                </button>
                                            </form>
                                        </td>
                                    @else
                                        <td>
                                            <form action="{{url('follow') }}" method="POST">
                                                {{ csrf_field() }}

                                                <input type="hidden" name="target_id" value="{{ $user->id }}">

                                                <button type="submit" id="follow-user-{{ $user->id }}" class="btn btn-success">
                                                <i class="fa fa-btn fa-user"></i>Follow
                                                </button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection