<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sections')->insert([
            'id' => 1,
            'section_name' => 'Meditacion para principiantes',
            'section_main_title' => 'Descubre la Paz Interior',
            'section_secondary_title' => 'Autoayuda y bienestar',
            'section_sub_title' => 'Meditación para Principiantes',
            'section_secondary_sub_title' => 'Jack Kornfield',
            'section_text_1' => 'Si quieres iniciarte en la meditación, este libro es el compañero perfecto. Jack Kornfield, maestro budista, explica técnicas accesibles para integrar la meditación en tu rutina, sin importar tu nivel de experiencia.

Beneficios clave que este libro te ofrece:
Fácil de aplicar: Ejercicios prácticos para meditar en solo 10 minutos al día.
Conexión cuerpo-mente: Aprenderás a escuchar tus emociones y responder con sabiduría.
Mayor autoconocimiento: Descubrirás patrones mentales y cómo cambiarlos para vivir con más libertad.',
            'section_text_2' => '¿Por qué elegir este libro? Combina teoría inspiradora con herramientas reales para que la meditación se convierta en un hábito poderoso. ¡Empieza hoy y da el primer paso hacia una vida más consciente y plena!',
            'section_color' => 2,
            'section_image_1_url' => 'img/sections/meditacion-para-principiantes_1_1.jpg',
            'section_image_2_url' => 'img/sections/meditacion-para-principiantes_1_2.webp',
            'section_btn_link' => 'http://192.168.1.7:8000/book/view/34',
            'section_style' => 1,
            'active' => 1,
            'created_at' => Carbon::parse('2025-05-23 01:27:46'),
            'updated_at' => Carbon::parse('2025-05-23 01:30:32'),
        ]);

        DB::table('sections')->insert([
            'id' => 2,
            'section_name' => 'Inteligencia artificial',
            'section_main_title' => 'Domina el Futuro',
            'section_sub_title' => '¿Por qué deberías leerlo?',
            'section_text_1' => '¿Te intriga el impacto de la IA en tu vida y trabajo? Este libro es la puerta de entrada perfecta para entender los conceptos clave sin necesidad de ser un experto en tecnología. Con explicaciones claras y ejemplos prácticos, el autor desglosa desde chatbots hasta redes neuronales, mostrando cómo la IA está transformando industrias y nuestra vida cotidiana.',
            'section_text_2' => 'Ideal para principiantes, sin jerga técnica confusa. Descubre cómo aplica la IA en salud, negocios y entretenimiento. Aprende qué habilidades necesitarás en la era de la automatización.',
            'section_color' => 4,
            'section_image_1_url' => 'img/sections/inteligencia-artificial_2_1.jpg',
            'section_image_2_url' => null,
            'section_btn_link' => 'http://192.168.1.7:8000/book/view/10',
            'section_style' => 3,
            'active' => 1,
            'created_at' => Carbon::parse('2025-05-23 01:27:46'),
            'updated_at' => Carbon::parse('2025-05-23 01:30:32'),
        ]);
        
        DB::table('sections')->insert([
            'id' => 3,
            'section_name' => 'Cien años de soledad',
            'active' => 0,
            'section_use_custom_code' => 1,
            'section_custom_code' => '
        <div class="container my-5">
          <div class="row">
            <div class="col-lg-6 fade-trigger opacity-0" style="align-content: center;">
              <h1 class="display-5 fw-semibold text-dark mb-3">Una obra inmortal</h1>
              <p class="lead text-muted mb-4">
                Redescubre <strong>"Cien años de soledad"</strong> en una edición especial conmemorativa,<br>
                celebrando el legado eterno de Gabriel García Márquez.
              </p>
              <div class="d-flex gap-3 mt-4">
                <button class="btn btn-outline-dark btn-lg px-5 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalSoledad">
                  Más información
                </button>
              </div>
            </div>
        
            <!-- Imagen del libro -->
            <div class="col-lg-6 text-center fade-trigger opacity-0">
              <img src="https://www.rae.es/sites/default/files/portada_cien_anos_de_soledad_0.jpg" 
                   alt="Cien años de soledad" 
                   class="img-fluid shadow-lg book-hover rounded" 
                   style="max-height: 500px;">
            </div>
          </div>
        </div>
        
        <style>
          .opacity-0 {
            opacity: 0;
          }
        
          .fade-in-left {
            animation: fadeInLeft 1.5s ease forwards;
          }
        
          .fade-in-right {
            animation: fadeInRight 1.5s ease forwards;
          }
        
          @keyframes fadeInLeft {
            from {
              opacity: 0;
              transform: translateX(-40px);
            }
            to {
              opacity: 1;
              transform: translateX(0);
            }
          }
        
          @keyframes fadeInRight {
            from {
              opacity: 0;
              transform: translateX(40px);
            }
            to {
              opacity: 1;
              transform: translateX(0);
            }
          }
        </style>
        <script>
          const options = {
            threshold: 0.4
          };
        
          const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                const el = entry.target;
        
                // Aplica animación distinta según la posición
                if (el.classList.contains("text-center")) {
                  el.classList.add("fade-in-right");
                } else {
                  el.classList.add("fade-in-left");
                }
        
                el.classList.remove("opacity-0");
                observer.unobserve(el); // Para que no se repita
              }
            });
          }, options);
        
          document.querySelectorAll(".fade-trigger").forEach(el => {
            observer.observe(el);
          });
        </script>
        ',
            'created_at' => Carbon::parse('2025-05-23 01:27:46'),
            'updated_at' => Carbon::parse('2025-05-23 01:30:32'),
        ]);
        
    }
}
