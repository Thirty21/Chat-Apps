<div>
    <div class="py-12">
        <div class="max-w-7xl mx-5 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-violet-300 p-5 shadow-2xl">
                    <div class="">
                        @if ($messages->isNotEmpty())
                            @php
                                $firstMessage = $messages->first();
                                $currentUserIsSender = $firstMessage->to_user_id === auth()->id();
                            @endphp

                            <div class="font-bold ">
                                @if ($currentUserIsSender)
                                {{ $firstMessage->formUser->name }} <!-- Jika pengguna saat ini adalah pengirim pesan -->
                            @else
                                {{ $firstMessage->toUser->name }}
                                <!-- Jika pengguna saat ini adalah penerima pesan -->
                            @endif
                            </div>

                        @endif

                    </div>
            </div>
            <div wire:poll="">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @foreach ($messages as $message)
                        <div class="chat @if ($message->form_user_id == auth()->id()) chat-end @else chat-start @endif ">
                            <div class="chat-image avatar">
                                <div class="w-10 rounded-full">
                                    <img alt="User Avatar"
                                        src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                                </div>
                            </div>
                            <div class="chat-header">
                                {{ $message->formUser->name }}
                                <time class="text-xs opacity-50">{{ $message->created_at->diffForHumans() }}</time>
                            </div>
                            <div class="chat-bubble">{{ $message->message }}</div>
                            <div class="chat-footer opacity-50">
                                Delivered
                                @if ($message->form_user_id == auth()->id())
                                    <button wire:click="deleteMessage({{ $message->id }})"
                                        class="ml-2 text-red-600 hover:text-red-800">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                                            height="24">
                                            <path fill="none" d="M0 0h24v24H0z" />
                                            <path d="M8 9h8v10H8z" opacity=".3" />
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 14h-2v-8h2zm0-10h-2v-2h-2v2H9v2h2v2h2v-2h2v-2h-2V6z" />
                                        </svg>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="mx-10 mb-10">
                    <form action="" wire:submit.privend="sendMessage" class="flex items-center gap-4">
                        <textarea wire:model="message" class="textarea w-full textarea-border h-3" placeholder="send your massage..."></textarea>
                        <button type="submit" class="btn btn-outline btn-info">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
