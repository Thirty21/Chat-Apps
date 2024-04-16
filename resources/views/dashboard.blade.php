<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-8 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden rounded-lg shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="text-center mb-4">
                        <h1 class="font-bold text-2xl">Daftar Pengguna</h1>
                    </div>
                  @foreach ($users as $user)
                  <div class="list-data">
                      <a href="{{route('chat', $user)}} " wire:navigate  class="font-bold">{{$user->name}}</a>
                  </div>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
