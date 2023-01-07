<x-app-layout>
    <div class="max-w-full mx-auto">
        <div class="bg-white overflow-hidden shadow-sm">
            <div class="p-6 bg-white">
                <x-splade-lazy>
                    <h2 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-2xl dark:text-white">My List Forum ({{ $forums_count }})</h2>
                    <x-slot:placeholder> The items are loading... </x-slot:placeholder>
                    <Link href="{{ route('forum.create') }}" class=" py-2 px-4 text-sm font-medium text-gray-900 bg-transparent border-b border-t border-r border-l border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                        Create a New Forum
                    </Link>
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-4 gap-4">
                @foreach($forums as $key => $forum)
                        <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="p-5">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $forum->title }}</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($forum->body,50) }}</p>
                                <div class="flex justify-between mb-4">
                                <p class="font-normal text-gray-700 dark:text-gray-400">Category : {{ $forum->kategoryForum->name }}</p>
                                <button type="button" class="my-0 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded text-gray-900 focus:outline-none border border-gray-200 focus:z-10 focus:ring-4 focus:ring-gray-200 focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">
                                    Disukai
                                    <span class="inline-flex justify-center items-center ml-2 w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                      0
                                    </span>
                                  </button>
                                </div>
                                <div class="flex justify-between">
                                <a href="{{ route('forum.edit',$forum->id) }}" class="flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                                    Read more
                                    <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </a>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-300">
                                    <svg aria-hidden="true" class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                                    {{ $forum->created_at->diffForHumans() }}
                                  </span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </x-splade-lazy>
            </div>
        </div>
    </div>
</x-app-layout>

