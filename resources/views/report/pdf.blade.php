<h2>
Locker Management System Report
</h2>


<table border="1" width="100%">


<tr>

<th>
Locker
</th>


<th>
Gender
</th>


<th>
Status
</th>


<th>
Employee
</th>


</tr>



@foreach($lockers as $locker)


<tr>


<td>

{{$locker->locker_number}}

</td>


<td>

{{$locker->gender}}

</td>


<td>

{{$locker->status}}

</td>


<td>

{{$locker->employee->name ?? '-'}}

</td>


</tr>


@endforeach


</table>