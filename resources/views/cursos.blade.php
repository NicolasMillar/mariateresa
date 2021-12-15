<x-app-layout>
    <main id="main">
        <div class="container">
            <div class="header">
                <div id="imagen-principal" style="position: relative; text-align: center;">
                    <h1 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 300%; color:white"><b>PROFESORES DEL COLEGIO</b></h1>
                    <img src="{{asset('assets/images/custom/foto-colegio.jpg')}}" alt="" style="width:1600px; height:400px; object-fit: cover; display: flex; margin-left: auto; margin-right: auto;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="history">
                <div class="tarjeta-historia" style="border: 1px solid orange; height:150px; max-width:1500px; border-radius: 25px">
                    <div class="centrar" style="width: 200px; height: 150px; border: 1px solid blue;">
                        <img id="historia" src="{{asset('assets/images/sliders/1.jpg')}}" width="100%" height="100" style="border-radius: 25px; position: absolute; top: 50%; transform: translateY(-50%);">
                    </div>
                    <div class="texto-historia" style="margin-left: 20px">
                        <ul>
                            <li type="circle">En el año 1860 fue creada la "Escuela de Preceptores N°2" donde se atendían a niños solo hasta cuarto año de educación primaria.</li>
                            <li type="circle">El 20 de Junio de 1917 por el Decreto N° 2881, se crean simultáneamente dos escuelas; las N° 26 y 27 superior de hombres y de mujeres.</li>
                            <li type="circle">Esta denominación se mantiene hasta 1928 fecha desde la cual se le denomina como "Escuela de Niñas N°7". </li>
                            <li type="circle">En el año 1979 durante el gobierno militar se le denomina como "Escuela D- N°72".</li>
                            <li type="circle">El año 1989 la propia comunidad escolar decide otorgarle el nombre con el que le conoce hasta el día de hoy "Escuela María Teresa Marchant Contreras"en homenaje <br> a la docente de ese nombre quien le dio el sello de escuela solidaria.</li>
                        </ul>
                    </div>
                </div>
                <div class="tarjeta-historia2" style="border: 1px solid orange; height:150px; max-width:1500px; border-radius: 25px">
                    <div class="texto-historia" style="width:1248px; margin-left: 25px">
                        <ul>
                            <li type="circle">El año 1981; al igual que en todo el país se transfiere la dependencia desde el Ministerio de Educación a la I. Municipalidad de Coelemu.</li>
                            <li type="circle">El año 1984, la escuela abre sus puertas a varones lo que la transforma en mixta. Durante el año 2000 se amplía la cobertura en el nivel de Educación Parvularia <br> con dos cursos de NT1</li>
                            <li type="circle">El año 2014 se vuelve a ampliar la cobertura con la ampliación de un nuevo "Primer año básico" dando lugar a tres de estos cursos.</li>
                            <li type="circle">En el año 2019 se incorpora a la JEC los niveles de Educación Parvularia NT1- NT2.</li>
                        </ul>
                    </div>
                    <div class="centrar" style="width: 200px; height: 150px; float: right; margin-right: 25px">
                        <img id="historia" src="{{asset('assets/images/sliders/1.jpg')}}" width="100%" height="100" style="border-radius: 25px; position: absolute; top: 50%; transform: translateY(-50%);">
                    </div>
                </div>
                <div class="tarjeta-historia" style="border: 1px solid orange; height:150px; max-width:1500px; border-radius: 25px">
                    <div class="centrar" style="width: 200px; height: 150px; border: 1px solid blue;">
                        <img id="historia" src="{{asset('assets/images/sliders/1.jpg')}}" width="100%" height="100" style="border-radius: 25px; position: absolute; top: 50%; transform: translateY(-50%);">
                    </div>
                    <div class="texto-historia" style="margin-left: 20px">
                        <ul>
                            <li type="circle">Desde hace muchos años nuestros niños y niñas han sido reconocidos a nivel comunal, provincial y nacional en diversos concursos tanto en el arte como en las letras.</li>
                            <li type="circle">Desde que se impuso la evaluación docente en el país los docentes de esta unidad educativa han sido calificados como competentes y destacados.</li>
                            <li type="circle">Durante muchos años y actualmente se obtiene la "Excelencia Académica" por su desempeño destacado en los indicadores de calidad y resultados de aprendizaje en la <br> medición SIMCE.</li>
                        </ul>
                    </div>
                </div>
                <h1 class="subtitulos">SELLOS EDUCATIVOS</h1>
                <div class="tarjeta-historia2" style="border: 1px solid orange; height:150px; max-width:1500px; border-radius: 25px">
                    <div class="texto-historia" style="width:1248px; margin-left: 25px">
                        <p style="font-size: 100%">El ideario de nuestro Proyecto Educativo Institucional se centra en la formación integral del educando, desarrollando todas las capacidades, competencias y habilidades<br>
                            de los niños y niñas, entregándoles herramientas esenciales para incorporarse con éxito en la enseñanza media.
                        </p>
                        <p style="font-size: 100%">El sello educativo se caracteriza porque contamos con niños y niñas que se destacan en sus aprendizaje, autónomos, respetuosos de la diversidad, participes de un<br>
                            ambiente de sana convivencia, destacados en las artes, las letras, el deporte, con dominio de la tecnología, con interés en su medio ambiente y con una trayectoria <br>
                            escolar sustentada en buenos resultados académicos.
                        </p>
                    </div>
                    <div class="centrar" style="width: 200px; height: 150px; float: right; margin-right: 25px">
                        <img id="historia" src="{{asset('assets/images/sliders/1.jpg')}}" width="100%" height="100" style="border-radius: 25px; position: absolute; top: 50%; transform: translateY(-50%);">
                    </div>
                </div>
                <h1 class="subtitulos"> MISION Y VISION</h1>
                <div class="tarjeta-historia" style="border: 1px solid orange; height:150px; max-width:1500px; border-radius: 25px">
                    <div class="centrar" style="width: 200px; height: 150px; border: 1px solid blue;">
                        <img id="historia" src="{{asset('assets/images/sliders/1.jpg')}}" width="100%" height="100" style="border-radius: 25px; position: absolute; top: 50%; transform: translateY(-50%);">
                    </div>
                    <div class="texto-historia" style="margin-left: 20px">
                        <h2 class="subtitulos2">La visión de nuestra unidad educativa es: <br><br> </h2>
                        <p>"Ser reconocidos como una escuela que forma personas con buen desempeño escolar, distinguidas por su formación valórica y ciudadana"</p>
                        <p>"Ser reconocidos como una escuela que forma niños y niñas con buen desempeño escolar, empáticos, solidarios, responsables y respetuosos, con sus pares, mayores y su <br> entorno, desde NT1 a 8° básico."</p>
                    </div>
                </div>
                <div class="tarjeta-historia2" style="border: 1px solid orange; height:150px; max-width:1500px; border-radius: 25px">
                    <div class="texto-historia" style="width:1248px; margin-left: 25px">
                        <h2 class="subtitulos2">La misión de nuestra unidad educativa es: <br><br></h2>
                        <p>"Formar personas de buen desempeño escolar, capaces de participar progresiva y positivamente en la sociedad de la cual forma parte".</p>
                    </div>
                    <div class="centrar" style="width: 200px; height: 150px; float: right; margin-right: 25px">
                        <img id="historia" src="{{asset('assets/images/sliders/1.jpg')}}" width="100%" height="100" style="border-radius: 25px; position: absolute; top: 50%; transform: translateY(-50%);">
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
