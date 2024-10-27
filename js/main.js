// $('#liveToastBtn').click(function(){
//     $('.toast').toast('show');
// });


// OBJETOS DE LOS FORMULARIOS
class objetos {
    constructor(estado_inicial, estado_final, observaciones) {
        this.estado_inicial = estado_inicial;
        this.estado_final = estado_final;
        this.observaciones = observaciones;
    }
}
class objetosCantidad extends objetos {
    constructor(cantidad, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.cantidad = 2;
    }
}
// tipo 1, seleccion SI o NO
// tipo 2, cantidad
// tipo 3, caja de texto
// tipo 4, tipos de meson
// tipo 5, tipo de llave de agua
// tipo 6, tipo de gabinete
// tipo 7, tipo de fogon
// tipo 8, tipo de ducha
// tipo 9, tipo de cabina de bano
class escaleras extends objetos {
    constructor(reja, pasa_manos, chapa, llaves, ojo_magico, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.reja = 1;
        this.pasa_manos = 1;
        this.chapa = 1;
        this.llaves = 2;
        this.ojo_magico = 1;
    }
}
class puerta_principal extends objetos {
    constructor(reja, timbre, citofono, chapa, llaves, ojo_magico, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.reja = 1;
        this.timbre = 1;
        this.citofono = 1;
        this.chapa = 1;
        this.llaves = 2;
        this.ojo_magico = 1
    }
}
class paredes extends objetos {
    constructor(color, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.color = 3;
    }
}
class suelo extends objetos {
    constructor(tipo, zocalo, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.tipo = 10;
        this.zocalo = 10;
    }
}
class iluminacion extends objetos {
    constructor(plafones, rosetas, lamapra_led, ojo_buey, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.plafones = 2;
        this.rosetas = 2;
        this.lampara_led = 2;
        this.ojo_buey = 2;
    }
}
class ventanas extends objetos {
    constructor(cantidad, seguro, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.cantidad = 2;
        this.seguro = 2;
    }
}
class vidrios extends objetos {
    constructor(sanos, averiados, faltantes, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.sanos = 2;
        this.averiados = 2;
        this.faltantes = 2;
    }
}
class tubos_cortina extends objetos {
    constructor(cantidad, soporte_tubos, persianas, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.cantidad = 2;
        this.soporte_tubos = 2;
        this.persianas = 2;
    }
}
class meson extends objetos {
    constructor(material, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.tipo = 4;
    }
}
class lava_platos extends objetos {
    constructor(rejilla, llave_agua, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.rejilla = 1;
        this.llave_agua = 5;
    }
}
class gabinete_superior extends objetos {
    constructor(puertas, manijas, vidrios, locero, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.puertas = 2;
        this.manijas = 2;
        this.vidrios = 2;
        this.locero = 1;
    }
}
class gabinete extends objetos {
    constructor(puertas, manijas, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.puertas = 2;
        this.manijas = 2;
    }
}
class campana_extractora extends objetos {
    constructor(marca, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.marca = 11;
    }
}
class fogon extends objetos {
    constructor(fogon, cubierta, perillas, encendido_electrico, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.tipo = 7;
        this.cubierta = 1;
        this.perillas = 2;
        this.encendido_electrico = 1;
    }
}
class puertas extends objetos {
    constructor(chapa, llaves, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.chapa = 1;
        this.llaves = 2;
    }
}
class paredes_bano extends objetos {
    constructor(enchapados, perforaciones, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.enchapados = 1;
        this.perforaciones = 2;
    }
}
class ducha extends objetos {
    constructor(ducha, llave_agua, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.tipo = 8;
        this.llave_agua = 5;
    }
}
class cabina extends objetos {
    constructor(cabina, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.tipo = 9;
    }
}
class piso extends objetos {
    constructor(tipo, rejilla, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.tipo = 10;
        this.rejilla = 1;
    }
}
class sanitario extends objetos {
    constructor(color, mueble, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.color = 3;
        this.mueble = 1;
    }
}
class lava_manos extends objetos {
    constructor(color, pedestal, mueble_madera, llave_agua, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.color = 3;
        this.pedestal = 1;
        this.mueble_madera = 1;
        this.llave_agua = 5;
    }
}
class accesorios extends objetos {
    constructor(jabonera, gancho, cepillero, toallero, papelera, cilindro, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.jabonera = 1;
        this.gancho = 1;
        this.cepillero = 1;
        this.toallero = 1;
        this.papelera = 1;
        this.cilindro = 1;
    }
}
class puertas_closet extends objetos {
    constructor(cantidad, jaladera, cerradura, llaves, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.cantidad = 2;
        this.jaladeras = 2;
        this.cerraduras = 2
        this.llaves = 2;
    }
}
class cajones_closet extends objetos {
    constructor(cantidad, cerradura, llaves, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.cantidad = 2;
        this.cerraduras = 2;
        this.llaves = 2;
    }
}
class entre_panos extends objetos {
    constructor(cantidad, cerradura, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.cantidad = 2;
        this.zapatero = 1;
    }
}
class lavadero extends objetos {
    constructor(lavadero, tapon, canilla, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.tipo = 3;
        this.tapon = 1;
        this.canilla = 1;
    }
}
class lavadora extends objetos {
    constructor(desague, canilla, estado_inicial, estado_final, observaciones) {
        super(estado_inicial, estado_final, observaciones);
        this.desague = 1;
        this.canilla = 1;
    }
}
const obj_inventario = {
    "accesorios": accesorios, //1
    "balcon": objetos, //2 
    "barra": objetos, //3 
    "cabina": cabina, //4
    "caja_breaker": objetosCantidad, //5
    "cajones_closet": cajones_closet, //6
    "campana_extractora": campana_extractora, //7 
    "ducha": ducha, //8
    "entre_panos": entre_panos, //9
    "escaleras": escaleras, //10
    "espejos": objetosCantidad, //11
    "fogon": fogon, //12
    "gabinete_auxiliar": gabinete, //13
    "gabinete_inferior": gabinete, //13
    "gabinete_superior": gabinete_superior, //14 
    "iluminacion": iluminacion, //15
    "lamparas_led": objetosCantidad,
    "lavadero": lavadero, //16
    "lavadora": lavadora, //17
    "lava_manos": lava_manos, //18
    "lava_platos": lava_platos, //19
    "meson": meson, //20 
    "ojos_buey": objetosCantidad,
    "paredes": paredes, //21
    "paredes_bano": paredes_bano, //22 
    "plafones": objetosCantidad,
    "piso": piso, //23
    "puertas": puertas, //24
    "puertas_closet": puertas_closet, //25
    "puerta_principal": puerta_principal, //26
    "reja": objetos, //27
    "repisas": objetosCantidad, //28
    "rosetas": objetosCantidad,
    "sanitario": sanitario, //29
    "suelo": suelo, //30
    "switches": objetosCantidad, //31
    "techo": objetos, //32
    "tejas_transparentes": objetosCantidad, //33
    "telefono": objetos, //34
    "televisor": objetos, //35
    "tendedero": objetos, //36
    "tomas_electricos": objetosCantidad, //37
    "tubos_cortina": tubos_cortina, //38
    "ventanas": ventanas, //39
    "vidrios": vidrios, //40
}
// botones del fomrmulairo
let idObejtos = [];
let edit = 0;
document.querySelector('.forms').addEventListener('submit', function (event) {
    event.preventDefault();
    if (edit == 1) {
        editar(idObejtos);
    } else {
        confirmarGuardar();
    }
});
document.getElementById('buscar').addEventListener('click', function () {
    let numInv = document.querySelector('#num_invent').value;
    let codPro = document.querySelector('#code_pro').value;
    if (numInv != "" && codPro == "") {
        edit = 1;
        confirmarEditar();
    } else {
        buscar(codPro);
    }
})
document.getElementById('eliminar').addEventListener('click', function () {
    let numInv = document.querySelector('#num_invent').value;
    let msg = `¿Seguro que desea eliminar el inventario #${numInv}?`;
    modal(msg).then(result => {
        if (result) {
            eliminar();
        }
    })
    document.querySelector('.btn-modal').click();
});
let clickNuevo = 0;
document.getElementById('nuevo').addEventListener('click', async function () {
    let msg = "¿Quieres crear un nuevo inventario?";
    clickNuevo = await new Promise((resolve) => {
        modal(msg).then(result => {
            if (result) {
                let nuevoInv = nuevo();
                if (nuevoInv) {
                    cancelar();
                    setTimeout(function () {
                        habilitarForms();
                    }, 10)
                    document.querySelector('#nuevo').classList.add('disabled')
                    resolve(1);
                }
            }
        })
        document.querySelector('.btn-modal').click();
    })
});
document.getElementById('cancelar').addEventListener('click', function () {
    let msg = "¿Esta seguro de quiere canelar este formulario?";
    modal(msg).then(result => {
        if (result) {
            cancelar();
        }
    })
    document.querySelector('.btn-modal').click();
})
// alerta temproral
function toast(tipo, mensaje) {
    let titulo;
    let alerta;
    if (tipo == 1) {
        alerta = "success";
        titulo = "Proceso Exitoso";
    } else {
        alerta = "danger";
        titulo = "Proceso Fallido";
    }
    let template = `
        <aside class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
            <aside class="alert alert-${alerta} toast-header">
                <strong class="mr-auto text-center col">¡${titulo}!</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </aside>
            <aside class="toast-body">
                <p>${mensaje}</p>
            </aside>
        </aside>
    `
    let cont_toast = document.querySelector('.contenedor-toast');
    cont_toast.insertAdjacentHTML('beforeend', template);
    $('.toast').toast('show');
    setTimeout(function () {
        cont_toast.firstElementChild.remove();
    }, 5000)
}
//funcion checkbox para habilitar formularios
function check(check, funcion = 0) {
    let parent = check.parentElement.parentElement;
    if (funcion == 1) {
        if (parent.classList.contains('disabled')) {
            parent.classList.remove('disabled');
            parent.querySelectorAll('input, select').forEach(input => {
                if (input.name != "switch" && !input.name.includes('final')) {
                    input.setAttribute('required', 'true')
                }
            })
        } else {
            parent.classList.add('disabled');
            vaciarInput(parent);
            parent.querySelectorAll('input, textarea, select').forEach(input => {
                input.removeAttribute('required')
            })
        }
    } else { // vaciar todos los input
        parent.classList.add('disabled');
        vaciarInput(parent);
        parent.querySelectorAll('input, textarea, select').forEach(input => {
            input.removeAttribute('required')
        })
    }
}
function vaciarInput(padre) {
    padre.querySelectorAll('input, textarea, select').forEach(function (input) {
        if (input.type == "radio") {
            input.checked = false;
        } else if (input.tagName == "select") {
            input.children.value = "";
        } else {
            input.value = "";
        }
    });
}
function idZona(zona) {
    let id_zona;
    switch (zona) {
        case "General":
            id_zona = 1;
            break;
        case "Sala":
            id_zona = 2;
            break;
        case "Cocina":
            id_zona = 3;
            break;
        case "Baño":
            id_zona = 4;
            break;
        case "Alcoba":
            id_zona = 5;
            break;
        case "Patio":
            id_zona = 6;
            break;
    }
    return id_zona;
}

function habilitarForms() {
    document.querySelectorAll('input[type="checkbox"').forEach(function (swit) {
        swit.disabled = false;
        check(swit, 0)
    })
}
function validarCheck() {
    let i = 0;
    let checks = Array();
    document.querySelectorAll(".object").forEach(function (obj) {
        checks[i] = obj.classList.contains('disabled');
        i++;
    })
    if (checks.includes(false)) {
        document.querySelector('#guardar').classList.remove('disabled')
        document.querySelector('#editar').classList.remove('disabled')
    } else {
        document.querySelector('#guardar').classList.add('disabled')
        document.querySelector('#editar').classList.add('disabled')
    }
}

// funciones de los botones
function eliminar() {
    let id_inventario = document.querySelector('#num_invent').value;
    let tablas = Array();
    let i = 0;
    Object.keys(obj_inventario).forEach(function (tabla) {
        tablas[i] = tabla;
        i++;
    })
    $.ajax({
        url: 'includes/functions.php',
        type: 'POST',
        data: {
            "funcion": 4,
            "tablas": tablas,
            "id_inventario": id_inventario
        },
        beforeSend: function () {
            $('#loader_eliminar').show();
        },
        success: function (response) {
            let respuesta = JSON.parse(response)
            if (respuesta["proceso"]) {
                let msg = `Se eliminó el inventario #${id_inventario}`;
                toast(1, msg);
            } else {
                let msg = `El inventario #${id_inventario} no existe`;
                toast(0, msg);
            }
            $('#loader_eliminar').hide();
        }
    })
}
function buscar(codPropiedad) {
    $.ajax({
        url: 'includes/functions.php',
        type: 'POST',
        data: {
            'funcion': 5, // buscar inventarios de una propiedad
            'codPropiedad': codPropiedad
        },
        success: function (response) {
            let respuesta = JSON.parse(response);
            if (respuesta["proceso"]) {
                let template = `
                        <aside class="modal fade" id="staticBackdrop" data-backdrop="static"        data-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <aside class="modal-dialog">
                                    <aside class="modal-content">
                                        <aside class="modal-header">
                                            <p><strong>Inventarios de la propiedad ${codPropiedad}</strong></p>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </aside>
                                    <aside class="modal-body">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Inventario</th>
                                                <th>Fecha</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                    `;
                respuesta["inventarios"].forEach(function (invt) {
                    template += `
                        <tr>
                            <td>#${invt["inventario"]}</td>
                            <td>${invt["fecha"]}</td>
                        </tr>             
                    `;
                })
                template += `
                                        </tbody>
                                    </table>
                                    </aside>
                                    <aside class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal" id="cancelar-modal">Cancelar</button>
                                    </aside>
                                </aside>
                            </aside>
                    </aside>
                `
                $('.btn-modal').after(template);
                $('.btn-modal').click();
            } else {
                let msg = respuesta["mensaje"];
                toast(0, msg)
            }
        }
    })
}
async function confirmarEditar() {
    let id_inventario = document.querySelector('#num_invent').value;
    let form = document.querySelector('.forms');
    let zona = form.name;
    let id_zona = idZona(zona);
    let confirmado;
    let filas = await new Promise((resolve) => {
        $.ajax({
            url: 'includes/functions.php',
            type: 'POST',
            data: {
                "funcion": 1, //Confirmar editar
                "id_inventario": id_inventario,
                "id_zona": id_zona,
            },
            success: function (response) {
                let respt = JSON.parse(response);
                resolve(respt)
            }
        })
    })
    if (filas == 0) {
        confirmado = 0;
    } else if (filas == 1) {
        confirmado = 1;
    } else if (filas >= 2) {
        confirmado = 2;
    }
    if (confirmado == 0) {
        let msg = `No hay información de la zona <strong>${zona}</strong> en el invenatrio #${id_inventario}`
        toast(0, msg)
    } else if (confirmado == 1) {
        let msg = `¿Desea editar la información de la zona <strong>${zona}</strong> del inventario #${id_inventario}?`;
        modal(msg).then(result => {
            if (result) {
                habilitarForms();
                setTimeout(function () {
                    buscarEditar(1, id_inventario, id_zona, form)
                }, 10)
                setTimeout(function () {
                    validarCheck();
                }, 100)
                document.querySelector('#editar').removeAttribute('hidden');
                document.querySelector('#guardar').setAttribute('hidden', 'true');
                document.querySelector('.num_invent').classList.add('disabled');
                document.querySelector('.code_pro').classList.add('disabled');
            }
        })
        document.querySelector('.btn-modal').click();
    } else if (confirmado == 2) {
        let temp = `
            <label for="filas">Selecionar ${zona}</label>
            <select name="filas" id="fila" required>
                <option value="">Selecionar</option>
        `
        for (let i = 1; i <= filas; i++) {
            temp += `
                <option value="${i}">${i}</option>
            `
        }
        temp += `
            </select>
        `
        let msg = `El inventario #${id_inventario} tiene ${filas} zonas <strong>${zona}</strong>. Seleciona cual de las ${filas} quiere editar`;
        let template = `
            <aside class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <aside class="modal-dialog">
                    <aside class="modal-content">
                        <aside class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </aside>
                        <aside class="modal-body">
                            <p>${msg}</p>
                            <form id="form-filas">
                                ${temp}
                                <button type="submit" id="btn-filas" hidden></button>
                            </form>
                        </aside>
                        <aside class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelar-modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" id="confirmar">Confirmar</button>
                        </aside>
                    </aside>
                </aside>
            </aside>
        `
        document.querySelector('.btn-modal').insertAdjacentHTML('afterend', template);
        document.querySelector('.btn-modal').click();
        let fila;
        let resp = await new Promise((resolve) => {
            document.querySelector('#cancelar-modal').addEventListener('click', function () {
                document.querySelector('.modal').remove();
                document.querySelector('.modal-backdrop').remove();
                resolve(false)
            })
            let form = document.querySelector('#form-filas');
            document.querySelector('#confirmar').addEventListener('click', function () {
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    fila = document.querySelector('#fila').value;
                    document.querySelector('.close').click();
                    document.querySelector('.modal').remove();
                    document.querySelector('.modal-backdrop').remove();
                    document.querySelector('.num_invent').classList.add('disabled');
                    document.querySelector('.code_pro').classList.add('disabled');
                    habilitarForms();
                    setTimeout(function () {
                        buscarEditar(fila, id_inventario, id_zona, form)
                    }, 10)
                    setTimeout(function () {
                        validarCheck();
                    }, 100)
                    resolve(true)
                })
                form.requestSubmit();
            })
        })
        if (resp) {
            habilitarForms();
            setTimeout(function () {
                buscarEditar(fila, id_inventario, id_zona, form)
            }, 10)
            setTimeout(function () {
                validarCheck();
            }, 100)
        }
    }
}

function buscarEditar(fila, id_inventario, id_zona, form) {
    let i = 0;
    document.getElementsByName("switch").forEach(function (swit) {
        check(swit);
        swit.checked = false;
    })
    form.querySelectorAll('.object').forEach(function (obj) {
        let tabla = obj.name;
        $.ajax({
            url: 'includes/functions.php',
            type: 'POST',
            data: {
                "funcion": 6,
                "tabla": tabla,
                "id_inventario": id_inventario,
                "id_zona": id_zona
            },
            success: function (response) {
                let respuesta = JSON.parse(response)
                if (respuesta["proceso"]) {
                    idObejtos[i] = {
                        "nombre": tabla, "id": respuesta["filas"][(fila - 1)]["id"]
                    };
                    i++;
                    obj.querySelectorAll('input, select, textarea').forEach(function (input) { //Selecionar todos los input del formulario 
                        if (input.name == "switch") { //Selecionar los inputs de cada elemento
                            check(input, 1);
                            input.checked = true;
                        } else {
                            let atributo = input.name.split('-')[1]; // extraer el nombre de cada elemento del objeto
                            let valor = respuesta["filas"][(fila - 1)][`${atributo}`]
                            if (input.type == "radio") { //separar los input radio
                                let id;
                                if (valor == 0) {
                                    id = input.name + "_no"
                                } else {
                                    id = input.name + "_si"
                                }
                                if (input.id == id) {
                                    input.checked = true;
                                }
                            } else {
                                input.value = valor;
                            }

                        }
                    })
                }
            }
        })
    })
}
async function editar(objetos) {
    let form = document.querySelector('.forms');
    let id_inventario = document.querySelector('#num_invent').value;
    let zona = document.querySelector('.forms').name;
    let id_zona = idZona(zona);
    let filas = await new Promise((resolve) => {
        $.ajax({
            url: 'includes/functions.php',
            type: 'POST',
            data: {
                "funcion": 1, //Confirmar editar
                "id_inventario": id_inventario,
                "id_zona": id_zona,
            },
            success: function (response) {
                let respt = JSON.parse(response);
                resolve(respt)
            }
        })
    })
    if (filas == 0) {
        let msg = `No existe la zona <strong>${zona}</strong> en el inventario #${id_inventario}. ¿Desea añadir esta zona en el inventario #${id_inventario}?`;
        modal(msg).then(result => {
            if (result) {
                // asocInvtZona(id_inventario, id_zona, zona);
                // EditarGuardar();
                guardar();
            }
        })
        document.querySelector('.btn-modal').click();
    } else {
        let msg = `¿Desea editar o agregar la zona <strong>${zona}</strong> del inventario #${id_inventario}?`;
        modal(msg, 1).then(result => { // 1 agrega el boton "agregar" al modal
            if (result) {
                EditarGuardar();
            } else {
                guardar();
            }
        })
        document.querySelector('.btn-modal').click();
    }
    function EditarGuardar() {
        form.querySelectorAll('.object').forEach(function (obj) {
            let nombreObj = obj.name;
            let tabla = objetos.find(obj => obj.nombre == nombreObj)
            if (tabla !== undefined && !obj.classList.contains('disabled')) {
                let id = tabla.id;
                proceso(8, obj, nombreObj, id) //ediatr 8
            } else if (tabla !== undefined && obj.classList.contains('disabled')) {
                let id = tabla.id;
                proceso(9, obj, nombreObj, id) //eliminar 9
            } else if (tabla === undefined && !obj.classList.contains('disabled')) {
                proceso(2, obj, nombreObj, 0) //guardar 2
            }
        })
    }
    function proceso(funcion, obj, nombreObj, id) {
        let objeto = new obj_inventario[nombreObj]();
        let propiedades = Array();
        let i = 0;
        obj.querySelectorAll('input, select, textarea').forEach(function (input) { //Selecionar todos los input del formulario 
            if (input.name != "switch") { //Seleccionar los inputs de cada elemento
                if(input.name.includes('final') && input.value == ""){
                        input.value = "0";
                    }
                let atributo = input.name.split('-')[1]; // extraer el nombre de cada elemento del objeto
                if (input.type == "radio") { //separar los input radio
                    if (input.checked) { //validar el radio seleccionado
                        objeto[atributo] = input.value; //extrar el valor y almacenar en el objeto
                        if (!propiedades.includes(atributo)) {
                            propiedades[i] = atributo; //si el atributo no existe se guarda
                            i++
                        }
                    }
                } else {
                    objeto[atributo] = input.value; //extrar el valor y almacenar en el objeto
                    if (!propiedades.includes(atributo)) {
                        propiedades[i] = atributo; //si el atributo no existe se guarda
                        i++
                    }
                }
            }
        })
        $.ajax({
            url: 'includes/functions.php',
            type: 'POST',
            data: {
                "funcion": funcion,
                "id": id,
                "tabla": nombreObj,
                "id_inventario": id_inventario,
                "id_zona": id_zona,
                "propiedades": propiedades,
                "objeto": objeto
            },
            beforeSend: function () {
                $('#loader_editar').show();
            },
            success: function (response) {
                let respuesta = JSON.parse(response);
                if (respuesta) {
                    let msg;
                    if (funcion == 8) {
                        msg = `<strong>${nombreObj}</strong> se edito con exito`;
                    } else if (funcion == 9) {
                        msg = `<strong>${nombreObj}</strong> se elimino con exito`;
                    } else {
                        msg = `<strong>${nombreObj}</strong> se guardo con exito`;
                    }
                    toast(1, msg)
                    window.scrollTo(0, 0);
                    document.getElementsByName("switch").forEach(function (swit) {
                        check(swit);
                        swit.checked = false;
                    })
                } else {
                    let msg;
                    if (funcion == 8) {
                        msg = `<strong>${nombreObj}</strong> no se puedo editar`;
                    } else if (funcion == 9) {
                        msg = `<strong>${nombreObj}</strong> no se puedo eliminar`;
                    } else {
                        msg = `<strong>${nombreObj}</strong> no se puedo guardo`;
                    }
                    toast(0, msg)
                }
                $('#loader_editar').hide();
            }
        })
    }
}
function nuevo() {
    let codigo_pro = document.querySelector('#code_pro').value;
    let fechaActual = new Date();
    let dia = fechaActual.getDate();
    let mes = fechaActual.getMonth() + 1; // Nota: en JavaScript, los meses van de 0 a 11
    let year = fechaActual.getFullYear();
    // Formatear el día y el mes con dos dígitos si es necesario
    dia = (dia < 10) ? '0' + dia : dia;
    mes = (mes < 10) ? '0' + mes : mes;
    // Crear la cadena con el formato "dd-mm-yyyy"
    let fecha = year + '-' + mes + '-' + dia;
    return new Promise(function (respuesta, reject) {
        $.ajax({
            url: 'includes/functions.php',
            type: 'POST',
            data: {
                "funcion": 3, //Crear nuevo inventario
                "codigo": codigo_pro,
                "fecha": fecha
            },
            success: function (response) {
                let inv = JSON.parse(response);
                if (inv["proceso"]) {
                    document.querySelector('#num_invent').value = inv["id_inventario"];
                    document.querySelector('.num_invent').classList.add('disabled')
                    document.querySelector('.code_pro').classList.add('disabled')

                    let msg = "Se creó el nuevo inventario";
                    toast(1, msg)
                    respuesta(true);
                } else {
                    let msg = "El código de inmobiliaria no existe";
                    toast(0, msg)
                    respuesta(false);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                reject(`AJAX error: ${textStatus}, ${errorThrown}`);
            }
        })
    })
}
async function confirmarGuardar() {
    let id_inventario = document.querySelector('#num_invent').value;
    let form = document.querySelector('.forms');
    let objetos = form.querySelectorAll('.object');
    let zona = form.name;
    let id_zona = idZona(zona);
    let respuesta = await new Promise((resolve) => {
        $.ajax({
            url: 'includes/functions.php',
            type: 'POST',
            data: {
                "funcion": 1,
                "id_inventario": id_inventario,
                "id_zona": id_zona,
            },
            success: function (response) {
                let respt = JSON.parse(response);
                resolve(respt)
            }
        })
    })
    if (respuesta > 0) {
        let msg = `Ya existe la zona <strong>${zona}</strong> en el inventario #${id_inventario}. ¿Desea agregar otra zona <strong>${zona}</strong> en el inventario #${id_inventario}?`;
        modal(msg).then(result => {
            if (result) {
                guardar();
            }
        })
        document.querySelector('.btn-modal').click();
    } else {
        let msg = `¿Quieres guardar la zona <strong>${zona}</strong> en el inventario #${id_inventario}?`;
        modal(msg).then(result => {
            if (result) {
                guardar();
            }
        })
        document.querySelector('.btn-modal').click();
    }
}
function guardar() {
    let form = document.querySelector('.forms');
    let id_inventario = document.querySelector('#num_invent').value;
    let zona = document.querySelector('.forms').name;
    let id_zona = idZona(zona);
    asocInvtZona(id_inventario, id_zona, zona);
    form.querySelectorAll('.object').forEach(function (obj) {
        if (!obj.classList.contains('disabled')) {
            let nombre = obj.name
            let objeto = new obj_inventario[nombre]();
            let propiedades = Array();
            let i = 0;
            obj.querySelectorAll('input, select, textarea').forEach(function (input) { //Selecionar todos los input del formulario 
                if (input.name.includes(nombre)) { //Selecionar los inputs de cada elemento
                    if(input.name.includes('final') && input.value == ""){
                        input.value = 0;
                    }
                    let atributo = input.name.split('-')[1]; // extraer el nombre de cada elemento del objeto
                    if (input.type == "radio") { //separar los input radio
                        if (input.checked) { //validad el radio seleccionado
                            
                            objeto[atributo] = input.value; //extrar el valor y almacenar en el objeto
                            if (!propiedades.includes(atributo)) {
                                propiedades[i] = atributo;
                                i++
                            }
                        }
                    } else {
                        objeto[atributo] = input.value;
                        if (!propiedades.includes(atributo)) {
                            propiedades[i] = atributo;
                            i++
                        }
                    }
                }
            })
            $.ajax({
                url: 'includes/functions.php',
                type: 'POST',
                data: {
                    "funcion": 2, //guardar
                    "tabla": nombre,
                    "id_inventario": id_inventario,
                    "id_zona": id_zona,
                    "propiedades": propiedades,
                    "objeto": objeto
                },
                beforeSend: function () {
                    $('#loader_guardar').show();
                },
                success: function (response) {
                    let respuesta = JSON.parse(response);
                    if (respuesta) {
                        let msg = `<strong>${nombre}</strong> se guardo con exito`;
                        toast(1, msg)
                        window.scrollTo(0, 0);
                        document.getElementsByName("switch").forEach(function (swit) {
                            check(swit);
                            swit.checked = false;
                        })
                    } else {
                        let msg = `<strong>${nombre}</strong> no se puedo guardo`;
                        toast(0, msg)
                    }
                    $('#loader_guardar').hide();
                }
            })

        }
    })
}

function asocInvtZona(id_inventario, id_zona, zona) {
    $.ajax({
        url: 'includes/functions.php',
        type: 'POST',
        data: {
            "funcion": 7, //guardar zona en inventario
            "id_inventario": id_inventario,
            "id_zona": id_zona,
        },
        success: function (response) {
            let respuesta = JSON.parse(response);
            if (respuesta) {
                let msg = `Se asocio la zona <strong>${zona}</strong> con el inventario #${id_inventario}`;
                toast(1, msg)
            } else {
                let msg = `No se  pudo asociar la zona <strong>${zona}</strong> con el inventario #${id_inventario}`;
                toast(0, msg)
            }
        }
    })
}
function cancelar() {
    document.querySelector('.num_invent').classList.remove('disabled')
    document.querySelector('.code_pro').classList.remove('disabled')
    document.querySelector('#num_invent').value = "";
    document.querySelector('#code_pro').value = "";
    document.querySelector('#nuevo').classList.add('disabled')
    document.querySelector('#eliminar').classList.add('disabled')
    document.querySelector('#buscar').classList.add('disabled')
    document.querySelector('#guardar').removeAttribute('hidden');
    document.querySelector('#editar').setAttribute('hidden', 'true');
    clickNuevo = 0;
    edit = 0;
    window.scrollTo(0, 0);
    document.getElementsByName("switch").forEach(function (swit) {
        check(swit);
        swit.checked = false;
        swit.disabled = true;
    })
}