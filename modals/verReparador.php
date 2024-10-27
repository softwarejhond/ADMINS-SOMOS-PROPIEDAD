      <!--Actualizar datos usuario-->
      <?php
                               $usaurio= htmlspecialchars($_SESSION["username"]);
                               $nik = $row['id_reparador'];
                               $query = mysqli_query($con,"SELECT * FROM repairmen WHERE identificacion=$nik");
                               while ($userLog = mysqli_fetch_array($query)) {
                                $identificacion= $userLog['identificacion'];
                                $nombre= $userLog['nombre'];
                                $telefono= $userLog['telefono'];
                                $email= $userLog['email'];
                                $profesion= $userLog['profesion'];
                                $estado= $userLog['estado'];
                                }
                                ?>
      <div class="modal fade" id="verReparador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Información del reparador</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form method="GET" class="was-validated">
                          <div class="modal-body ">
                              <label style="color:#000" class="text-left">Identificación *<br>

                              </label><br>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1">
                                          <i class="bi bi-person-vcard"></i>
                                      </span>
                                  </div>
                                  <input type="text" name="identificacion" class="form-control"
                                      placeholder="Identificación" style="text-transform: capitalize;"
                                      value="<?php echo $identificacion;?>" required="true" readonly>

                              </div>
                              <label style="color:#000" class="text-left">Nombre completo
                                  *</label><br>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1">
                                          <i class="bi bi-person-fill-check"></i>
                                      </span>
                                  </div>
                                  <input type="text" name="nombre" class="form-control" placeholder="Nombre completo"
                                      style="text-transform: capitalize;" value="<?php echo $nombre;?>" required="true">
                              </div>
                              <label style="color:#000" class="text-left">Teléfono *</label><br>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1">
                                          <i class="bi bi-telephone-fill"></i>
                                      </span>
                                  </div>
                                  <input type="text" name="telefono" class="form-control" placeholder="Teléfono"
                                      value="<?php echo $telefono;?>" style="text-transform: capitalize;"
                                      required="true">

                              </div>
                              <label style="color:#000" class="text-left">Correo electrónico
                                  *</label><br>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" value="<?php echo $email;?>" id="basic-addon1">
                                          <i class="bi bi-envelope-at-fill"></i>
                                      </span>
                                  </div>
                                  <input type="email" name="email" id="email" class="form-control"
                                      placeholder="Correo electrónico" value="<?php echo $email;?>" required="true">

                              </div>
                              <label style="color:#000" class="text-left">Seleccione la profesión
                                  *</label><br>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1">
                                          <i class="bi bi-wrench-adjustable"></i>
                                      </span>
                                  </div>
                                  <select name="profesion" class="form-control form-select-lg custom-selec text-bg-dark"
                                      required="true">
                                      <option value="<?php echo $profesion;?>">
                                          <?php echo $profesion;?></option>
                                      <option value="Aseo">Aseo</option>
                                      <option value="Ayudante en casa">Ayudante en casa</option>
                                      <option value="Electricista">Electricista</option>
                                      <option value="Plomero">Plomero</option>
                                      <option value="Maestro de obra">Maestro de obra</option>
                                      <option value="Limpieza de muebles">Limpieza de muebles
                                      </option>
                                      <option value="Limpieza de vidrios y ventanas">Limpieza de
                                          vidrios y ventanas</option>
                                      <option value="Limpieza de colchones">Limpieza de colchones
                                      </option>
                                      <option value="Limpieza de cortinas">Limpieza de cortinas
                                      </option>
                                      <option value="Técnico en lavadoras">Técnico en lavadoras
                                      </option>
                                      <option value="Técnico en neveras y refrigeradores">Técnico
                                          en neveras y refrigeradores</option>

                                  </select>

                              </div>
                              <label style="color:#000" class="text-left">Estado
                                  actual*</label><br>
                              <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                      <span class="input-group-text" id="basic-addon1">
                                          <i class="bi bi-stoplights-fill"></i>
                                      </span>
                                  </div>

                                  <select name="estado" class="form-control form-select-lg custom-selec text-bg-dark"
                                      required="true">
                                      <option value="<?php echo $estado;?>"><?php echo $estado;?>
                                      </option>
                                      <option value="ACTIVO">ACTIVO</option>
                                      <option value="INACTIVO">INACTIVO</option>


                                  </select>

                              </div>

                          </div>
                      </form>


                  </div>

              </div>
          </div>
      </div>