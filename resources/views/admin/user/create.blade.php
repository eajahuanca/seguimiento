<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuevo Usuario</title>
</head>
<body>
    contenido del nuevo usuario

    @section('scripts')
        <script type="text/javascript">
            function registrar(){
                open_container();
            }

            function open_container(){
                var size='standart';
                var content = '¿ Esta seguro de registrar el Nuevo Usuario ?';
                var title = 'Guardar datos';
                var footer = '<button type="button" class="btn btn-default" data-dismiss="modal">No</button><button type="submit" onclick="enviar_formulario();" class="btn btn-primary">Si</button>';
                setModalBox(title,content,footer,size);
                $('#myModal').modal('show');
            }

            function setModalBox(title,content,footer,$size){
                document.getElementById('modal-bodyku').innerHTML = content;
                document.getElementById('myModalLabel').innerHTML = title;
                document.getElementById('modal-footerq').innerHTML = footer;
                if($size == 'standart'){
                    $('#myModal').attr('class', 'modal fade').attr('aria-labelledby','myModalLabel');
                    $('.modal-dialog').attr('class','modal-dialog');
                }
            }

            function enviar_formulario(){
                document.frmusuario.submit();
            }
        </script>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body" id="modal-bodyku"></div>
                    <div class="modal-footer" id="modal-footer"></div>
                </div>
            </div>
        </div>
    @endsection
    
</body>
</html>
