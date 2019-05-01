<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'firstname' => 'Guillermo',
            'lastname' => 'Gonzalez',
            'username' => "Guillermo",
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'created_at' => date("Y-m-d"), 
            'updated_at' => date("Y-m-d"),

        ]);

         DB::table('users')->insert([
            'firstname' => 'firtsDemo',
            'lastname' => 'lastDemo',
            'username' => "demo",
            'email' => 'demo@gmail.com',
            'password' => Hash::make('demo'),
            'created_at' => date("Y-m-d"), 
            'updated_at' => date("Y-m-d"),

        ]);

          DB::table('grupo_platos')->insert([
            'name' => 'Platos Frios',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('grupo_platos')->insert([
            'name' => 'Desayuno',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('grupo_platos')->insert([
            'name' => 'Dieta Almuerzo',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('grupo_platos')->insert([
            'name' => 'Cena',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]); 


        DB::table('grupo_platos')->insert([
            'name' => 'Almuerzo',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
        

        DB::table('grupo_platos')->insert([
            'name' => 'Dieta Cena',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
        
        DB::table('grupo_alimentos')->insert([
            'name' => 'Leche y sus derivados',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('grupo_alimentos')->insert([
            'name' => 'Carnes, pescado y huevos',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('grupo_alimentos')->insert([
            'name' => 'Cereales, legumbres, tuberculos',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('grupo_alimentos')->insert([
            'name' => 'Frutas, hortalizas y verduras',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('grupo_alimentos')->insert([
            'name' => 'Grasas y aceites',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('grupo_alimentos')->insert([
            'name' => 'Dulces azucar',           
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('unidades')->insert([
            'desc_corta' => 'gr', 
            'desc_larga' => 'gramo',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('unidades')->insert([
            'desc_corta' => 'kg', 
            'desc_larga' => 'kilogramo',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('unidades')->insert([
            'desc_corta' => 'onza', 
            'desc_larga' => 'onza',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('unidades')->insert([
            'desc_corta' => 'lb', 
            'desc_larga' => 'libra',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('unidades')->insert([
            'desc_corta' => 'litro', 
            'desc_larga' => 'litro',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('unidades')->insert([
            'desc_corta' => 'ml', 
            'desc_larga' => 'mililitro',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('unidades')->insert([
            'desc_corta' => 'galon', 
            'desc_larga' => 'galon',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('unidades')->insert([
            'desc_corta' => 'unid.', 
            'desc_larga' => 'unidad',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

         DB::table('roles')->insert([
            'name' => 'admin', 
            'display_name' => 'admin',    
            'description' => 'Administrar Usuaurio',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

         DB::table('roles')->insert([
            'name' => 'empleado', 
            'display_name' => 'empleado',    
            'description' => 'Empleado',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('role_user')->insert([
            'user_id' => 1, 
            'role_id' => 1,               
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 1, 
            'role_id' => 2,               
        ]);
        
        DB::table('role_user')->insert([
            'user_id' => 2, 
            'role_id' => 1,               
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2, 
            'role_id' => 2,               
        ]);

        DB::table('permissions')->insert([
            'name' => 'read-users', 
            'display_name' => 'Leer Usuario',    
            'description' => 'Leer Usuario',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'create-users', 
            'display_name' => 'Crear Usuario',    
            'description' => 'Crear Usuario',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'update-users', 
            'display_name' => 'Actualizar Usuario',    
            'description' => 'Actualizar Usuario',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'delete-users', 
            'display_name' => 'Eliminar Usuario',    
            'description' => 'Eliminar Usuario',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'read-roles', 
            'display_name' => 'Leer Roles',    
            'description' => 'Leer Roles',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'create-roles', 
            'display_name' => 'Crear Roles',    
            'description' => 'Crear Roles',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'update-roles', 
            'display_name' => 'Actualizar Roles',    
            'description' => 'Actualizar Roles',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'delete-roles', 
            'display_name' => 'Eliminar Roles',    
            'description' => 'Eliminar Roles',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
       
        DB::table('permissions')->insert([
            'name' => 'read-permissions', 
            'display_name' => 'Leer Permiso',    
            'description' => 'Leer Permiso',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'create-permissions', 
            'display_name' => 'Crear Permiso',    
            'description' => 'Crear Permiso',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'update-permissions', 
            'display_name' => 'Actualizar Permiso',    
            'description' => 'Actualizar Permiso',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'delete-permissions', 
            'display_name' => 'Eliminar Permiso',    
            'description' => 'Eliminar Permiso',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);        

        DB::table('permissions')->insert([
            'name' => 'read-alimentos', 
            'display_name' => 'Leer Alimentos',    
            'description' => 'Leer Alimentos',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
 
         DB::table('permissions')->insert([
            'name' => 'create-alimentos', 
            'display_name' => 'Crear Alimentos',    
            'description' => 'Crear Alimentos',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
            
        DB::table('permissions')->insert([
            'name' => 'update-alimentos', 
            'display_name' => 'Actualizar Alimentos',    
            'description' => 'Actualizar Alimentos',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
            
        DB::table('permissions')->insert([
            'name' => 'delete-alimentos', 
            'display_name' => 'Eliminar Alimentos',    
            'description' => 'Eliminar Alimentos',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'read-platos', 
            'display_name' => 'Leer platos',    
            'description' => 'Leer platos',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
 
         DB::table('permissions')->insert([
            'name' => 'create-platos', 
            'display_name' => 'Crear platos',    
            'description' => 'Crear platos',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
            
        DB::table('permissions')->insert([
            'name' => 'update-platos', 
            'display_name' => 'Actualizar platos',    
            'description' => 'Actualizar platos',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
            
        DB::table('permissions')->insert([
            'name' => 'delete-platos', 
            'display_name' => 'Eliminar platos',    
            'description' => 'Eliminar platos',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'read-recetas', 
            'display_name' => 'Leer recetas',    
            'description' => 'Leer recetas',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
 
         DB::table('permissions')->insert([
            'name' => 'create-recetas', 
            'display_name' => 'Crear recetas',    
            'description' => 'Crear recetas',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
            
        DB::table('permissions')->insert([
            'name' => 'update-recetas', 
            'display_name' => 'Actualizar recetas',    
            'description' => 'Actualizar recetas',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
            
        DB::table('permissions')->insert([
            'name' => 'delete-recetas', 
            'display_name' => 'Eliminar recetas',    
            'description' => 'Eliminar recetas',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'read-menus', 
            'display_name' => 'Leer menus',    
            'description' => 'Leer menus',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
 
         DB::table('permissions')->insert([
            'name' => 'create-menus', 
            'display_name' => 'Crear menus',    
            'description' => 'Crear menus',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
            
        DB::table('permissions')->insert([
            'name' => 'update-menus', 
            'display_name' => 'Actualizar menus',    
            'description' => 'Actualizar menus',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);
            
        DB::table('permissions')->insert([
            'name' => 'delete-menus', 
            'display_name' => 'Eliminar menus',    
            'description' => 'Eliminar menus',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'copy-menus', 
            'display_name' => 'Copiar menu',    
            'description' => 'Copiar menu',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permissions')->insert([
            'name' => 'print-menus', 
            'display_name' => 'Imprimir menu',    
            'description' => 'Imprimir menu',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 1, 
            'role_id' => 1,               
        ]);
        
        DB::table('permission_role')->insert([
            'permission_id' => 2, 
            'role_id' => 1,               
        ]);   

        DB::table('permission_role')->insert([
            'permission_id' => 3, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 4, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 5, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 6, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 7, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 8, 
            'role_id' => 1,               
        ]);  

        DB::table('permission_role')->insert([
            'permission_id' => 9, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 10, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 11, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 12, 
            'role_id' => 1,               
        ]); 

         DB::table('permission_role')->insert([
            'permission_id' => 13, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 14, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 15, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 16, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 17, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 18, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 19, 
            'role_id' => 1,               
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 20, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 21, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 22, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 23, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 24, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 25, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 26, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 27, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 28, 
            'role_id' => 1,               
        ]); 

        DB::table('permission_role')->insert([
            'permission_id' => 29, 
            'role_id' => 1,               
        ]);  

        DB::table('permission_role')->insert([
            'permission_id' => 30, 
            'role_id' => 1,               
        ]);     

        DB::table('menus')->insert([
            'inicio' => date("Y-m-d"), 
            'fin' =>   date( 'Y-m-j' , strtotime( '+7 day' , strtotime ( date("Y-m-d")) )), 
            'descripcion' => 'Ejemplo de menu',               
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('platos')->insert([
            'descripcion' => "Arroz con pollo", 
            'grupo_plato_id' => 5,                  
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('platos')->insert([
            'descripcion' => "Arepas", 
            'grupo_plato_id' => 4,                   
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('platos')->insert([
            'descripcion' => "Sopa", 
            'grupo_plato_id' => 5,                   
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);


        DB::table('platos')->insert([
            'descripcion' => "Empanadas", 
            'grupo_plato_id' => 2,                  
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('platos')->insert([
            'descripcion' => "Sandwich", 
            'grupo_plato_id' => 1,                   
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('platos')->insert([
            'descripcion' => "Pizza", 
            'grupo_plato_id' => 4,                 
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('platos')->insert([
            'descripcion' => "Huevos revueltos con arepas", 
            'grupo_plato_id' => 2,                
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);

        DB::table('platos')->insert([
            'descripcion' => "Pasta boloña", 
            'grupo_plato_id' => 5,                   
            'created_at' => date("Y-m-d H:i"), 
            'updated_at' => date("Y-m-d H:i"),
        ]);


        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 5, 
            'dia' => 1,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 7, 
            'dia' => 1,               
        ]);  
        
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 8, 
            'dia' => 1,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 2, 
            'dia' => 1,               
        ]);  

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 5, 
            'dia' => 2,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 4, 
            'dia' => 2,               
        ]);  
        
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 8, 
            'dia' => 2,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 2, 
            'dia' => 2,               
        ]);  

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 5, 
            'dia' => 3,               
        ]);  

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 4, 
            'dia' => 3,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 8, 
            'dia' => 3,               
        ]);  
        
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 3, 
            'dia' => 3,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 6, 
            'dia' => 3,               
        ]);  
        
         DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 5, 
            'dia' => 4,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 7, 
            'dia' => 4,               
        ]);  
        
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 8, 
            'dia' => 4,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 6, 
            'dia' => 4,               
        ]);  
        
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 5, 
            'dia' => 5,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 4, 
            'dia' => 5,               
        ]);  
        
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 1, 
            'dia' => 5,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 2, 
            'dia' => 5,               
        ]);
       
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 5, 
            'dia' => 6,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 7, 
            'dia' => 6,               
        ]);  
        
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 3, 
            'dia' => 6,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 6, 
            'dia' => 6,               
        ]); 


        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 5, 
            'dia' => 7,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 7, 
            'dia' => 7,               
        ]);  
        
        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 3, 
            'dia' => 7,               
        ]); 

        DB::table('menu_plato')->insert([
            'menu_id' => 1, 
            'plato_id' => 2, 
            'dia' => 7,               
        ]);     
    }
}
