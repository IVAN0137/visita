USE guia_turistico; -- Seleccionar la base de datos

CREATE TABLE guias (
    id INT IDENTITY(1,1) PRIMARY KEY, -- Auto-incremental
    nombre NVARCHAR(255) NOT NULL,
    colonia NVARCHAR(255) NOT NULL,
    municipio NVARCHAR(255) NOT NULL,
    foto NVARCHAR(255) NOT NULL
);

