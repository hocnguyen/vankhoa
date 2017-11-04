<?php foreach ($grades as $value){ ?>
<tr>
    <td>{{ \App\Http\Controllers\GradeController::generalID($value->id) }}</td>
    <td>{{ $value->name }}</td>
    <td>{{ $value->school_year }}</td>
    <td>{{ $value->number_student }}</td>
    <td>{{ $value->firstname." ".$value->lastname." ( ". $value->username ." ) " }}</td>
    <td>{{ \App\User::$branchs[$value->branch] }}</td>
    <td>
        @if($value->status == \App\Grades::STATUS_ACTIVE)
            Active
        @elseif($value->status == \App\Grades::STATUS_INACTIVE)
            InActive
        @else
            Deleted
        @endif
    </td>
    <th>
        <a title="View" href="{{ url('/grade/view/' . $value->id) }}"><i class="fa fa-eye"></i></a>
        <a title="Delete" class="action-delete" href="{{ url('/grade/delete/' . $value->id) }}"><i class="fa fa-trash-o"></i></a>
        <a title="Update" href="{{ url('/grade/update/' . $value->id) }}"><i class="fa fa-pencil-square-o"></i></a>
    </th>
</tr>
<?php } ?>