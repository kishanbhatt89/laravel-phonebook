<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ Auth::user()->name }} - Phonebook</title>
</head>
<body>

    <table class="table table-striped">
        <thead class="bg-light">
            <tr>
                <th>#</th>
                <th>Contact Name</th>
                <th>Contact Image</th>
                <th>Phone No</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($contacts as $contact)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>
                        <img src="{{ asset('uploads/avatars/'.$contact->avatar) }}" alt="No Image" width="50px" height="50px">
                    </td>
                    <td>{{ $contact->contactno }}</td>
                    <td>{{ $contact->notes }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No Contacts Found.</td>
                </tr>
            @endforelse

        </tbody>
    </table>

</body>
</html>
