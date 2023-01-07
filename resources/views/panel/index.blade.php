<x-app-layout>
    <div class="max-w-full mx-auto">
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="p-6 bg-white">
                <div class="max-w-7xl">
                    <x-splade-lazy>
                        <x-slot:placeholder>loading... </x-slot:placeholder>
                    <Link href="{{ route('forum.create') }}" class=" py-2 px-4 text-sm font-medium text-gray-900 bg-transparent border-b border-t border-r border-l border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                        Create a New Forum
                    </Link>
                    <x-splade-table :for="$forums" class="mt-5">
                        @cell('action',$forum)
                        <div class="flex space-x-3">
                            <Link href="{{ route('forum.edit',$forum->id) }}" class="rounded-md shadow-sm bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">
                                Edit
                            </Link>`

                            <x-splade-form :action="route('forum.destroy',$forum->id)" method="delete" confirm>
                                <x-splade-submit label="Delete" :spinner="false" />
                            </x-splade-form>
                        </div>
                        @endcell
                    </x-splade-table>    
                    </x-splade-lazy> 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>    