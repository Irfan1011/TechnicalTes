@extends('CDN')
@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="bg-dark col-auto col-md-2 min-vh-100">
            <div class="bg-dark p-0">
                @include('sidebar')
            </div>
        </div>
        <div class="col p-4">
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <h1>Dashboard</h1>
                        <hr><br>

                        @if($message=Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{$message}}</p>
                        </div>
                        @endif
                        
                        <div class="mt-4 container text-center">
                            <div class="row row-cols-4">
                                <div class="col border">Name</div>
                                <div class="col border">Email</div>
                                <div class="col border">Role</div>
                                <div class="col border">Action</div>
                            </div>
                            <div class="row">
                                <div class="col text-center border">
                                    @if($user= DB::select('select * from users'))
                                        @foreach($page as $User)
                                        <div class="row row-cols-4">
                                            <div class="col" style="word-wrap: break-word;">{{$User->name}}</div>
                                            <div class="col" style="word-wrap: break-word;">{{$User->email}}</div>
                                            <div class="col" style="word-wrap: break-word;">{{$User->role}}</div>
                                            <div class="col" style="word-wrap: break-word;">
                                                <form action="{{route('admin.destroy',$User->id)}}" method="post">
                                                    <a href="{{route('admin.edit',$User->id)}}" class="btn style=" style="color:#1351d6">
                                                        <i class="fa fa-pencil"></i></a>
                                                    @csrf
                                                    @method("DELETE")
                                                    <button class="btn" type="submit" onclick="return confirm('Are you sure?')" style="color:#ff0000"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td align="center" colspan="4">Empty Data!! Have a nice day :)</td>
                                        </tr>
                                    @endif
                                </div>
                            </div>
                            <div class="mt-2 d-flex justify-content-end">
                                {{$page->links("pagination::bootstrap-4")}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>