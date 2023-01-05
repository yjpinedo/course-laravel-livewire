<div>
    <div x-data="{ active:@entangle('step') }" class="flex">
            <div class="flex font-medium px-6 tracking-wider py-2" :class="{ 'border-b-2 bg-gray-100' : active == 1 }">
                STEP 1
            </div>
            <div class="flex font-medium px-6 tracking-wider py-2" :class="{ 'border-b-2 bg-gray-100' : parseInt(active) == 2 }">
                STEP 2
            </div>
            <div class="flex font-medium px-6 tracking-wider py-2" :class="{ 'border-b-2 bg-gray-100' : active == 3 }">
                STEP 3
            </div>
    </div>
    @if ($step == 1)
        <form wire:submit.prevent='submit'>
            <x-jet-label>{{ __('Subject') }}</x-jet-label>
            <x-jet-input-error for="subject" />
            <x-jet-input type="text" wire:model="subject" />

            <x-jet-label>{{ __('Type') }}</x-jet-label>
            <x-jet-input-error for="type" />

            <select wire:model="type">
                <option value="">{{ __('Selected') }}</option>
                <option value="company">{{ __('Company') }}</option>
                <option value="person">{{ __('Person') }}</option>
            </select>

            <x-jet-label>{{ __('Message') }}</x-jet-label>
            <x-jet-input-error for="message" />
            <textarea wire:model="message"></textarea>

            <x-jet-button type="submit">{{ __('Enviar') }}</x-jet-button>
        </form>
    @elseif ($step == 2.1)
        @livewire('contact.company')
    @elseif ($step == 2.2)
        @livewire('contact.person')
    @else
        @livewire('contact.detail')
    @endif
</div>
