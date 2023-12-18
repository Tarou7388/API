CREATE DATABASE senatidb;

USE senatidb;

CREATE TABLE
    marcas(
        idmarca INT auto_increment primary key,
        marca varchar(30) not null,
        create_at datetime not null default NOW(),
        inactive_at datetime null,
        update_at datetime null,
        constraint uk_marca unique(marca)
    ) ENGINE = InnoDB;

insert into marcas(marca)
values ('Toyota'), ('Nissan'), ('Volvo'), ('Hyundai'), ('KIA');

select * from marcas;

CREATE TABLE
    vehiculos(
        idvehiculos INT AUTO_INCREMENT PRIMARY KEY,
        idmarca INT NOT NULL,
        modelo VARCHAR(50) NOT NULL,
        color VARCHAR(30) NOT NULL,
        tipocombustible CHAR(3) NOT NULL,
        peso SMALLINT NOT NULL,
        afabricacion CHAR(4) NOT NULL,
        placa CHAR(7) NOT NULL,
        create_at datetime not null default NOW(),
        inactive_at datetime null,
        update_at datetime null,
        CONSTRAINT fk_idmarca_veh FOREIGN KEY (idmarca) REFERENCES marcas(idmarca),
        CONSTRAINT ck_tipocombustible_veh CHECK (
            tipocombustible IN ('GSL', 'DSL', 'GNV', 'GLP')
        ),
        CONSTRAINT uk_placa_veh UNIQUE (placa)
    ) ENGINE = INNODB;

INSERT INTO
    vehiculos (
        idmarca,
        modelo,
        color,
        tipocombustible,
        peso,
        afabricacion,
        placa
    )
VALUES (
        1,
        'Hilux',
        'blanco',
        'DSL',
        1800,
        '2020',
        'ABC-111'
    ), (
        2,
        'Sentra',
        'gris',
        'GSL',
        1200,
        '2021',
        'ABC-112'
    ), (
        3,
        'EX30',
        'negro',
        'GNV',
        1350,
        '2023',
        'ABC-113'
    ), (
        4,
        'Tucson',
        'rojo',
        'GLP',
        1800,
        '2022',
        'ABC-114'
    ), (
        5,
        'Sportage',
        'azul',
        'DSL',
        1500,
        '2010',
        'ABC-115'
    );

DROP TABLE empleados;

CREATE TABLE
    sedes(
        idsede INT AUTO_INCREMENT PRIMARY KEY,
        sede VARCHAR(50),
        create_at datetime not null default NOW(),
        inactive_at datetime null,
        update_at datetime null
    ) ENGINE = INNODB;

CREATE TABLE
    empleados(
        idempleado INT AUTO_INCREMENT PRIMARY KEY,
        idsede INT NOT NULL,
        apellidos VARCHAR(50) NOT NULL,
        nombres VARCHAR(50) NOT NULL,
        nrodocumento VARCHAR(12) NOT NULL,
        fechanac DATETIME NOT NULL,
        telefono CHAR(9) NOT NULL,
        create_at datetime not null default NOW(),
        inactive_at datetime null,
        update_at datetime null,
        CONSTRAINT fk_sede FOREIGN KEY (idsede) REFERENCES sedes(idsede),
        CONSTRAINT uk_nrodoc UNIQUE (nrodocumento)
    ) ENGINE = INNODB;

CREATE PROCEDURE SPU_REGISTRAR_SEDE(IN _SEDE VARCHAR
(50)) BEGIN INSERT 
	INSERT INSERT INSERT INTO sedes (sede) VALUES(_sede);
	END;

DROP PROCEDURE SPU_CANTIDAD_EMPLEADOS_SEDE;

CREATE PROCEDURE SPU_CANTIDAD_EMPLEADOS_SEDE() BEGIN 
	SELECT COUNT(*) as cantidad, sede
	FROM empleados
	    INNER JOIN sedes ON empleados.idsede = sedes.idsede
        GROUP BY sede;
	END;

CALL SPU_CANTIDAD_EMPLEADOS_SEDE();

CALL spu_registrar_sede ('Ayacucho');

CALL spu_registrar_sede ('Lima');

CALL spu_registrar_sede ('Chincha');

CALL spu_registrar_sede ('Piura');

CALL spu_registrar_sede ('Pisco');

CREATE PROCEDURE SPU_BUSCAR_EMPLEADO(IN _IDEMPLEADO 
INT) BEGIN 
	SELECT
	    SED.sede,
	    EMP.apellidos,
	    EMP.nombres,
	    EMP.nrodocumento,
	    EMP.fechanac,
	    EMP.telefono
	FROM empleados EMP
	    INNER JOIN sedes SED ON SED.idsede = EMP.idsede
	WHERE (EMP.inactive_at IS NULL)
	    AND (EMP.idempleado = _idempleado);
	END;


CREATE PROCEDURE SPU_BUSCAR_EMPLEADOS() BEGIN 
	SELECT
	    EMP.idempleado,
	    SED.sede,
	    EMP.apellidos,
	    EMP.nombres,
	    EMP.nrodocumento,
	    EMP.fechanac,
	    EMP.telefono
	FROM empleados EMP
	    INNER JOIN sedes SED ON SED.idsede = EMP.idsede
	WHERE (EMP.inactive_at IS NULL);
	END;


CREATE PROCEDURE SPU_BUSCAR_SEDE() BEGIN 
	SELECT idsede, sede
	FROM sedes
	WHERE inactive_at IS NULL
	ORDER BY sede;
	END;


CREATE PROCEDURE SPU_INSERTAR_EMPLEADOS(IN _IDSEDE 
INT, IN _APELLIDOS VARCHAR(50), IN _NOMBRES VARCHAR
(50), IN _NRODOC VARCHAR(12), IN _FECNAC DATETIME, 
IN _TELEFONO CHAR(9)) BEGIN 
	INSERT INTO
	    empleados (
	        idsede,
	        apellidos,
	        nombres,
	        nrodocumento,
	        fechanac,
	        telefono
	    )
	VALUES (
	        _idsede,
	        _apellidos,
	        _nombres,
	        _nrodoc,
	        _fecnac,
	        _telefono
	    );
	END;


CREATE PROCEDURE SPU_VEHCULOS_BUSCAR(IN _PLACA CHAR
(7)) BEGIN SELECT 
	SELECT
	SELECT
	SELECT
	    VEH.idvehiculos,
	    MAR.marca,
	    VEH.color,
	    VEH.modelo,
	    VEH.tipocombustible,
	    VEH.peso,
	    VEH.afabricacion,
	    VEH.placa
	FROM vehiculos VEH
	    INNER JOIN marcas MAR ON MAR.idmarca = VEH.idmarca
	WHERE (VEH.inactive_at IS NULL)
	    AND (VEH.placa = _placa);
	END;


CREATE PROCEDURE SPU_VEHICULOS_REGISTRAR(IN _IDMARCA 
INT, IN _MODELO VARCHAR(50), IN _COLOR VARCHAR(50)
, IN _TIPOCOMBUSTIBLE CHAR(3), IN _PESO SMALLINT, 
IN _AFABRICACION CHAR(4), IN _PLACA CHAR(7)) BEGIN 
INSERT 
	INSERT
	INSERT
	INSERT INTO
	    vehiculos (
	        idmarca,
	        modelo,
	        color,
	        tipocombustible,
	        peso,
	        afabricacion,
	        placa
	    )
	VALUES (
	        _idmarca,
	        _modelo,
	        _color,
	        _tipocombustible,
	        _peso,
	        _afabricacion,
	        _placa
	    )
	SELECT
	    @ @last_insert_id 'idvehiculo';
	END CALL


CALL

CALL

CALL
    spu_vehiculos_registrar (
        3,
        'Sportage',
        'verde',
        'DSL',
        1600,
        '2011',
        'ABC-118'
    );

CALL spu_vehculos_buscar('ABC-116');

CREATE PROCEDURE SPU_MARCAS_LISTAR() BEGIN SELECT 
	SELECT
	SELECT
	SELECT idmarca, marca
	FROM marcas
	WHERE inactive_at IS NULL
	ORDER BY marca;
	END select


select

select

select * from empleados;

CALL spu_buscar_empleados;

CALL
    spu_insertar_empleados (
        1,
        'Lopez',
        'Jose',
        '45215894',
        '2000/12/16',
        '789456123'
    );

CALL
    spu_insertar_empleados (
        2,
        'Quispe',
        'Juan',
        '12345678',
        '2005/10/16',
        '123456789'
    );

CALL
    spu_insertar_empleados (
        3,
        'Loyola',
        'Carlos',
        '75346852',
        '2002/05/06',
        '845612397'
    );

CALL
    spu_insertar_empleados (
        4,
        'Mamani',
        'Marco',
        '89456123',
        '2001/05/10',
        '654987321'
    );

CREATE PROCEDURE spu_resumen_tipocombustible()
BEGIN
    SELECT
        tipocombustible, count(tipocombustible) as 'total'
        FROM vehiculos
        GROUP BY tipocombustible
        ORDER BY total;
END



CALL spu_resumen_tipocombustible();