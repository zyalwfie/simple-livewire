<div class="mx-auto p-4 max-w-screen-xl mt-20 flex flex-col lg:flex-row gap-8 transition">
    @livewire('user-form')
    @livewire('user-list', ['lazy' => true])
</div>
