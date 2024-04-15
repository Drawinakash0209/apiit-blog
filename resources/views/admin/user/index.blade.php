@foreach ($usersByType as $userType => $users)
  <h2>{{ $userType }} Users</h2>
  <table>
    <thead>
      @if ($userType === 'student')
        <th>Name</th>
        <th>Student ID</th>
        <th>Level</th>
        @elseif ($userType === 'alumni')
        <th>Name</th>
        <th>Alumni ID</th>
        <th>Graduated Year</th>
        @else <th>Name</th>
        @endif
    </thead>
    <tbody>
      @foreach ($users as $user)
        <tr>
          <td>{{ $user->name }}</td>
          @if ($userType === 'student')
            <td>{{ $user->student_id }}</td>
            <td>{{ $user->level }}</td>
            @elseif ($userType === 'alumni')
            <td>{{ $user->alumni_id }}</td>
            <td>{{ $user->graduated_year }}</td>
            @else @endif
        </tr>
      @endforeach
    </tbody>
  </table>
@endforeach
