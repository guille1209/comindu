<?php

return [

    'permission'                =>  [
        'name'                  =>  'Nombre',
        'names'                 =>  'Permisos',
        'display'               =>  'Nombre a mostrar',
        'display_name'          =>  'Nombre a mostrar',
        'description'           =>  'Descripción',
        'name_label'            =>  'Permiso',
        'operation_label'       =>  'Operaciones',
        'operation_update'      =>  'Actualizar',
        'operation_delete'      =>  'Eliminar',
        'new_permission'        =>  'Nuevo Permiso',
        'edit_permission'       =>  'Editar Permiso',
        'button_update'         =>  'Actualizar',
        'button_delete'         =>  'Eliminar',
        'button_add'            =>  'Agregar',
        'message_delete'        =>  'El permiso :name ha sido eliminado satisfactoriamente',
        'message_create'        =>  'El permiso :name ha sido creado satisfactoriamente',
        'message_update'        =>  'El permiso :name ha sido actualizado satisfactoriamente',
        'permission_id'         =>  'Permiso'
    ],

    'role'                =>  [
        'name'                  =>  'Nombre',
        'names'                 =>  'Roles',
        'display'               =>  'Nombre a mostrar',
        'description'           =>  'Descripción',
        'name_label'            =>  'Rol',
        'operation_label'       =>  'Operaciones',
        'new_role'              =>  'Nuevo Rol',
        'edit_role'             =>  'Editar Rol',
        'button_update'         =>  'Actualizar',
        'button_delete'         =>  'Eliminar',
        'button_add'            =>  'Agregar',
        'message_delete'        =>  'El rol :name ha sido eliminado satisfactoriamente',
        'message_create'        =>  'El rol :name ha sido creado satisfactoriamente',
        'message_update'        =>  'El rol :name ha sido actualizado satisfactoriamente',
        'permission_id'         =>  'Permiso'

    ],

    'user'                      =>  [
        'name'                  =>  'Nombre',
        'names'                 =>  'Usuarios',
        'firstname'             =>  'Nombre',
        'lastname'              =>  'Apellidos',
        'username'              =>  'Nombre de Usuario',
        'email'                 =>  'Correo',
        'password'              =>  'Contraseña',
        'password_confirmation' =>  'Confirmar Contraseña',
        'password_new'          =>  'Contraseña Nueva',
        'password_old'          =>  'Contraseña Anterior',
        'name_label'            =>  'Usuario',
        'change_password'       =>  'Cambiar Contraseña',
        'operation_label'       =>  'Operaciones',
        'new_user'              =>  'Nuevo Usuario',
        'edit_user'             =>  'Editar Usuario',
        'button_update'         =>  'Actualizar',
        'button_delete'         =>  'Eliminar',
        'button_add'            =>  'Agregar',
        'message_change_password' =>  'La contraseña ha sido cambiada satisfactoriamente',
        'message_delete'        =>  'El usuario :name ha sido eliminado satisfactoriamente',
        'message_create'        =>  'El usuario :name ha sido creado satisfactoriamente',
        'message_update'        =>  'El usuario :name ha sido actualizado satisfactoriamente'
    ],

    'login'                     =>  [
        'signin'                =>  'Iniciar Sesión',
        'rememberme'            =>  'Recuérdame',
        'email'                 =>  'Correo',
        'username'              =>  'Usuario',
        'password'              =>  'Contraseña',
        'credentials_error'     =>  'El :field o la contraseña no son correctos'
    ],



    'title'             =>  'Comindu',

    'header_top'        =>  [
    'change_password'   =>  'Cambiar Contraseña',
     'logout'           =>  'Salir'
    ],

    'sidebar'           =>  [
        'dashboard'     =>  'Comindu',
        'label_datos'   =>  'Datos Basicos',
        'platos'        =>  'Platos',
        'alimentos'     =>  'Alimentos',
        'recetas'       =>  'Recetas',
        'menus'         =>  'Menus',
        'conditions'    =>  'Estado',
        'clients'       =>  'Clientes',
        'countries'     =>  'Países',
        'agreements'    =>  'Contratos',
        'status'        =>  'Estados del Contrato',
        'admin_users'   =>  'Administrar Usuarios',
        'permissions'   =>  'Permisos',
        'roles'         =>  'Roles',
        'users'         =>  'Usuarios'
    ],

    'plato'                 =>  [
        'name'              =>  'Plato',
        'names'             =>  'Platos',
        'descripcion'       =>  'Descripción',
        'grupo_plato_id'    =>  'Grupo Plato',
        'operation_label'   =>  'Operaciones',
        'new_plato'         =>  'Nuevo Plato',
        'edit_plato'        =>  'Editar Plato',
        'button_update'     =>  'Actualizar',
        'button_delete'     =>  'Eliminar',
        'button_add'        =>  'Agregar',
        'button_print'      =>  'Imprimir',
        'message_delete'    =>  'El plato :descripcion ha sido eliminado satisfactoriamente',
        'message_create'    =>  'El plato :descripcion ha sido creado satisfactoriamente',
        'message_update'    =>  'El plato :descripcion ha sido actualizado satisfactoriamente'
    ],

    'alimento'              =>  [
        'name'              =>  'Alimento',
        'names'             =>  'Alimentos',        
        'grupo_alimento_id' =>  'Grupo Alimento',
        'unidad_id'         =>  'Unidad Medida',
        'operation_label'   =>  'Operaciones',
        'new_alimento'      =>  'Nuevo Alimento',
        'edit_alimento'     =>  'Editar Alimento',
        'button_update'     =>  'Actualizar',
        'button_delete'     =>  'Eliminar',
        'button_print'      =>  'Imprimir',
        'button_add'        =>  'Agregar',
        'message_delete'    =>  'El Alimento :name ha sido eliminado satisfactoriamente',
        'message_create'    =>  'El Alimento :name ha sido creado satisfactoriamente',
        'message_update'    =>  'El Alimento :name ha sido actualizado satisfactoriamente'
    ],

    'receta'              =>  [
        'name'              =>  'Receta',
        'names'             =>  'Recetas',        
        'plato'             =>  'Plato',
        'cantidad'          =>  'Cantidad',
        'unidad_id'         =>  'Unidad de Medida',
        'alimento_id'       =>  'Ingrediente',
        'receta'            =>  'Receta',
        'descripcion'       =>  'Observacion',
        'operation_create'   =>  'Crear',
        'operation_update'   =>  'Actualizar',
        'operation_delete'   =>  'Eliminar',
        'new_receta'      =>  'Nueva Receta',
        'edit_receta'     =>  'Editar Receta',
        'button_update'     =>  'Actualizar',
        'button_delete'     =>  'Eliminar',
        'button_add'        =>  'Agregar',
        'button_cancel'        =>  'Cancelar',
        'message_delete'    =>  'El ingrediente :name ha sido eliminado satisfactoriamente',
        'message_create'    =>  'La ingrediente :name ha sido creado satisfactoriamente',
        'message_update'    =>  'La ingrediente :name ha sido actualizado satisfactoriamente',
        'message_delete_all'   =>  'El receta ha sido eliminado satisfactoriamente'
    ],  


    'menu'              =>  [
        'name'              =>  'Menu',
        'names'             =>  'Menu Semanal',        
        'id'                =>  'ID',
        'inicio'            =>  'Desde',
        'fin'               =>  'Hasta',
        'descripcion'       =>  'Descripcion',
        'operation_update'  =>  'Actualizar',
        'operation_delete'  =>  'Eliminar',
        'operation_copy'    =>  'Copiar',
        'operation_pdf'     =>  'PDF',
        'new_menu'          =>  'Nuevo Menu',
        'edit_menu'         =>  'Editar Menu',
        'button_update'     =>  'Actualizar',
        'button_delete'     =>  'Eliminar',
        'button_add'        =>  'Agregar',
        'button_pdf'        =>  'Descargar PDF',
        'button_copy'       =>  'Copiar',
        'message_delete'    =>  'El Menu :name ha sido eliminado satisfactoriamente',
        'message_create'    =>  'El Menu :name ha sido creado satisfactoriamente',
        'message_update'    =>  'El Menu :name ha sido actualizado satisfactoriamente',
        'registration_label' => 'Fecha Menu',
        'to_label'          =>  'Hasta',
        'platos_frios'      =>  'Platos Frios',
        'desayunos'         =>  'Desayunos',
        'almuerzos'          =>  'Almuerzos',
        'cenas'             =>  'Cenas',
        'platoFrio1'       =>'Platos Frios Lunes',
        'desayuno1'         =>'Desayunos Lunes'

    ]



];