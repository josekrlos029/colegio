<div style="margin: 5%; width: 100%;">
    <h1>Pagos Actuales:</h1>
    <button onclick="pagosActuales()" class="button large green" title="Pagos del año Actual">Pagos Actuales</button>
    </br>
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
    <button onclick="pagosPorFecha()" class="button large green" title="Pagos Por Rango de Fecha">Consultar</button>
    <table>
        <tr><td class="color-text-gris"><h1>HISTORIAL PENSION</h1></td></tr>
    </table>
    <table class="tabla" width="80%">
        <tr class="modo1">
            <td width="5%">N°</td>
            <td width="15%">MES</td>
            <td width="7%">AÑO</td>
            <td width="10%">VALOR</td>
            <td width="15%">FECHA</td>
        </tr>
        <?php 
            $cont=0;
            foreach($pensiones as $pen){
            $cont++;
        ?>
        <tr>
            <td><?php echo $cont; ?></td>
            <td><?php echo $pen->getMes(); ?></td>
            <td><?php echo $pen->getAno(); ?></td>
            <td><?php echo $pen->getValor(); ?></td>
            <td><?php echo $pen->getFecha(); ?></td>
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
            <td width="5%"> N°</td>
            <td width="15%">CONCEPTO</td>
            <td width="10%">VALOR</td>
            <td width="15%">FECHA</td>
        </tr>
        <?php 
            $cont=0;
            foreach($pagos as $pen){
            if($pen->getConcepto()!="PENSION"){
            $cont++;
        ?>
        <tr>
            <td><?php echo $cont; ?></td>
            <td><?php echo $pen->getConcepto(); ?></td>
            <td><?php echo $pen->getValor(); ?></td>
            <td><?php echo $pen->getFecha(); ?></td>
        </tr>
        <?php
            }
            }
        ?>
     </table>
     
</div>