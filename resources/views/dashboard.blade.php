<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Members
        </h2>
        </x-slot>

    <div class="py-12 members-module">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                <div>
                    <!-- Div para el select de registros por página -->
                    <label for="selectmenu">Registros por página</label>
                    <select id="selectmenu">
                        <option selected>20</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    </div>

                    <div>
                    <!-- Div para la barra de búsqueda -->
                    <label for="search">Buscar:</label>
                    <input type="text" id="search" />
                    <button id="searchButton">Buscar</button>
                    </div>

                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <a href="/member" id="new-member">
                        Nuevo Miembro
                    </a>

                    <a href="/statistics" id="create-statistics">
                        Crear estadisticas                
                    </a>

                    <div>
                    <table id="table">
                        <!-- Tabla para mostrar los datos -->
                        <thead>
                        <tr class="sort-buttons">
                            <th><button data-sort="id" id="idButton">Id</button></th>
                            <th>
                            <button data-sort="first_name" id="nameButton">Nombre</button>
                            </th>
                            <th>
                            <button data-sort="last_name" id="lastNameButton">
                                Apellido
                            </button>
                            </th>
                            <th><button data-sort="email" id="emailButton">email</button></th>
                            <th>
                            <button data-sort="gender" id="genderButton">Género</button>
                            </th>
                            <th><button data-sort="age" id="ageButton">Edad</button></th>
                        </tr>
                        </thead>
                        <tbody id="tableContent"></tbody>
                        <!-- Cuerpo de la tabla -->
                    </table>
                    </div>

                    <div>
                    <button id="previous">
                        <!-- Botón para ir a la página anterior -->
                        <span class="ui-icon ui-icon-triangle-1-w"></span>
                    </button>
                    <div id="paginationButtons"></div>
                    <!-- Div para los botones de paginación -->
                    <button id="next">
                        <!-- Botón para ir a la página siguiente -->
                        <span class="ui-icon ui-icon-triangle-1-e"></span>
                    </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
