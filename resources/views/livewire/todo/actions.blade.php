<div class="flex
    justify-end items-start gap-2 py-2 px-4">
    <x-button :disabled="$this->isTodoListEmpty" label="Reset" wire:click='confirmReset' red icon="trash" />
</div>
