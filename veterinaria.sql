CREATE DATABASE IF NOT EXISTS veterinaria;

ALTER DATABASE veterinaria DEFAULT CHARACTER
SET utf8 DEFAULT COLLATE utf8_general_ci;

USE veterinaria;

CREATE TABLE IF NOT EXISTS user(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    correo VARCHAR(50),
    api_token VARCHAR(255),
    email_verified_at TIMESTAMP DEFAULT NOW(),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

insert into user (id, nombre, correo) values(0,'Luis Urbina', 'luisurbm@gmail.com');

CREATE TABLE IF NOT EXISTS raza(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS genero(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS especie(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    created_at TIMESTAMP NULL DEFAULT NOW(),
    updated_at TIMESTAMP NULL DEFAULT NOW()
) ENGINE = InnoDB;

insert into especie (id, nombre) values(0,'Mamíferos');
insert into especie (id, nombre) values(0,'Aves');
insert into especie (id, nombre) values(0,'Reptiles');
insert into especie (id, nombre) values(0,'Ranas y sapos');
insert into especie (id, nombre) values(0,'Peces');
insert into especie (id, nombre) values(0,'Ciempiés y milpiés');
insert into especie (id, nombre) values(0,'Arañas y alacranes');
insert into especie (id, nombre) values(0,'Insectos');
insert into especie (id, nombre) values(0,'Cangrejos y camarones');
insert into especie (id, nombre) values(0,'Estrellas y erizos');
insert into especie (id, nombre) values(0,'Caracoles, almejas y pulpos');
insert into especie (id, nombre) values(0,'Lombrices y gusanos marinos');
insert into especie (id, nombre) values(0,'Rotíferos');
insert into especie (id, nombre) values(0,'Gusanos planos');
insert into especie (id, nombre) values(0,'Medusas y corales');
insert into especie (id, nombre) values(0,'Esponjas');

CREATE TABLE IF NOT EXISTS responsable(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    cedula VARCHAR(30),
    correo VARCHAR(50),
    nacimiento DATE,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    user_id INT(4) UNSIGNED NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id),
    INDEX(cedula)
) ENGINE = InnoDB;

insert into responsable (id, nombre, cedula, correo, nacimiento, user_id) values(0,'Luis Urbina', '1030592201', 'luisurbm@gmail.com', NOW(), 1);

CREATE TABLE IF NOT EXISTS mascota(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nacimiento DATE,
    adquisicion DATE,
    nombre VARCHAR(30),
    codigo VARCHAR(30),
    color VARCHAR(30),
    obervaciones VARCHAR(200),
    esterilizado BOOLEAN,
    raza_id INT(4) UNSIGNED NOT NULL,
    FOREIGN KEY (raza_id) REFERENCES raza(id),
    genero_id INT(4) UNSIGNED NOT NULL,
    FOREIGN KEY (genero_id) REFERENCES genero(id),
    especie_id INT(4) UNSIGNED NOT NULL,
    FOREIGN KEY (especie_id) REFERENCES especie(id),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS responsable_mascota(
    responsable_id INT(4) UNSIGNED NOT NULL,
    mascota_id INT(4) UNSIGNED NOT NULL,
    FOREIGN KEY (mascota_id) REFERENCES mascota(id),
    FOREIGN KEY (responsable_id) REFERENCES responsable(id),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    UNIQUE (
        mascota_id,
        responsable_id
    )
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS turno(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    fecha DATE,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS alergia(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS vacuna(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    lote VARCHAR(30),
    fecha_vencimiento DATE,
    valor_unidad INT(9),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS medicamento(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    lote VARCHAR(30),
    fecha_vencimiento DATE,
    valor_unidad INT(9),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS medio_pago(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(200),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS factura(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    medio_pago_id INT(4) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (medio_pago_id) REFERENCES medio_pago(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS medida(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS servicio(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    fecha DATE,
    duracion_minutos INT(4),
    incapacidad_dias INT(4),
    valor_total INT(4),
    sala_id INT(4) UNSIGNED NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

insert into servicio (id, nombre, fecha, duracion_minutos, incapacidad_dias, valor_total) values(0,'Consulta Veterinaria', now(), 25, 25, 25);
insert into servicio (id, nombre, fecha, duracion_minutos, incapacidad_dias, valor_total) values(0,'Nebulizaciones', now(), 25, 25, 25);
insert into servicio (id, nombre, fecha, duracion_minutos, incapacidad_dias, valor_total) values(0,'Profilaxis en perros y gatos', now(), 25, 25, 25);
insert into servicio (id, nombre, fecha, duracion_minutos, incapacidad_dias, valor_total) values(0,'Procedimientos Menores', now(), 25, 25, 25);

CREATE TABLE IF NOT EXISTS insumo_material(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    vencimiento DATE,
    cantidad_uso INT(4),
    medida_id INT(4) UNSIGNED,
    paquete_id INT(4) UNSIGNED,
    cargo_cliente BOOLEAN,
    valor_unidad INT(4),
    FOREIGN KEY (paquete_id) REFERENCES servicio(id),
    FOREIGN KEY (medida_id) REFERENCES medida(id),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS sala(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cantidad_camilla INT(2),
    cantidad_baños INT(2),
    nombre VARCHAR(30),
    ultima_limpieza DATE,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS servicio_sala(
    servicio_id INT(4) UNSIGNED NOT NULL,
    sala_id INT(4) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (sala_id) REFERENCES sala(id),
    FOREIGN KEY (servicio_id) REFERENCES servicio(id),
    UNIQUE (
        sala_id,
        servicio_id
    )
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS contrato(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30),
    inicio DATE,
    fin DATE,
    valor_hora INT(4),
    horas_semana INT(4),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS profesional(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(30),
    nombre VARCHAR(30),
    correo VARCHAR(30),
    nacimiento DATE,
    contrato_id INT(4) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (contrato_id) REFERENCES contrato(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS visita_mascota(
    id INT(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    peso INT(10),
    altura INT(10),
    satisfaccion INT(1),
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    mascota_id INT(4) UNSIGNED,
    FOREIGN KEY (mascota_id) REFERENCES mascota(id),
    turno_id INT(4) UNSIGNED,
    FOREIGN KEY (turno_id) REFERENCES turno(id),
    factura_id INT(4) UNSIGNED,
    FOREIGN KEY (factura_id) REFERENCES factura(id)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS visita_servicio(
    servicio_id INT(4) UNSIGNED NOT NULL,
    visita_mascota_id INT(4) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (visita_mascota_id) REFERENCES visita_mascota(id),
    FOREIGN KEY (servicio_id) REFERENCES servicio(id),
    UNIQUE (
        visita_mascota_id,
        servicio_id
    )
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS visita_alergia(
    alergia_id INT(4) UNSIGNED NOT NULL,
    visita_mascota_id INT(4) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (visita_mascota_id) REFERENCES visita_mascota(id),
    FOREIGN KEY (alergia_id) REFERENCES alergia(id),
    UNIQUE (
        visita_mascota_id,
        alergia_id
    )
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS visita_vacuna(
    vacuna_id INT(4) UNSIGNED NOT NULL,
    visita_mascota_id INT(4) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (visita_mascota_id) REFERENCES visita_mascota(id),
    FOREIGN KEY (vacuna_id) REFERENCES vacuna(id),
    UNIQUE (
        visita_mascota_id,
        vacuna_id
    )
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS visita_medicamento(
    medicamento_id INT(4) UNSIGNED NOT NULL,
    visita_mascota_id INT(4) UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT NOW(),
    updated_at TIMESTAMP DEFAULT NOW(),
    FOREIGN KEY (visita_mascota_id) REFERENCES visita_mascota(id),
    FOREIGN KEY (medicamento_id) REFERENCES medicamento(id),
    UNIQUE (
        visita_mascota_id,
        medicamento_id
    )
) ENGINE = InnoDB;
