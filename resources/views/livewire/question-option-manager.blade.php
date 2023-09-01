<!-- question-option-manager.blade.php -->

<div>
    <form wire:submit.prevent="saveQuestion">
        <input type="hidden" wire:model="test_id" value="{{ $test->id }}">
        <div>
            <label for="questionText">Question Text</label>
            <input wire:model="questionText" type="text" id="questionText" >
        </div>

        @foreach ($options as $index => $option)
            <div>
                <label for="option{{ $index }}">Option {{ $index + 1 }} </label>
                <input wire:model="options.{{ $index }}" type="text" id="option{{ $index }}">
                <button wire:click.prevent="removeOption({{ $index }})" type="button">Remove</button>
            </div>
        @endforeach

        <div>
            <label for="correctOption">Correct Option</label>
            <select wire:model="correctOption">
                @foreach ($options as $index => $option)
                    <option value="{{ $index }}">Option {{ $index + 1 }}</option>
                @endforeach
            </select>
        </div>

        <button wire:click.prevent="addOption" type="button">Add Option</button>

        <button type="submit">Save Question</button>
    </form>
</div>
