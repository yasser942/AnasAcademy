<div>
    <form wire:submit.prevent="createQuestion">
        <input wire:model="test_id" hidden="true">

        <div class="form-group">
            <label for="question">السؤال</label>
            <input type="text" class="form-control" wire:model="question" required>
        </div>

        <div>
            @foreach($options as $index => $option)
                <div class="form-group">
                    <label for="option{{ $index + 1 }}"> الخيار رقم {{ $index + 1 }}</label>
                    <input type="text" class="form-control" wire:model="options.{{ $index }}" required>
                    <button wire:click.prevent="removeOption({{ $index }})" class="btn btn-danger mt-2">إزالة الخيار</button>
                </div>
            @endforeach
        </div>


        <div class="form-group">
            <button wire:click.prevent="addOption" class="btn btn-success ">إضافة خيار جديد</button>

            <label for="correctOption">إختر الإجابة الصحيحة</label>
            <select class="form-control mt-2" wire:model="correctOption">
                @foreach($options as $index => $option)
                    <option value="{{ $index + 1 }}">الخيار {{ $index + 1 }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary" {{ count($options) === 0 ? 'disabled' : '' }}>إنشاء السؤال</button>
    </form>
</div>
