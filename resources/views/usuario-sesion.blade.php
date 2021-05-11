<div class="principal">
    <div class="contenedor_prin">
        <div class="contenido">
            @foreach($resultado as $usuario)
                <h2 class="sub">{{$usuario["nom_user"]}} {{$usuario["ape_user"]}}</h2><hr>
                <div class="caja">
                    <p class="p_perfil">Sexo:{{$usuario["sex_user"]}}</p>
                    <p class="p_perfil">DNI: {{$usuario["DNI_user"]}}</p>
                </div>
                <div class="caja">
                    <p class="p_perfil">Telefono: {{$usuario["telf_user"]}}</p>
                    <p class="p_perfil">email: {{$usuario["email_user"]}}</p>
                </div>
            @endforeach
        </div>
        <div class="contenido">
            <form action="principal.php" method="post">
                <div class="expand">
                    <div class="sub_expand" onclick="openTab('b1');">
                        <h2 class="h2_expand">Crear Publicación</h2>
                    </div>
                </div>
                <div id="b1" class="containerTab" style="display:none;">
                    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                    <label>
                        <input type="hidden" name="fecha" value="<?php date_default_timezone_set('America/Lima');  echo date('d-m-Y');?>">
                    </label>
                    <label>
                        <input type="hidden" name="hora" value="<?php  echo date('H:i');?>">
                    </label>
                    <label>
                        <span>PAÍS</span>
                        <input type="text" name="pais" value="<?php ?>">
                    </label>
                    <label>
                        <span>REGIÓN</span>
                        <input type="text" name="region">
                    </label>
                    <label>
                        <span>DIRECCIÓN</span>
                        <input type="text" name="direccion">
                    </label>
                    <label>
                        <span>TIPO</span>
                        <input type="text" name="tipo">
                    </label>
                    <label>
                        <span>TEXTO</span>
                        <input type="text" name="texto">
                    </label>
                    <label>
                        <span>IMAGEN</span>
                    </label>
                    <label class="aviso">
                        <span>MENSAJE ERROR</span>
                    </label>
                    <button type="submit" class="submit" name="confirmar_pub">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
