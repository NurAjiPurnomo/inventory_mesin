<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <div class="grid lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($menus as $index => $menu)
                <div
                    data-aos="zoom-in"
                    data-aos-delay="{{ $index * 150 }}"
                    class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between
                           transform transition duration-500 hover:scale-105 hover:shadow-lg cursor-pointer"
                    style="will-change: transform, box-shadow;"
                >
                    <img class="w-full h-48 object-cover rounded-md mb-3"
                        src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}" />
                    <h2 class="text-xl font-semibold text-gray-800">{{ $menu->name }}</h2>
                    <p class="text-gray-600 text-sm mt-1">{{ $menu->description }}</p>
                    <div class="flex justify-between items-center mt-3">
                        <span class="font-semibold text-gray-800">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
      AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
      });
    </script>
</x-guest-layout>
