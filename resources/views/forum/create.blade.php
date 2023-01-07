<x-app-layout>
    <div class="max-w-full mx-auto">
    <div class="bg-white overflow-hidden shadow-sm">
    <div class="p-6 bg-white">
    <x-splade-form :action="route('forum.store')" method="post" confirm class="space-y-4">

        <x-splade-input name="title" label="Title" placeholder="input your title forum here..." autocomplete="off" />

        <x-splade-textarea name="body" autosize label="body forum" placeholder="input your question forum or body forum here..." autocomplete="off" />

        <x-splade-select name="categories" label="categories" placeholder="Select your categori forum" :options="$categories" option-label="name" option-value="id"/>

    <x-splade-submit label="Submit" :spinner="false" class="mt-3" />
    </x-splade-form>

    </div>
    </div>
    </div>
</x-app-layout>