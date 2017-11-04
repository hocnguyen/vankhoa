<?php foreach ($users as $value){
$in_active = "";
if ($value->is_active == \App\User::STATUS_INACTIVE) {
    $in_active = "style=background-color:#dedede";
}
?>
<tr {{ $in_active }} >
    <td>{{ \App\Http\Controllers\Controller::generalID($value->id) }}</td>
    <td>{{ $value->email }}</td>
    <td>{{ $value->username }}</td>
    <td>{{ $value->firstname . ' ' . $value->lastname }}</td>
    <td>{{ $value->phone }}</td>
    <td>{{ \App\User::$branchs[$value->branch] }}</td>
    <td><?php echo ($value->is_active == \App\User::STATUS_ACTIVE) ? "Active" : "In Active" ?></td>

    <th>
        <a title="View" href="{{ url('/user/view/' . $value->id) }}"><i class="fa fa-eye"></i></a>
        <a class="action-delete" title="Delete"href="{{ url('/user/delete/' . $value->id) }}"><i class="fa fa-trash-o"></i></a>
        <a title="Update" href="{{ url('/user/update/' . $value->id) }}"><i class="fa fa-pencil-square-o"></i></a>
        <a title="Password" href="{{ url('/user/changepass/' . $value->id) }}"><i class="fa fa-lock"></i></a>
        @if(Auth::User()->role == \App\User::ROLE_ADMIN)
            <a title="Passpharse" href="{{ url('/user/changepasspharse/' . $value->id) }}"><i class="fa fa-unlock-alt "></i></a>
        @endif
    </th>
</tr>
<?php } ?>