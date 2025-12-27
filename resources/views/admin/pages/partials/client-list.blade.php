@forelse ($clients as $index => $client)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>{{ $client->client_name }}</td>
    <td><a href="{{ $client->website_url }}" target="_blank">{{ $client->website_url }}</a></td>
    <td>
        <label class="switch toggle-input">
            <input type="checkbox" 
            data-client-id="{{ $client->id }}" 
            data-toggle-type="is_home" 
            {{ $client->is_home ? 'checked' : '' }}>
            <span class="slider round"></span>
        </label>
    </td>
    <td>{{ $client->industry->industry_name ?? 'N/A' }}</td>
    <td>
        <label class="switch toggle-input">
            <input type="checkbox" 
                   data-client-id="{{ $client->id }}" 
                   data-toggle-type="status" 
                   {{ $client->status == 1 ? 'checked' : '' }}>
            <span class="slider round"></span>
        </label>
    </td>
    <td>
        <!-- Edit Button -->
        <a href="{{ route('clients.edit', $client->id) }}" class="edit-btn"><i class="la la-edit"></i></a>

        <!-- Delete Form -->
        <form method="POST" action="{{ route('clients.destroy', $client) }}" class="d-inline">
            @csrf
            @method('DELETE')
            <a href="javascript:void(0)" onclick="handleDelete(this, '{{ $client->client_name }}')" class="del-btn"><i class="la la-trash"></i></a>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="7" class="text-center">No clients found</td>
</tr>
@endforelse
