<div class="single-task-tags">
    @error('name')
        <div class="text text-danger">
            * {{ $message }}
        </div>
    @enderror
    <form class="d-inline-block add-tag-form" wire:submit.prevent='addTag({{ $task->id }})'>
        <div class="form-group">
            <input type="text" name="tag" placeholder="Enter new tag" list="tags" wire:model="name">
            <datalist id="tags">
                @forelse ($tags as $tag)
                    <option value="{{ $tag->name }}">
                    </option>
                @empty
                @endforelse
            </datalist>
        </div>
    </form>
    @forelse ($task->tags as $tag)
        <span class="single-task-tag-name"><a
                href="{{ route('homePage') }}?tag={{ $tag->slug }}">#{{ $tag->slug }}</a></span>
        <span class="btn text text-danger" wire:click="removeTag({{ $task->id }},{{ $tag->id }})">x</span>
    @empty
    @endforelse

</div>
