<x-app-layout>
    <div class="max-w-full mx-auto">
    <div class="bg-white overflow-hidden shadow-sm">
    <div class="p-6 bg-white">
    <x-splade-form :action="route('get.store')" method="post" confirm class="space-y-4">
        <x-splade-select name="subcategories" :options="$subcategories" option-label="name" option-value="id" placeholder="select a category..." label="Sub Kategory" choices />
        <x-splade-defer v-if="form.subcategories" watch-value="form.subcategories" url="`/loadData/${form.subcategories}`" @success="(response) => {
            form.title = response.title;
            form.body = response.body;
          }">
            <p v-if="processing">Loading...</p>
            <div v-else-if="response.title && response.body">
                <x-splade-input name="title" label="Title" placeholder="input your title forum here..." autocomplete="off" />
                <x-splade-textarea name="body" autosize label="body forum" placeholder="input your question forum or body forum here..." autocomplete="off" />
            </div>
        <h1 v-else class="text-center text-2xl">Data tidak ditemukan</h1>
    </x-splade-defer>

        {{-- <x-splade-select v-if="form.categories.length" name="subKategory" remote-url="`/loadSub/${form.categories}`" option-label="name" option-value="id" placeholder="select a sub category..." /> --}}
        {{-- <SubKategorySelect :categories="@js($categories)"/> --}}

    <x-splade-submit label="Submit" :spinner="false" class="mt-3" />
    </x-splade-form>
</div>
</div>
</div>
</x-app-layout>