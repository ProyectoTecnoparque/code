SELECT * FROM empleados INNER JOIN departamentos ON empleados.e_id = departamentos.d_id;


SELECT point_acum.usuario_id,point_acum.acum_point,point_acum.id_nivel,point_acum.id_nivel,usuario.nombres,usuario.apellidos,punto_nivel.id,punto_nivel.Nivel 
JOIN usuario,usuario.id=point_acum.usuario_id 
JOIN punto_nivel,point_acum.id_nivel=point_acum.id_nivel
WHERE point_acum.usuario_id=8;


Consultar datos de la tabla de puntos acumulados #
SELECT * FROM point_acum 
INNER JOIN usuario ON point_acum.usuario_id = usuario.id
INNER JOIN punto_nivel ON point_acum.id_nivel = punto_nivel.id



consuta detalle del departamento en la tabla de usuarios 
SELECT * FROM usuario
INNER JOIN departamentos ON usuario.departamento = departamentos.id_depa










    