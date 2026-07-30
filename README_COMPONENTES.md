# Sistema Modular de Componentes para Informes

## Arquitectura

El sistema ahora soporta componentes modulares que pueden ser arrastrados y soltados en el PDF:

### Tipos de Componentes
- **Texto** - Texto libre con formato
- **Tabla** - Tablas con filas y columnas
- **Gráfico** - Gráficos de torta, barras y líneas
- **Imagen** - Imágenes únicas
- **Collage** - Múltiples imágenes en grid o mosaico

### Flujo de Informes
1. Seleccionar beneficiario
2. Seleccionar tipo de informe
3. Detalles del informe (motivo, observaciones)
4. **Componer informe** - Añadir y reorganizar piezas
5. Generar PDF final

## Migración de Base de Datos

Para habilitar el almacenamiento persistente de piezas, ejecuta el script de migración:

```bash
php migrate.php
```

### Alternativamente, ejecuta manualmente:

```sql
ALTER TABLE informes ADD COLUMN piezas_json TEXT DEFAULT NULL AFTER observaciones;
ALTER TABLE informes ADD COLUMN elaborado_por VARCHAR(255) DEFAULT NULL AFTER piezas_json;
```

## Archivos Principales

- `app/models/Components/` - Componentes modulares
- `app/models/Informe.php` - Modelo actualizado con manejo de piezas
- `app/controllers/InformeController.php` - Controladores para el flujo
- `app/helpers/pdf_helper.php` - Generación de PDF con componentes
- `app/views/paso4.php` - Interfaz de componer informe

## Notas

- Si la columna `piezas_json` no existe, las piezas se almacenan temporalmente en sesión
- Los gráficos se generan como SVG y convierten a JPG usando ImageMagick (ImageMagick debe estar instalado)
- El PDF se genera usando Dompdf con soporte HTML5