<div class="flex justify-center items-center min-h-screen bg-gradient-to-r from-teal-500 via-green-500 to-yellow-500">
    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-4xl flex flex-col">

        <!-- Input Area -->
        <div class="w-full mb-6">
            <h1 class="text-3xl font-bold mb-6 text-center text-blue-900">Chat</h1>
            <form wire:submit.prevent="addTodo" class="flex flex-col space-y-6">
                <div>
                    <label for="todo" class="block text-xl font-semibold text-gray-800">Enter your message</label>
                    <input
                        type="text"
                        name="todo"
                        id="todo"
                        wire:model="todo"
                        placeholder="Type a message..."
                        class="w-full px-6 py-4 border border-gray-300 rounded-lg focus:ring-2 focus:ring-pink-400 focus:outline-none text-gray-800"
                    >
                    @error('todo')
                    <span class="text-sm text-red-600 mt-1 block">
                        {{ $message }}
                    </span>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full py-4 bg-pink-600 text-white font-semibold rounded-lg shadow-lg hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-300">
                    Send
                </button>
            </form>
        </div>

        <!-- Message Box Area -->
        <div class="w-full space-y-4">
            <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Messages</h2>
            <div class="space-y-4">
                @forelse($todos as $index => $v)
                    <div class="flex {{ $index % 2 === 0 ? 'justify-start' : 'justify-end' }}">
                        <div class="max-w-xs p-4 bg-gradient-to-r {{ $index % 2 === 0 ? 'from-teal-100 via-green-100 to-yellow-100' : 'from-pink-100 via-red-100 to-yellow-100' }} rounded-xl shadow-lg">
                            <p class="text-gray-900">{{ $v }}</p>
                        </div>
                    </div>
                @empty
                    <div class="text-gray-500 text-center">
                        No messages yet.
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
