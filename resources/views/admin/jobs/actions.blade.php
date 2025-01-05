<div class="d-flex">
    <a href="{{ route('admin.jobs.edit', ['job' => $job->id]) }}"
        class="btn btn-outline-dark btn-sm me-2"><i class="fa-solid fa-pencil"></i></a>
    <div>
        <form action="{{ route('admin.jobs.destroy', ['job' => $job->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete" data-name="{{ $job->position }}">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </div>
</div>
