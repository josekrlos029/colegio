<?php foreach ($materias1 as $materia1) {
                $band= 0;
                  foreach ($materias2 as $materia2) {
                      if ($materia1->getIdMateria() == $materia2->getIdMateria()){
                        $band=1;  
                      }
                  }
                if ($band == 0 ){ ?>
                <option value="<?php echo $materia1->getIdMateria();?>"><?php echo strtoupper($materia1->getNombreMateria()); ?></option>';
              <?php  }
                
            } ?>