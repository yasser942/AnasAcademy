<div>
    <button wire:click="toggleFavorite" class="btn {{ $isFavorite ? 'btn-success' : 'btn-primary' }}">
        {{ $isFavorite ? 'إزالة من المفضلة' : 'إضافة للمفضلة' }}
    </button>
</div>
