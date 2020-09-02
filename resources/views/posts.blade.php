<div class="container">
<h1>welcome page</h1>

<h2>Rules :</h2>
<p>abilities: create, delete, edit</p>
<p> roles: admin , writer , editor  </p>
    <ul>
        <li>admin can create/edit/delete </li>
        <li>writer can crete only  </li>
        <li>editor can edit only</li>
    </ul>



    @if(Auth::check())
    <h2>Current User : {{auth()->user()->name}}</h2>
    @endif


        @can('create')
        <button class=" "><a href={{url("/posts/create")}}>Add new</a></button>
        @endcan
        @cannot('create')
            <b >Add new</b><br><br>
        @endcannot

        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>actions</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td style="border: 1px solid black">{{ $post->id }}</td>
                    <td style="border: 1px solid black">{{ $post->name}}</td>
                    <td style="border: 1px solid black">

                        @can('delete')
                            <form action="{{ url("/posts/$post->id/delete") }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" >Delete</button>
                            </form>
                        @endcan
                        @cannot('delete')
                            <p>can't delete</p>
                        @endcannot

                        @can('edit' )
                            <button class=" "><a href={{url("/posts/{$post->id}/edit")}}>Edit</a></button>
                        @endcan
                        @cannot('edit')
                            <p>can't edit</p>
                        @endcannot
                    </td>
                </tr>
            @endforeach
        </table>
</div>
