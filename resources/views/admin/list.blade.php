@extends('layouts.dash')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th scope="col">UserName</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">National ID</th>
                <th scope="col">Type</th>
                <th>Update Actions</th>
                <th>Delete Actions</th>
            </tr>
        </thead>
        <?php $i = 1?>
        <tbody>
            @foreach($managers as $manager)
                <tr>
                    <td><?php echo $i++ ?></td>
                    <td>{{$manager->name}}</td>
                    <td>{{$manager->email}}</td>
                    <td>{{$manager->phone}}</td>
                    <td>{{$manager->NationalID}}</td>
                    <td>{{$manager->type}}</td>
                    <td>
                        <form method="get" action="{{ route('admins.edit', ['manager'=>$manager]) }}">
                            <input type="submit" class="btn btn-success" value="Update"/>
                        </form>
                    </td>
                    <td>
                        <form method="post" action="{{ route('admins.destroy', ['id'=>$manager->id]) }}">
                            @method('DELETE')
                            @csrf
                            <input type="submit" class="btn btn-danger" value="Delete"/>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection