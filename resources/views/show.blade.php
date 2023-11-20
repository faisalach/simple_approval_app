<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show</title>
</head>
<body>
    <h1>Pengajuan Cuti</h1>

    <div>
        @if($user->role === "user")
        <a href="/request/create">Tambah Data</a>
        @endif
        <a href="/logout">Logout</a>
    </div>

    <table border="1" cellspacing="0" cellpadding="10">
        <thead>
            <tr>
                <th>Tanggal Mulai Cuti</th>
                <th>Tanggal Selesai Cuti</th>
                <th>Alasan</th>
                <th>Status</th>
                @if($user->role === "admin")
                <th>#</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($requests as $request)
            <tr>
                <td>{{ $request->tanggal_mulai_cuti }}</td>
                <td>{{ $request->tanggal_akhir_cuti }}</td>
                <td>{{ $request->alasan_cuti }}</td>
                <td>{{ $request->status }}</td>
                @if($user->role === "admin")
                <td>
                    @if($request->status === "pending")
                    <a href="/request/approved/{{ $request->id }}">Approved</a>
                    <a href="/request/rejected/{{ $request->id }}">Rejected</a>
                    @endif
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>