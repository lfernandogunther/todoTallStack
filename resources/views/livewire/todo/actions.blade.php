<div class="flex
    justify-end items-start gap-2 py-2">
    <x-button
        :disabled="$this->isTodoListEmpty"
        label="Delete All"
        wire:click='confirmReset'
        white
        flat
        icon="trash"
    />
</div>
