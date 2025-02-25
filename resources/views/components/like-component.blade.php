@auth
    <div class="my-4">
        @if ($recurso->checkLike(auth()->user()))
            <form action="{{ route('recursos.likes.destroy', $recurso) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="text-red-500 hover:text-red-700 transition">
                    ❤️ <span class="font-medium">{{ $recurso->likes_count }}</span>
                </button>
            </form>
        @else
            <form action="{{ route('recursos.likes.store', $recurso) }}" method="post">
                @csrf
                <button type="submit" class="text-gray-400 hover:text-pink-500 transition">
                    🤍 <span class="font-medium">{{ $recurso->likes_count }}</span>
                </button>
            </form>
        @endif
    </div>
@endauth
