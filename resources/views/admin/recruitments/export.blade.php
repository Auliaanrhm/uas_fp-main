<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Status</th>
            <th>Time</th>
            <th>CV</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($recruitments as $index => $recruitment)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $recruitment->name }}</td>
                <td>{{ $recruitment->job->position }}</td>
                <td>{{ $recruitment->email }}</td>
                <td>{{ $recruitment->status }}</td>
                <td>{{ \Carbon\Carbon::parse($recruitment->created_at)->format('H:i d-m-Y') }}</td>
                <td>{{ request()->getSchemeAndHttpHost() . '/storage/recruitments/' . $recruitment->file }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
