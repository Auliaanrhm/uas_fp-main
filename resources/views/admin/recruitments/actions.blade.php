<div class="d-flex">
    <a href="{{ route('admin.recruitments.edit', ['recruitment' => $recruitment->id]) }}"
        class="btn btn-outline-dark btn-sm me-2"><i class="fa-solid fa-pencil"></i></a>
    <div>
        <form action="{{ route('admin.recruitments.destroy', ['recruitment' => $recruitment->id]) }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete" data-name="{{ $recruitment->name }}">
                <i class="fa-solid fa-trash"></i>
            </button>
        </form>
    </div>
</div>
