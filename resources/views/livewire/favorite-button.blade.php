<div>
    <button wire:click="toggleFavorite" class="btn {{ $isFavorite ? 'btn-danger-gradient' : 'btn-primary-gradient' }}">
        {{ $isFavorite ? 'إزالة من المفضلة' : 'إضافة إلى المفضلة' }}
    </button>
</div>
