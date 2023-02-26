function SeleccionarSubcat() {
    //creamos variableas array para cada departamento
    var Caballeros = ["Subcategoria...", "Camisa", "Pantalón", "Conjuntos"];
    var Infantiles = ["Subcategoria...", "Camisa", "Pantalón", "Conjuntos"];
    var Damas = ["Subcategoria...", "Blusa", "Falda", "Vestidos", "Conjuntos"];
    //tomamos el valor del select Categoria elegido
    var dpt
    dpt = document.getElementById('SelectCat').value

    if (dpt != "0") {
        //si estaba definido, entonces coloco las opciones del Departamento correspondiente. 
        //selecciono el array del departamento adecuado 
        mis_categorias = eval(dpt)
            //calculo el numero de subcategorias
        num_categorias = mis_categorias.length
            //marco el número de subcategorias en el select 
        document.form1.SelectSubCat.length = num_categorias
            //para cada Subcategoria del array, lo introduzco en el select 
        for (i = 0; i < num_categorias; i++) {
            document.form1.SelectSubCat.options[i].value = mis_categorias[i]
            document.form1.SelectSubCat.options[i].text = mis_categorias[i]
        }
    } else {
        //si no había municipio seleccionado, elimino los municipios del select 
        document.form1.categorias.length = 1
            //coloco un guión en la única opción que he dejado 
        document.form1.categorias.options[0].value = ""
        document.form1.categorias.options[0].text = "SIN ASIGNAR"
    }
} // FIN DE FUNCIONcambia_departamento

function SeleccionarTalla() {
    //creamos variableas array para cada departamento
    var Caballeros = ["Seleccione...", "2XS", "XS", "S", "M", "L", "XL", "XXL"];
    var Infantiles = ["Seleccione...", "3M", "6M", "9M", "1T", "2T", "3T", "4T"];
    var Damas = ["Seleccione...", "2XS", "XS", "S", "M", "L", "XL", "XXL"];
    //tomamos el valor del select Categoria elegido
    var dpt
    dpt = document.getElementById('SelectCat').value

    if (dpt != "0") {
        //si estaba definido, entonces coloco las opciones del Departamento correspondiente. 
        //selecciono el array del departamento adecuado 
        mis_categorias = eval(dpt)
            //calculo el numero de subcategorias
        num_categorias = mis_categorias.length
            //marco el número de subcategorias en el select 
        document.form1.SelectTalla.length = num_categorias
            //para cada Subcategoria del array, lo introduzco en el select 
        for (i = 0; i < num_categorias; i++) {
            document.form1.SelectTalla.options[i].value = mis_categorias[i]
            document.form1.SelectTalla.options[i].text = mis_categorias[i]
        }
    } else {
        //si no había municipio seleccionado, elimino los municipios del select 
        document.form1.categorias.length = 1
            //coloco un guión en la única opción que he dejado 
        document.form1.categorias.options[0].value = ""
        document.form1.categorias.options[0].text = "SIN ASIGNAR"
    }
}