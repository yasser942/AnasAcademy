<div>
    <button wire:click="toggleFavorite" class="btn {{ $isFavorite ? 'btn-danger' : 'btn-primary' }}">
        {{ $isFavorite ? 'إزالة من المفضلة' : 'إضافة إلى المفضلة' }}
    </button>
</div>
