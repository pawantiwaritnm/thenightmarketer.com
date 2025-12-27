@foreach($pageMetas as $index => $pageMeta)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $pageMeta->slug }}</td>
        <td>{{ $pageMeta->meta_title }}</td>
        <td>{{ $pageMeta->meta_description }}</td>
        <td>{{ $pageMeta->meta_keyword }}</td>
        <td>
            <a href="{{ route('pagemeta.edit', $pageMeta->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <!-- <form action="{{ route('pagemeta.destroy', $pageMeta->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="button" class="btn btn-danger btn-sm" onclick="handleDelete(this, '{{ $pageMeta->slug }}')">Delete</button>
            </form> -->
        </td>
    </tr>
@endforeach

@if($pageMetas->isEmpty())
    <tr>
        <td colspan="6" class="text-center">No Page Meta records found.</td>
    </tr>
@endif
