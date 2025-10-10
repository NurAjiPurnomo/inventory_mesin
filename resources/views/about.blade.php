<x-guest-layout>
  <section class="h-6"></section> <!-- spacer lebih kecil -->

  <!-- Swiper Slider -->
  <div class="swiper mySwiper max-w-full mx-auto px-4 mb-12" data-aos="fade-up">
      <div class="swiper-wrapper">
          @php
              $images = ['dalam.jpg', 'dpn.jpg', 'depan.jpg', 'depan 2.jpg'];
          @endphp
          @foreach ($images as $index => $img)
              <div class="swiper-slide px-1">
                  <img src="{{ asset('images/' . $img) }}" alt="Galeri {{ $index + 1 }}"
                      class="w-full mx-auto object-cover rounded-lg shadow-md" style="max-height: 480px;" />
              </div>
          @endforeach
      </div>
      <div class="swiper-pagination mt-6"></div>
  </div>

  <section class="mb-8 py-8" data-aos="fade-up"> <!-- mb-32 jadi mb-16, py-12 jadi py-8 -->
    <div class="flex flex-col md:flex-row items-center justify-center gap-8 max-w-5xl mx-auto px-4">
      <img 
        src="{{ asset('images/plang2.jpg') }}" 
        alt="Resto & Cafe Mas Bro" 
        class="w-full md:w-1/3 rounded-2xl shadow-lg object-cover h-64 shadow-md border-5 border-yellow-400"
        data-aos="zoom-in-right"
        />

      <div class="md:w-1/2 mt-4 md:mt-0 text-left" data-aos="zoom-in-left">
        <h1 class="text-3xl font-extrabold text-red-700 mb-3">Tentang Kami</h1>
        <div class="w-20 h-1 bg-yellow-400 rounded-full mb-4"></div>

        <p class="text-gray-800 text-sm leading-relaxed text-justify">
          <span class="font-semibold text-red-600">Resto & Cafe Mas Bro</span> adalah tempat makan yang menawarkan suasana nyaman dan cita rasa yang selalu mengesankan. 
          Kami percaya makan bersama adalah momen berharga yang penuh dengan cerita dan kebahagiaan. 
          Awal mula nama <span class="font-semibold text-red-600">Mas Bro</span> datang dari sebuah candaan ringan di antara teman-teman dekat pemilik usaha. 
          Sebuah ledekan yang awalnya hanya gurauan, tapi kemudian menjadi nama yang melekat dan identitas dari tempat ini. Dari situ, usaha kecil ini berkembang menjadi restoran dan cafe yang kini dicintai banyak pelanggan. 
          Sejak berdiri pada tahun 2015, <span class="font-semibold text-red-600">Mas Bro</span> terus berkomitmen menghadirkan hidangan lezat dan suasana hangat yang membuat setiap kunjungan menjadi pengalaman tak terlupakan. 
        </p>
      </div>
    </div>
  </section>

  <section class="px-4" data-aos="fade-up">
    <div class="flex justify-center gap-6 mt-12 mb-8" id="stats-section">`
      @php
        $stats = [
          ['value' => 21, 'suffix' => '+', 'label' => 'Menu Variatif'],
          ['value' => 4.9, 'suffix' => '', 'label' => 'Rating Pelanggan'],
          ['value' => 2015, 'suffix' => '', 'label' => 'Sejak'],
        ];
      @endphp

      @foreach ($stats as $stat)
        <div
          style="border: 2px solid rgb(255, 38, 38); width: 180px; height: 90px;"
          class="bg-white rounded-xl p-4 shadow-sm flex flex-col justify-center items-center hover:shadow-md transition-shadow"
          data-aos="zoom-in"
        >
          <div class="text-xl text-red-600 font-bold flex items-center">
            <span class="counter" data-target="{{ $stat['value'] }}">0</span>{{ $stat['suffix'] }}
          </div>
          <div class="text-sm text-gray-700 mt-1 font-medium">{{ $stat['label'] }}</div>
        </div>
      @endforeach
    </div>
  </section>

  <!-- SCRIPT COUNTER -->
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const counters = document.querySelectorAll('.counter');
      let started = false;

      function startCount() {
        counters.forEach(counter => {
          const target = +counter.getAttribute('data-target');
          const duration = 1000;
          const steps = 60;
          let count = 0;
          const increment = target / steps;

          const updateCounter = () => {
            count += increment;
            if (count < target) {
              counter.innerText = Math.round(count * 10) / 10;
              requestAnimationFrame(updateCounter);
            } else {
              counter.innerText = target;
            }
          };

          updateCounter();
        });
      }

      const statsSection = document.getElementById('stats-section');

      if ('IntersectionObserver' in window && statsSection) {
        const observer = new IntersectionObserver((entries, observer) => {
          entries.forEach(entry => {
            if (entry.isIntersecting && !started) {
              startCount();
              started = true;
              observer.unobserve(statsSection);
            }
          });
        }, { threshold: 0.5 });

        observer.observe(statsSection);
      } else {
        // fallback jika browser tidak support IntersectionObserver
        startCount();
      }
    });
  </script>

  <section class="bg-white py-8 px-4 " data-aos="fade-up">
    <h1 class="text-3xl font-extrabold text-center text-red-700">Ulasan Pelanggan</h1>
    <div class="w-20 h-1 bg-yellow-400 rounded-full mx-auto mt-2 mb-4"></div>

    <div class="w-full flex justify-center">
      <div class="flex space-x-4 pb-4 flex-nowrap ">
        @php
            $reviews = [
                ['name' => 'Nur Aizah', 'date' => '6 bulan lalu', 'rating' => 5, 'comment' => 'Ayam gorengnya krispi banget sampe tulang-tulang. Pengin nyoba yg bakar... Tp nanti kapan2. Cah kangkungnya kurang ada rasa bumbu. Tp saya suka pisang krispinya'],
                ['name' => 'Arif Hidayah', 'date' => '9 bulan lalu', 'rating' => 5, 'comment' => 'Tempat nyaman buat santai dengan angin spoi spoi sore, parkiran luas, akses mudah. Untuk makanan enak dan harga sangat wajar'],
                ['name' => 'Baihaqi Fajar', 'date' => '7 bulan lalu', 'rating' => 5, 'comment' => 'Tempatnya mudah dijangkau karena lokasinya di pinggir jalan. Tempatnya cukup nyaman, apalagi untuk makan dengan rombongan besar. Tempat parkir juga cukup luas. Makanannya juga enak. Bebek bakarnya lezat, nasinya juga pulen. Es kopi gula susu arennya enak juga.'],
                ['name' => 'Deddy Hutomo', 'date' => '9 bulan lalu', 'rating' => 4, 'comment' => 'Tempatnya luas dan kalau malam sejuk. Ada pilihan duduk atau lesehan. Tempat bersih. Makanan standard. Pelayanan ramah.'],
            ];
        @endphp

        @foreach ($reviews as $review)
          <div class="w-[320px] h-[230px] bg-white border border-gray-300 rounded-lg p-4 flex flex-col overflow-hidden shadow-md" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
              <div class="flex justify-between items-center mb-1">
                  <div class="text-base font-semibold text-gray-900">{{ $review['name'] }}</div>
                  <div class="text-xs text-gray-500">{{ $review['date'] }}</div>
              </div>
              <div class="mb-2 text-yellow-400 text-base">
                  @for ($i = 0; $i < $review['rating']; $i++)
                      ⭐
                  @endfor
              </div>
              <p class="text-gray-800 text-justify overflow-y-auto flex-grow leading-snug text-[13px]">
                  {{ $review['comment'] }}
              </p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Swiper JS dan CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  
  <!-- AOS CSS -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

  <!-- Swiper Init -->
  <script>
      const swiper = new Swiper(".mySwiper", {
          loop: true,
          pagination: {
              el: ".swiper-pagination",
              clickable: true,
          },
          autoplay: {
              delay: 3000,
              disableOnInteraction: false,
          },
          slidesPerView: 1,
          spaceBetween: 30,
      });
  </script>

  <!-- AOS JS Init -->
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true,
    });
  </script>
</x-guest-layout>
