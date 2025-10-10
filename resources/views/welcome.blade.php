<x-guest-layout>
  <!-- Main Hero Content -->
  <div
    class="relative w-full min-h-screen flex flex-col justify-center items-center text-center bg-center bg-no-repeat bg-cover"
    style="background-image: url('images/Halaman-Caffe.jpg')"
    data-aos="fade-in"
  >
    <!-- Overlay gelap -->
    <div class="absolute inset-0 bg-black/50"></div>

    <!-- Konten -->
<div class="relative z-10 px-4" style="font-family: 'Poppins', sans-serif;">
  <h1
    class="text-xl md:text-2xl lg:text-3xl font-extrabold sm:leading-tight text-white"
  >
    <span class="inline md:block">
      SELAMAT DATANG DI RESTO & CAFE MAS BRO
    </span>
  </h1>

  <div class="mt-3 text-green-100 text-xs md:text-sm lg:text-base">
    “Nikmati cita rasa khas di Resto & Cafe Mas Bro, tempat makan favorit dengan
    pelayanan ramah dan harga bersahabat.”
  </div>
</div>

      <div class="flex flex-col items-center mt-8">
        <span class="relative inline-flex w-full md:w-auto">
          <a
            href="{{ route('reservations.step-one') }}"
            type="button"
            class="inline-flex items-center justify-center px-8 py-3 text-base font-semibold leading-5 text-white bg-red-600 rounded-full hover:bg-yellow-500 focus:outline-none"
          >
            Reservasi Sekarang
          </a>
        </span>
      </div>
    </div>
  </div>

  <!-- Tentang Kami Section -->
  <section class="px-2 py-32 bg-white md:px-0" data-aos="fade-up">
    <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
      <div class="flex flex-wrap items-center sm:-mx-3">
        <div class="w-full md:w-1/2 md:px-3">
          <div
            class="w-full pb-6 space-y-4 sm:max-w-md lg:max-w-lg lg:space-y-4 lg:pr-0 md:pb-0"
          >
            <div class="text-left mb-6">
              <h1
                class="text-xl font-bold text-red-600 md:text-2xl hover:text-yellow-400 transition-colors duration-200"
              >
                Tentang Kami
              </h1>
              <div class="w-16 h-1 bg-yellow-400 mt-2 rounded-full"></div>
            </div>

            <p
              class="text-left text-sm text-gray-800 mt-0 sm:max-w-md lg:text-lg md:max-w-3xl"
            >
              <span class="text-red-600 font-semibold">Resto & Cafe Mas Bro</span>
              berdiri sejak 2015 di Jl. Semanggi Raya, Palaraya, Tegal. Kami hadir
              untuk menyuguhkan pengalaman kuliner khas dengan suasana hangat dan
              pelayanan ramah. Dengan menu lezat yang terus berkembang, Mas Bro
              menjadi tempat favorit untuk bersantai, berkumpul, dan menikmati momen
              istimewa bersama keluarga dan teman.
            </p>
            <div class="relative flex">
              <a
                href="{{ route('about') }}"
                type="button"
                class="flex items-center w-full px-8 py-3 mb-3 text-base font-bold text-white bg-red-600 rounded-md sm:mb-0 sm:w-auto hover:bg-yellow-400"
              >
                Baca Selengkapnya
                <i class="fas fa-arrow-right ml-1 text-sm font-bold"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/2">
          <div
            class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl"
            data-aos="zoom-in"
          >
            <img src="{{ asset('images/Halaman-Caffe.jpg') }}" alt="Tentang Kami" />
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Pelayanan Section -->
  <section class="pt-2 pb-12 bg-white">
    <div
      class="text-center mb-10"
      data-aos="fade-up"
      data-aos-delay="100"
    >
      <h1
        class="text-xl font-bold text-red-600 md:text-2xl hover:text-yellow-400 transition-colors duration-200"
      >
        Pelayanan
      </h1>
      <div class="w-16 h-1 bg-yellow-400 mx-auto mt-2 rounded-full"></div>
    </div>

    <div
      class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4 md:px-16"
    >
      <div
        class="border border-gray-400 hover:text-yellow-400 transition-colors duration-200 p-6 text-center transform hover:scale-105 hover:shadow-2xl transition duration-300"
        data-aos="fade-up"
        data-aos-delay="200"
      >
        <img
          src="https://img.icons8.com/fluency/96/restaurant-table.png"
          alt="Dine-In"
          class="h-24 mx-auto mb-4"
        />
        <h3 class="text-xl font-bold mb-2">Makan Ditempat</h3>
        <p class="text-sm text-gray-800">
          Dengan suasana hangat dan ramah yang terinspirasi oleh budaya dan seni
          Indonesia, Anda akan merasa seolah-olah sedang berdansa dengan rasa di
          seluruh Nusantara.
        </p>
      </div>

      <div
        class="border border-gray-400 hover:text-yellow-400 transition-colors duration-200 p-6 text-center transform hover:scale-105 hover:shadow-2xl transition duration-300"
        data-aos="fade-up"
        data-aos-delay="300"
      >
        <img
          src="https://img.icons8.com/fluency/96/take-away-food.png"
          alt="Take Away"
          class="h-24 mx-auto mb-4"
        />
        <h3 class="text-xl font-bold mb-2">Ambil Ditempat</h3>
        <p class="text-sm text-gray-800">
          Pesan makanan favorit Anda dan ambil sendiri dengan mudah tanpa harus
          menunggu lama.
        </p>
      </div>

      <div
        class="border border-gray-400 hover:text-yellow-400 transition-colors duration-200 p-6 text-center transform hover:scale-105 hover:shadow-2xl transition duration-300"
        data-aos="fade-up"
        data-aos-delay="400"
      >
        <img
          src="https://img.icons8.com/color/96/reservation.png"
          alt="Reservation"
          class="h-24 mx-auto mb-4"
        />
        <h3 class="text-xl font-bold mb-2">Reservasi</h3>
        <p class="text-sm text-gray-800">
          Pesan tempat lebih awal untuk menikmati suasana terbaik dan layanan maksimal dari kami.
        </p>
      </div>
    </div>
  </section>
    <!-- Section Kuning -->
    <section class="bg-yellow-400 py-12 px-4">
        <div
            class="flex flex-col md:flex-row items-center justify-around gap-4 text-center md:text-center w-full px-6 md:px-32">
            <div class="md:w-2/3 text-left">
                <h2 class="text-2xl font-bold text-black mb-2">
                    Ayo Makan Dan Nongkrong Di Resto & Cafe Mas Bro!
                </h2>
                <p class="text-sm text-black">
                    Nikmati pengalaman kuliner yang penuh cita rasa, tempat nyaman, dan layanan terbaik untuk semua
                    suasana — dari santai sampai kumpul bareng.
                </p>
            </div>
            <div class="md:w-auto">
                <a href="{{ route('reservations.step-one') }}"
                    class="px-6 py-2 bg-red-600 text-white font-semibold rounded-full hover:bg-yellow-400 hover:text-red-700 transition-colors duration-200 whitespace-nowrap">
                    Reservasi
                </a>
            </div>
        </div>
    </section>

    @if(is_array($specials))
        <section class="mt-8 bg-white">
            <div class="mt-4 text-center">
                <h3 class="text-2xl font-bold">Menu Kami</h3>
                <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500">
                    SPESIALISASI HARI INI
                </h2>
            </div>
            <div class="container w-full px-5 py-6 mx-auto">
                <div class="grid lg:grid-cols-4 gap-y-6">
                    @foreach ($specials['menus'] as $menu)
                        <div
                            class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer fade-in-element opacity-0 translate-y-10">
                            <img class="w-full h-48 object-cover rounded-t-lg" src="{{ Storage::url($menu->image) }}"
                                alt="Image" />
                            <div class="px-6 py-4">
                                <h4 class="mb-3 text-xl font-semibold tracking-tight text-green-600 uppercase">
                                    {{ $menu->name }}
                                </h4>
                                <p class="leading-normal text-gray-700">{{ $menu->description }}</p>
                            </div>
                            <div class="flex items-center justify-between p-4">
                                <span class="text-xl text-green-600">Rp {{ number_format($menu->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="pt-4 pb-12 bg-white">
        <div class="my-16 text-center ">
            <h2
                class="text-3xl font-bold text-red-600 md:text-2xl hover:text-yellow-400 transition-colors duration-200">
                Menu Favorit
            </h2>
            <div class="w-16 h-1 bg-yellow-400 mx-auto mt-2 rounded-full"></div>
        </div>
        <section class="px-6 lg:px-16">

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
                <!-- Card 1 -->
                <div
                    class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer fade-in-element opacity-0 translate-y-10">
                    <img class="w-full h-48 object-cover rounded-md mb-3" src="{{ asset('images/ikan bakar rl.png') }}"
                        alt="Ikan Bakar">
                    <h2 class="text-xl font-semibold text-gray-800">Ikan Bakar</h2>
                    <p class="text-gray-600 text-sm mt-1">Ikan bakar berbumbu khas, disajikan dengan nasi, sambal, dan lalapan segar.
                    </p>
                    <div class="flex justify-between items-center mt-3">
                        <span class="font-semibold text-gray-800">Rp40.000-50.000</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div
                    class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer fade-in-element opacity-0 translate-y-10">
                    <img class="w-full h-48 object-cover rounded-md mb-3"
                        src="{{ asset('images/lele goreng rl.jpg') }}" alt="Lele">
                    <h2 class="text-xl font-semibold text-gray-800">Paket Lele Goreng</h2>
                    <p class="text-gray-600 text-sm mt-1">Paket lezat dengan lele goreng renyah,
                        disajikan dengan nasi hangat, sambal pedas, dan lalapan segar.</p>
                    <div class="flex justify-between items-center mt-3">
                        <span class="font-semibold text-gray-800">Rp22.000</span>
                    </div>
                </div>
                <!-- Card 3 -->
                <div
                    class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer fade-in-element opacity-0 translate-y-10">
                    <img class="w-full h-48 object-cover rounded-md mb-3"
                        src="{{ asset('images/milkshake strawberry.png') }}" alt="Milkshake">
                    <h2 class="text-xl font-semibold text-gray-800">Milkshake Strawberry</h2>
                    <p class="text-gray-600 text-sm mt-1">Minuman dingin menyegarkan dengan rasa susu dan paduan citarasa strawberry
                    </p>
                    <div class="flex justify-between items-center mt-3">
                        <span class="font-semibold text-gray-800">Rp15.000</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div
                    class="bg-white rounded-lg shadow-md p-4 flex flex-col justify-between transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl cursor-pointer fade-in-element opacity-0 translate-y-10">
                    <img class="w-full h-48 object-cover rounded-md mb-3"
                        src="{{ asset('images/coffee.jpg') }}" alt="coffee">
                    <h2 class="text-xl font-semibold text-gray-800">Ice Latte</h2>
                    <p class="text-gray-600 text-sm mt-1">Perpaduan sempurna antara kopi pilihan dan susu segar yang menghasilkan rasa lembut dan nikmat.</p>
                    <div class="flex justify-between items-center mt-3">
                        <span class="font-semibold text-gray-800">Rp15.000</span>
                    </div>
                </div>
            </div>

            <!-- Selengkapnya button -->
            <div class="flex justify-end mt-10">
                <a href="{{ route('menus.index') }}"
                    class="px-8 py-3 bg-red-600 text-white font-bold rounded-full shadow hover:bg-yellow-400 hover:text-red-700 transition-colors duration-200 flex items-center gap-2">
                    Selengkapnya
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </section>
    </section>
 <!-- Style Animasi Fade In + Slide + Scale + Shadow + Rotate + Stagger -->
    <style>
        .fade-in-element {
            opacity: 0;
            transform: translateY(20px) scale(0.95) rotate(-2deg);
            box-shadow: none;
            transition:
                opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                transform 0.6s cubic-bezier(0.4, 0, 0.2, 1),
                box-shadow 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .fade-in-element.visible {
            opacity: 1;
            transform: translateY(0) scale(1) rotate(0deg);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in-element');

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Tambah delay stagger berdasarkan index elemen
                        const index = Array.from(elements).indexOf(entry.target);
                        entry.target.style.transitionDelay = `${index * 0.15}s`;
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            elements.forEach(el => observer.observe(el));
        });
    </script>
</x-guest-layout>

<!-- AOS JS -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 750,
      once: true,
      easing: 'ease-in-out',
      offset: 120,
    });
  </script>