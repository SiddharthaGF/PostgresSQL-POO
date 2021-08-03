-- Creacion tabla facultad 

CREATE TABLE facultad 

( 

    codigo_facultad integer NOT NULL, 

    nombre_facultad character varying(50), 

    CONSTRAINT pk_facultad PRIMARY KEY (codigo_facultad) 

) 


-- Creación tabla carrera 

CREATE TABLE carrera 

( 

    codigo_carrera integer NOT NULL, 

    nombre_carrera character varying(50) , 

    codigo_facultad integer, 

    CONSTRAINT pk_carrera PRIMARY KEY (codigo_carrera), 

    CONSTRAINT fk_facultad_carrera FOREIGN KEY (codigo_facultad) REFERENCES facultad  

) 

-- Creación tabla persona 

CREATE TABLE persona 

( 

    cedula character(10), 

    nombre_persona character varying(50), 

    apellido_persona character varying(50), 

    direccion character varying(100) 

) 

-- Creación tabla estudiante 

CREATE TABLE estudiante 

( 

    codigo_estudiante integer NOT NULL, 

    codigo_carrera integer, 

    CONSTRAINT pk_estudiante PRIMARY KEY (codigo_estudiante), 

    CONSTRAINT fk_carrera_estudiante FOREIGN KEY (codigo_carrera) REFERENCES carrera (codigo_carrera) 

) INHERITS (persona) 

 

-- Creación tabla profesor 

CREATE TABLE IF NOT EXISTS public.profesor 

( 

    codigo_profesor integer NOT NULL, 

    codigo_carrera integer, 

    CONSTRAINT pk_profesor PRIMARY KEY (codigo_profesor), 

    CONSTRAINT fk_carrera_profesor FOREIGN KEY (codigo_carrera) REFERENCES carrera (codigo_carrera)  

) INHERITS (public.persona) 
