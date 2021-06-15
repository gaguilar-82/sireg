@extends('layouts.plantilla')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection

@section('title','SIREG | Inicio')

@section('Content')

    <div class="container mx-auto pt-5 text-center">
        <div class="bg-gray-200">
            <h1>Sistema de Regularización y Escrituración de Predios</h1>
            <div class="card text-center">
                <div class="card-header">
                    <h2>Objetivo General</h2>
                </div>
            </div>
            <div class="card">
                <div class="card-body text-justify">
                <h3>Ser un sistema de información basado en tecnologías web que permita el control de los procesos 
                    administrativos necesarios para la regularización y escrituración de predios patrimonio del Instituto 
                    de Vivienda y Suelo Urbano del Estado de Guerrero (INVISUR).
                </h3>
            </div>
        </div>
    </div>

    <div class="modal fade" data-backdrop="static" data-keyboard="false" id="Modal1" tabindex="-1" role="dialog" aria-labelledby="TituloVentana" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Aviso de privacidad</h4>
                </div>
                <div class="modal-body">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi, doloremque exercitationem. 
                    Dolorum, ipsum ut recusandae quisquam quas atque quasi animi libero cupiditate assumenda, odit 
                    ratione illo totam voluptates eius, hic a iste tempore porro! In hic nemo necessitatibus ex suscipit 
                    quaerat eaque ipsa cum, tempora dignissimos amet recusandae itaque ipsum quae quis provident possimus, 
                    corporis id! Sunt unde iste, rerum atque facilis quae cum neque enim sed dolores itaque officiis 
                    laudantium necessitatibus est asperiores nemo optio sequi, eos in. Eaque consequatur consequuntur, 
                    sunt iste suscipit voluptatibus ratione cumque vitae earum et neque quidem. Ab beatae tenetur ad 
                    iure asperiores assumenda qui excepturi quas mollitia labore nesciunt voluptate, nemo nisi. 
                    Laboriosam veniam quasi optio aliquid quibusdam cupiditate, laborum fugit dolores eligendi voluptatem 
                    voluptatum saepe praesentium culpa at impedit cumque eum excepturi odio aut quidem sed non dolore! 
                    Deleniti vero rerum optio est in! Ipsa assumenda, iste cum nobis quas molestias recusandae dolore. 
                    Inventore minima, rem magni expedita voluptate saepe laborum nihil dignissimos autem reprehenderit. 
                    Eius commodi similique blanditiis voluptatem quaerat, possimus minus quo earum corrupti officiis 
                    mollitia dolor non odio unde quis asperiores eos molestiae voluptas nesciunt, facilis distinctio 
                    quae consequuntur pariatur hic. Laboriosam nisi recusandae magnam impedit sunt, at voluptate?
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" type="button" data-dismiss="modal">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#Modal1').modal('toggle');
        });
        /* $(':input').on('click',function(){
            $('#Modal1').modal('hide');
        }); */
    </script>
@endsection