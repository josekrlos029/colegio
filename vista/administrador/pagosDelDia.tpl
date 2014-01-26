<div style="margin: 5%; width: 100%;">
    <h1>Consultar Por Rango de Fecha:</h1>
    <table>
        <tr>
            <td><b>Desde:</b></td>
            <td><input id="finicio" type="date"/></td>
            <td><b>Hasta:</b></td>
            <td><input id="ffin" type="date"/></td>
        </tr>
    </table>
    </br>
    <button onclick="pagosPorFecha2()" class="button large green" title="Pagos Por Rango de Fecha">Consultar</button>
    <table>
        <tr><td class="color-text-gris"><h1>HISTORIAL PENSION</h1></td></tr>
    </table>
    <table class="tabla" width="80%">
        <tr class="modo1">
            <td width="2%">N°</td>
            <td width="20%">IDENTIFICACION</td>
            <td width="15%">APELLIDO Y NOMBRES</td>
            <td width="8%">MES</td>
            <td width="7%">AÑO</td>
            <td width="10%">VALOR</td>
            <td width="15%">FECHA</td>
            <td width="4%">SALON</td>
        </tr>
        <?php 
            $cont=0;
            foreach($pensiones as $pen){
            $cont++;
            $persona= new Persona();
            $p  = $persona->leerPorId($pen->getIdPersona());
            $matricula = new Matricula();
            $mat= $matricula->leerMatriculaPorId($p->getIdPersona());
        ?>
        <tr>
            <td><?php echo $cont; ?></td>
            <td><?php echo $pen->getIdPersona(); ?></td>
            <td><?php echo $p->getPApellido()." ".$p->getNombres(); ?></td>
            <td><?php echo $pen->getMes(); ?></td>
            <td><?php echo $pen->getAno(); ?></td>
            <td><?php echo $pen->getValor(); ?></td>
            <td><?php echo $pen->getFecha(); ?></td>
            <td><?php echo $mat->getIdSalon(); ?></td>
        </tr>
        <?php 
            }
        ?>
     </table>
     </br>
     </br>
     <table>
        <tr><td class="color-text-gris"><h1>HISTORIAL OTROS PAGOS</h1></td></tr>
    </table>
    <table class="tabla" width="80%">
        <tr class="modo1">
            <td width="2%">N°</td>
            <td width="15%">IDENTIFICACION</td>
            <td width="20%">APELLIDO Y NOMBRES</td>
            <td width="15%">CONCEPTO</td>
            <td width="10%">VALOR</td>
            <td width="15%">FECHA</td>
            <td width="4%">SALON</td>
        </tr>
        <?php 
            $cont=0;
            foreach($pagos as $pen){
            if($pen->getConcepto()!="PENSION"){
            $persona= new Persona();
            $p  = $persona->leerPorId($pen->getIdPersona());
            $cont++;
            $matricula = new Matricula();
            $mat= $matricula->leerMatriculaPorId($p->getIdPersona());
        ?>
        <tr>
            <td><?php echo $cont; ?></td>
            <td><?php echo $pen->getIdPersona(); ?></td>
            <td><?php echo $p->getPApellido()." ".$p->getNombres(); ?></td>
            <td><?php echo $pen->getConcepto(); ?></td>
            <td><?php echo $pen->getValor(); ?></td>
            <td><?php echo $pen->getFecha(); ?></td>
            <td><?php if($mat != NULL){ echo $mat->getIdSalon(); }?></td>
        </tr>
        <?php
            }
            }
        ?>
     </table>
     
</div>