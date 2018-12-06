﻿INSERT INTO `estado_clasificacion_ticket` (`id`, `descripcion`) VALUES
	(1, 'Activa'),
	(2, 'InActiva');


INSERT INTO `estado_grupo_resolucion` (`id`, `descripcion`) VALUES
	(1, 'Activo'),
	(2, 'InActivo');


INSERT INTO `estado_intervencion` (`id`, `descripcion`) VALUES
	(1, 'Asignada'),
	(2, 'Rechazada'),
	(3, 'Pausada'),
	(4, 'Abordada'),
	(5, 'Cerrada');


INSERT INTO `estado_ticket` (`id`, `descripcion`) VALUES
	(1, 'Abierto Sin Derivar'),
	(2, 'Abierto Derivado'),
	(3, 'A la Espera OK'),
	(4, 'Cerrado');


INSERT INTO `cargo` (`id`, `descripcion`) VALUES
	(1, 'Usuario de Mesa de Ayuda'),
	(2, 'Usuario de Grupo de Resolución');


INSERT INTO `direccion` (`id`, `calle`, `piso`, `numero`, `oficina`) VALUES
	(1, 'San Martin ', 5, 3049, 'secretaria de extensión'),
	(2, 'Junin 218', 1, 344, 'administración de ingresos'),
	(3, 'balcarse', 1, 1562, 'Otra oficina'),
	(4, '4 Jefes', 1, 2345, 'La de Al lado de la otra'),
	(5, 'Lavaisse', 0, 324, 'Asistencia Social'),
	(6, '4 de Enero', 2, 334, 'DMZ');


INSERT INTO `empleado` (`id`, `cargo_id`, `direccion_id`, `legajo`, `nombre`, `apellido`, `telefono_interno`, `telefono_directo`) VALUES
	(1, 1, 1, 1, 'Lisandro Adolfo', 'Rattero', '344', '3424999235'),
	(2, 1, 2, 2, 'Franco Damián', 'Beber', '223', '3455277345'),
	(3, 2, 3, 3, 'Franco Augusto', 'Pizzutti', '45435', '3424667899'),
	(4, 2, 4, 4, 'Hector Orlando', 'Crispens', '455', '3424872589'),
	(5, 1, 5, 5, 'Cristian ', 'Impini', '235', '4444444444');



INSERT INTO `grupo_resolucion` (`id`, `estado_id`, `nombre`, `nivel`) VALUES
	(1, 1, 'Mesa de ayuda', 0),
	(2, 1, 'Unidades de soporte', 1),
	(3, 1, 'Servicio tecnico', 1),
	(4, 1, 'Administrador de base de datos', 2),
	(5, 1, 'Administrador SUSE linux', 2),
	(6, 1, 'Administrador proxy y correo electronico', 2),
	(7, 1, 'Administrador Debian', 2),
	(8, 1, 'Redes LAN', 1),
	(9, 1, 'Comunicaciones', 2),
	(10, 1, 'Desarrollo sistema comercial', 2),
	(11, 1, 'Desarrollo sistema RRHH', 2),
	(12, 1, 'Desarrollo sistema de reclamos', 2);


INSERT INTO `user` (`id`, `grupo_resolucion_id`, `empleado_id`, `username`, `email`, `password`,  `roles`) VALUES
	(1, 1, 1, 'lisandro', 'lisandrorattero@hotmail.com', '$2y$13$phuW/fIeFbfpS0uec1vgoe7RrQaLLvIeAs3sTlgphUyPq7/cPmGLC', 'administrador de redes'),
	(2, 4, 4, 'hector', 'hector.or.cr@gmail.com', '$2y$13$uFinNH0OU60oMKI9IYp9/.bUGzPRDxlOlmwsX10zcNo4kt2c4rd0O', 'un rol');


INSERT INTO `clasificacion_ticket` (`id`, `estado_cla_id`, `user_id`, `descripcion`, `nombre`) VALUES
	(1, 1, 1, 'descripcion', 'Cambio de Configuracion de Sistema Operativo de PC'),
	(2, 1, 1, 'Problema en el funcionamiento del Sistema Operativo de PC', 'Problema en el funcionamiento del Sistema Operativo de PC'),
	(3, 1, 1, 'Solicitud de instalacion de aplicaciones', 'Solicitud de instalacion de aplicaciones'),
	(4, 1, 1, 'Mal funcionamiento de hardware', 'Mal funcionamiento de hardware'),
	(5, 1, 1, 'Problema de autenticación en los distintos sistemas', 'Problema de autenticación en los distintos sistemas'),
	(6, 1, 1, 'Problema de acceso a la red local o remota', 'Problema de acceso a la red local o remota'),
	(7, 1, 1, 'Solicitud de usuario de red', 'Solicitud de usuario de red'),
	(8, 1, 1, 'Solicitud de usuario para sistemas informaticos que utiliza la empresa', 'Solicitud de usuario para sistemas informaticos que utiliza la empresa'),
	(9, 1, 1, 'Modificacion en los perfiles de usuarios', 'Modificacion en los perfiles de usuarios'),
	(10, 1, 1, 'Solicitud de cambio de contraseña', 'Solicitud de cambio de contraseña'),
	(11, 1, 1, 'Problema en los sistemas de la empresa', 'Problema en los sistemas de la empresa'),
	(12, 1, 1, 'Problemas con el correo electrónico', 'Problemas con el correo electrónico'),
	(13, 1, 1, 'Solicitud de nuevos puestos de trabajo', 'Solicitud de nuevos puestos de trabajo'),
	(14, 1, 1, 'Solicitud de soporte en el uso de alguna aplicación o sistema', 'Solicitud de soporte en el uso de alguna aplicación o sistema');




