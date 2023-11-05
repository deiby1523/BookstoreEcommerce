<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subcategory::create( [
            'id'=>1,
            'category_id'=>1,
            'subcategory_name'=>'Novela contemporánea',
            'subcategory_description'=>'La novela contemporánea abarca historias que reflejan la vida moderna, situadas en el tiempo actual o reciente. Estas obras narrativas suelen explorar temas relevantes, dilemas sociales y emociones humanas en el contexto actual, proporcionando una visión reflexiva de la sociedad contemporánea.',
            'created_at'=>'2023-11-04 02:45:42',
            'updated_at'=>'2023-11-04 02:45:42'
        ] );



        Subcategory::create( [
            'id'=>2,
            'category_id'=>1,
            'subcategory_name'=>'Literatura clásica',
            'subcategory_description'=>'Las obras de literatura clásica son aquellas que han resistido la prueba del tiempo, siendo atemporales en su relevancia y profundidad. Estos libros representan hitos literarios de diferentes épocas, transmitiendo valores universales, explorando la condición humana y ofreciendo una mirada única a la historia y la sociedad de sus períodos.',
            'created_at'=>'2023-11-04 02:46:29',
            'updated_at'=>'2023-11-04 02:46:29'
        ] );



        Subcategory::create( [
            'id'=>3,
            'category_id'=>1,
            'subcategory_name'=>'Ciencia ficción y fantasía',
            'subcategory_description'=>'Estas subcategorías abarcan mundos imaginarios, tecnología avanzada, seres fantásticos y mundos alternativos. La ciencia ficción se sumerge en posibles avances tecnológicos y futuros distópicos, mientras que la fantasía explora mundos mágicos, criaturas mitológicas y aventuras épicas.',
            'created_at'=>'2023-11-04 02:50:15',
            'updated_at'=>'2023-11-04 02:50:43'
        ] );



        Subcategory::create( [
            'id'=>4,
            'category_id'=>1,
            'subcategory_name'=>'Misterio y thriller',
            'subcategory_description'=>'Las historias de misterio y thriller están llenas de suspenso, intriga y emociones fuertes. Desde crímenes por resolver hasta conspiraciones peligrosas, estas narrativas mantienen a los lectores al borde de sus asientos, desafiando su capacidad de resolver enigmas o anticipar giros inesperados.',
            'created_at'=>'2023-11-04 02:52:03',
            'updated_at'=>'2023-11-04 02:52:03'
        ] );



        Subcategory::create( [
            'id'=>5,
            'category_id'=>1,
            'subcategory_name'=>'Novela histórica',
            'subcategory_description'=>'Este género combina la ficción con eventos históricos reales. Las novelas históricas recrean épocas pasadas, sumergiendo a los lectores en períodos históricos específicos, presentando personajes ficticios en entornos auténticos y ofreciendo una visión única de la historia.',
            'created_at'=>'2023-11-04 02:52:37',
            'updated_at'=>'2023-11-04 02:52:37'
        ] );



        Subcategory::create( [
            'id'=>6,
            'category_id'=>1,
            'subcategory_name'=>'Literatura de género',
            'subcategory_description'=>'Esta subcategoría incluye una amplia gama de temas específicos, como novelas románticas, relatos del viejo oeste, novelas de terror, entre otros. Cada subgénero tiene sus propios elementos distintivos que atraen a diferentes audiencias, desde el amor y la pasión hasta el suspenso y la acción en contextos específicos.',
            'created_at'=>'2023-11-04 02:53:28',
            'updated_at'=>'2023-11-04 02:53:28'
        ] );



        Subcategory::create( [
            'id'=>7,
            'category_id'=>2,
            'subcategory_name'=>'Biografías y memorias',
            'subcategory_description'=>'Estas obras presentan relatos detallados de la vida de personas reales, ya sea contadas por ellas mismas (memorias) o por un autor que investiga y relata la vida de un individuo (biografías). Ofrecen una visión íntima de la vida, los logros, desafíos y experiencias de figuras destacadas o personas comunes con historias extraordinarias.',
            'created_at'=>'2023-11-04 20:39:14',
            'updated_at'=>'2023-11-04 20:39:14'
        ] );



        Subcategory::create( [
            'id'=>8,
            'category_id'=>2,
            'subcategory_name'=>'Libros de historia',
            'subcategory_description'=>'Estas obras exploran eventos, periodos y aspectos particulares del pasado. Desde análisis detallados de civilizaciones antiguas hasta acontecimientos históricos más recientes, estos libros ofrecen una comprensión más profunda de cómo evolucionó el mundo en el que vivimos.',
            'created_at'=>'2023-11-04 20:40:04',
            'updated_at'=>'2023-11-04 20:40:04'
        ] );



        Subcategory::create( [
            'id'=>9,
            'category_id'=>2,
            'subcategory_name'=>'Ensayos y crítica',
            'subcategory_description'=>'Este tipo de libros presenta reflexiones, análisis y evaluaciones sobre diversos temas, ya sea desde una perspectiva académica o personal. Abordan críticas de arte, literatura, sociedad, política o cultura, ofreciendo perspectivas enriquecedoras y provocativas sobre temas de interés.',
            'created_at'=>'2023-11-04 20:42:23',
            'updated_at'=>'2023-11-04 20:42:23'
        ] );



        Subcategory::create( [
            'id'=>10,
            'category_id'=>2,
            'subcategory_name'=>'Libros de viajes',
            'subcategory_description'=>'Estas obras relatan experiencias de viaje, aventuras y descubrimientos. Desde guías de viaje hasta narrativas de exploración de distintos lugares y culturas, estos libros inspiran, informan y entretienen, transportando a los lectores a diferentes rincones del mundo.',
            'created_at'=>'2023-11-04 20:42:52',
            'updated_at'=>'2023-11-04 20:42:52'
        ] );



        Subcategory::create( [
            'id'=>11,
            'category_id'=>2,
            'subcategory_name'=>'Libros de cocina y gastronomía',
            'subcategory_description'=>'Estos libros ofrecen recetas, historias culinarias, exploran tendencias gastronómicas y enseñan sobre técnicas de cocina. Desde libros de cocina étnica hasta guías de nutrición, estos libros son una fuente de inspiración para los amantes de la comida y la gastronomía.',
            'created_at'=>'2023-11-04 20:43:22',
            'updated_at'=>'2023-11-04 20:43:22'
        ] );



        Subcategory::create( [
            'id'=>12,
            'category_id'=>2,
            'subcategory_name'=>'Desarrollo personal y autoayuda',
            'subcategory_description'=>'Estos libros buscan ayudar a los lectores a crecer personalmente, a enfrentar desafíos y a mejorar la calidad de vida. Cubren temas que van desde la gestión del tiempo y el liderazgo hasta técnicas para el manejo del estrés, la superación de obstáculos y el logro de metas.',
            'created_at'=>'2023-11-04 20:43:48',
            'updated_at'=>'2023-11-04 20:43:48'
        ] );



        Subcategory::create( [
            'id'=>13,
            'category_id'=>3,
            'subcategory_name'=>'Libros infantiles',
            'subcategory_description'=>'Estos libros están diseñados específicamente para los más pequeños, desde recién nacidos hasta niños de hasta cinco años. Incluyen libros de cartón, libros con ilustraciones coloridas y texturas táctiles para fomentar la interacción y el aprendizaje temprano. Sus historias simples y coloridas imágenes buscan entretener y estimular el desarrollo cognitivo y emocional de los niños pequeños.',
            'created_at'=>'2023-11-04 20:46:35',
            'updated_at'=>'2023-11-04 20:46:35'
        ] );



        Subcategory::create( [
            'id'=>14,
            'category_id'=>3,
            'subcategory_name'=>'Libros juveniles',
            'subcategory_description'=>'Esta subcategoría se enfoca en lectores adolescentes, ofreciendo una amplia gama de géneros y temas. Desde novelas de fantasía, ciencia ficción o romance hasta historias realistas que abordan temas relevantes para los jóvenes, estos libros buscan conectar con sus intereses, explorar sus emociones y desafiar su intelecto.',
            'created_at'=>'2023-11-04 20:47:19',
            'updated_at'=>'2023-11-04 20:47:19'
        ] );



        Subcategory::create( [
            'id'=>15,
            'category_id'=>3,
            'subcategory_name'=>'Libros educativos',
            'subcategory_description'=>'Estos libros están orientados a enseñar y brindar conocimientos a los niños y jóvenes. Pueden abordar una variedad de temas, desde matemáticas y ciencias hasta lenguajes, historia y mucho más. Utilizan métodos interactivos, como ilustraciones llamativas, juegos y actividades, para facilitar el aprendizaje y el desarrollo de habilidades.',
            'created_at'=>'2023-11-04 20:47:55',
            'updated_at'=>'2023-11-04 20:47:55'
        ] );



        Subcategory::create( [
            'id'=>16,
            'category_id'=>3,
            'subcategory_name'=>'Libros ilustrados',
            'subcategory_description'=>'Estos libros se caracterizan por tener una combinación de texto e ilustraciones llamativas que narran historias de una manera visualmente atractiva. Están destinados a lectores de diferentes edades y a menudo exploran temas emocionales o complejos a través de ilustraciones impactantes y narrativas simples.',
            'created_at'=>'2023-11-04 20:48:48',
            'updated_at'=>'2023-11-04 20:48:48'
        ] );



        Subcategory::create( [
            'id'=>17,
            'category_id'=>3,
            'subcategory_name'=>'Libros de actividades',
            'subcategory_description'=>'Esta subcategoría ofrece libros que proponen actividades prácticas y entretenidas. Desde libros de colorear y juegos de rompecabezas hasta libros de manualidades, buscan mantener entretenidos a los niños y jóvenes mientras estimulan su creatividad, habilidades motoras y pensamiento lógico.',
            'created_at'=>'2023-11-04 20:49:29',
            'updated_at'=>'2023-11-04 20:49:29'
        ] );



        Subcategory::create( [
            'id'=>18,
            'category_id'=>3,
            'subcategory_name'=>'Fantasía y ciencia ficción para jóvenes',
            'subcategory_description'=>'Estos libros están ambientados en mundos imaginarios, repletos de magia, aventuras y elementos fantásticos. Dirigidos a lectores jóvenes, exploran mundos alternativos, viajes en el tiempo, poderes sobrenaturales y otros temas que despiertan la imaginación y la curiosidad.',
            'created_at'=>'2023-11-04 20:49:54',
            'updated_at'=>'2023-11-04 20:49:54'
        ] );



        Subcategory::create( [
            'id'=>19,
            'category_id'=>4,
            'subcategory_name'=>'Ciencias naturales',
            'subcategory_description'=>'Esta subcategoría abarca una amplia gama de disciplinas científicas que se centran en el estudio de la naturaleza y los fenómenos naturales. Incluye la biología, la química, la física, la geología y otras ciencias fundamentales que exploran y explican los procesos y características del mundo natural.',
            'created_at'=>'2023-11-04 20:51:17',
            'updated_at'=>'2023-11-04 20:51:17'
        ] );



        Subcategory::create( [
            'id'=>20,
            'category_id'=>4,
            'subcategory_name'=>'Astronomía y astrofísica',
            'subcategory_description'=>'Libros que exploran el universo, desde los planetas y las estrellas hasta la cosmología. Esta subcategoría aborda temas como la astronomía observacional, la física de los astros, los agujeros negros, las galaxias y otros fenómenos cósmicos, brindando una comprensión más profunda del espacio exterior.',
            'created_at'=>'2023-11-04 20:51:42',
            'updated_at'=>'2023-11-04 20:51:42'
        ] );



        Subcategory::create( [
            'id'=>21,
            'category_id'=>4,
            'subcategory_name'=>'Biología y vida salvaje',
            'subcategory_description'=>'Enfocada en la vida en la Tierra, esta subcategoría explora la biología en todas sus formas, desde la estructura celular hasta la ecología de los ecosistemas. Los libros incluidos pueden tratar sobre la diversidad de la vida salvaje, la conservación de especies, la evolución y el comportamiento animal.',
            'created_at'=>'2023-11-04 20:52:04',
            'updated_at'=>'2023-11-04 20:52:04'
        ] );



        Subcategory::create( [
            'id'=>22,
            'category_id'=>4,
            'subcategory_name'=>'Medio ambiente y ecología',
            'subcategory_description'=>'Libros que analizan la relación entre los seres vivos y su entorno. Se centran en cuestiones medioambientales, como el cambio climático, la sostenibilidad, la conservación de los recursos naturales y la ecología, ofreciendo soluciones y reflexiones sobre cómo preservar nuestro planeta.',
            'created_at'=>'2023-11-04 20:52:50',
            'updated_at'=>'2023-11-04 20:52:50'
        ] );



        Subcategory::create( [
            'id'=>23,
            'category_id'=>4,
            'subcategory_name'=>'Libros de divulgación científica',
            'subcategory_description'=>'Esta subcategoría busca acercar la ciencia al público en general. Los libros de divulgación científica explican conceptos científicos complejos de manera accesible y entretenida, haciendo que temas complejos sean comprensibles para lectores sin formación científica específica.',
            'created_at'=>'2023-11-04 20:53:22',
            'updated_at'=>'2023-11-04 20:53:22'
        ] );



        Subcategory::create( [
            'id'=>24,
            'category_id'=>4,
            'subcategory_name'=>'Tecnología y computación',
            'subcategory_description'=>'Enfocada en avances tecnológicos, esta subcategoría aborda temas como la informática, la inteligencia artificial, la programación, la ciberseguridad y la revolución digital. Ofrece una visión general de la tecnología y su impacto en la sociedad.',
            'created_at'=>'2023-11-04 20:53:45',
            'updated_at'=>'2023-11-04 20:53:45'
        ] );



        Subcategory::create( [
            'id'=>25,
            'category_id'=>5,
            'subcategory_name'=>'Historia del arte',
            'subcategory_description'=>'Esta subcategoría se sumerge en la evolución del arte a lo largo del tiempo. Desde la prehistoria hasta movimientos artísticos contemporáneos, explora los estilos, los artistas y las obras que han dado forma al mundo del arte. Ofrece análisis detallados de las tendencias, los períodos y las influencias que marcaron hitos en la historia del arte.',
            'created_at'=>'2023-11-04 20:56:50',
            'updated_at'=>'2023-11-04 20:56:50'
        ] );



        Subcategory::create( [
            'id'=>26,
            'category_id'=>5,
            'subcategory_name'=>'Fotografía',
            'subcategory_description'=>'Enfocada en la captura de momentos, esta subcategoría explora técnicas, estilos y la historia de la fotografía. Desde libros que detallan la técnica fotográfica hasta colecciones de imágenes icónicas, ofrece una visión amplia del poder y la belleza de la fotografía como forma de arte y documentación.',
            'created_at'=>'2023-11-04 20:57:23',
            'updated_at'=>'2023-11-04 20:57:23'
        ] );



        Subcategory::create( [
            'id'=>27,
            'category_id'=>5,
            'subcategory_name'=>'Diseño y moda',
            'subcategory_description'=>'Esta área se centra en la estética y la creatividad en la moda y el diseño. Desde libros que exploran el diseño gráfico hasta las tendencias de la moda a lo largo de la historia, ofrece una comprensión más profunda de cómo la creatividad y el estilo han evolucionado en diferentes contextos culturales.',
            'created_at'=>'2023-11-04 20:58:01',
            'updated_at'=>'2023-11-04 20:58:01'
        ] );



        Subcategory::create( [
            'id'=>28,
            'category_id'=>5,
            'subcategory_name'=>'Arquitectura',
            'subcategory_description'=>'Esta subcategoría se sumerge en la historia, los estilos y las innovaciones arquitectónicas. Desde libros que analizan la arquitectura antigua hasta las tendencias modernas, ofrece una perspectiva detallada de los edificios más significativos, los arquitectos destacados y los movimientos que han influenciado la construcción a lo largo del tiempo.',
            'created_at'=>'2023-11-04 20:58:33',
            'updated_at'=>'2023-11-04 20:58:33'
        ] );



        Subcategory::create( [
            'id'=>29,
            'category_id'=>5,
            'subcategory_name'=>'Música y cine',
            'subcategory_description'=>'Esta sección explora la relación entre el arte, la música y el cine. Desde libros que analizan la historia del cine hasta aquellos que se enfocan en la relación entre la música y el arte visual, proporciona una visión integral de cómo estas formas de arte se entrelazan y se complementan.',
            'created_at'=>'2023-11-04 20:59:09',
            'updated_at'=>'2023-11-04 20:59:09'
        ] );



        Subcategory::create( [
            'id'=>30,
            'category_id'=>5,
            'subcategory_name'=>'Artes escénicas',
            'subcategory_description'=>'Esta subcategoría se centra en las artes interpretativas. Desde libros que exploran el teatro y la danza hasta aquellas que analizan las actuaciones y producciones escénicas, ofrece una comprensión más profunda de la expresión artística a través del movimiento y la actuación.',
            'created_at'=>'2023-11-04 20:59:38',
            'updated_at'=>'2023-11-04 20:59:38'
        ] );



        Subcategory::create( [
            'id'=>31,
            'category_id'=>6,
            'subcategory_name'=>'Mindfulness y meditación',
            'subcategory_description'=>'Estas lecturas se centran en enseñar técnicas de mindfulness y meditación para cultivar la atención plena, reducir el estrés y mejorar la salud mental. Los libros en esta subcategoría ofrecen prácticas para estar presentes en el momento y lograr la paz interior.',
            'created_at'=>'2023-11-04 21:01:06',
            'updated_at'=>'2023-11-04 21:01:06'
        ] );



        Subcategory::create( [
            'id'=>32,
            'category_id'=>6,
            'subcategory_name'=>'Salud y bienestar',
            'subcategory_description'=>'Esta subcategoría abarca libros que proporcionan información sobre la salud física y el bienestar general. Desde guías de ejercicio y nutrición hasta consejos para un estilo de vida más saludable, estos libros buscan ayudar a los lectores a mejorar su bienestar general.',
            'created_at'=>'2023-11-04 21:01:31',
            'updated_at'=>'2023-11-04 21:01:31'
        ] );



        Subcategory::create( [
            'id'=>33,
            'category_id'=>6,
            'subcategory_name'=>'Crecimiento personal',
            'subcategory_description'=>'Lecturas que se enfocan en el desarrollo personal, abordando temas como la gestión del tiempo, el establecimiento de metas, el éxito personal y la superación de obstáculos. Ofrecen herramientas y consejos para el crecimiento y la realización personal.',
            'created_at'=>'2023-11-04 21:02:02',
            'updated_at'=>'2023-11-04 21:02:02'
        ] );



        Subcategory::create( [
            'id'=>34,
            'category_id'=>6,
            'subcategory_name'=>'Motivación y superación personal',
            'subcategory_description'=>'Esta subcategoría se centra en libros que buscan inspirar, motivar y fomentar la determinación para superar desafíos. Ofrecen historias de éxito, estrategias de motivación y cómo superar obstáculos para alcanzar objetivos personales.',
            'created_at'=>'2023-11-04 21:02:55',
            'updated_at'=>'2023-11-04 21:02:55'
        ] );



        Subcategory::create( [
            'id'=>35,
            'category_id'=>6,
            'subcategory_name'=>'Psicología',
            'subcategory_description'=>'Libros que exploran diferentes aspectos de la psicología humana, desde libros introductorios hasta estudios profundos sobre la mente, el comportamiento y la comprensión de las emociones. Estos libros ofrecen ideas sobre el funcionamiento de la mente humana.',
            'created_at'=>'2023-11-04 21:03:26',
            'updated_at'=>'2023-11-04 21:03:26'
        ] );



        Subcategory::create( [
            'id'=>36,
            'category_id'=>6,
            'subcategory_name'=>'Espiritualidad',
            'subcategory_description'=>'Esta subcategoría abarca libros que exploran la espiritualidad en sus diversas formas. Desde enseñanzas religiosas hasta prácticas espirituales no religiosas, estos libros ofrecen reflexiones sobre el significado de la vida, la conexión con lo trascendental y la búsqueda de sentido y propósito.',
            'created_at'=>'2023-11-04 21:04:09',
            'updated_at'=>'2023-11-04 21:04:09'
        ] );



        Subcategory::create( [
            'id'=>37,
            'category_id'=>7,
            'subcategory_name'=>'Finanzas personales',
            'subcategory_description'=>'Estas obras se centran en la gestión eficaz de las finanzas personales. Ofrecen consejos sobre ahorro, inversión, manejo de deudas, planificación para la jubilación y estrategias para asegurar la estabilidad financiera a nivel individual y familiar.',
            'created_at'=>'2023-11-04 21:05:07',
            'updated_at'=>'2023-11-04 21:05:07'
        ] );



        Subcategory::create( [
            'id'=>38,
            'category_id'=>7,
            'subcategory_name'=>'Marketing y ventas',
            'subcategory_description'=>'Esta subcategoría se enfoca en estrategias de marketing y técnicas de ventas efectivas. Los libros en esta área cubren desde conceptos fundamentales hasta las últimas tendencias en publicidad, branding, análisis de mercado y tácticas de ventas para promover productos y servicios.',
            'created_at'=>'2023-11-04 21:05:28',
            'updated_at'=>'2023-11-04 21:05:28'
        ] );



        Subcategory::create( [
            'id'=>39,
            'category_id'=>7,
            'subcategory_name'=>'Emprendimiento',
            'subcategory_description'=>'Estas obras exploran el mundo del emprendimiento y los negocios desde la perspectiva de aquellos que buscan iniciar, administrar y hacer crecer sus propios negocios. Ofrecen consejos sobre la creación de empresas, estrategias de negocios, gestión de startups y casos de éxito empresarial.',
            'created_at'=>'2023-11-04 21:05:55',
            'updated_at'=>'2023-11-04 21:05:55'
        ] );



        Subcategory::create( [
            'id'=>40,
            'category_id'=>7,
            'subcategory_name'=>'Liderazgo y gestión',
            'subcategory_description'=>'Esta subcategoría se enfoca en el desarrollo de habilidades de liderazgo, gestión de equipos y organizaciones. Los libros en esta área exploran estilos de liderazgo, resolución de conflictos, gestión de recursos humanos, motivación de equipos y estrategias para el crecimiento organizacional.',
            'created_at'=>'2023-11-04 21:06:18',
            'updated_at'=>'2023-11-04 21:06:18'
        ] );



        Subcategory::create( [
            'id'=>41,
            'category_id'=>7,
            'subcategory_name'=>'Economía y teoría financiera',
            'subcategory_description'=>'Estos libros se sumergen en los principios fundamentales de la economía y las teorías financieras. Exploran temas como macroeconomía, microeconomía, políticas económicas, teorías financieras y el funcionamiento de los mercados financieros.',
            'created_at'=>'2023-11-04 21:06:41',
            'updated_at'=>'2023-11-04 21:06:41'
        ] );



        Subcategory::create( [
            'id'=>42,
            'category_id'=>7,
            'subcategory_name'=>'Industria y sector empresarial',
            'subcategory_description'=>'Esta subcategoría se centra en analizar sectores industriales específicos y sus dinámicas. Ofrece información detallada sobre sectores como tecnología, salud, energía, entre otros, explorando tendencias, retos y oportunidades dentro de cada uno.',
            'created_at'=>'2023-11-04 21:07:09',
            'updated_at'=>'2023-11-04 21:07:09'
        ] );



        Subcategory::create( [
            'id'=>43,
            'category_id'=>8,
            'subcategory_name'=>'Religiones Comparadas',
            'subcategory_description'=>'Esta subcategoría se enfoca en comparar diferentes tradiciones religiosas, identificando similitudes y diferencias entre creencias, prácticas, mitologías y cosmovisiones. Los libros en esta sección exploran la intersección y la diversidad de las principales religiones del mundo, ofreciendo una comprensión más amplia de las diferentes formas de fe.',
            'created_at'=>'2023-11-04 21:08:08',
            'updated_at'=>'2023-11-04 21:08:08'
        ] );



        Subcategory::create( [
            'id'=>44,
            'category_id'=>8,
            'subcategory_name'=>'Filosofía Religiosa',
            'subcategory_description'=>'Libros que abordan los aspectos filosóficos de la religión, explorando conceptos como la existencia de Dios, la moralidad, el propósito de la vida y otros temas fundamentales desde una perspectiva filosófica. Esta subcategoría se sumerge en las ideas y argumentos que rodean la fe y la espiritualidad desde un enfoque más racional.',
            'created_at'=>'2023-11-04 21:08:37',
            'updated_at'=>'2023-11-04 21:08:37'
        ] );



        Subcategory::create( [
            'id'=>45,
            'category_id'=>8,
            'subcategory_name'=>'Misticismo y Esoterismo',
            'subcategory_description'=>'Aquí se encuentran libros que exploran aspectos más ocultos o misteriosos de las prácticas espirituales. Desde el misticismo de diferentes tradiciones hasta prácticas esotéricas, como la alquimia o la astrología, estos libros ofrecen una visión de los aspectos más profundos y menos conocidos de la espiritualidad.',
            'created_at'=>'2023-11-04 21:09:04',
            'updated_at'=>'2023-11-04 21:09:04'
        ] );



        Subcategory::create( [
            'id'=>46,
            'category_id'=>8,
            'subcategory_name'=>'Libros Sagrados',
            'subcategory_description'=>'Esta subcategoría alberga textos considerados sagrados o fundamentales en varias tradiciones religiosas. Desde la Biblia, el Corán, la Torá, los Vedas y otros textos religiosos, estos libros son fundamentales para el estudio y la comprensión de las creencias y prácticas religiosas.',
            'created_at'=>'2023-11-04 21:09:32',
            'updated_at'=>'2023-11-04 21:09:32'
        ] );



        Subcategory::create( [
            'id'=>47,
            'category_id'=>8,
            'subcategory_name'=>'Teología',
            'subcategory_description'=>'Los libros de teología exploran y discuten conceptos doctrinales, teológicos y dogmas dentro de las diferentes tradiciones religiosas. Estos textos examinan la naturaleza de la fe, la divinidad, la salvación y otros aspectos teológicos fundamentales de diversas religiones.',
            'created_at'=>'2023-11-04 21:10:00',
            'updated_at'=>'2023-11-04 21:10:00'
        ] );



        Subcategory::create( [
            'id'=>48,
            'category_id'=>8,
            'subcategory_name'=>'Inspiración Espiritual',
            'subcategory_description'=>'Esta subcategoría incluye libros que ofrecen inspiración, motivación y reflexiones sobre la espiritualidad. Desde escritos contemporáneos hasta clásicos atemporales, estos libros brindan mensajes de esperanza, consuelo y guía espiritual para los lectores.',
            'created_at'=>'2023-11-04 21:10:31',
            'updated_at'=>'2023-11-04 21:10:31'
        ] );
    }
}
