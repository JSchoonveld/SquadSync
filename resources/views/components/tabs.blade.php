<div x-data="{ tab: '#tab1' }" class="">

    <div class="flex flex-row mb-3">
        <a class="px-4 border-b-2 hover:border-slate-900" href="#" :class="{ 'border-teal-300': tab !== '#tab1', 'border-slate-900': tab === '#tab1' }" x-on:click.prevent="tab='#tab1'">Tab1</a>

        <a class="px-4 border-b-2 hover:border-slate-900"
           href="#" :class="{ 'border-teal-300': tab !== '#tab2', 'border-slate-900': tab === '#tab2' }" x-on:click.prevent="tab='#tab2'">Tab2</a>

        <a class="px-4 border-b-2 hover:border-slate-900"
           href="#" :class="{ 'border-teal-300': tab !== '#tab3', 'border-slate-900': tab === '#tab3' }" x-on:click.prevent="tab='#tab3'">Tab3</a>

    </div>
    <div x-show="tab == '#tab1'" x-cloak
         x-transition:enter="duration-100 ease-out"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="p-2">
        @include('components.tab-content', ['title' => 'Some title', 'content' => 'My content'])
    </div>

    <div x-show="tab == '#tab2'" x-cloak
         x-transition:enter="duration-100 ease-out"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="p-2">
        @include('components.tab-content', ['title' => 'Some other title', 'content' => 'My content'])
    </div>

    <div x-show="tab == '#tab3'" x-cloak
         x-transition:enter="duration-100 ease-out"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="p-2">
        @include('components.tab-content', ['title' => 'Another title', 'content' => 'My content'])
    </div>
</div>
